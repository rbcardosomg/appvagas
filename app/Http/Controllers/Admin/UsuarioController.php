<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
            $usuarios = User::where('perfil', Perfil::SETOR_ENSINO->name)->paginate();
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
        if(auth()->user()->hasPerfil(Perfil::SETOR_ESTAGIO))
            $request->merge(['perfil' => Perfil::SETOR_ENSINO->name]);
        
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'perfil' => 'required',
            'password' => 'required|confirmed'
        ]);
        
        $request->merge(['password' => Hash::make($request['password'])]);
            
        User::create($request->all());
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
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'perfil' => 'required',
            'password' => 'confirmed'
        ]);

        $usuario = User::findOrFail($id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        if($request->filled('password'))
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
