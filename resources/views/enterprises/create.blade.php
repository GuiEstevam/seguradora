@extends('layouts.main')
@section('title', 'Cadastramento de Empresas')
@section('content')
  <div id="event-create-container" class="col-md-8 offset-md-2 border">
    <form action="{{ route('enterprises.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row mb-3">
        <div class="col">
          Cadastramento / Empresas
        </div>
        <div class="col">
          <a href="{{ route('enterprises.index') }}" class="btn btn-primary float-right"><ion-icon
              name="arrow-back-outline"></ion-icon>Voltar</a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-5">
          <label for="image">CNPJ</label>
          <div class="input-group">
            <input type="text" id="cnpj" name="cnpj" class="form-control">
            <div class="input-group-append">
              <button class="btn btn-primary" type="button"><ion-icon class="sync"
                  name="sync-outline"></ion-icon>Verificar</button>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-2">
        <div class="col-md-4">
          <label for="image">Nome</label>
          <div class="input-group">
            <input type="text" name="name" class="form-control">
          </div>
        </div>
        <div class="col-md-4">
          <label for="image">Email</label>
          <div class="input-group">
            <input type="text" name="email" class="form-control">
          </div>
        </div>
        <div class="col-md-4">
          <label for="image">Responsável</label>
          <div class="input-group">
            <input type="text" name="responsable" class="form-control">
          </div>
        </div>
      </div>
      <div class="row mt-2 text-right">
        <div class="form-group mt-2">
          <input type="submit" class="btn btn-primary" value="Enviar">
          <input type="submit" class="btn btn-light border" value="Limpar">
        </div>
      </div>
    </form>
  </div>
  <script>
    // Função para remover a pontuação do CNPJ
    function removePontuacaoCNPJ(cnpj) {
      return cnpj.replace(/[^\d]+/g, '');
    }

    $(document).ready(function() {
      $('#cnpj').mask('00.000.000/0000-00');

      // Manipula o envio do formulário
      $('form').submit(function() {
        var cnpj = $('#cnpj').val();
        var cnpjSemPontuacao = removePontuacaoCNPJ(cnpj);
        $('#cnpj').val(cnpjSemPontuacao);
      });
    });
  </script>



@endsection
