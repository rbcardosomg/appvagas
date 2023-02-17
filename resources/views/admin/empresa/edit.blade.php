@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p class="h3">Cadastro da Concedente de Estágio e Trabalho</p>
            <p class="lead">
               Preencha as informações de sua organização que as vagas oferecidas sejam identificadas para esta empresa cadastrada.
            </p>
            @include('admin.empresa.form.form_empresa',['route'=>'empresa.update','method'=>'PUT','params'=>['empresa'=> $empresa->id]])
        </div>
    </div>
</div>
@endsection