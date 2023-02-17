@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p class="h2">Criação de usuário da empresa</p>
            <p class="lead">
               Preencha as informações abaixo para criar um usuário para a empresa e clique no botão "Cadastrar".
            </p>
            @include('admin.usuario.form.form_usuario',['route'=>'empresa.usuario.store','method'=>'POST','empresa'=>$empresa])
        </div>
    </div>
</div>
@endsection