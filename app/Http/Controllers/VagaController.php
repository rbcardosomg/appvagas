<?php

namespace App\Http\Controllers;

//use Mail;
use App\Mail\NovaOportunidadeMail;
use App\Models\Curso;
use App\Models\Perfil;
use App\Models\Vaga;
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
        return view('admin.vaga.create', ['cursos'=>$cursos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        $cursos = $request->cursos;
        $dados['user_id'] = auth()->user()->id;
        $dados['vaga_aprovada'] = 'Em análise';
        
        $vaga = Vaga::create($dados);
        //$destinario = auth()->user()->email; //e-mail do usuário logado (autenticado)
        $destinario='rafael.cardoso@ifmg.edu.br';
        Mail::to($destinario)->send(new NovaOportunidadeMail($vaga));

        return redirect()->route('admin.vaga.show', ['vaga' => $vaga->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function show(Vaga $vaga)
    {
        return view('admin.vaga.show', ['vaga' => $vaga]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function edit(Vaga $vaga)
    {
        //$cursos = Curso::all();

        if($vaga->user_id != auth()->user()->id) {
            return view('acesso-negado');
        }

        return view('admin.vaga.edit', ['vaga' => $vaga]);       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vaga $vaga)
    {
       
        if($vaga->user_id != auth()->user()->id) {
            return view('acesso-negado');
        }       
        
        $vaga->update($request->all());

        //$destinario = auth()->user()->email; //e-mail do usuário logado (autenticado)
        $destinario='rafael.cardoso@ifmg.edu.br';
        Mail::to($destinario)->send(new NovaOportunidadeMail($vaga));

        return redirect()->route('admin.vaga.show', ['vaga'=> $vaga->id]);
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