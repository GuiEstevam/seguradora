@extends('layouts.main')
@section('title', 'Usuários')
@section('content')
  <div id="event-create-container" class="col-md-8 offset-md-2 border">
    <div class="row mb-3">
      <div class="col d-flex justify-content-end">
        @role('master')
          <a href="{{ route('users.create') }}" class="btn btn-primary">
            Criar
          </a>
        @endrole
      </div>
    </div>
    <div class="row mb-3">
      <form method="GET" action="{{ route('users.index') }}">
        <div class="input-group col-md-12 mb-3">
          <div class="input-group-prepend">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false" id="searchColumnDropdown">Pesquisar por:</button>
            <div class="dropdown-menu">
              <h6 class="dropdown-header">Pesquisar por</h6>
              <a class="dropdown-item" href="#" onclick="setSearchColumn('name')">Nome</a>
              <a class="dropdown-item" href="#" onclick="setSearchColumn('email')">Email</a>
              <a class="dropdown-item" href="#" onclick="setSearchColumn('enterprise_id')">Empresa</a>
              <a class="dropdown-item" href="#" onclick="setSearchColumn('phone')">Telefone</a>
            </div>
          </div>
          <input type="hidden" name="search_column" id="search_column" value="{{ request('search_column', 'name') }}">
          <input type="text" name="search" class="form-control" placeholder="Pesquisar..."
            value="{{ request('search') }}">
        </div>
      </form>
    </div>
    @if ($users->count())
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">Nome</th>
              <th class="text-center">Email</th>
              <th class="text-center">Empresa</th>
              <th class="text-center">Telefone</th>
              <th class="text-center"></th>
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
                <td class="text-center">{{ $user->phone }}</td>
                <td class="text-center">
                  <a href="{{ route('users.show', $user->id) }}">
                    <ion-icon name="search-outline" class="status-icon"></ion-icon>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      {{ $users->appends(['per_page' => request('per_page'), 'search_column' => request('search_column'), 'search' => request('search')])->links('vendor.pagination.bootstrap-5') }}
    @endif
    <div class="row mb-3">
      <div class="col d-flex justify-content-end">
        <form method="GET" action="{{ route('users.index') }}">
          <label for="per_page">Registros por página:</label>
          <select name="per_page" id="per_page" onchange="this.form.submit()">
            <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
            <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
            <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
            <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
            <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
          </select>
        </form>
      </div>
    </div>
  </div>

  <script>
    function setSearchColumn(column) {
      document.getElementById('search_column').value = column;
      const columnText = document.querySelector(`.dropdown-item[onclick="setSearchColumn('${column}')"]`).innerText;
      document.getElementById('searchColumnDropdown').innerText = columnText;
    }

    // Definir o texto do botão dropdown com base no valor atual do campo oculto
    document.addEventListener('DOMContentLoaded', function() {
      const currentColumn = document.getElementById('search_column').value;
      if (currentColumn) {
        const columnText = document.querySelector(`.dropdown-item[onclick="setSearchColumn('${currentColumn}')"]`)
          .innerText;
        document.getElementById('searchColumnDropdown').innerText = columnText;
      }
    });
  </script>
@endsection
