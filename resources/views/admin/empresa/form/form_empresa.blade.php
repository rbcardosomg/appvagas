<form method="POST" action="{{ route($route,$params ?? null) }}">
    @csrf
    @method($method ?? 'POST')
    <div class="card mb-3">
        <div class="card-header">Dados da empresa</div>
        <div class="card-body">
            <div class="mb-3">
                <label  class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" value="{{ old('nome',$empresa->nome ?? '') }}">
                <label  class="form-label">Area de atuação</label>
                <input type="text" class="form-control" name="area_atuacao_empresa" value="{{ old('area_atuacao_empresa',$empresa->area_atuacao_empresa ?? '') }}">
            </div>
            <div class="mb-3 row">
                <div class="col">
                <label  class="form-label">Documento</label>
                <input type="text" class="form-control" name="documento" value="{{ old('documento',$empresa->documento ?? '') }}">
                </div>
                <div class="col">
                <label  class="form-label">Telefone</label>
                <input type="text" class="form-control" name="telefone" value="{{ old('telefone',$empresa->telefone ?? '') }}">
                </div>
            </div> <!-- fim row -->                        
        </div><!-- fim card body -->
    </div><!-- fim card  -->
            
    <div class="card mb-3">
        <div class="card-header">Endereço da empresa</div>
        <div class="card-body">
            <div class="mb-3">
                <div class="mb-3 row">
                    <div class="col">
                        <label  class="form-label">Rua</label>
                        <input type="text" class="form-control" name="rua" value="{{ old('rua',$empresa->rua ?? '') }}">
                    </div>
                    <div class="col">
                        <label  class="form-label">Número</label>
                        <input type="text" class="form-control" name="numero" value="{{ old('numero',$empresa->numero ?? '') }}">
                    </div>
                </div> <!-- fim row -->
                <div class="mb-3 row">
                    <div class="col">
                        <label  class="form-label">Bairro</label>
                        <input type="text" class="form-control" name="bairro" value="{{ old('bairro',$empresa->bairro ?? '') }}">
                    </div>
                    <div class="col">
                        <label  class="form-label">Cidade</label>
                        <input type="text" class="form-control" name="cidade" value="{{ old('cidade',$empresa->cidade ?? '') }}">
                    </div>
                    <div class="col">
                        <label  class="form-label">Estado</label>
                        <input type="text" class="form-control" name="estado" value="{{ old('estado',$empresa->estado ?? '') }}">
                    </div>                           
                </div> <!-- fim row -->                       
            </div>
        </div><!-- fim card body -->
    </div><!-- fim card  -->

    <button type="submit" class="btn btn-primary float-end">{{$method == 'PUT' ? 'Atualizar' : 'Cadastrar'}}</button>
</form>