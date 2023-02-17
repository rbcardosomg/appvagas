@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p class="h2">Cadastro de empresa Concedente de Estágio e Trabalho</p>
                <p class="lead">
                Preencha as informações da empresa a ser cadastrada.
                </p>
                @include('admin.empresa.form.form_empresa',['route'=>'empresa.store','method'=>'POST'])
            </div>
        </div>
    </div>
@endsection