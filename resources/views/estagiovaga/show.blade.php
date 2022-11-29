@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #ffcb6b;" >{{ $estagiovaga->area_atuacao }}</div>

                <div class="card-body">
                    <fieldset disabled>                       
                            <div class="mb-3">
                            <label class="form-label">Descrição das atividades previstas</label>
                            <textarea class="form-control" rows="8" name="descricao">{{ $estagiovaga->descricao }}</textarea>
                            </div>
                            <div class="mb-3">
                            <label  class="form-label">Prazo: (Especificar data limite para o contato, caso houver.)</label>
                            <input type="date" class="form-control" name="data_limite_procura" value="{{ $estagiovaga->data_limite_procura }}">
                            </div>
                            <div class="mb-3">
                            <label  class="form-label">Situação da vaga: </label>
                            <input type="text" class="form-control" name="data_limite_procura" value="{{ $estagiovaga->vaga_aprovada }}">
                            </div>                     
                    </fieldset>
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Voltar</a>                    
                
                </div> <!--fim card body-->

            </div> <!--fim card-->
        </div>
    </div>
</div>
@endsection