@extends('layouts.main')
@section('title', $enterprise->name)
@section('content')
  <div id="search-create-container" class="col-md-8 offset-md-2 border">
    {{-- <div class="row mb-3">
      <div class="col d-flex justify-content-start">
        Cadastramento / Empresas / Visualização
      </div>
    </div> --}}

    <form action="{{ route('enterprises.update', ['id' => $enterprise->id]) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="row mb-3">
        @role('master')
          <div class="col d-flex justify-content-start">
            <button id="openPriceModal" data-id="{{ $enterprise->id }}" class="btn btn-primary d-flex align-items-center">
              <ion-icon name="wallet"></ion-icon>
              <span class="ms-1">Preços</span>
            </button>
          </div>
        @endrole
        <div class="col d-flex justify-content-end">
          <div class="btn-group" role="group">
            <a href="{{ route('enterprises.index') }}" class="btn btn-secondary d-flex align-items-center">
              <ion-icon name="arrow-back-outline"></ion-icon>
              <span class="ms-1">Voltar</span>
            </a>
          </div>
          <div class="btn-group mr-1" role="group">
            <button id="save-button" class="btn btn-primary">
              Salvar
            </button>
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
            <option value="active" {{ $enterprise->status == 'active' ? 'selected' : '' }}>Ativo</option>
            <option value="inactive" {{ $enterprise->status == 'inactive' ? 'selected' : '' }}>Desativado</option>
          </select>
        </div>
        @if ($enterprise->status == 'inactive')
          <div class="form-group col-md-3 mt-2">
            <label class="form-label mt-2" for="deactivate_at">Desativado em</label>
            <input type="text" name="deactivated_at" class="form-control form-control-lg"
              value="{{ $enterprise->deactivated_at->format('d/m/Y') }}" disabled>
          </div>
        @endif
      </div>
    </form>
  </div>
  <div class="modal fade" id="priceModal" tabindex="-1" aria-labelledby="priceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="priceModalLabel">Definição de Preços</h5>
        </div>
        <div class="modal-body">
          <form id="priceForm" action="{{ route('query_value.store', ['id' => $enterprise->id]) }}" method="POST">
            @csrf
            <div class="row mt-3">
              <div class="form-group col-md-6">
                <label class="form-label" for="driverLicense">CNH:</label>
                <input type="text" name="driverLicense" class="form-control form-control-lg monetary"
                  value="{{ $prices ? $prices->driverLicense : '' }}">
              </div>
              <div class="form-group col-md-6">
                <label class="form-label" for="veichile">Veículo:</label>
                <input type="text" name="veichile" class="form-control form-control-lg monetary"
                  value="{{ $prices ? $prices->veichile : '' }}">
              </div>
            </div>
            <div class="row mt-3">
              <div class="form-group col-md-6">
                <label class="form-label" for="face">Face:</label>
                <input type="text" name="face" class="form-control form-control-lg monetary"
                  value="{{ $prices ? $prices->face : '' }}">
              </div>
              <div class="form-group col-md-6">
                <label class="form-label" for="process">Processo:</label>
                <input type="text" name="process" class="form-control form-control-lg monetary"
                  value="{{ $prices ? $prices->process : '' }}">
              </div>
            </div>
            <hr>
            <div class="row mt-3 text-center">
              <h6>Valor Autônomo</h6>
            </div>
            <div class="row">
              <div class="form-group col-md-4 text-center">
                <label class="form-label" for="autonomous_base">Base</label>
                <input type="text" id="autonomous_base" name="autonomous_base"
                  class="form-control form-control-lg monetary" value="{{ $prices ? $prices->autonomous_base : '' }}">
              </div>
              <div class="form-group col-md-4 text-center">
                <label class="form-label" for="autonomous_additional">Adicional</label>
                <input type="text" id="autonomous_additional" name="autonomous_additional"
                  class="form-control form-control-lg monetary"
                  value="{{ $prices ? $prices->autonomous_additional : '' }}">
              </div>
              <div class="form-group col-md-4 text-center">
                <label class="form-label" for="autonomous_validity">Validade (dias)</label>
                <input type="text" id="autonomous_validity" name="autonomous_validity"
                  class="form-control form-control-lg" value="{{ $prices ? $prices->autonomous_validity : '' }}">
                <div class="form-check mt-2">
                  <input type="checkbox" class="form-check-input" id="autonomous_recurring"
                    name="autonomous_recurring" {{ $prices->autonomous_recurring ? 'checked' : '' }}>
                  <label class="form-check-label" for="autonomous_recurring">Renovação</label>
                </div>
              </div>
            </div>
            <div class="row mt-3 text-center">
              <h6>Valor Agregado</h6>
            </div>
            <div class="row">
              <div class="form-group col-md-4 text-center">
                <label class="form-label" for="aggregated_base">Base</label>
                <input type="text" id="aggregated_base" name="aggregated_base"
                  class="form-control form-control-lg monetary" value="{{ $prices ? $prices->aggregated_base : '' }}">
              </div>
              <div class="form-group col-md-4 text-center">
                <label class="form-label" for="aggregated_additional">Adicional</label>
                <input type="text" id="aggregated_additional" name="aggregated_additional"
                  class="form-control form-control-lg monetary"
                  value="{{ $prices ? $prices->aggregated_additional : '' }}">
              </div>
              <div class="form-group col-md-4 text-center">
                <label class="form-label" for="aggregated_validity">Validade (dias)</label>
                <input type="text" id="aggregated_validity" name="aggregated_validity"
                  class="form-control form-control-lg" value="{{ $prices ? $prices->aggregated_validity : '' }}">
                <div class="form-check mt-2">
                  <input type="checkbox" class="form-check-input" id="aggregated_recurring"
                    name="aggregated_recurring" {{ $prices->aggregated_recurring ? 'checked' : '' }}>
                  <label class="form-check-label" for="aggregated_recurring">Renovação</label>
                </div>
              </div>
            </div>
            <div class="row mt-3 text-center">
              <h5>Valor Frota</h5>
            </div>
            <div class="row">
              <div class="form-group col-md-4 text-center">
                <label class="form-label" for="fleet_base">Base</label>
                <input type="text" id="fleet_base" name="fleet_base" class="form-control form-control-lg monetary"
                  value="{{ $prices ? $prices->fleet_base : '' }}">
              </div>
              <div class="form-group col-md-4 text-center">
                <label class="form-label" for="fleet_additional">Adicional</label>
                <input type="text" id="fleet_additional" name="fleet_additional"
                  class="form-control form-control-lg monetary" value="{{ $prices ? $prices->fleet_additional : '' }}">
              </div>
              <div class="form-group col-md-4 text-center">
                <label class="form-label" for="fleet_validity">Validade (dias)</label>
                <input type="text" id="fleet_validity" name="fleet_validity" class="form-control form-control-lg"
                  value="{{ $prices ? $prices->fleet_validity : '' }}">
                <div class="form-check mt-2">
                  <input type="checkbox" class="form-check-input" id="fleet_recurring" name="fleet_recurring"
                    {{ $prices->fleet_recurring ? 'checked' : '' }}>
                  <label class="form-check-label" for="fleet_recurring">Renovação</label>
                </div>
              </div>
            </div>
            <div class="row mt-3">
              <div class="form-group col-md-12">
                <label class="form-label" for="status">Status:</label>
                <select class="form-control form-control-lg" name="status" id="status">
                  <option value="active" {{ $prices && $prices->status == 'active' ? 'selected' : '' }}>Ativo</option>
                  <option value="inactive" {{ $prices && $prices->status == 'inactive' ? 'selected' : '' }}>Desativado
                  </option>
                </select>
              </div>
            </div>
            @if ($prices)
              @if ($prices->status == 'inactive')
                <div class="row mt-3">
                  <div class="form-group col-md-6">
                    <label class="form-label" for="deactivated_at">Desativado em:</label>
                    <input class="form-control form-control-lg" type="datetime-local" id="deactivated_at"
                      name="deactivated_at" value="{{ $prices ? $prices->deactivated_at : '' }}">
                  </div>
                </div>
              @endif
            @endif
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          <button id="savePriceButton" type="button" class="btn btn-primary">Salvar</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Função para remover a pontuação do CNPJ
    function removePontuacaoCNPJ(cnpj) {
      return cnpj.replace(/[^\d]+/g, '');
    }

    function removePontuacaoCEP(cep) {
      return cep.replace(/[^\d]+/g, '');
    }
  </script>
  <script>
    // SCRIPT DE EMPRESA
    $(document).ready(function() {
      $('#cnpj').mask('00.000.000/0000-00');
      $('#cep').mask('00000-000');
      // Manipula o clique no botão de salvar
      $('#save-button').click(function() {
        $('form').submit();
      });
      // Manipula o envio do formulário
      $('form').submit(function() {
        try {
          var cnpj = $('#cnpj').val();
          var cnpjSemPontuacao = removePontuacaoCNPJ(cnpj);
          $('#cnpj').val(cnpjSemPontuacao);
        } catch (error) {
          console.error(error);
        }
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Função para remover a formatação monetária
      function removerFormatacao(valor) {
        valor = valor.replace('R$ ', '').replace(/\./g, '');
        valor = valor.replace(',', '.');
        return parseFloat(valor).toFixed(2);
      }


      // Função para aplicar a máscara e adicionar o prefixo R$
      function aplicarMascara() {
        $('.monetary').mask('000.000.000.000.000,00', {
          reverse: true
        }).each(function() {
          var valorAtual = $(this).val();
          if (!valorAtual.startsWith('R$')) {
            $(this).val('R$ ' + valorAtual);
          }
        });
      }

      // Função para formatar os valores ao reabrir o modal
      function formatarValoresModal() {
        $('.monetary').each(function() {
          var valor = removerFormatacao($(this).val());
          valor = parseFloat(valor);
          if (!isNaN(valor)) {
            valor = valor.toFixed(2).replace('.', ',');
            $(this).val('R$ ' + valor);
          } else {
            $(this).val('R$ 0,00');
          }
        });
      }

      // Quando o modal é aberto, armazena o valor original
      $('#priceModal').on('show.bs.modal', function() {
        $('.monetary').each(function() {
          $(this).data('original-value', $(this).val());
        });
        aplicarMascara();
      });

      // Quando o modal é fechado, reverte para o valor original
      $('#priceModal').on('hide.bs.modal', function() {
        $('.monetary').each(function() {
          $(this).val($(this).data('original-value'));
        });
      });

      // Aplica a máscara e formata os valores quando o modal é aberto
      $('#openPriceModal').click(function(event) {
        event.preventDefault();
        aplicarMascara();
        formatarValoresModal();
        $('#priceModal').modal('show');
      });

      // Atualiza a formatação após o envio do formulário
      $('#savePriceButton').click(function(e) {
        e.preventDefault();

        $('.monetary').each(function() {
          var value = $(this).val();
          value = removerFormatacao(value);
          $(this).val(value);
        });

        $.ajax({
          url: $('#priceForm').attr('action'),
          type: 'POST',
          dataType: 'json',
          data: $('#priceForm').serialize() + '&_token={!! csrf_token() !!}',
          success: function(response) {
            console.log(response);
            // Atualiza o valor original de cada campo com o valor atualizado retornado do servidor
            $('.monetary').each(function() {
              var nomeCampo = $(this).attr('name');
              var novoValor = response.data[nomeCampo]; // Acessa o valor atualizado
              if (novoValor) {
                novoValor = parseFloat(novoValor).toFixed(2).replace('.', ',');
                $(this).data('original-value', 'R$ ' + novoValor);
              }
            });
            $('#priceModal').modal('hide');
          },
          error: function(jqXHR, textStatus, errorThrown) {
            console.error('Erro ao enviar o formulário: ' + textStatus);
            console.error('Status do erro: ' + jqXHR.status);
            console.error('Texto do erro: ' + jqXHR.responseText);
          }
        });
      });
    });
  </script>

@endsection
