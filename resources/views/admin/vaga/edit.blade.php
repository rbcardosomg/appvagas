@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p class="h2">Edição de vagas de estágio/emprego</p>
                <p class="lead">
                Preencha as informações abaixo de forma detalhada e ao final clique no botão "Atualizar" para que a vaga seja disponibilizada em nosso sistema. A vaga está sujeita à aprovação.
                </p>

                <form method="POST" action="{{ route('vaga.update',['vaga'=>$vaga->id]) }}">
                    @csrf
                    @method('PUT')

                    <div class="card mb-3">
                        <div class="card-header">Qual é o tipo da vaga?</div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col">
                                    @foreach ($vaga_tipos as $tipo)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo" value="{{$tipo->name}}" id="{{$tipo->name}}" required {{ $vaga->tipo == $tipo->name ? 'checked' : '' }}>
                                            <label class="form-check-label" for="{{$tipo->name}}">
                                                {{$tipo->value}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div> <!-- fim col -->
                            </div><!-- fim row -->
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">A vaga está direcionada ao(s) curso(s): *</div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col">
                                    @foreach ($cursos as $curso)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="cursos[]" value="{{$curso->id}}" id="{{$curso->id}}" @foreach ($vaga->cursos as $vaga_curso) {{$curso->id == $vaga_curso->id ? 'checked' : ''}} @endforeach>
                                            <label class="form-check-label" for="{{$curso->id}}">
                                                {{$curso->nome}}
                                            </label>
                                        </div>
                                    @endforeach
                                </div> <!-- fim col -->
                            </div><!-- fim row -->
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">Informações sobre o cargo</div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label  class="form-label">Área de atuação</label>
                                <input type="text" class="form-control" name="area_atuacao" value="{{ $vaga->area_atuacao }}">
                            </div>
                            <div class="mb-3 row">                                
                                <div class="col">
                                    <label  class="form-label">Remuneração</label>
                                    <input type="text" class="form-control" name="remuneracao" value="{{ $vaga->remuneracao }}">
                                </div>
                                <div class="col">
                                    <label  class="form-label">Prazo: (Especificar data limite para o contato, caso houver.)</label>
                                    <input type="date" class="form-control" name="data_limite_procura" value="{{ $vaga->data_limite_procura }}">
                                </div>
                            </div> <!-- fim row -->
                        </div><!-- fim card body -->
                    </div><!-- fim card  -->

                    <div class="card mb-3">
                        <div class="card-header">Formas de contato</div>
                        <div class="card-body">
                            <div class="mb-3">
                                <div class="mb-3 row">                                
                                    <div class="col">
                                        <label  class="form-label">Email</label>
                                        <input type="text" class="form-control" name="contato_email" value="{{ $vaga->contato_email }}">
                                    </div>
                                    <div class="col">
                                        <label  class="form-label">Telefone</label>
                                        <input type="text" class="form-control" name="contato_telefone" value="{{ $vaga->contato_telefone }}">
                                    </div>
                                </div> <!-- fim row -->
                                <label  class="form-label">Link para o cadastro de seleção</label>
                                <input type="text" class="form-control" name="contato_link" value="{{ $vaga->contato_link }}">
                            </div>
                        </div><!-- fim card body -->
                    </div><!-- fim card  -->           

                    <div class="card mb-3">
                        <div class="card-header">Informações detalhadas sobre a vaga</div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Requisitos</label>
                                <textarea class="form-control" rows="6" name="requisitos">{{ $vaga->requisitos }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descrição das atividades previstas</label>
                                <textarea class="form-control" rows="6" name="descricao">{{ $vaga->descricao }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Observações</label>
                                <textarea class="form-control" rows="6" name="observacoes">{{ $vaga->observacoes }}</textarea>
                            </div>                           
                        </div><!-- fim card body -->
                    </div><!-- fim card  -->

                    @can('aprovar-vaga')
                        <button type="submit" class="btn btn-warning float-end m-2" name="aprovar" value="aprovar" onclick="return confirm('Deseja realmente aprovar?')">Aprovar</button>
                    @endcan
                    <button type="submit" class="btn btn-primary float-end m-2">Atualizar</button>
                    <a href="{{ url()->previous() }}" class="btn btn-secondary float-end m-2">Voltar</a>
                    
                </form>
            </div>
        </div>
    </div>
@endsection