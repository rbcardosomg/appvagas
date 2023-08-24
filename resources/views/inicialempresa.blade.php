@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <p class="h3">Estágio e Emprego - <span class="text-decoration-underline">EMPRESAS</span></p>
        <hr>                 
            <p class="h5">Sobre a divulgação de oportunidades de estágio e emprego</p>    
            <p>Empresas, profissionais liberais e organizações públicas ou privadas que desejarem divulgar suas oportunidades de estágio ou emprego deverão se 
            cadastrar e informar suas vagas em nosso banco de oportunidades. <a href="#">Clique aqui</a> para se cadastrar.</p>
            <br>
            <p class="h5">Informações úteis às empresas e organizações publicas e privadas</p>
            <p>Pedimos a atenção ao preenchimento correto dos dados e ressaltamos que quanto mais completa a divulgação, maiores são as chances de contratar o 
            profissional para o perfil que deseja.</p>        

        <br>

        <div class="card">      
          <div class="card-body">            
            <h5 class="card-title">Fluxos operacionais</h5>
            <ul>
              <li><a href="#">Fluxo operacional para estágios</a> - Padrão</li>
              <li><a href="#">Fluxo operacional para estágios</a> - Quando a concedente do estágio exige que sejam utilizados o seu termo de compromisso (FORA do sistema SEI).</li>
            </ul>                                                       
          </div>
          </div>

          <br>
          
          <div class="card">      
            <div class="card-body">            
              <h5 class="card-title">Legislação</h5>
              <ul>
                <li><a href="#">Lei nº 11788 </a>- Dispõe sobre o estágio de estudantes</li>
                <li><a href="#">IN  3 DE 10 DE DEZEMBRO DE 2020</a> - Responsabilidades compartilhadas das atividades de estágio no IFMG</li>
                <li><a href="#">Resolução nº 38 de 14/12/2020</a> - Regulamento de Estágio no IFMG.pdf</li>
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
