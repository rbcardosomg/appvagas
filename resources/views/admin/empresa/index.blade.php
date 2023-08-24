@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="background-color: #ffcb6b;">Empresa <a class="btn btn-primary" href="{{route('empresa.create')}}" class="m-2">Nova</a></div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nome da Empresa</th>
                                    <th scope="col">Documento</th>
                                    <th scope="col">Área de atuação</th>
                                    <th scope="col">Endereço</th>
                                    <th scope="col">Telefone</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($empresas as $empresa)
                                <tr>
                                    <th scope="row">{{ $empresa->id }}</th>
                                    <td>{{ $empresa->nome }}</td>                                
                                    <td>{{ $empresa->documento }}</td>
                                    <td>{{$empresa->area_atuacao_empresa }}
                                    <td>{{$empresa->getEndereco() }}
                                    <td>{{$empresa->telefone }}
                                    <td><a class="btn btn-warning" href="{{ route('empresa.edit', $empresa->id) }}">Editar</a></td>                                                  
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