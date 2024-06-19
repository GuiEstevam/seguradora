@extends('layouts.main')
@section('title', 'Cadastramento de Usuários')
@section('content')
  <div id="event-create-container" class="col-md-8 offset-md-2">
    <div class="row mb-3">
      <div class="col d-flex justify-content-end">
        <div class="btn-group mr-1" role="group">
          <button id="save-button" class="btn btn-primary">
            Salvar
          </button>
        </div>
        <div class="btn-group" role="group">
          <a href="{{ route('users.index') }}" class="btn btn-secondary d-flex align-items-center">
            <ion-icon name="arrow-back-outline"></ion-icon>
            <span class="ms-1">Voltar</span>
          </a>
        </div>
      </div>
    </div>
    <h4>Dados cadastrais</h4>
    <form action="{{ route('users.update', ['id' => $user->id]) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="row mt-2">
        <div class="form-group col-md-3">
          <label class="form-label" for="name">Nome</label>
          <input type="text" name="name" class="form-control form-control-lg" value="{{ $user->name }}">
        </div>
        <div class="form-group col-md-3">
          <label class="form-label" for="email">Email</label>
          <div class="input-group">
            <input type="text" name="email" class="form-control form-control-lg" value="{{ $user->email }}">
          </div>
        </div>
        <div class="form-group col-md-3">
          <label class="form-label" for="phone">Telefone</label>
          <div class="input-group">
            <input type="text" name="phone" id="phone" class="form-control form-control-lg"
              value="{{ $user->phone }}">
          </div>
        </div>
        <div class="form-group col-md-3">
          <label class="form-label" for="enterprise_id">Empresa</label>
          <div class="input-group">
            @isset($enterprises)
              <!-- Se a variável $ufs estiver definida, faça algo com ela -->
              <select name="enterprise_id" id="enterprise_id" class="form-control form-control-lg">
                <option value="">Selecione</option>
                @foreach ($enterprises as $enterprise)
                  <option value="{{ $enterprise->id }}" {{ $user->enterprise_id == $enterprise->id ? 'selected' : '' }}>
                    {{ $enterprise->name }}
                  </option>
                @endforeach
              </select>
            @endisset
          </div>
        </div>
      </div>
      <div class="row mt-3">
        <div class="form-group col-md-2 mt-2">
          <label class="form-label mt-2" for="responsible_email">Status</label>
          <select class="form-control form-control-lg" name="status" id="status">
            <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Ativo</option>
            <option value="inactive" {{ $user->status == 'inactive' ? 'selected' : '' }}>Desativado</option>
          </select>
        </div>
        @if ($user->status == 'inactive')
          <div class="form-group col-md-3 mt-2">
            <label class="form-label mt-2" for="deactivate_at">Desativado em</label>
            <input type="text" name="deactivated_at" class="form-control form-control-lg"
              value="{{ $user->deactivated_at->format('d/m/Y') }}" disabled>
          </div>
        @endif
        {{-- <div class="form-group col-md-3">
          <label class="form-label" for="password">Senha</label>
          <div class="input-group">
            <input type="password" name="password" class="form-control form-control-lg">
          </div>
        </div> --}}
      </div>
      <hr>
      <h4>Permissões</h4>
      {{-- <div class="row mt-2">
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
      </div> --}}
    </form>
  </div>
  <script>
    $(document).ready(function() {
      $(document).ready(function() {
        $('#save-button').click(function() {
          $('form').submit();
        });
      });
      // Função para remover a pontuação do telefone
      function removePontuacaoTelefone(telefone) {
        return telefone.replace(/[^\d]+/g, '');
      }

      // Aplica a máscara no campo de telefone
      $('#phone').mask(function(val) {
        return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
      }, {
        onKeyPress: function(val, e, field, options) {
          field.mask(function(val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
          }.apply({}, arguments), options);
        }
      });

      // Manipula o envio do formulário
      $('form').submit(function() {
        var telefone = $('#phone').val();
        var telefoneSemPontuacao = removePontuacaoTelefone(telefone);
        $('#phone').val(telefoneSemPontuacao);
      });
    });
  </script>
@endsection
