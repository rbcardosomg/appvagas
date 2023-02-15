@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p class="h2">Editação de usuário</p>
            <p class="lead">
               Edite as informações abaixo e clique no botão "Atualizar".
            </p>
            <form method="POST" action="{{ route('usuario.update',['usuario'=> $usuario->id ]) }}">
                @csrf
                @method('PUT')

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="mb-3 row">
                            <div class="col">
                                <div class="mb-3">
                                    <label  class="form-label">ID</label>
                                    <input type="text" class="form-control" name="id" value="{{ $usuario->id }}" disabled>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nome</label>
                                    <input type="text" class="form-control" name="name" value="{{ $usuario->name }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" class="form-control" name="email" value="{{ $usuario->email }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Senha</label>
                                    <input type="password" class="form-control" name="password">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Confirmação da Senha</label>
                                    <input type="password" class="form-control" name="confirm">
                                </div>
                                
                                @can('admin')
                                    <div class="mb-3">
                                        <label class="form-label">Perfil</label>
                                        <select class="form-select" aria-label="Selecione o perfil" id="perfil" name="perfil">
                                            <option>...</option>
                                            @foreach ($perfis as $perfil)
                                                @if ((old('perfil') == $perfil->name) xor ($usuario->perfil == $perfil->name))
                                                    <option value="{{$perfil->name}}" selected>{{$perfil->name}}</option>
                                                @else
                                                    <option value="{{$perfil->name}}">{{$perfil->name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                @endcan
                            </div> <!-- fim col -->
                        </div><!-- fim row -->
                    </div>
                </div><!-- fim card -->
                <button type="submit" class="btn btn-primary float-end">Atualizar</button>
            </form>
        </div>
    </div>
</div>
@endsection