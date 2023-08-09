<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\CursoTipo;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function index()
    {
        $cursos = Curso::paginate();
        return view('admin.curso.index', ['cursos'=>$cursos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos_curso = CursoTipo::cases();
        return view('admin.curso.create',['tipos_cursos'=>$tipos_curso]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dados = $request->all();
        $curso = Curso::create($dados);
        return redirect()->route('curso.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Curso $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        dd("Show");
        return view('admin.curso.show', ['curso' => $curso]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Curso $curso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso = Curso::findOrFail($id);
        $tipos_curso = CursoTipo::cases();
        return view('admin.curso.edit', ['curso' => $curso, 'tipos_cursos' => $tipos_curso]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Curso $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $curso = Curso::findOrFail($id);
        $curso->update($request->all());

        return redirect()->route('curso.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Curso $curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Curso $curso)
    {
        if($curso)
            $curso->delete();

        return redirect()->route('curso.index');
    }
}
