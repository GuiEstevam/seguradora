@extends('layouts.main')
@section('title', 'Empresas')
@section('content')
  <div id="event-create-container" class="col-md-8 offset-md-2 border">
    <div class="row mb-3">
      <div class="col d-flex justify-content-end">
        @role('master')
          <a href="{{ route('enterprises.create') }}">
            <button class="btn btn-primary">
              Criar
            </button>
          </a>
        @endrole
      </div>
    </div>
    <div class="row mb-3">
      <form method="GET" action="{{ route('enterprises.index') }}">
        <div class="input-group col-md-12 mb-3">
          <div class="input-group-prepend">
            <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false" id="searchColumnDropdown">Pesquisar por:</button>
            <div class="dropdown-menu">
              <h6 class="dropdown-header">Pesquisar por</h6>
              <a class="dropdown-item" href="#" onclick="setSearchColumn('name')">Nome</a>
              <a class="dropdown-item" href="#" onclick="setSearchColumn('cnpj')">CNPJ</a>
              <a class="dropdown-item" href="#" onclick="setSearchColumn('responsible_name')">Responsável</a>
            </div>
          </div>
          <input type="hidden" name="search_column" id="search_column" value="{{ request('search_column', 'name') }}">
          <input type="text" name="search" class="form-control" placeholder="Pesquisar..."
            value="{{ request('search') }}">
        </div>
      </form>
    </div>
    @if ($enterprises->count())
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">Empresa</th>
              <th class="text-center">CNPJ</th>
              <th class="text-center">Responsável</th>
              <th class="text-center">Ações</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($enterprises as $enterprise)
              <tr class="selectable-row" data-id="{{ $enterprise->id }}"
                data-edit-url="{{ route('enterprises.show', $enterprise->id) }}">
                <td class="text-center">{{ $enterprise->id }}</td>
                <td class="text-center">{{ $enterprise->name }}</td>
                <td class="text-center">{{ $enterprise->cnpj }}</td>
                <td class="text-center">{{ $enterprise->responsibleUser->name }}</td>
                <td class="text-center">
                  <a href="{{ route('enterprises.show', $enterprise->id) }}">
                    <ion-icon name="search-outline" class="status-icon"></ion-icon>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      {{ $enterprises->appends(['per_page' => request('per_page'), 'search_column' => request('search_column'), 'search' => request('search')])->links('vendor.pagination.bootstrap-5') }}
    @endif
    <div class="row mb-3">
      <div class="col d-flex justify-content-end">
        <form method="GET" action="{{ route('enterprises.index') }}">
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
