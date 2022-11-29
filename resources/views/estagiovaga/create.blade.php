@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p class="h2">Cadastro de vagas de Estágio</p>
            <p class="lead">
               Preencha as informações abaixo de forma detalhada e ao final clique no botão "cadastrar" para que a vaga seja disponibilizada em nosso sistema.
            </p>

            <form method="POST" action="{{ route('estagiovaga.store') }}">
                @csrf

            <div class="card mb-3">
            <div class="card-header">A vaga está direcionada ao(s) curso(s): *</div>
            <div class="card-body">

            <div class="mb-3 row">
                <div class="col">
            
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Bacharelado em Administração
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                        <label class="form-check-label" for="defaultCheck2">
                            Bacharelado em Ciência da Computação
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Bacharelado em Engenharia Elétrica
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                        <label class="form-check-label" for="defaultCheck2">
                            Licenciatura em Matemática
                        </label>
                    </div>
                </div> <!-- fim col -->
                <div class="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Técnico em Administração
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck2">
                        <label class="form-check-label" for="defaultCheck2">
                            Técnico em Eletroténica
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                            Técnico em Informática
                        </label>
                    </div>
                </div>
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