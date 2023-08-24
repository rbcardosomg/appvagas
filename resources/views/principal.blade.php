@extends('layouts.app')

@section('content')
  <main class="py-4"><!-- Conteudo da página-->
    <div class="container">
      @include('banner')
      <hr><br>
      <h4><span>Saber mais sobre o programa de estágios e como participar</span></h4>
      <div class="card-group">

        <div class="card m-2 principal" >
          <a href="/setorestagio" class="d-block text-decoration-none text-black">
            <img src='/image/setorestagio3.png' class="card-img-top" alt="..." style="opacity: 0.8">
            <div class="card-body">
              <h5 class="card-title fw-bold">O setor de estágios do IFMG - Campus Formiga</h5>
              <p class="card-text">Esta seção contém informações sobre o setor de estágios.</p>
            </div>
          </a>
        </div>

        <div class="card m-2 principal">
          <a href="/inicialalunos" class="d-block text-decoration-none text-black">
            <img src="/image/cursos3.png" class="card-img-top" alt="..." style=" opacity: 0.7">
            <div class="card-body">
              <h5 class="card-title fw-bold">Estágio e Emprego - <span class="text-decoration-underline ">ALUNOS</span></h5>
              <p class="card-text">Conteúdo destinado aos alunos e egressos que desejam ocupar vagas de estágio e emprego.</p>
            </div>
          </a>
        </div>

        <div class="card m-2 principal">
          <a href="/inicialempresa" class="d-block text-decoration-none text-black">
            <img src="/image/convenios3.png" class="card-img-top" alt="..." style=" opacity: 0.9">
            <div class="card-body">
              <h5 class="card-title fw-bold">Estágio e Emprego - <span class="text-decoration-underline ">EMPRESAS</span></h5>
              <p class="card-text">Conteúdo destinado à empresas e demais concedentes de estágio ou emprego.</p>
            </div>
          </a>
        </div>

      </div> <!-- fim card-group -->
    </div> <!-- fim row -->
  </main>
@endsection