@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #ffcb6b;" >Empresa</div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome da Empresa</th>                            
                            <th scope="col">Documento</th>
                            <th scope="col">Telefone</th>
                            <th scope="col"></th>
                            <th scope="col"></th>                        
                          </tr>                          
                        </thead>
                        <tbody>
                            @foreach ($empresa as $e)
                            <tr>
                                <th scope="row">{{ $e['id'] }}</th>
                                <td>{{ $e['nome'] }}</td>                                
                                <td>{{ $e['documento'] }}</td>
                                <td>{{$e['area_atuacao_empresa']}}
                                <td><a href="{{ route('empresa.edit', $e['id']) }}">Editar</a></td>                                                  
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