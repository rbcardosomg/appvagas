<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->isAdmin())
            $usuarios = User::paginate();
        else
            $usuarios = User::where('perfil', Perfil::SETOR_ENSINO->getName())->paginate();
        
        return view('admin.usuario.index', ['usuarios'=>$usuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perfis = [Perfil::ADMIN, Perfil::SETOR_ESTAGIO, Perfil::SETOR_ENSINO, Perfil::EMPRESA];
        return view('admin.usuario.create', ['perfis'=>$perfis]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->all();
        $fields['password'] = Hash::make($fields['password']);
        User::create($fields);
        return redirect(route('usuario.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuario = User::findOrFail($id);
        $perfis = [Perfil::ADMIN, Perfil::SETOR_ESTAGIO, Perfil::SETOR_ENSINO, Perfil::EMPRESA];
        return view('admin.usuario.edit', ['usuario'=>$usuario, 'perfis'=>$perfis]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->perfil = $request->perfil;
        $usuario->save();

        return redirect(route('usuario.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect(route('usuario.index'));
    }
}
