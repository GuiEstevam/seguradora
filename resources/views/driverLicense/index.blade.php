@extends('layouts.main')
@section('title', 'Cadastramento de Empresas')
@section('content')
  <div id="event-create-container" class="col-md-8 offset-md-2 border">
    <div class="row mb-3">
      <div class="col d-flex justify-content-end">
        <div class="btn-group mr-1" role="group">
          <a href="{{ route('driverLicense.create') }}">
            <button class="btn btn-primary">
              Criar
            </button>
          </a>
        </div>
        <div class="btn-group mr-3" role="group">
          <button id="edit-button" class="btn btn-primary">
            Editar
          </button>
        </div>
      </div>
    </div>
    @if ($queries)
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">CPF</th>
              <th class="text-center">Responsável</th>
              <th class="text-center">Status</th>
              <th class="text-center"></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($queries as $querie)
              <tr class="selectable-row" data-id="{{ $querie->id }}"
                data-edit-url="{{ route('enterprises.show', $querie->id) }}">
                <td class="text-center">{{ $querie->id }}</td>
                <td class="text-center">{{ formatCpf($querie->driverLicense->cpf) }}</td>
                <td class="text-center">{{ $querie->user->name }}</td>
                <td class="text-center">
                  @if ($querie->status == 'pending')
                    <div class="status-box pending">
                      <ion-icon name="hand-right-outline"></ion-icon> Pendente
                    </div>
                  @elseif ($querie->status == 'approved')
                    <div class="status-box approved">
                      <ion-icon name="checkmark-circle-outline"></ion-icon> Aprovado
                    </div>
                  @elseif ($querie->status == 'denied')
                    <div class="status-box denied">
                      <ion-icon name="alert-circle-outline"></ion-icon> Detalhes
                    </div>
                  @endif
                </td>
                {{-- <td class="text-center">{{ 'R$ ' . number_format($querie->value, 2, ',', '.') }}</td> --}}
                <td class="text-center">
                  <a href="{{ route('autonomous.show', $querie->id) }}">
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
