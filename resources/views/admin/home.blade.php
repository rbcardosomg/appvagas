@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p> Obrigado pelo interesse em nossa instituição!</p>
                    <p>Neste ambiente você poderá cadastrar oportunidades de estágio e emprego destinadas aos estudantes e egressos do IFMG - Campus Formiga.
                       </p>
                    <p>Ao colaborar com a inserção de nossos alunos e egressos no mundo do trabalho, você estará contribuindo para que as carreiras profissionais
                    alcancem o perfil profissional desejado e participando do desenvolvimento socioeconomico da região.
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
