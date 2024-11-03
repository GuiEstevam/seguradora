@extends('layouts.main')
@section('title', 'Pesquisa - Agregado')
@section('content')
  <div id="event-create-container" class="col-md-8 offset-md-2 border">
    <div class="row mb-3">
      <div class="col d-flex justify-content-start">
        <a href="{{ route('export.queries') }}" class="btn btn-success mb-3"> <ion-icon name="library">
          </ion-icon> Excel</a>
      </div>
      <div class="col d-flex justify-content-end">
        <div class="btn-group mr-1" role="group">
          <a href="{{ route('aggregate.create') }}">
            <button class="btn btn-primary">
              Criar
            </button>
          </a>
        </div>
      </div>
    </div>
    <div class="row mb-3">
      <form method="GET" action="{{ route('queries.index') }}">
        <div class="input-group col-md-12 mb-3">
          <div class="input-group-prepend">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false" id="searchColumnDropdown">Tipo</button>
            <div class="dropdown-menu">
              <h6 class="dropdown-header">Pesquisar por</h6>
              <a class="dropdown-item" href="#" onclick="setSearchColumn('user')">Usuário</a>
              <a class="dropdown-item" href="#" onclick="setSearchColumn('enterprise')">Empresa</a>
              <a class="dropdown-item" href="#" onclick="setSearchColumn('aggregate')">Agregado</a>
              <a class="dropdown-item" href="#" onclick="setSearchColumn('autonomous')">Autônomo</a>
            </div>
          </div>
          <input type="hidden" name="search_column" id="search_column" value="{{ request('search_column', '') }}">
          <input type="text" name="search" class="form-control" placeholder="Pesquisar..."
            value="{{ request('search') }}">
        </div>
    </div>
    <div class="row mb-3">
      <div class="col-md-3">
        <label for="per_page">Registros por página:</label>
        <select class="form-control mr-2" name="per_page" id="per_page" onchange="this.form.submit()">
          <option value="5" {{ request('per_page') == 5 ? 'selected' : '' }}>5</option>
          <option value="10" {{ request('per_page') == 10 ? 'selected' : '' }}>10</option>
          <option value="25" {{ request('per_page') == 25 ? 'selected' : '' }}>25</option>
          <option value="50" {{ request('per_page') == 50 ? 'selected' : '' }}>50</option>
          <option value="100" {{ request('per_page') == 100 ? 'selected' : '' }}>100</option>
        </select>
      </div>
    </div>
    </form>
    @if ($queries->count())
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">Tipo</th>
              <th class="text-center">Parâmetro</th>
              <th class="text-center">Nome</th>
              <th class="text-center">UF</th>
              <th class="text-center">Data solicitação</th>
              <th class="text-center">Consultante</th>
              <th class="text-center">Status</th>
              <th class="text-center"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($queries as $query)
              @php
                $formattedQuery = formatQueryRow($query);
              @endphp
              <tr class="selectable-row" data-id="{{ $formattedQuery['id'] }}"
                data-edit-url="{{ route('enterprises.show', $formattedQuery['id']) }}">
                <td class="text-center">{{ $formattedQuery['id'] }}</td>
                <td class="text-center">{{ $formattedQuery['type'] }}</td>
                <td class="text-center">{{ $formattedQuery['cpf'] }}</td>
                <td class="text-center">{{ $formattedQuery['name'] }}</td>
                <td class="text-center">{{ $formattedQuery['uf'] }}</td>
                <td class="text-center">{{ $formattedQuery['created_at'] }}</td>
                <td class="text-center">{{ $formattedQuery['user_name'] }}</td>
                <td class="text-center">{!! statusBox($formattedQuery['status']) !!}</td>
                <td class="text-center">
                  <a href="{{ route('aggregate.show', $formattedQuery['id']) }}">
                    <ion-icon name="search-outline" class="status-icon"></ion-icon>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      {{ $queries->appends(['per_page' => request('per_page')])->links('vendor.pagination.bootstrap-5') }}
    @endif
  </div>

  <script>
    function formatCpf($cpf) {
      return substr($cpf, 0, 3).
      '.'.substr($cpf, 3, 3).
      '.'.substr($cpf, 6, 3).
      '-'.substr($cpf, 9, 2);
    }
  </script>
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
