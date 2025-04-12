@extends('layouts.main')
@section('title', 'Detalhes da Pesquisa')
@section('content')
  <div id="search-create-container" class="col-md-8 offset-md-2">
    <div class="row mb-3">
      <div class="col d-flex justify-content-end">
        <a href="{{ route('research.index') }}" class="btn btn-primary d-flex align-items-center">
          <ion-icon name="arrow-back-outline"></ion-icon>
          <span class="ms-1">Voltar</span>
        </a>
      </div>
    </div>

    <h5>Detalhes da Pesquisa</h5>
    <div id="search-show-container" class="col-md-12 mb-3">
      <div class="row">
        <div class="form-group col-md-6">
          <label class="form-label"><strong>Tipo:</strong></label>
          <div>{{ ucfirst($research->type) }}</div>
        </div>
        <div class="form-group col-md-6">
          <label class="form-label"><strong>Data de Criação:</strong></label>
          <div>{{ $research->created_at->format('d/m/Y H:i') }}</div>
        </div>
      </div>
    </div>

    {{-- Dados do Motorista --}}
    @if ($research->type === 'individual_driver' || $research->type === 'unified')
      <h5 class="mt-3">Dados do Motorista</h5>
      <div id="driver-data-container" class="col-md-12 mb-3">
        <div class="row">
          <div class="form-group col-md-4">
            <label class="form-label"><strong>CPF:</strong></label>
            <div>{{ $research->driver_data['cpf'] ?? 'N/A' }}</div>
          </div>
          <div class="form-group col-md-4">
            <label class="form-label"><strong>Nome:</strong></label>
            <div>{{ $research->driver_data['name'] ?? 'N/A' }}</div>
          </div>
          <div class="form-group col-md-4">
            <label class="form-label"><strong>Data de Nascimento:</strong></label>
            <div>{{ $research->driver_data['birthDate'] ?? 'N/A' }}</div>
          </div>
        </div>
        <div class="row mt-3">
          <div class="form-group col-md-4">
            <label class="form-label"><strong>RG Número:</strong></label>
            <div>{{ $research->driver_data['rgNumber'] ?? 'N/A' }}</div>
          </div>
          <div class="form-group col-md-4">
            <label class="form-label"><strong>RG UF:</strong></label>
            <div>{{ $research->driver_data['rgUf'] ?? 'N/A' }}</div>
          </div>
        </div>
      </div>
    @endif

    {{-- Dados do Veículo --}}
    @if ($research->type === 'individual_vehicle' || $research->type === 'unified')
      <h5 class="mt-3">Dados do Veículo</h5>
      <div id="vehicle-data-container" class="col-md-12 mb-3">
        <div class="row">
          <div class="form-group col-md-4">
            <label class="form-label"><strong>Placa:</strong></label>
            <div>{{ $research->vehicle_data['plate'] ?? 'N/A' }}</div>
          </div>
          <div class="form-group col-md-4">
            <label class="form-label"><strong>RENAVAM:</strong></label>
            <div>{{ $research->vehicle_data['renavam'] ?? 'N/A' }}</div>
          </div>
          <div class="form-group col-md-4">
            <label class="form-label"><strong>UF:</strong></label>
            <div>{{ $research->vehicle_data['uf'] ?? 'N/A' }}</div>
          </div>
        </div>
      </div>
    @endif

    {{-- Dados da CNH --}}
    @if ($research->type === 'individual_driver' || $research->type === 'unified')
      <h5 class="mt-3">Dados da CNH</h5>
      <div id="cnh-data-container" class="col-md-12 mb-3">
        <div class="row">
          <div class="form-group col-md-4">
            <label class="form-label"><strong>Número de Registro:</strong></label>
            <div>{{ $research->driver_data['cnhRegisterNumber'] ?? 'N/A' }}</div>
          </div>
          <div class="form-group col-md-4">
            <label class="form-label"><strong>Número de Segurança:</strong></label>
            <div>{{ $research->driver_data['cnhSecurityNumber'] ?? 'N/A' }}</div>
          </div>
          <div class="form-group col-md-4">
            <label class="form-label"><strong>UF:</strong></label>
            <div>{{ $research->driver_data['cnhUf'] ?? 'N/A' }}</div>
          </div>
        </div>
      </div>
    @endif

    {{-- Infrações --}}
    @if (!empty($research->driver_data['infractions']))
      <h5 class="mt-3">Infrações</h5>
      <div id="infractions-container" class="col-md-12 mb-3">
        <div class="row">
          @foreach ($research->driver_data['infractions'] as $infraction)
            <div class="form-group col-md-4">
              <label class="form-label"><strong>Código:</strong></label>
              <div>{{ $infraction['code'] ?? 'N/A' }}</div>
            </div>
            <div class="form-group col-md-4">
              <label class="form-label"><strong>Data:</strong></label>
              <div>{{ \Carbon\Carbon::parse($infraction['date'])->format('d/m/Y') ?? 'N/A' }}</div>
            </div>
            <div class="form-group col-md-4">
              <label class="form-label"><strong>Pontos:</strong></label>
              <div>{{ $infraction['points'] ?? 'N/A' }}</div>
            </div>
            <div class="form-group col-md-12">
              <label class="form-label"><strong>Descrição:</strong></label>
              <div>{{ $infraction['description'] ?? 'N/A' }}</div>
            </div>
          @endforeach
        </div>
      </div>
    @endif

    {{-- Suspensões --}}
    @if (!empty($research->driver_data['suspensions']))
      <h5 class="mt-3">Suspensões</h5>
      <div id="suspensions-container" class="col-md-12 mb-3">
        <div class="row">
          @foreach ($research->driver_data['suspensions'] as $suspension)
            <div class="form-group col-md-6">
              <label class="form-label"><strong>Motivo:</strong></label>
              <div>{{ $suspension['reason'] ?? 'N/A' }}</div>
            </div>
            <div class="form-group col-md-3">
              <label class="form-label"><strong>Início:</strong></label>
              <div>{{ \Carbon\Carbon::parse($suspension['start_date'])->format('d/m/Y') ?? 'N/A' }}</div>
            </div>
            <div class="form-group col-md-3">
              <label class="form-label"><strong>Término:</strong></label>
              <div>{{ \Carbon\Carbon::parse($suspension['end_date'])->format('d/m/Y') ?? 'N/A' }}</div>
            </div>
          @endforeach
        </div>
      </div>
    @endif

    {{-- Restrições --}}
    @if (!empty($research->vehicle_data['restrictions']))
      <h5 class="mt-3">Restrições</h5>
      <div id="restrictions-container" class="col-md-12 mb-3">
        <div class="row">
          @foreach ($research->vehicle_data['restrictions'] as $restriction)
            <div class="form-group col-md-4">
              <label class="form-label"><strong>Tipo:</strong></label>
              <div>{{ $restriction['type'] ?? 'N/A' }}</div>
            </div>
            <div class="form-group col-md-4">
              <label class="form-label"><strong>Início:</strong></label>
              <div>{{ \Carbon\Carbon::parse($restriction['start_date'])->format('d/m/Y') ?? 'N/A' }}</div>
            </div>
            <div class="form-group col-md-4">
              <label class="form-label"><strong>Status:</strong></label>
              <div>{{ $restriction['status'] ?? 'N/A' }}</div>
            </div>
          @endforeach
        </div>
      </div>
    @endif

    {{-- Informações Adicionais --}}
    <div id="search-footer-container" class="col-md-12">
      <div class="row mt-3 text-center">
        <div class="col-md-6">
          <label for="created_at">Criado em</label>
          <div>{{ \Carbon\Carbon::parse($research->created_at)->format('d/m/Y H:i') }}</div>
        </div>
        <div class="col-md-6">
          <label for="updated_at">Atualizado em</label>
          <div>{{ \Carbon\Carbon::parse($research->updated_at)->format('d/m/Y H:i') }}</div>
        </div>
      </div>
    </div>
  </div>
@endsection
