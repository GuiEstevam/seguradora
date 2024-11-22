@extends('layouts.main')
@section('title', 'Pesquisa - Agregado')
@section('content')
  <div id="search-create-container" class="col-md-8 offset-md-2 border">
    <form action="{{ route('driverLicense.store') }}" method="POST" enctype="multipart/form-data">
      @csrf
      {{-- <h4>Cadastramento de Empresa</h4> --}}
      <div class="row mt-2">
        <div class="form-group col-md-3">
          <label class="form-label" for="cpf">CPF</label>
          <input type="text" name="cpf" id="cpf" class="form-control form-control-lg">
        </div>
        <div class="form-group col-md-2">
          <label class="form-label" for="uf">UF</label>
          <div class="input-group">
            @isset($ufs)
              <!-- Se a variável $ufs estiver definida, faça algo com ela -->
              <select name="uf_license" id="uf_license" class="form-control form-control-lg">
                <option value="">Selecione</option>
                @foreach ($ufs as $uf)
                  <option value="{{ $uf }}" {{ old('uf') == $uf ? 'selected' : '' }}>{{ $uf }}
                  </option>
                @endforeach
              </select>
            @endisset
          </div>
        </div>
        <div class="form-group col-md-3">
          <label class="form-label" for="license_number">Número da habilitação</label>
          <input type="text" name="license_number" class="form-control form-control-lg">
        </div>
        <div class="form-group col-md-3">
          <label class="form-label" for="security_code">Código de segurança</label>
          <input type="text" name="security_code" class="form-control form-control-lg">
        </div>
      </div>
      <div class="form-group mt-4">
        <button type="submit" class="btn btn-primary">Enviar</button>
        <button type="reset" class="btn btn-light border">Limpar</button>
      </div>
    </form>
  </div>
  <script>
    $(document).ready(function() {
      var maxVeiculos = 3;
      var contadorVeiculos = 0;

      $('#adicionar-veiculo').click(function() {
        if (contadorVeiculos < maxVeiculos) {
          contadorVeiculos++;
          $('#veiculos-container').append(`
                <div id="veichile-create-container" class="col-md-12 offset-md-1">
                <div class ="row">
                    <div class="col-md-2">
                    <label class="form-label">Placa</label>
                    <input type="text" name="veiculo[${contadorVeiculos}][placa]" class="form-control form-control-lg">
                    </div>
                    <div class="col-md-3">
                    <label class="form-label">RENAVAM</label>
                    <input type="text" name="veiculo[${contadorVeiculos}][renavam]" class="form-control form-control-lg">
                    </div>
                    <div class="col-md-2">
                    <label class="form-label">UF</label>
                    <input type="text" name="veiculo[${contadorVeiculos}][uf]" class="form-control form-control-lg">
                    </div>
                </div>
                <hr>
                <h6> Dados do proprietário </h6>
                <div class="row mt-3">
                    <div class="col-md-4 mt-1">
                    <div>
                        <label class="form-label" class="mb-1" for="flexRadioDefault1">Tipo</label>
                    </div>
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                        <label class="form-label" class="form-check-label" for="flexRadioDefault1">
                        PF
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                        <label class="form-label" class="form-check-label" for="flexRadioDefault2">
                        PJ
                        </label>
                    </div>
                    </div>
                    <div class="col-md-4 mt-1">
                    <label class="form-label">CPF</label>
                    <input type="text" name="veiculo[${contadorVeiculos}][renavam]" class="form-control form-control-lg">
                    </div>
                    <div class="col-md-4 mt-1">
                    <label class="form-label">Nome</label>
                    <input type="text" name="veiculo[${contadorVeiculos}][renavam]" class="form-control form-control-lg">
                    </div>
                </div>
                </div>
          `);
          atualizarTextoBotao();
        }
      });

      function atualizarTextoBotao() {
        $('#adicionar-veiculo').val(`Adicionar veículo ${contadorVeiculos}/3`);
      }
    });

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

    function removePontuacaoCNH(cnh) {
      return cnh.replace(/[^\d]+/g, '');
    }

    $(document).ready(function() {
      $('#cnh').mask('00000000000');

      // Manipula o envio do formulário
      $('form').submit(function() {
        var cnh = $('#cnh').val();
        var cnhSemPontuacao = removePontuacaoCNH(cnh);
        $('#cnh').val(cnhSemPontuacao);
      });
    });
    // Função para remover a pontuação do código de segurança da CNH
    function removePontuacaoCodigoSeguranca(codigo) {
      return codigo.replace(/[^\d]+/g, '');
    }

    $(document).ready(function() {
      $('#codigo-seguranca-cnh').mask('000000000');

      // Manipula o envio do formulário
      $('form').submit(function() {
        var codigo = $('#codigo-seguranca-cnh').val();
        var codigoSemPontuacao = removePontuacaoCodigoSeguranca(codigo);
        $('#codigo-seguranca-cnh').val(codigoSemPontuacao);
      });
    });
  </script>

@endsection
