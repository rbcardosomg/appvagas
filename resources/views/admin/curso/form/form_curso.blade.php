<form method="POST" action="{{ route($route,$params ?? null) }}">
    @csrf
    @method($method ?? 'POST')
    <div class="card mb-3">
        <div class="card-header">Dados da curso</div>
        <div class="card-body">
            <div class="mb-3">
                <div class="form-group">
                    <label  class="form-label">Tipo</label>
                    <select name="tipo" id="tipo" required>
                        <option value="">Selecione uma opção</option>
                        @foreach ($tipos_cursos as $tipo)
                            @if ($edit ?? '')
                                @if(old('tipo', $curso->tipo) == $tipo->name)
                                    <option value="{{$tipo->name}}" selected>{{$tipo->value}}</option>
                                @else
                                    <option value="{{$tipo->name}}">{{$tipo->value}}</option>
                                @endif
                            @else
                                @if(old('tipo') == $tipo->name)
                                    <option value="{{$tipo->name}}" selected>{{$tipo->value}}</option>
                                @else
                                    <option value="{{$tipo->name}}">{{$tipo->value}}</option>
                                @endif
                            @endif
                        @endforeach
                    </select>
                    {{-- <input type="text" class="form-control" name="tipo" value="{{ old('tipo',$curso->tipo ?? '') }}"> --}}
                </div>
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <label  class="form-label">Nome</label>
                    <input type="text" class="form-control" name="nome" value="{{ old('nome',$curso->nome ?? '') }}" required>
                </div>
            </div> <!-- fim row -->                        
        </div><!-- fim card body -->
    </div><!-- fim card  -->

    <button type="submit" class="btn btn-primary float-end">{{$method == 'PUT' ? 'Atualizar' : 'Cadastrar'}}</button>
</form>