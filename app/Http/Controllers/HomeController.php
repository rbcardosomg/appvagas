<?php

namespace App\Http\Controllers;

use App\Models\Perfil;
use Illuminate\Http\Request;

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
