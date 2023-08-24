@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header fw-bold" style="background-color: #ffcb6b;" >
            Vagas de estágio
            @can('new-vaga')
              <a href="{{route('vaga.create')}}" class="m-1 btn btn-primary">Novo</a>
            @endcan
          </div>
            <div class="card-body">
              <div class="card">
                <div class="card-header">
                  <h6>Filtros</h6>
                  <form method="POST" action="{{ route('vaga.filtrar') }}">
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
                      <li class="list-inline-item">
                        Status
                        <select name="filtro_status" id="filtro_status">
                          <option value="">Todos</option>
                          @foreach ($status as $value)
                            @if (isset($filtro_status) && $value->name == $filtro_status)
                              <option value="{{$value->name}}" selected>{{$value->value}}</option>
                            @else
                              <option value="{{$value->name}}">{{$value->value}}</option>
                            @endif
                          @endforeach
                        </select>
                      </li>
                      <li class="list-inline-item">
                        <div class="form-group form-check">
                          <input type="checkbox" name="filtro_indisponiveis" class="form-check-input" id="exampleCheck1" {{(isset($filtro_indisponiveis) && $filtro_indisponiveis == 'on') ? 'checked' : ''}}>
                          <label class="form-check-label" for="exampleCheck1">Exibir indisponíveis</label>
                        </div>
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
                        <th scope="col">Status</th>
                        <th scope="col" colspan="3" class="text-center col-1">Ações</th>
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
                          <td class="align-middle">{{$vaga->_status()}}</td>
                          @canany(['view-vaga','update-vaga', 'delete-vaga'], $vaga)
                            <td class="text-center align-middle">
                              @can('view-vaga', $vaga)
                                <a href="{{ route('vaga.show', $vaga['id']) }}"><i class="fa-solid fa-eye" style="color: black;"></i></a>
                              @endcan
                            </td>
                            <td class="text-center align-middle">
                              @can('update-vaga', $vaga)
                                <a class="btn btn-warning" href="{{ route('vaga.edit', $vaga['id']) }}">Editar</a>
                              @endcan
                            </td>
                            <td class="text-center align-middle">
                              @can('delete-vaga', $vaga)
                                <form id="form_{{$vaga['id']}}" method="post" action="{{ route('vaga.destroy', ['vaga' =>$vaga['id']]) }}">
                                  @method('DELETE')
                                  @csrf
                                  <button type="submit" class="btn btn-danger" href="#" onclick="return confirm('Deseja realmente excluir esse registro?')">Excluir</a>
                                </form>
                              @endcan
                            </td>
                          @else
                            <td class="text-center align-middle" colspan="3">-</td>
                          @endcanany                     
                        </tr>    
                      @endforeach                 
                    </tbody>
                  </table>
                  <form method="GET" action="{{ route('vaga.filtrar') }}">
                  <nav>
                    <ul class="pagination justify-content-center">
                      <li class="page-item"><a class="page-link" href="{{ ($vagas->onFirstPage() ? '#' : $vagas->previousPageUrl() . '&filtro_tipo='. (isset($filtro_tipo) ? $filtro_tipo : null) . '&filtro_curso='. (isset($filtro_curso) ? $filtro_curso : null) . '&filtro_status='. (isset($filtro_status) ? $filtro_status : null) . '&filtro_indisponiveis='. (isset($filtro_indisponiveis) ? $filtro_indisponiveis : null)) }}"><span aria-hidden="true">&laquo;</span></a></li>
                        @for($i=1; $i <= $vagas->lastPage(); $i++)
                          <li class="page-item {{ $vagas->currentPage() == $i ? 'active' : '' }}">
                            <a class="page-link" href="{{ $vagas->url($i) . '&filtro_tipo='. (isset($filtro_tipo) ? $filtro_tipo : null) . '&filtro_curso='. (isset($filtro_curso) ? $filtro_curso : null) . '&filtro_status='. (isset($filtro_status) ? $filtro_status : null) . '&filtro_indisponiveis='. (isset($filtro_indisponiveis) ? $filtro_indisponiveis : null) }}">{{ $i }}</a>
                          </li>
                        @endfor
                      <li class="page-item"><a class="page-link" href="{{ ($vagas->onLastPage() ? '#' : $vagas->nextPageUrl() . '&filtro_tipo='. (isset($filtro_tipo) ? $filtro_tipo : null) . '&filtro_curso='. (isset($filtro_curso) ? $filtro_curso : null) . '&filtro_status='. (isset($filtro_status) ? $filtro_status : null) . '&filtro_indisponiveis='. (isset($filtro_indisponiveis) ? $filtro_indisponiveis : null)) }}"><span aria-hidden="true">&raquo;</span></a></li>
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