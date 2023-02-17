@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p class="h2">Editação de usuário</p>
            <p class="lead">
               Edite as informações abaixo e clique no botão "Atualizar".
            </p>
            @include('admin.usuario.form.form_usuario',['route'=>'usuario.update','method'=>'PUT','params'=>['usuario'=> $usuario->id]])
        </div>
    </div>
</div>
@endsection