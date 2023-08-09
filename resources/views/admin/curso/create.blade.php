@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p class="h2">Cadastro de Curso</p>
                <p class="lead">
                Preencha as informações do curso a ser cadastrado.
                </p>
                @include('admin.curso.form.form_curso',['route'=>'curso.store','method'=>'POST'])
            </div>
        </div>
    </div>
@endsection