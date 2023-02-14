@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p class="h2">Cadastro da Concedente de Estágio e Trabalho</p>
            <p class="lead">
               Preencha as informações de sua organização que as vagas oferecidas sejam identificadas para esta empresa cadastrada.
            </p>

            <form method="POST" action="{{ route('empresa.store') }}">
                @csrf

            <div class="card mb-3">
                <div class="card-header">Dados da empresa</div>
                <div class="card-body">
                    <div class="mb-3">

                       <label  class="form-label">Nome</label>
                       <input type="text" class="form-control" name="nome">
                       <label  class="form-label">Area de atuação</label>
                       <input type="text" class="form-control" name="area_atuacao_empresa">
                       
                       <div class="mb-3 row">
                            <div class="col">
                            <label  class="form-label">Documento</label>
                            <input type="text" class="form-control" name="documento">
                            </div>
                            <div class="col">
                            <label  class="form-label">Telefone</label>
                            <input type="text" class="form-control" name="telefone">
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
                            <input type="text" class="form-control" name="rua">
                            </div>
                            <div class="col">
                            <label  class="form-label">Numero</label>
                            <input type="text" class="form-control" name="numero">
                            </div>
                        </div> <!-- fim row -->
                        <div class="mb-3 row">
                            <div class="col">
                            <label  class="form-label">Bairro</label>
                            <input type="text" class="form-control" name="bairro">
                            </div>
                            <div class="col">
                            <label  class="form-label">Cidade</label>
                            <input type="text" class="form-control" name="cidade">
                            </div>
                            <div class="col">
                                <label  class="form-label">Estado</label>
                                <input type="text" class="form-control" name="estado">
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