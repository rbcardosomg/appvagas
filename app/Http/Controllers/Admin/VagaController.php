<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\NovaOportunidadeMail;
use App\Models\Curso;
use App\Models\Perfil;
use App\Models\User;
use App\Models\Vaga;
use App\Models\VagaStatus;
use App\Models\VagaTipo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class VagaController extends Controller
{   
    private function getVagas(User $user, $filtros = null)
    {
        $fil[] = $this->getPerfilFilters($user);

        if(!is_null($filtros)){
            if(!is_null($filtros['filtro_tipo']) && $filtros['filtro_tipo'] != '')
                $fil[] = ['tipo', $filtros['filtro_tipo']];

            if(!is_null($filtros['filtro_status']) && $filtros['filtro_status'] != '')
                $fil[] = ['vaga_status', $filtros['filtro_status']];

            if(!is_null($filtros['filtro_curso']) && $filtros['filtro_curso'] != '')
                $fil[] = ['cursos.id', $filtros['filtro_curso']];
            
        }
        
        $vaga = Vaga::where(function($query) use ($fil){
            foreach ($fil as $filtro) {
                if(sizeof($filtro) > 0){
                    if($filtro[0] === 'cursos.id'){
                        $query->whereHas('cursos', function($query1) use ($filtro){
                            $query1->where($filtro[0],$filtro[1]);
                        });
                    }else{
                        $query->where($filtro[0],$filtro[1]);
                    }
                }
            }
        });

        if(isset($filtros['filtro_indisponiveis']) && ($filtros['filtro_indisponiveis'] == 'on' || $filtros['filtro_indisponiveis'] == '1'))
            $vaga->withTrashed();
        
        return $vaga->paginate();
    }

    private function getPerfilFilters(User $user)
    {
        switch ($user->getPerfil()) {
            case Perfil::EMPRESA:
                return ['user_id', strval($user->id)];
                break;
            
            case Perfil::SETOR_ESTAGIO:
                return [];
                break;
            
            case Perfil::SETOR_ENSINO:
                return [];
                break;
            
            case Perfil::ADMIN:
                return [];
                break;
            
            default:
                return ['vaga_status', VagaStatus::APROVADA->name];
                break;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vagas = $this->getVagas(auth()->user());
        $cursos = Curso::all();
        $status = VagaStatus::cases();
        $tipos = VagaTipo::cases();
        return view('admin.vaga.index', ['vagas'=>$vagas, 'cursos'=>$cursos, 'status'=>$status, 'tipos'=>$tipos]);
    }

    /**
     * Display a listing of the resource filtered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function filtrar(Request $request)
    {
        $filtros = $request->all();
        //dd($filtros);
        
        if(is_null($filtros) || sizeof($filtros) == 0){
            return redirect()->back();
        }else{
            $vagas = $this->getVagas(auth()->user(),$filtros);
            $cursos = Curso::all();
            $status = VagaStatus::cases();
            $tipos = VagaTipo::cases();
            return view('admin.vaga.index', ['vagas'=>$vagas, 'cursos'=>$cursos, 'status'=>$status, 'tipos'=>$tipos, 'filtro_tipo'=>$filtros['filtro_tipo'], 'filtro_curso'=>$filtros['filtro_curso'],'filtro_status'=>$filtros['filtro_status'],'filtro_indisponiveis'=>isset($filtros['filtro_indisponiveis']) ?? null]);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = Curso::all();
        $vaga_tipos = VagaTipo::cases();
        return view('admin.vaga.create', ['cursos'=>$cursos, 'vaga_tipos'=>$vaga_tipos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required',
            'cursos' => 'required'
        ]);

        $dados = $request->all();
        $dados['user_id'] = auth()->user()->id;
        $dados['vaga_status'] = VagaStatus::ANALISE->name;
        
        $cursos = null;
        foreach ($request->cursos as $id) {
            $cursos[] = Curso::findOrFail($id);
        }
        
        $vaga = Vaga::create($dados);
        $vaga->cursos()->saveMany($cursos);

        $destinario = auth()->user()->email; //e-mail do usuário logado (autenticado)
        $destinario='rogerio.canto@ifmg.edu.br';
        Mail::to($destinario)->send(new NovaOportunidadeMail($vaga));

        return redirect()->route('vaga.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vaga = Vaga::withTrashed()->findOrFail($id);
        return view('admin.vaga.show', ['vaga' => $vaga]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vaga = Vaga::findOrFail($id);
        $cursos = Curso::all();
        $vaga_tipos = VagaTipo::cases();

        /* if($vaga->user_id != auth()->user()->id) {
            return view('acesso-negado');
        } */

        return view('admin.vaga.edit', ['vaga' => $vaga,'cursos'=>$cursos,'vaga_tipos'=>$vaga_tipos]);       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tipo' => 'required',
            'cursos' => 'required'
        ]);

        try {
            $vaga = Vaga::findOrFail($id);

            $dados = $request->all();

            if ($request->has('aprovar') && Gate::allows('aprovar-vaga')) {
                $dados['vaga_status'] = VagaStatus::APROVADA->name;
            }else
                $dados['vaga_status'] = VagaStatus::ANALISE->name;
            
            $cursos = null;
            foreach ($request->cursos as $id) {
                $cursos[] = Curso::findOrFail($id)->id;
            }
            
            $vaga->update($dados);
            $vaga->cursos()->sync($cursos);

            $destinario = auth()->user()->email; //e-mail do usuário logado (autenticado)
            $destinario='rogerio.canto@ifmg.edu.br';
            Mail::to($destinario)->send(new NovaOportunidadeMail($vaga));

            return redirect()->route('vaga.index');
        } catch (Exception $e) {
            return redirect()->back()->withFlashErro($e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vaga $vaga)
    {
        if($vaga->user_id != auth()->user()->id) {
            return view('acesso-negado');
        }

        $vaga->delete();
        return redirect()->route('vaga.index');
    }
}