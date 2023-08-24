@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header fw-bold" style="background-color: #ffcb6b;" >
            <div class="row align-items-center">
              <div class="col"><h5 class="m-0">Vagas de estágio</h5></div>
              <div class="col"><a class="btn btn-primary float-end m-2" href="{{ route('front_home') }}">Voltar</a></div>
            </div>
          </div>
            <div class="card-body">
              <div class="card">
                <div class="card-header">
                  <h6>Filtros</h6>
                  <form method="POST" action="{{ route('front.vagas.filtrar') }}">
                    @csrf
                    <ul class="list-inline">
                      <li class="list-inline-item">
                        Tipo
                        <select name="filtro_tipo" id="filtro_tipo">
                          <option value="">Todos</option>
                          @foreach ($tipos as $tipo)
                            @if (isset($filtro_tipo) && $tipo->name == $filtro_tipo)
                              <option value="{{$tipo->name}}" selected>{{$tipo->value}}</option>
                            @else
                              <option value="{{$tipo->name}}">{{$tipo->value}}</option>
                            @endif
                          @endforeach
                        </select>
                      </li>
                      <li class="list-inline-item">
                        Curso
                        <select name="filtro_curso" id="filtro_curso">
                          <option value="">Todos</option>
                          @foreach ($cursos as $curso)
                            @if (isset($filtro_curso) && $curso->id == $filtro_curso)
                              <option value="{{$curso->id}}" selected>{{$curso->nome}}</option>
                            @else
                              <option value="{{$curso->id}}">{{$curso->nome}}</option>
                            @endif
                          @endforeach
                        </select>
                      </li>
                      <li class="list-inline-item"><button id="filtrar" class="btn btn-secondary">Filtrar</button></li>
                    </ul>
                  </form>
                </div>
              
                <div class="card-body">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col" class="text-center">ID</th>
                        <th scope="col">Tipo</th>
                        <th scope="col" class="col-3">Area de atuação</th>
                        <th scope="col">Cursos</th>
                        <th scope="col">Data limite da oferta</th>
                        <th scope="col" class="text-center col-1">Visualizar</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($vagas as $vaga)
                        <tr class="{{is_null($vaga->deleted_at) ? '' : 'text-muted'}}">
                          <th scope="row" class="text-center align-middle">{{ $vaga->id }}</th>
                          <td class="align-middle">{{ $vaga->_tipo() }}</td>
                          <td class="align-middle">{{ $vaga->area_atuacao }}</td>
                          <td class="align-middle">
                            <ul class="p-0">
                              @foreach ($vaga->cursos as $key => $curso)
                                <li class="list-group-item">{{ $key+1 . '. ' . $curso->nome }}</li>
                              @endforeach
                            </ul>
                          </td>                                
                          <td class="align-middle">{{ $vaga['data_limite_procura'] ? date('d/m/Y',strtotime($vaga['data_limite_procura'])) : '' }}</td>
                          <td class="text-center align-middle"><a href="{{ route('front.vagas.show', $vaga['id']) }}"><i class="fa-solid fa-eye" style="color: black;"></i></a></td>
                        </tr>    
                      @endforeach                 
                    </tbody>
                  </table>
                  <form method="GET" action="{{ route('front.vagas.filtrar') }}">
                  <nav>
                    <ul class="pagination justify-content-center">
                      <li class="page-item"><a class="page-link" href="{{ ($vagas->onFirstPage() ? '#' : $vagas->previousPageUrl() . '&filtro_tipo='. (isset($filtro_tipo) ? $filtro_tipo : null) . '&filtro_curso='. (isset($filtro_curso) ? $filtro_curso : null)) }}"><span aria-hidden="true">&laquo;</span></a></li>
                        @for($i=1; $i <= $vagas->lastPage(); $i++)
                          <li class="page-item {{ $vagas->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ ($vagas->url($i) . '&filtro_tipo='. (isset($filtro_tipo) ? $filtro_tipo : null) . '&filtro_curso='. (isset($filtro_curso) ? $filtro_curso : null)) }}">{{ $i }}</a>
                          </li>
                        @endfor
                      <li class="page-item"><a class="page-link" href="{{ ($vagas->onLastPage() ? '#' : $vagas->nextPageUrl() . '&filtro_tipo='. (isset($filtro_tipo) ? $filtro_tipo : null) . '&filtro_curso='. (isset($filtro_curso) ? $filtro_curso : null)) }}"><span aria-hidden="true">&raquo;</span></a></li>
                    </ul>
                    <span class="text-muted" style="float: right; margin-top: -3.1em">Exibindo {{$vagas->count() . ' de ' . $vagas->total()}}</span>
                  </nav>
                  </form>
                </div>
              </div>
            </div> <!--fim card body-->
          </div> <!--fim card-->
        </div>
      </div>
    </div>
  </div>
@endsection