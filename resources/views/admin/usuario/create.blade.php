@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p class="h2">Criação de usuário</p>
            <p class="lead">
               Preencha as informações abaixo e clique no botão "Cadastrar".
            </p>
            @include('admin.usuario.form.form_usuario',['route'=>'usuario.store','method'=>'POST'])
        </div>
    </div>
</div>
@endsection