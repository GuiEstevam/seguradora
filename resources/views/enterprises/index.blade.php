@extends('layouts.main')
@section('title', 'Empresas')
@section('content')
  <div id="event-create-container" class="col-md-8 offset-md-2 border">
    <div class="row mb-3">
      <div class="col d-flex justify-content-end">
        @role('master')
          <div class="btn-group mr-1" role="group">
            <a href="{{ route('enterprises.create') }}">
              <button class="btn btn-primary">
                Criar
              </button>
            </a>
          </div>
        @endrole
        <div class="btn-group mr-3" role="group">
          <button id="edit-button" class="btn btn-primary">
            Editar
          </button>
        </div>
      </div>
    </div>
    @if (count($enterprises) > 0)
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">Empresa</th>
              <th class="text-center">CNPJ</th>
              <th class="text-center">Responsável</th>
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
