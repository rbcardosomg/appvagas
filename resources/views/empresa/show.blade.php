@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color: #ffcb6b;" >{{ $empresa->nome }}</div>

                <div class="card-body">
                    <fieldset disabled>                       
                            <div class="mb-3">
                            <label class="form-label">Area de atuação</label>
                            <textarea class="form-control" rows="8" name="area_atuacao_empresa">{{ $empresa->area_atuacao_empresa }}</textarea>
                            </div>                            
                            <div class="mb-3">
                            <label  class="form-label">Documento: </label>
                            <input type="text" class="form-control" name="documento" value="{{ $empresa->documento }}">
                            </div>                     
                    </fieldset>
                                        
                
                </div> <!--fim card body-->

            </div> <!--fim card-->
        </div>
    </div>
</div>
@endsection