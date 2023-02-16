@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <p class="h2">Cadastro de vagas de estágio/emprego</p>
                <p class="lead">
                Preencha as informações abaixo de forma detalhada e ao final clique no botão "Cadastrar" para que a vaga seja disponibilizada em nosso sistema. A vaga está sujeita à aprovação.
                </p>

                <form method="POST" action="{{ route('vaga.store') }}">
                    @csrf

                    <div class="card mb-3">
                        <div class="card-header">Qual é o tipo da vaga?</div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <div class="col">
                                    @foreach ($vaga_tipos as $tipo)
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tipo" value="{{$tipo->name}}" id="{{$tipo->name}}" required>
                                            <label class="form-check-label" for="{{$tipo->name}}">
                                                {{$tipo->getName()}}
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
                                            <input class="form-check-input" type="checkbox" name="cursos[]" value="{{$curso->id}}" id="{{$curso->id}}">
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
                                <input type="text" class="form-control" name="area_atuacao">
                            </div>
                            <div class="mb-3 row">                                
                                <div class="col">
                                    <label  class="form-label">Remuneração</label>
                                    <input type="text" class="form-control" name="remuneracao">
                                </div>
                                <div class="col">
                                    <label  class="form-label">Prazo: (Especificar data limite para o contato, caso houver.)</label>
                                    <input type="date" class="form-control" name="data_limite_procura">
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
                                        <input type="text" class="form-control" name="contato_email">
                                    </div>
                                    <div class="col">
                                        <label  class="form-label">Telefone</label>
                                        <input type="text" class="form-control" name="contato_telefone">
                                    </div>
                                </div> <!-- fim row -->
                                <label  class="form-label">Link para o cadastro de seleção</label>
                                <input type="text" class="form-control" name="contato_link">
                            </div>
                        </div><!-- fim card body -->
                    </div><!-- fim card  -->           

                    <div class="card mb-3">
                        <div class="card-header">Informações detalhadas sobre a vaga</div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label">Requisitos</label>
                                <textarea class="form-control" rows="6" name="requisitos"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Descrição das atividades previstas</label>
                                <textarea class="form-control" rows="6" name="descricao"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Observações</label>
                                <textarea class="form-control" rows="6" name="observacoes"></textarea>
                            </div>                           
                        </div><!-- fim card body -->
                    </div><!-- fim card  -->

                    <button type="submit" class="btn btn-primary float-end">Cadastrar</button>
                </form>
            </div>
        </div>
    </div>
@endsection