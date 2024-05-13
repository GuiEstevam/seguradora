@extends('layouts.main')
@section('title', 'Cadastramento de Empresas')
@section('content')
  <div id="event-create-container" class="col-md-8 offset-md-2">
    <div class="row mb-3">
      {{-- <div class="col d-flex justify-content-start">
        Cadastramento / Empresas
      </div> --}}
      <div class="col d-flex justify-content-end">
        <a href="{{ route('enterprises.index') }}" class="btn btn-secondary"><ion-icon
            name="arrow-back-outline"></ion-icon>Voltar</a>
      </div>
    </div>
    <h4>Dados cadastrais</h4>
    <form action="{{ route('enterprises.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      {{-- <h4>Cadastramento de Empresa</h4> --}}
      <div class="row">
        <div class="form-group col-md-4">
          <label class="form-label" for="cnpj">CNPJ</label>
          <div class="input-group">
            <input type="text" id="cnpj" name="cnpj" class="form-control" value="{{ old('cnpj') }}">
            <div class="input-group-append">
              <button class="btn btn-primary" type="button"><ion-icon class="sync"
                  name="sync-outline"></ion-icon>Verificar</button>
            </div>
          </div>
        </div>
        <div class="form-group col-md-5">
          <label class="form-label" for="name">Nome da empresa </label>
          <div class="input-group">
            <input type="text" name="name" class="form-control form-control-lg" value="{{ old('name') }}">
          </div>
        </div>
        <div class="form-group col-md-3">
          <label class="form-label" for="state_registration">Inscrição Estadual</label>
          <div class="input-group">
            <input type="text" name="state_registration" class="form-control form-control-lg"
              value="{{ old('state_registration') }}" maxlength="7">
          </div>
        </div>
      </div>
      <hr>
      <h4>Endereço</h4>
      <div class="row">
        <div class="form-group col-md-2">
          <label class="form-label" for="cep">CEP</label>
          <div class="input-group">
            <input type="text" name="cep" id="cep" class="form-control form-control-lg"
              value="{{ old('cep') }}" maxlength="9" onblur="pesquisacep(this.value);">
          </div>
        </div>
        <div class="form-group col-md-6">
          <label class="form-label" for="address">Logradouro</label>
          <div class="input-group">
            <input type="text" name="address" id="address" class="form-control form-control-lg"
              value="{{ old('address') }}">
          </div>
        </div>
        <div class="form-group col-md-2">
          <label class="form-label" for="number">Número</label>
          <div class="input-group">
            <input type="text" name="number" id="number" class="form-control form-control-lg"
              value="{{ old('number') }}" maxlength="5">
          </div>
        </div>
        <div class="form-group col-md-2">
          <label class="form-label" for="uf">UF</label>
          <div class="input-group">
            @isset($ufs)
              <!-- Se a variável $ufs estiver definida, faça algo com ela -->
              <select name="uf" id="uf" class="form-control form-control-lg">
                <option value="">Selecione</option>
                @foreach ($ufs as $uf)
                  <option value="{{ $uf }}" {{ old('uf') == $uf ? 'selected' : '' }}>{{ $uf }}
                  </option>
                @endforeach
              </select>
            @endisset
          </div>
        </div>
      </div>
      <div class="row mt-2">
        <div class="form-group col-md-6">
          <label class="form-label" for="complement" class="text-xl">Complemento</label>
          <div class="input-group">
            <input type="text" name="complement" id="complement" class="form-control form-control-lg"
              value="{{ old('complement') }}">
          </div>
        </div>
        <div class="form-group col-md-3">
          <label class="form-label" for="district">Bairro</label>
          <div class="input-group">
            <input type="text" name="district" id="district" class="form-control form-control-lg"
              value="{{ old('district') }}">
          </div>
        </div>
        <div class="form-group col-md-3">
          <label class="form-label" for="city">Município</label>
          <div class="input-group">
            <input type="text" name="city" id="city" class="form-control form-control-lg"
              value="{{ old('city') }}">
          </div>
        </div>
      </div>
      <hr>
      <h4>Responsável</h4>
      <div class="row mt-2">
        <div class="form-group col-md-3">
          <label class="form-label" for="responsible_name">Nome</label>
          <input type="text" name="responsible_name" class="form-control form-control-lg"
            value="{{ old('responsible_name') }}">
        </div>
        <div class="form-group col-md-3">
          <label class="form-label" for="responsible_email">Email</label>
          <div class="input-group">
            <input type="text" name="responsible_email" class="form-control form-control-lg"
              value="{{ old('responsible_email') }}">
          </div>
        </div>
        <div class="form-group col-md-3">
          <label class="form-label" for="responsible_number">Telefone</label>
          <div class="input-group">
            <input type="text" name="responsible_number" class="form-control form-control-lg"
              value="{{ old('responsible_number') }}">
          </div>
        </div>
        <div class="form-group col-md-3">
          <label class="form-label" for="password">Senha</label>
          <div class="input-group">
            <input type="password" name="password" class="form-control form-control-lg">
          </div>
        </div>
      </div>
      <div class="row mt-2">

      </div>
      <div class="form-group mt-4">
        <button type="submit" class="btn btn-primary">Enviar</button>
        <button type="reset" class="btn btn-light border">Limpar</button>
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
