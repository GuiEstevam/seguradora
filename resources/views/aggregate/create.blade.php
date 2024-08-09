@extends('layouts.main')
@section('title', 'Pesquisa - Agregado')
@section('content')
  <div id="event-create-container" class="col-md-8 offset-md-2 border">
    <form action="{{ route('aggregate.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
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
        {{-- <div class="col-md-5 mt-4">
          <div class="form-group">
            <button class="btn btn-primary" type="button">Realizar consulta</button>
          </div>
        </div> --}}
      </div>
      <div class="row mt-2">
        <div class="col-md-4">
          <label class="form-label" for="name">Nome</label>
          <div class="input-group">
            <input type="text" name="name" class="form-control form-control-lg">
          </div>
        </div>
        <div class="col-md-4">
          <label class="form-label" for="birthDate"> Data </label>
          <input type="date" name="birthDate" class="form-control form-control-lg" value="{{ date('Y-m-d') }}"
            required />
        </div>
        <div class="col-md-4">
          <label class="form-label" for="image">Nome da mãe</label>
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
            <!-- Se a variável $ufs estiver definida, faça algo com ela -->
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
            <!-- Se a variável $ufs estiver definida, faça algo com ela -->
            <select name="cnhUf" id="cnhUf" class="form-control form-control-lg">
              <option value="">Selecione</option>
              @foreach ($ufs as $uf)
                <option value="{{ $uf }}" {{ old('rgUf') == $uf ? 'selected' : '' }}>{{ $uf }}
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
      {{-- <h6>Dados de contato </h6> --}}
      {{-- <div class="row">
            <div class="col-md-3">
            <label>Telefone</label>
            <input type="text" class="form-control">
            </div>
            <div class="col-md-3">
            <label>Celular</label>
            <input type="text" class="form-control">
            </div>
            <div class="col-md-3">
            <label>E-mail</label>
            <input type="text" class="form-control">
            </div>
        </div> --}}
      <div class="row mt-3">
        <div class="col-md-3">
          <input type="button" class="btn btn-info" id="adicionar-veiculo" value="Adicionar veículo 0/4">
        </div>
        {{-- <div class="col-md-3">
          <input type="button" class="btn btn-secondary" value="Adicionar proprietário">
        </div> --}}
      </div>
      <div id="veiculos-container" class="row mt-3">

      </div>
      <div class="form-group mt-2">
        <input type="submit" class="btn btn-primary" value="Enviar">
        <input type="submit" class="btn btn-light border" value="Limpar">
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
                    <input type="text" name="vehicleUf${i}" class="form-control form-control-lg">
                    </div>
                </div>
                <hr>
                <h6> Dados do proprietário </h6>
                <div class="row mt-3">
                    <div class="col-md-4 mt-1">
                    <label class="form-label">CPF</label>
                    <input type="text" name="vehicleOwnerDocument0${i}" class="form-control form-control-lg">
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
