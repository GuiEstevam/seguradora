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
    @if ($queries)
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th class="text-center">ID</th>
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
            @foreach ($queries as $querie)
              <tr class="selectable-row" data-id="{{ $querie->id }}"
                data-edit-url="{{ route('enterprises.show', $querie->id) }}">
                <td class="text-center">{{ $querie->id }}</td>
                <td class="text-center">{{ $querie->aggregate ? formatCpf($querie->aggregate->cpf) : 'N/A' }}</td>
                <td class="text-center">{{ $querie->aggregate ? $querie->aggregate->name : 'N/A' }}</td>
                <td class="text-center">{{ $querie->aggregate ? $querie->aggregate->rgUf : 'N/A' }}</td>
                <td class="text-center">{{ $querie->aggregate->created_at->format('d/m/Y H:i') }}</td>
                <td class="text-center">{{ $querie->user->name }}</td>
                <td class="text-center">{!! statusBox($querie->status) !!}</td>
                {{-- <td class="text-center">{{ 'R$ ' . number_format($querie->value, 2, ',', '.') }}</td> --}}
                <td class="text-center">
                  <a href="{{ route('aggregate.show', $querie->id) }}">
                    <ion-icon name="search-outline" class="status-icon"></ion-icon>
                  </a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
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
@endsection
