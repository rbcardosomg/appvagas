@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="background-color: #ffcb6b;" >{{ $curso->nome }}</div>
                    <div class="card-body">
                        <fieldset disabled>                       
                            <div class="mb-3">
                                <label class="form-label">Nome</label>
                                <textarea class="form-control" rows="8" name="nome_curso">{{ $curso->nome }}</textarea>
                            </div>                            
                            <div class="mb-3">
                                <label  class="form-label">Tipo: </label>
                                <input type="text" class="form-control" name="tipo" value="{{ $curso->tipo }}">
                            </div>                     
                        </fieldset>
                    </div> <!--fim card body-->
                </div> <!--fim card-->
            </div>
        </div>
    </div>
@endsection