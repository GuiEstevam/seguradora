@extends('layouts.main')
@section('title', $enterprise->name)
@section('content')
  <div id="event-create-container" class="col-md-8 offset-md-2 border">
    {{-- <div class="row mb-3">
      <div class="col d-flex justify-content-start">
        Cadastramento / Empresas / Visualização
      </div>
    </div> --}}

    <form action="{{ route('enterprises.update', ['id' => $enterprise->id]) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col d-flex justify-content-end">
          <div class="btn-group mr-1" role="group">
            <button id="save-button" class="btn btn-primary">
              Salvar
            </button>
          </div>
          <div class="btn-group" role="group">
            <a href="{{ route('enterprises.index') }}" class="btn btn-secondary"><ion-icon
                name="arrow-back-outline"></ion-icon>Voltar</a>
          </div>
        </div>
      </div>
      <h4>Dados cadastrais</h4>
      <div class="row">
        <div class="form-group col-md-4">
          <label class="form-label" for="cnpj">CNPJ</label>
          <div class="input-group">
            <input type="text" id="cnpj" name="cnpj" class="form-control" value="{{ $enterprise->cnpj }}"
              disabled>
          </div>
        </div>
        <div class="form-group col-md-5">
          <label class="form-label" for="name">Nome da empresa </label>
          <input type="text" name="name" class="form-control form-control-lg" value="{{ $enterprise->name }}">
        </div>
        <div class="form-group col-md-3">
          <label class="form-label" for="state_registration">Inscrição Estadual</label>
          <input type="text" name="state_registration" class="form-control form-control-lg"
            value="{{ $enterprise->state_registration }}" maxlength="7">
        </div>
      </div>
      <hr>
      <h4>Endereço</h4>
      <div class="row mt-2">
        <div class="form-group col-md-2">
          <label class="form-label" for="cep">CEP</label>
          <input type="text" name="cep" id="cep" class="form-control form-control-lg"
            value="{{ $enterprise->cep }}" maxlength="9" onblur="pesquisacep(this.value);">
        </div>
        <div class="form-group col-md-6">
          <label class="form-label" for="address">Logradouro</label>
          <input type="text" name="address" id="address" class="form-control form-control-lg"
            value="{{ $enterprise->address }}">
        </div>
        <div class="form-group col-md-2">
          <label class="form-label" for="number">Número</label>
          <input type="text" name="number" id="number"class="form-control form-control-lg"
            value="{{ $enterprise->number }}" maxlength="5">
        </div>
        <div class="form-group col-md-2">
          <label class="form-label" for="uf">UF</label>
          @isset($ufs)
            <!-- Se a variável $ufs estiver definida, faça algo com ela -->
            <select name="uf" id="uf" class="form-control form-control-lg">
              <option value="">Selecione</option>
              @foreach ($ufs as $uf)
                <option value="{{ $uf }}" {{ $enterprise->uf == $uf ? 'selected' : '' }}>{{ $uf }}
                </option>
              @endforeach
            </select>
          @endisset
        </div>
      </div>
      <div class="row mt-2">
        <div class="form-group col-md-6">
          <label class="form-label" for="complement" class="text-xl">Complemento</label>
          <input type="text" name="complement" id="complement" class="form-control form-control-lg"
            value="{{ $enterprise->complement }}">
        </div>
        <div class="form-group
              col-md-3">
          <label class="form-label" for="district">Bairro</label>
          <input type="text" name="district" id="district" class="form-control form-control-lg"
            value="{{ $enterprise->district }}">
        </div>
        <div class="form-group col-md-3">
          <label class="form-label" for="city">Município</label>
          <input type="text" name="city" id="city" class="form-control form-control-lg"
            value="{{ $enterprise->cep }}">
        </div>
      </div>
      <hr>
      <h4>Responsável</h4>
      <div class="row mt-2">
        <div class="form-group col-md-4">
          <label class="form-label" for="responsible_name">Nome</label>
          <input type="text" name="responsible_name" class="form-control form-control-lg"
            value="{{ $enterprise->responsibleUser->name }}">
        </div>
        <div class="form-group col-md-4">
          <label class="form-label" for="responsible_email">Email</label>
          <input type="text" name="responsible_email" class="form-control form-control-lg"
            value="{{ $enterprise->responsibleUser->email }}">
        </div>
        <div class="form-group col-md-4">
          <label class="form-label" for="responsible_number">Telefone</label>
          <input type="text" name="responsible_number" class="form-control form-control-lg"
            value="{{ $enterprise->responsibleUser->phone }}">
        </div>
      </div>
      <div class="row">
        <div class="form-group col-md-2 mt-2">
          <label class="form-label mt-2" for="responsible_email">Status</label>
          <select class="form-control form-control-lg" name="status" id="status">
            <option value="active" {{ $enterprise->status == 'active' ? 'selected' : '' }}>Ativado</option>
            <option value="inactive" {{ $enterprise->status == 'inactive' ? 'selected' : '' }}>Desativado</option>
          </select>
        </div>
        @if ($enterprise->status == 'inactive')
          <div class="form-group col-md-2 mt-2">
            <label class="form-label mt-2" for="deactivate_at">Desativado em</label>
            <input type="text" name="deactivated_at" class="form-control form-control-lg"
              value="{{ $enterprise->deactivated_at->format('d/m/Y') }}" disabled>
          </div>
        @endif
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

    function removePontuacaoCEP(cep) {
      return cep.replace(/[^\d]+/g, '');
    }
    $(document).ready(function() {
      $('#cep').mask('00000-000');
    });

    $(document).ready(function() {
      $('#save-button').click(function() {
        $('form').submit();
      });
    });
  </script>
@endsection
