@extends('layouts.main')

@section('title', 'Pesquisa Unificada')

@section('content')
  <div id="search-create-container" class="col-md-8 offset-md-2 border">
    <div class="row mb-3">
      <div class="col d-flex justify-content-start">
        <form method="GET" action="{{ route('export.queries') }}">
          <input type="hidden" name="type" value="{{ request('type') }}">
          <input type="hidden" name="search" value="{{ request('search') }}">
          <input type="hidden" name="search_column" value="{{ request('search_column') }}">
          <button type="submit" class="btn btn-success mb-3">
            <ion-icon name="library"></ion-icon> Excel
          </button>
        </form>
      </div>
      <div class="col d-flex justify-content-end">
        <a href="{{ route('research.create') }}">
          <button class="btn btn-primary">
            Criar
          </button>
        </a>
      </div>
    </div>
    <div class="row mb-3">
      <form method="GET" action="{{ route('research.index') }}" id="filter-form">
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text" id="">Tipo de pesquisa</span>
          </div>
          <select name="type" id="type" class="form-control"
            onchange="document.getElementById('filter-form').submit()">
            <option value="">Todos</option>
            <option value="aggregated" {{ request('type') == 'aggregated' ? 'selected' : '' }}>Agregado</option>
            <option value="autonomous" {{ request('type') == 'autonomous' ? 'selected' : '' }}>Autônomo</option>
            <option value="fleet" {{ request('type') == 'fleet' ? 'selected' : '' }}>Frota</option>
          </select>
        </div>
        <div class="input-group mb-3">
          <input type="hidden" name="search_column" id="search_column" value="{{ request('search_column', '') }}">
          <input type="text" name="search" class="form-control" placeholder="Pesquisar..."
            value="{{ request('search') }}">
          <div class="input-group-prepend">
            <button class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false" id="searchColumnDropdown">Pesquisar por</button>
            <div class="dropdown-menu">
              @foreach ($searchColumns as $column => $label)
                <a class="dropdown-item" href="#"
                  onclick="setSearchColumn('{{ $column }}')">{{ $label }}</a>
              @endforeach
            </div>
          </div>
        </div>
      </form>
    </div>
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
                $research = $query->research;
              @endphp
              <tr class="selectable-row" data-id="{{ $query->id }}"
                data-edit-url="{{ route('enterprises.show', $query->id) }}">
                <td class="text-center">{{ $query->id }}</td>
                <td class="text-center">{{ $research ? typeFormat($research->type) : 'N/A' }}</td>
                <td class="text-center">{{ $research ? formatCpf($research->cpf) : 'N/A' }}</td>
                <td class="text-center">{{ $research ? $research->name : 'N/A' }}</td>
                <td class="text-center">{{ $research ? $research->rgUf : 'N/A' }}</td>
                <td class="text-center">{{ $query->created_at->format('d/m/Y H:i') }}</td>
                <td class="text-center">{{ $query->user->name }}</td>
                <td class="text-center">{!! statusBox($query->status) !!}</td>
                <td class="text-center">
                  <a href="{{ route('research.show', $query->id) }}">
                    <ion-icon name="search-outline" class="status-icon"></ion-icon>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      {{ $queries->appends(['per_page' => request('per_page', 10), 'search_column' => request('search_column'), 'search' => request('search'), 'type' => request('type')])->links('vendor.pagination.bootstrap-5') }}
    @endif
    <div class="row mb-3">
      <div class="col d-flex justify-content-end">
        <form method="GET" action="{{ route('research.index') }}">
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

    // Função para realizar a pesquisa via AJAX
    function search() {
      const searchColumn = document.getElementById('search_column').value;
      const searchValue = document.querySelector('input[name="search"]').value;
      const perPage = document.getElementById('per_page').value;

      const url = new URL(window.location.href);
      url.searchParams.set('search_column', searchColumn);
      url.searchParams.set('search', searchValue);
      url.searchParams.set('per_page', perPage);

      fetch(url)
        .then(response => response.text())
        .then(html => {
          const parser = new DOMParser();
          const doc = parser.parseFromString(html, 'text/html');
          const newContent = doc.querySelector('#search-create-container').innerHTML;
          document.querySelector('#search-create-container').innerHTML = newContent;
        })
        .catch(error => console.error('Error:', error));
    }

    // Adicionar evento de submit ao formulário para usar AJAX
    document.querySelector('form').addEventListener('submit', function(event) {
      event.preventDefault();
      search();
    });
  </script>
@endsection
