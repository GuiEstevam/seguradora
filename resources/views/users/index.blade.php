@extends('layouts.main')
@section('title', 'Usuários')
@section('content')
  <div id="event-create-container" class="col-md-8 offset-md-2 border">
    <div class="row mb-3">
      <div class="col d-flex justify-content-end">
        <div class="btn-group mr-1" role="group">
          <a href="{{ route('users.create') }}" class="btn btn-primary">
            Criar
          </a>
        </div>

        <div class="btn-group mr-3" role="group">
          <button id="edit-button" class="btn btn-primary">
            Editar
          </button>
        </div>
      </div>
    </div>
    @if (count($users) > 0)
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">Nome</th>
              <th class="text-center">Email</th>
              <th class="text-center">Empresa</th>
              <th class="text-center">Telefone</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
              <tr class="selectable-row" data-id="{{ $user->id }}"
                data-edit-url="{{ route('users.show', $user->id) }}">
                <td class="text-center">{{ $user->id }}</td>
                <td class="text-center">{{ $user->name }}</td>
                <td class="text-center">{{ $user->email }}</td>
                <td class="text-center">{{ $user->enterprise->name }}</td>
                <td class="text-center">{{ format_phone($user->phone) }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @endif
  </div>

  <script>
    var selectedRow = null;

    Array.from(document.getElementsByClassName('selectable-row')).forEach(function(row) {
      row.addEventListener('click', function() {
        // Desmarcar a linha anteriormente selecionada, se houver
        if (selectedRow) {
          selectedRow.classList.remove('selected');
        }

        // Marcar a linha clicada como selecionada
        row.classList.add('selected');
        selectedRow = row;
      });
    });

    document.getElementById('edit-button').addEventListener('click', function() {
      if (selectedRow) {
        var editUrl = selectedRow.getAttribute('data-edit-url');

        // Agora você tem a URL de edição da linha selecionada em editUrl
        // Você pode redirecionar para essa URL para editar a empresa
        window.location.href = editUrl;
      }
    });
  </script>
@endsection
