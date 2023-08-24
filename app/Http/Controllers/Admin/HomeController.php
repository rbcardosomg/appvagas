<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Perfil;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        if($user->hasPerfil(Perfil::EMPRESA) && !isset($user->empresa_id))
            return redirect()->route('empresa.create');
        else
            return view('admin.home');
    }
}
