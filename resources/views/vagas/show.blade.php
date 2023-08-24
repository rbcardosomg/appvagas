@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #ffcb6b;" >{{ $vaga->area_atuacao }}</div>

                <div class="card-body">
                    <fieldset disabled>                       
                        <div class="mb-3">
                            <label class="form-label">Tipo de vaga:</label>
                            <input type="text" class="form-control" name="tipo" value="{{ $vaga->_tipo() }}">
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label  class="form-label">Situação da vaga:</label>
                                <input type="text" class="form-control" name="data_limite_procura" value="{{ $vaga->_status() }}">
                            </div>
                            <div class="col">
                                <label  class="form-label">Prazo: (Data limite para o contato, caso houver.)</label>
                                <input type="date" class="form-control" name="data_limite_procura" disabled value="{{ $vaga->data_limite_procura }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Direcionada aos cursos:</label>
                            <div class="form-control" name="cursos" style="background-color: #e9ecef;">
                                <ul class="p-0">
                                    @foreach ($vaga->cursos as $key => $curso)
                                        <li class="list-group-item">{{ $key+1 . '. ' . $curso->nome }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Área de atuação:</label>
                            <input type="text" class="form-control" name="area_atuacao" value="{{ $vaga->area_atuacao }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Remuneração:</label>
                            <input type="text" class="form-control" name="remuneracao" value="{{ $vaga->remuneracao }}">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Requisitos</label>
                            <textarea class="form-control" rows="7" name="requisitos">{{ $vaga->requisitos }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Descrição das atividades previstas:</label>
                            <textarea class="form-control" rows="7" name="descricao">{{ $vaga->descricao }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Observações:</label>
                            <textarea class="form-control" rows="7" name="observacao">{{ $vaga->observacao }}</textarea>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <label class="form-label">E-mail:</label>
                                <input type="text" class="form-control" name="email" value="{{ $vaga->email }}">
                            </div>
                            <div class="col">
                                <label class="form-label">Telefone:</label>
                                <input type="text" class="form-control" name="telefone" value="{{ $vaga->telefone }}">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Link de inscrição:</label>
                            <input type="text" class="form-control" name="link" value="{{ $vaga->link }}">
                        </div>
                    </fieldset>
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>
                
                </div> <!--fim card body-->

            </div> <!--fim card-->
        </div>
    </div>
</div>
@endsection