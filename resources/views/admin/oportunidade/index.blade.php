@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header" style="background-color: #9d9e98;" >Oportunidades</div>
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
                  @foreach ($vagas as $vaga)
                    <tr>
                      <th scope="row">{{ $vaga->id }}</th>
                      <td>{{ $vaga->area_atuacao }}</td>                                
                      <td>{{ $vaga['data_limite_procura'] ? date('d/m/Y',strtotime($vaga['data_limite_procura'])) : '' }}</td>
                      <td>{{$vaga['vaga_status']}}
                      <td></td>
                      <td>                        
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
  </div>
@endsection