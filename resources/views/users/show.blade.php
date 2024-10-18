@extends('layouts.main')
@section('title', 'Cadastramento de Usuários')
@section('content')
  @if (session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  @if (session('error'))
    <div class="alert alert-danger">
      {{ session('error') }}
    </div>
  @endif
  <div id="event-create-container" class="col-md-8 offset-md-2">
    <form action="{{ route('users.update', ['id' => $user->id]) }}" method="POST">
      @csrf
      @method('PUT')
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
      </div>
      <hr>
      <h5>Permissões</h5>
      <div class="form-group col-md-3">
        <label>Selecione o Tipo de Permissão</label>
        <div class="btn-group btn-group-toggle" data-toggle="buttons">
          <label class="btn" id="roles-toggle">
            <input type="radio" name="options" id="option1" autocomplete="off">
            Papéis
          </label>
          <label class="btn" id="permissions-toggle">
            <input type="radio" name="options" id="option2" autocomplete="off">
            Permissões Específicas
          </label>
        </div>
        <div id="roles-section" class="form-group" style="display: none;">
          <label for="roles">Papéis (Grupos)</label>
          <select name="roles[]" id="roles" class="form-control">
            <option value="">Selecione um grupo</option>
            @foreach ($roles as $role)
              <option value="{{ $role->name }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }}>
                {{ __('roles_permissions.roles.' . $role->name) }}
              </option>
            @endforeach
          </select>
        </div>
        <div id="permissions-section" class="form-group" style="display: none;">
          <label for="permissions">Permissões Específicas</label>
          @foreach ($permissions as $permission)
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                id="permission-{{ $permission->id }}"
                {{ $user->permissions->contains($permission->id) ? 'checked' : '' }}>
              <label class="form-check-label" for="permission-{{ $permission->id }}">
                {{ __('roles_permissions.permissions.' . $permission->name) }}
              </label>
            </div>
          @endforeach
        </div>
      </div>
    </form>
  </div>
  <script>
    $(document).ready(function() {
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

      function toggleOptions(option) {
        const rolesSection = document.getElementById('roles-section');
        const permissionsSection = document.getElementById('permissions-section');
        const rolesToggle = document.getElementById('roles-toggle');
        const permissionsToggle = document.getElementById('permissions-toggle');

        if (option === 'roles') {
          rolesSection.style.display = 'block';
          permissionsSection.style.display = 'none';
          rolesToggle.classList.add('active');
          permissionsToggle.classList.remove('active');
          document.querySelectorAll('#permissions-section .form-check-input').forEach(input => input.checked =
            false); // Limpa as permissões específicas
        } else if (option === 'permissions') {
          rolesSection.style.display = 'none';
          permissionsSection.style.display = 'block';
          rolesToggle.classList.remove('active');
          permissionsToggle.classList.add('active');
          document.getElementById('roles').value = ''; // Limpa os papéis
        } else {
          rolesSection.style.display = 'none';
          permissionsSection.style.display = 'none';
          rolesToggle.classList.remove('active');
          permissionsToggle.classList.remove('active');
        }
      }

      // Adiciona evento de clique aos botões de alternância
      document.getElementById('roles-toggle').addEventListener('click', function() {
        toggleOptions('roles');
        document.getElementById('option1').checked = true;
      });

      document.getElementById('permissions-toggle').addEventListener('click', function() {
        toggleOptions('permissions');
        document.getElementById('option2').checked = true;
      });

      // Inicializa a visualização correta com base na seleção inicial
      const userRoles = @json($user->roles->pluck('name'));
      const userPermissions = @json($user->permissions->pluck('name'));

      if (userRoles.length > 0) {
        toggleOptions('roles');
        document.getElementById('option1').checked = true;
      } else if (userPermissions.length > 0) {
        toggleOptions('permissions');
        document.getElementById('option2').checked = true;
      } else {
        toggleOptions('');
      }
    });
  </script>
@endsection
