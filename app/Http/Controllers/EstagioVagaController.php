<?php

namespace App\Http\Controllers;

//use Mail;
use App\Mail\NovaOportunidadeMail;
use App\Models\EstagioVaga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class EstagioVagaController extends Controller
{   
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $estagiovagas= EstagioVaga::where('user_id', $user_id)->paginate(10);
        return view('estagiovaga.index', ['estagiovagas'=>$estagiovagas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estagiovaga.create');
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
        $dados['user_id'] = auth()->user()->id;
        $dados['vaga_aprovada'] = 'Em análise';
        
        $estagiovaga = EstagioVaga::create($dados);
        //$destinario = auth()->user()->email; //e-mail do usuário logado (autenticado)
        $destinario='rogerio.canto@ifmg.edu.br';
        Mail::to($destinario)->send(new NovaOportunidadeMail($estagiovaga));

        return redirect()->route('estagiovaga.show', ['estagiovaga' => $estagiovaga->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EstagioVaga  $estagioVaga
     * @return \Illuminate\Http\Response
     */
    public function show(EstagioVaga $estagiovaga)
    {
        return view('estagiovaga.show', ['estagiovaga' => $estagiovaga]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EstagioVaga  $estagioVaga
     * @return \Illuminate\Http\Response
     */
    public function edit(EstagioVaga $estagiovaga)
    {
        
        if($estagiovaga->user_id != auth()->user()->id) {
            return view('acesso-negado');            
        }

        return view('estagiovaga.edit', ['estagiovaga' => $estagiovaga]);       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EstagioVaga  $estagioVaga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EstagioVaga $estagiovaga)
    {
       
        if($estagiovaga->user_id != auth()->user()->id) {
            return view('acesso-negado');
        }       
        
        $estagiovaga->update($request->all());

        //$destinario = auth()->user()->email; //e-mail do usuário logado (autenticado)
        $destinario='rogerio.canto@ifmg.edu.br';
        Mail::to($destinario)->send(new NovaOportunidadeMail($estagiovaga));

        return redirect()->route('estagiovaga.show', ['estagiovaga'=> $estagiovaga->id]);       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EstagioVaga  $estagioVaga
     * @return \Illuminate\Http\Response
     */
    public function destroy(EstagioVaga $estagiovaga)
    {
        if($estagiovaga->user_id != auth()->user()->id) {
            return view('acesso-negado');
        }

        $estagiovaga->delete();
        return redirect()->route('estagiovaga.index');
    }
}
