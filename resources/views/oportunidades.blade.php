@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #ffcb6b;" >Vagas de estágio<a href="{{route('vaga.create')}}" class="m-2">Novo</a></div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Area de atuação</th>                            
                            <th scope="col">Data limite da oferta</th>
                            <th scope="col">Status</th>
                            <th scope="col"></th>
                            <th scope="col"></th>                        
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($vagas as $e)
                            <tr>
                                <th scope="row">{{ $e['id'] }}</th>
                                <td>{{ $e['area_atuacao'] }}</td>                                
                                <td>{{ date('d/m/Y',strtotime($e['data_limite_procura'])) }}</td>
                                <td>{{$e['vaga_aprovada']}}
                                <td><a href="{{ route('vaga.edit', $e['id']) }}">Editar</a></td>
                                <td>
                                  <form id="form_{{$e['id']}}" method="post" action="{{ route('vaga.destroy', ['vaga' =>$e['id']]) }}">
                                    @method('DELETE')
                                    @csrf
                                  </form>
                                    <a href="#" onclick="document.getElementById('form_{{$e['id']}}').submit()">Excluir</a>
                                </td>                         
                            </tr>    
                            @endforeach
                                                
                        </tbody>
                      </table>  
                                   
                
                <nav>
                  <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="{{ $vagas->previousPageUrl() }}">Voltar</a></li>
                    @for($i=1; $i <= $vagas->lastPage(); $i++)
                      <li class="page-item {{ $vagas->currentPage() == $i ? 'active' : '' }}">
                        <a class="page-link" href="{{ $vagas->url($i) }}">{{ $i }}</a>
                      </li>
                    @endfor

                    <li class="page-item"><a class="page-link" href="{{$vagas->nextPageUrl() }}">Avançar</a></li>
                  </ul>
                </nav>
                </div> <!--fim card body-->

            </div> <!--fim card-->
        </div>
    </div>
</div>
@endsection