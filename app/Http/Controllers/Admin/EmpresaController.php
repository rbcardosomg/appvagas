<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\Perfil;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::paginate();
        return view('admin.empresa.index', ['empresas'=>$empresas]);
        /* $empresa_id = auth()->user()->empresa_id;
        $empresa= Empresa::where('id', $empresa_id)->get();
        
        if (is_null($empresa_id)){
            return view('admin.empresa.create');            
        } else {
            return view('admin.empresa.index', ['empresa'=>$empresa]);
        } */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.empresa.create');
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
        $empresa = Empresa::create($dados);

        $user = auth()->user();
        if($user->hasPerfil(Perfil::EMPRESA))
        {
            $empresa->_usuario()->save($user);
            return redirect()->route('admin.home');
            //return redirect()->route('empresa.show', ['empresa' => $empresa->id]);
        }else
        {
            $perfis = [Perfil::EMPRESA];
            return redirect()->route('empresa.index'); //view('admin.empresa.usuario.create', ['empresa' => $empresa->id,'perfis'=>$perfis]);
        }

        /* $user_id = auth()->user()->id;
        $userfind = User::find($user_id);
        $userfind->fill(['empresa_id'=>$empresa->id]);
        $userfind->save(); */
    }

    public function userStore(Request $request)
    {
        $userController = new UsuarioController();
        if($userController->store($request))
        {
            return redirect()->route('empresa.index');
        }
        
        /* $user_id = auth()->user()->id;
        $userfind = User::find($user_id);
        $userfind->fill(['empresa_id'=>$empresa->id]);
        $userfind->save(); */
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        return view('admin.empresa.show', ['empresa' => $empresa]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = Empresa::findOrFail($id);
        return view('admin.empresa.edit', ['empresa' => $empresa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $empresa = Empresa::findOrFail($id);
        $empresa->update($request->all());

        if(auth()->user()->hasPerfil(Perfil::EMPRESA))
            $route = 'admin.home';
        else
            $route = 'empresa.index';

        return redirect()->route($route);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
}
