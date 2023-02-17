<form method="POST" action="{{ route($route,$params ?? null)}}">
    @csrf
    @method($method ?? 'POST')
    <div class="card mb-3">
        <div class="card-body">
            <div class="mb-3 row">
                <div class="col">
                    <input type="hidden" name="empresa_id" value="{{$empresa ?? null}}">
                    <div class="mb-3">
                        <label  class="form-label">ID</label>
                        <input type="text" class="form-control" name="id" value="{{ $usuario->id ?? ''}}" disabled>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name',$usuario->name ?? '') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">E-mail</label>
                        <input type="text" class="form-control" name="email" value="{{ old('name',$usuario->email ?? '') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Senha</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Confirmação da Senha</label>
                        <input type="password" class="form-control" name="password_confirmation">
                    </div>
                    
                    @can('admin')
                        <div class="mb-3">
                            <label class="form-label">Perfil</label>
                            <select class="form-select" aria-label="Selecione o perfil" id="perfil" name="perfil">
                                <option></option>
                                @foreach ($perfis as $perfil)
                                    @if ((old('perfil',$usuario->perfil ?? '') == $perfil->name))
                                        <option value="{{$perfil->name}}" selected>{{$perfil->value}}</option>
                                    @else
                                        <option value="{{$perfil->name}}">{{$perfil->value}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    @endcan
                    @if (!auth()->user()->isAdmin())
                        <input type="hidden" name="perfil" value="{{ $usuario->perfil }}">
                    @endif
                </div> <!-- fim col -->
            </div><!-- fim row -->
        </div>
    </div><!-- fim card -->
    <button type="submit" class="btn btn-primary float-end">{{$method == 'PUT' ? 'Atualizar' : 'Cadastrar'}}</button>
</form>