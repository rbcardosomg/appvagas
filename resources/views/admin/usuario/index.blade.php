@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header" style="background-color: #ffcb6b;" >Usuários <a class="btn btn-primary" href="{{route('usuario.create')}}" class="m-2">Novo</a></div>
          <div class="card-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                    <th scope="col">Nome</th>                            
                    <th scope="col">E-mail</th>
                    <th scope="col">Perfil</th>
                    <th scope="col"></th>
                    <th scope="col"></th>                        
                  </tr>
              </thead>
              <tbody>
                @foreach ($usuarios as $usuario)
                  <tr>
                    <th scope="row">{{ $usuario['id'] }}</th>
                    <td>{{ $usuario->name }}</td>                                
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->getPerfil()->value }}
                    <td><a class="btn btn-warning" href="{{ route('usuario.edit', $usuario->id) }}">Editar</a></td>
                    <td>
                      <form id="form_{{ $usuario->id }}" method="post" action="{{ route('usuario.destroy', ['usuario' =>$usuario->id]) }}">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir este usuário?');">Excluir</a>
                      </form>
                    </td>                         
                  </tr>    
                @endforeach
              </tbody>
            </table>

            <nav>
              <ul class="pagination">
                <li class="page-item"><a class="page-link" href="{{ $usuarios->previousPageUrl() }}">Voltar</a></li>
                @for($i=1; $i <= $usuarios->lastPage(); $i++)
                  <li class="page-item {{ $usuarios->currentPage() == $i ? 'active' : '' }}">
                    <a class="page-link" href="{{ $usuarios->url($i) }}">{{ $i }}</a>
                  </li>
                @endfor
                <li class="page-item"><a class="page-link" href="{{$usuarios->nextPageUrl() }}">Avançar</a></li>
              </ul>
            </nav>
          </div> <!--fim card body-->
        </div> <!--fim card-->
      </div>
    </div>
  </div>
@endsection