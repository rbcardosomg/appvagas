<?php

namespace App\Http\Controllers;

//use Mail;
use App\Mail\NovaOportunidadeMail;
use App\Models\Curso;
use App\Models\Perfil;
use App\Models\Vaga;
use App\Models\VagaTipo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VagaController extends Controller
{    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->hasPerfil(Perfil::EMPRESA))
        {
            $user_id = auth()->user()->id;
            $vagas = Vaga::where('user_id', $user_id)->paginate();
        }
        else
            $vagas = Vaga::paginate();
        
        return view('admin.vaga.index', ['vagas'=>$vagas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cursos = Curso::all();
        $vaga_tipos = [VagaTipo::estagio, VagaTipo::emprego];
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
        $dados['vaga_status'] = 'Em análise';
        
        $cursos = null;
        foreach ($request->cursos as $id) {
            $cursos[] = Curso::findOrFail($id);
        }
        
        $vaga = Vaga::create($dados);
        $vaga->cursos()->saveMany($cursos);
        //$destinario = auth()->user()->email; //e-mail do usuário logado (autenticado)
        //$destinario='rafael.cardoso@ifmg.edu.br';
        //Mail::to($destinario)->send(new NovaOportunidadeMail($vaga));

        return redirect()->route('vaga.show', ['vaga' => $vaga->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vaga = Vaga::findOrFail($id);
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
        $vaga_tipos = [VagaTipo::estagio, VagaTipo::emprego];

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

        $vaga = Vaga::findOrFail($id);

        $dados = $request->all();
        $dados['vaga_status'] = 'Em análise';
        
        $cursos = null;
        foreach ($request->cursos as $id) {
            $cursos[] = Curso::findOrFail($id);
        }
        
        $vaga->update($dados);
        $vaga->cursos()->saveMany($cursos);

        /* if($vaga->user_id != auth()->user()->id) {
            return view('acesso-negado');
        } */

        //$destinario = auth()->user()->email; //e-mail do usuário logado (autenticado)
        //$destinario='rafael.cardoso@ifmg.edu.br';
        //Mail::to($destinario)->send(new NovaOportunidadeMail($vaga));

        //return redirect()->route('vaga.show', ['vaga'=> $vaga->id]);
        return redirect()->route('vaga.index');
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
        return redirect()->route('admin.vaga.index');
    }
}