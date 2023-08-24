@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        
        <p class="h3" >Setor de Estágios</p>
        <hr>
        <p class="h5">Informações sobre o setor</p>
            <p>Pertencente ao Setor de Extensão, Inovação, Pesquisa e Pós-Graduação (SEIPPG), o <span class="fw-bold">setor de estágios</span>  possui como atribuições 
              gerenciar a formalização dos estágios curriculares e estágios extracurriculares, </p>
                

        <div class="card">      
          <div class="card-body">            
            <h5 class="card-title">Horários de atendimento</h5>
            <ul>    
               <li>De segunda à sexta, das 08:00 às 21:00.</li>
            </ul>                                         
          </div>
        </div>
          
          <br>
          <p class="h5" >Nossa Equipe</p>
          <div class="row pt-3" style="text-align: center;">
            
            <div class="col-lg-4">
              <svg class="bd-placeholder-img rounded-circle" width="70" height="70" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
      
              <h5>Claudia</h5>
              <p>email: claudia@email.com</p>
              
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
              <svg class="bd-placeholder-img rounded-circle" width="70" height="70" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
      
              <h5>Aparecida</h5>
              <p>email: aparecida@email.com</p>
              
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
              <svg class="bd-placeholder-img rounded-circle" width="70" height="70" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>
      
              <h5>Jaqueline</h5>
              <p>email: jaqueline@email.com</p>
              
            </div><!-- /.col-lg-4 -->
          </div>
          <br>
          
          <div class="card">      
            <div class="card-body">            
              <h5 class="card-title">Contato</h5>
              <ul>
                <li>Endereço: Rua São Luiz Gonzaga, bairro São Luiz, s/n, Formiga-MG. Bloco A, sala 01</li>
                <li>Telefone: (37) 3321-1406 - ramal X</li>
                <li>Email: estagio.formiga@ifmg.edu.br</li>
              </ul>                                                                  
            </div>
            </div>
               
      </div>
    </div>
    <div id="voltar" style="text-align: center;">
      <a href="{{ url('/') }}">Voltar</a>
    </div>
  </div> <!--Fim container -->
@endsection