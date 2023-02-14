@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p class="h3">Cadastro da Concedente de Estágio e Trabalho</p>
            <p class="lead">
               Preencha as informações de sua organização que as vagas oferecidas sejam identificadas para esta empresa cadastrada.
            </p>

            <form method="POST" action="{{ route('empresa.update',['empresa'=> $empresa->id ]) }}">
                @csrf
                @method('PUT')

            <div class="card mb-3">
                <div class="card-header">Dados da empresa</div>
                <div class="card-body">
                    <div class="mb-3">

                       <label  class="form-label">Nome</label>
                       <input type="text" class="form-control" name="nome" value="{{ $empresa->nome }}">
                       <label  class="form-label">Area de atuação</label>
                       <input type="text" class="form-control" name="area_atuacao_empresa" value="{{ $empresa->area_atuacao_empresa }}">
                       
                       <div class="mb-3 row">
                            <div class="col">
                            <label  class="form-label">Documento</label>
                            <input type="text" class="form-control" name="documento" value="{{ $empresa->documento }}">
                            </div>
                            <div class="col">
                            <label  class="form-label">Telefone</label>
                            <input type="text" class="form-control" name="telefone" value="{{ $empresa->telefone }}">
                            </div>
                        </div> <!-- fim row -->                        
                    </div>                     
            
                </div><!-- fim card body -->
            </div><!-- fim card  -->
                        
            <div class="card mb-3">
                <div class="card-header">Endereço da empresa</div>
                <div class="card-body">
                    <div class="mb-3">                       
                       
                       <div class="mb-3 row">
                            <div class="col">
                            <label  class="form-label">rua</label>
                            <input type="text" class="form-control" name="rua" value="{{ $empresa->rua }}">
                            </div>
                            <div class="col">
                            <label  class="form-label">Numero</label>
                            <input type="text" class="form-control" name="numero" value="{{ $empresa->numero }}">
                            </div>
                        </div> <!-- fim row -->
                        <div class="mb-3 row">
                            <div class="col">
                            <label  class="form-label">Bairro</label>
                            <input type="text" class="form-control" name="bairro" value="{{ $empresa->bairro }}">
                            </div>
                            <div class="col">
                            <label  class="form-label">Cidade</label>
                            <input type="text" class="form-control" name="cidade" value="{{ $empresa->cidade }}">
                            </div>
                            <div class="col">
                                <label  class="form-label">Estado</label>
                                <input type="text" class="form-control" name="estado" value="{{ $empresa->estado }}">
                            </div>                           
                        </div> <!-- fim row -->                       
                    </div>                     
            
                </div><!-- fim card body -->
            </div><!-- fim card  --> 

            <button type="submit" class="btn btn-primary float-end">Cadastrar</button>

        </form>

            
        </div>
    </div>
</div>
@endsection