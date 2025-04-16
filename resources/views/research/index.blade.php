@extends('layouts.main')

@section('title', 'Pesquisa unificada')

@section('content')
  <div id="search-create-container" class="col-md-12 border">
    <div class="row mb-3">
      <div class="col d-flex justify-content-start">
        <form method="GET" action="{{ route('export.queries') }}">
          <input type="hidden" name="type" value="{{ request('type') }}">
          <input type="hidden" name="search" value="{{ request('search') }}">
          <input type="hidden" name="search_column" value="{{ request('search_column') }}">
          <button type="submit" class="btn btn-success mb-3">
            <ion-icon name="library"></ion-icon> <span class="ms-1">Excel</span>
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
      <div id="cards-container" class="row">
        @foreach ($queries as $query)
          @php
            $research = $query->research;
            $driverData = $research->driver_data ?? [];
            $vehicleData = $research->vehicle_data ?? [];
          @endphp
          <div class="col-md-3 col-lg-3 mb-3">
            <a href="{{ route('research.show', $query->id) }}" class="card-link">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">ID: {{ $query->id }}</h5>
                  <p><strong>Tipo:</strong>
                    {{ $research->subtype ? typeFormat($research->type, $research->subtype) : 'N/A' }}</p>
                  <p><strong>Parâmetro:</strong> {{ $driverData['cpf'] ?? ($vehicleData['plate'] ?? 'N/A') }}</p>
                  <p><strong>Nome:</strong> {{ $driverData['name'] ?? 'N/A' }}</p>
                  <p><strong>UF:</strong> {{ $driverData['rgUf'] ?? ($vehicleData['uf'] ?? 'N/A') }}</p>
                  <p><strong>Data:</strong> {{ $query->created_at->format('d/m/Y H:i') }}</p>
                </div>
                <div class="card-footer status-footer {{ strtolower($query->status) }}">
                  {!! statusBox($query->status) !!}
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
      {{ $queries->appends(['per_page' => request('per_page', 10), 'search_column' => request('search_column'), 'search' => request('search'), 'type' => request('type')])->links('vendor.pagination.bootstrap-5') }}
    @endif
  </div>

  <script>
    function setSearchColumn(column) {
      document.getElementById('search_column').value = column;
      const columnText = document.querySelector(`.dropdown-item[onclick="setSearchColumn('${column}')"]`).innerText;
      document.getElementById('searchColumnDropdown').innerText = columnText;
    }

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
