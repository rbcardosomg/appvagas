@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <p><h3>Estágio e Emprego - <span class="text-decoration-underline">ALUNOS</span></h3></p>
        <hr>
        <p class="lead">
            Informações úteis aos alunos que desejam ocupar uma vaga de estágio ou emprego        
        </p>
        O IFMG - Campus Formiga destaca que este é apenas um meio de comunicação entre empresas e estudantes. 
        Todas as informações preenchidas são de responsabilidade das empresas e cabe ao interessado entrar em contato com as mesmas para sanar possíveis dúvidas.<br>
        
        <br>
        <div class="card">      
          <div class="card-body">            
            <h5 class="card-title">Fluxos operacionais</h5>
            <ul>
              <li><a href="#">Fluxo operacional para estágios</a> - padrão</li>
              <li><a href="#">Fluxo operacional para estágios</a> - Quando a concedente do estágio exige que sejam utilizados o seu termo de compromisso (FORA do sistema SEI).</li>
            </ul>                                                      
          </div>
          </div>

          <p></p>
          
          <div class="card">      
            <div class="card-body">            
              <h5 class="card-title">Legislação</h5>
              <ul>
                <li><a href="#">Lei nº 11788 </a>- Dispõe sobre o estágio de estudantes</li>
                <li><a href="#">IN  5 DE 18 DE JUNHO DE 2020</a> - Estabelece, complementa e altera a IN 02 de 20 de março de 2020, diretrizes para oferta de Ensino Remoto Emergencial no IFMG.</li>
                <li><a href="#">IN 7 DE 06 DE NOVEMBRO DE 2020</a> - Dispõe sobre alteração do Capítulo VIII da IN 05 de 18 de junho de 2020.</li>
                <li><a href="#">IN  3 DE 10 DE DEZEMBRO DE 2020</a> - Responsabilidades compartilhadas das atividades de estágio no IFMG.</li>
                <li><a href="#">Resolução nº 38 de 14/12/2020</a> - Regulamento de Estágio no IFMG.pdf.</li>
                <li><a href="#">IN 02 DE 28 DE JANEIRO DE 2021</a> - Dispõe sobre normas complementares à Resolução nº 38 de 14/12/20.</li>
              </ul>                                              
            </div>
          </div>
        </div>
      
      </div><!--Fim col -->
    </div> <!--Fim row -->
    <div id="voltar" style="text-align: center;">
      <a href="{{ url('/') }}">Voltar</a>
    </div>
</div><!--Fim container -->
@endsection
