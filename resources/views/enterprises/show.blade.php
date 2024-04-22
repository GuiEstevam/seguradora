@extends('layouts.main')
@section('title', 'Cadastramento de Empresas')
@section('content')
  <div id="event-create-container" class="col-md-8 offset-md-2 border">
    @csrf
    <div class="row mb-3">
      <div class="col">
        Cadastramento / Empresas / Visualização
      </div>
      <div class="col">
        <a href="{{ route('enterprises.index') }}" class="btn btn-primary float-right"><ion-icon
            name="arrow-back-outline"></ion-icon>Voltar</a>
      </div>
    </div>
    <h5>Visualização da Empresa</h5>
    <div class="row mt-2">
      <div class="form-group col-md-4">
        <label for="cnpj">CNPJ</label>
        <div class="input-group">
          {{ $enterprise->cnpj }}
        </div>
      </div>
      <div class="form-group col-md-4">
        <label for="name">Nome da empresa </label>
        <div class="input-group">
          {{ $enterprise->name }}
        </div>
      </div>
      <div class="form-group col-md-4">
        <label for="state_registration">Inscrição Estadual</label>
        <div class="input-group">
          {{ $enterprise->state_registration }}
        </div>
      </div>
    </div>
    <hr>
    <div class="row">
      <div class="form-group col-md-4">
        <label for="address">Logradouro</label>
        <div class="input-group">
          {{ $enterprise->address }}
        </div>
      </div>
      <div class="form-group col-md-2">
        <label for="number">Número</label>
        <div class="input-group">
          {{ $enterprise->number }}
        </div>
      </div>
      <div class="form-group col-md-2">
        <label for="complement" class="text-xl">Complemento</label>
        <div class="input-group">
          {{ $enterprise->complement }}
        </div>
      </div>
    </div>
    <div class="row mt-2">
      <div class="form-group col-md-2">
        <label for="district">Bairro</label>
        <div class="input-group">
          {{ $enterprise->district }}
        </div>
      </div>
      <div class="form-group col-md-2">
        <label for="city">Município</label>
        <div class="input-group">
          {{ $enterprise->city }}
        </div>
      </div>
      <div class="form-group col-md-2">
        <label for="cep">CEP</label>
        <div class="input-group">
          {{ $enterprise->cep }}
        </div>
      </div>
    </div>
    <hr>
    <h5>Responsável</h5>
    <div class="row mt-2">
      <div class="form-group col-md-4">
        <label for="responsible_name">Nome</label>
        <div class="input-group">
          {{ $enterprise->responsibleUser->name }}
        </div>
      </div>
      <div class="form-group col-md-4">
        <label for="responsible_email">Email</label>
        <div class="input-group">
          {{ $enterprise->responsibleUser->email }}
        </div>
      </div>
      <div class="form-group col-md-4">
        <label for="responsible_number">Telefone</label>
        <div class="input-group">
          {{ $enterprise->responsibleUser->phone }}
        </div>
      </div>
    </div>
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
