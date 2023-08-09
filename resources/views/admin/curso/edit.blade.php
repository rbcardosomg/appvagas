@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p class="h3">Cadastro de Curso</p>
            <p class="lead">
               Preencha as informações do curso.
            </p>
            @include('admin.curso.form.form_curso',['route'=>'curso.update','method'=>'PUT','params'=>['curso'=> $curso->id],'edit'=>true])
        </div>
    </div>
</div>
@endsection