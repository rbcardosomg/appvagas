@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>Verificação de email</b></div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Reenviamos um e-mail para você com o link de validação.
                        </div>
                    @endif

                    Falta pouco agora! 
                    <br><br>
                    Precisamos que você valide seu e-mail por meio do link de verificação encaminhado para seu endereço de e-mail.
                    <br>
                    Se você não recebeu o email de verificação, clique no link a seguir para um novo email.
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Clique aqui.</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
