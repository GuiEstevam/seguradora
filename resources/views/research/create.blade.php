@extends('layouts.main')
@section('title', 'Criar Pesquisa Unificada')
@section('content')
  <div id="search-create-container" class="col-md-8 offset-md-2 border">
    <form action="{{ route('research.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group col-md-12">
        <label for="type">Tipo de Pesquisa:</label>
        <select name="type" id="type" class="form-control form-control-lg">
          <option value="aggregated">Agregado</option>
          <option value="autonomous">Autônomo</option>
          <option value="fleet">Frota</option>
        </select>
      </div>
      <div class="row mt-3">
        <div class="col-md-4">
          <label class="form-label" for="cpf">CPF</label>
          <div class="input-group">
            <input type="text" name="cpf" class="form-control form-control-lg" id="cpf">
            <div class="input-group-append">
              <button class="btn btn-primary" type="button"><ion-icon class="sync"
                  name="sync-outline"></ion-icon>Verificar</button>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <label class="form-label" for="name">Nome</label>
          <div class="input-group">
            <input type="text" name="name" class="form-control form-control-lg">
          </div>
        </div>
        <div class="col-md-4">
          <label class="form-label" for="birthDate"> Data de nascimento </label>
          <input type="date" name="birthDate" class="form-control form-control-lg" value="{{ date('Y-m-d') }}"
            required />
        </div>
      </div>
      <div class="row mt-2">
        <div class="col-md-4">
          <label class="form-label" for="motherName">Nome da mãe</label>
          <input type="text" name="motherName" class="form-control form-control-lg">
        </div>
      </div>
      <hr>
      <h6>Carteira de Registro (RG)</h6>
      <div class="row">
        <div class=" form-group col-md-4">
          <label class="form-label" for="rgNumber" class="form-label">RG</label>
          <input type="text" name="rgNumber" id="rg" class="form-control form-control-lg">
        </div>
        <div class="form-group col-md-2">
          <label class="form-label" class="form-label" for="rgUf">UF</label>
          @isset($ufs)
            <select name="rgUf" id="rgUf" class="form-control form-control-lg">
              <option value="">Selecione</option>
              @foreach ($ufs as $uf)
                <option value="{{ $uf }}" {{ old('rgUf') == $uf ? 'selected' : '' }}>{{ $uf }}
                </option>
              @endforeach
            </select>
          @endisset
        </div>
        <div class="form-group col-md-4">
          <label class="form-label">Data de emissão</label>
          <input type="date" name="compliance_date" class="form-control form-control-lg" value="{{ date('Y-m-d') }}"
            required />
        </div>
      </div>
      <hr>
      <h6>Carteira nacional de habilitação (CNH)</h6>
      <div class="row">
        <div class="form-group col-md-4">
          <label for="cnhRegisterNumber" class="form-label">CNH</label>
          <input type="text" name="cnhRegisterNumber" class="form-control form-control-lg">
        </div>
        <div class="form-group col-md-2">
          <label class="form-label" class="form-label" for="cnhUf">UF</label>
          @isset($ufs)
            <select name="cnhUf" id="cnhUf" class="form-control form-control-lg">
              <option value="">Selecione</option>
              @foreach ($ufs as $uf)
                <option value="{{ $uf }}" {{ old('cnhUf') == $uf ? 'selected' : '' }}>{{ $uf }}
                </option>
              @endforeach
            </select>
          @endisset
        </div>
        <div class="form-group col-md-4">
          <label for="cnhSecurityNumber" class="form-label">Código de segurança</label>
          <input name="cnhSecurityNumber" type="text" class="form-control form-control-lg">
        </div>
      </div>
      <hr>
      <div class="row mt-3">
        <div class="col-md-3">
          <input type="button" class="btn btn-info" id="adicionar-veiculo" value="Adicionar veículo 0/4">
        </div>
      </div>
      <div id="veiculos-container" class="row mt-3">

      </div>
      <div class="form-group mt-2">
        <input type="submit" class="btn btn-primary" value="Enviar">
        <input type="reset" class="btn btn-light border" value="Limpar">
      </div>
    </form>
  </div>

  <script>
    $(document).ready(function() {
      var maxVeiculos = 4;
      var i = 0;

      $('#adicionar-veiculo').click(function() {
        if (i < maxVeiculos) {
          i++;
          $('#veiculos-container').append(`
                <div id="veichile-create-container${i}" class="col-md-12">
                    <div class="col d-flex justify-content-end">
                        <button type="button" class="btn  remove-veiculo" data-id="${i}">X</button>
                    </div>
                    <div class ="row">
                    <h6> Dados do veículo </h6>
                    <div class="col-md-2">
                    <label class="form-label">Placa</label>
                    <input type="text" name="vehiclePlate0${i}" class="form-control form-control-lg">
                    </div>
                    <div class="col-md-3">
                    <label class="form-label">Renavam</label>
                    <input type="text" name="vehicleRenavam0${i}" class="form-control form-control-lg">
                    </div>
                    <div class="col-md-2">
                    <label class="form-label">UF</label>
                    <input type="text" name="vehicleUf0${i}" class="form-control form-control-lg">
                    </div>
                </div>
                <hr>
                <h6> Dados do proprietário </h6>
                <div class="row mt-3">
                    <div class="col-md-4 mt-1">
                    <label class="form-label">CPF</label>
                    <input type="text" name="vehicleOwnerDocument0${i}" class="form-control form-control-lg" id="cpf">
                    </div>
                    <div class="col-md-4 mt-1">
                    <label class="form-label">Número RNTRC</label>
                    <input type="text" name="vehicleRntrcNumber0${i}" class="form-control form-control-lg">
                    </div>
                    <input type="number" id="vehicleCount" name="vehicleCount" value="${i}" hidden>
                </div>
                </div>
          `);
          atualizarTextoBotao();
        }
      });

      $(document).on('click', '.remove-veiculo', function() {
        var id = $(this).data('id');
        $('#veichile-create-container' + id).remove();
        i--;
        atualizarTextoBotao();
      });

      function atualizarTextoBotao() {
        $('#adicionar-veiculo').val(`Adicionar veículo ${i}/4`);
      }
    });
    // Função para remover a pontuação do CPF
    function removePontuacaoCPF(cpf) {
      return cpf.replace(/[^\d]+/g, '');
    }

    $(document).ready(function() {
      $('#cpf').mask('000.000.000-00');

      // Manipula o envio do formulário
      $('form').submit(function() {
        var cpf = $('#cpf').val();
        var cpfSemPontuacao = removePontuacaoCPF(cpf);
        $('#cpf').val(cpfSemPontuacao);
      });
    });
    // Função para remover a pontuação do RG
    function removePontuacaoRG(rg) {
      return rg.replace(/[^\d]+/g, '');
    }

    $(document).ready(function() {
      $('#rg').mask('00.000.000-0');

      // Manipula o envio do formulário
      $('form').submit(function() {
        var rg = $('#rg').val();
        var rgSemPontuacao = removePontuacaoRG(rg);
        $('#rg').val(rgSemPontuacao);
      });
    });
  </script>

@endsection
