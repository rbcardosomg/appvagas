@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: #ffcb6b;">Curso <a href="{{route('curso.create')}}" class="m-2">Novo</a></div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nome do Curso</th>
                                    <th scope="col">Tipo de Curso</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cursos as $curso)
                                <tr>
                                    <th scope="row">{{ $curso->id }}</th>
                                    <td>{{ $curso->nome }}</td>                                
                                    <td>{{ $curso->_tipo() }}</td>
                                    <td><a class="btn btn-link" href="{{ route('curso.edit', $curso->id) }}">Editar</a></td>
                                    <td>
                                        <form method="POST" action="{{route('curso.destroy',['curso'=>$curso])}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link" href="" onclick="return confirm('Deseja realmente excluir?');">Excluir</a>
                                        </form>
                                    </td>
                                </tr>    
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!--fim card body-->            
                </div> <!--fim card-->
            </div><!--fim col-->
        </div> <!--fim row-->
    </div> <!--fim container-->
@endsection

