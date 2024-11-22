@extends('layouts.main')
@section('title', 'Detalhes da Pesquisa')
@section('content')
  <div id="search-create-container" class="col-md-8 offset-md-2">
    <div class="row mb-3">
      <div class="col d-flex justify-content-end">
        <div class="btn-group" role="group">
          <a href="{{ route('research.index') }}" class="btn btn-secondary d-flex align-items-center">
            <ion-icon name="arrow-back-outline"></ion-icon>
            <span class="ms-1">Voltar</span>
          </a>
        </div>
      </div>
    </div>
    <div id="search-show-container" class="col-md-12">
      <h4>Dados cadastrais</h4>
      <hr>
      <div class="row mt-2">
        <div class="form-group col-md-4">
          <label class="form-label" for="name">Nome</label>
          <div>{{ $research->name }}</div>
        </div>
        <div class="form-group col-md-4">
          <label class="form-label" for="motherName">Nome da mãe:</label>
          <div>{{ $research->motherName }}</div>
        </div>
        <div class="form-group col-md-4">
          <label class="form-label" for="fatherName">Nome do pai</label>
          <div>{{ $research->fatherName }}</div>
        </div>
      </div>
      <div class="row mt-3">
        <div class="form-group col-md-4">
          <label class="form-label" for="cpf">CPF:</label>
          <div>{{ formatCpf($research->cpf) }}</div>
        </div>
        <div class="form-group col-md-4">
          <label class="form-label" for="birthDate">Data de Nascimento:</label>
          <div>{{ \Carbon\Carbon::parse($research->birthDate)->format('d/m/Y') }}</div>
        </div>
        <div class="form-group col-md-2">
          <label class="form-label" for="rgNumber">RG Número:</label>
          <div>{{ formatRg($research->rgNumber) }}</div>
        </div>
        <div class="form-group col-md-2">
          <label class="form-label" for="rgUf">RG UF:</label>
          <div>{{ $research->rgUf }}</div>
        </div>
      </div>
    </div>
    <hr>
    <h4>Dados da CNH</h4>
    <div class="row mt-2">
      <div class="form-group col-md-3">
        <label class="form-label" for="cnhRegisterNumber">CNH Número de Registro:</label>
        <div>{{ $research->cnhRegisterNumber }}</div>
      </div>
      <div class="form-group col-md-3">
        <label class="form-label" for="cnhSecurityNumber">CNH Número de Segurança:</label>
        <div>{{ $research->cnhSecurityNumber }}</div>
      </div>
      <div class="form-group col-md-2">
        <label class="form-label" for="cnhUf">CNH UF:</label>
        <div>{{ $research->cnhUf }}</div>
      </div>
    </div>
    <hr>
    @for ($i = 1; $i <= 4; $i++)
      @php
        $vehiclePlate = "vehiclePlate0$i";
        $vehicleRenavam = "vehicleRenavam0$i";
        $vehicleUf = "vehicleUf0$i";
        $vehicleOwnerDocument = "vehicleOwnerDocument0$i";
        $vehicleRntrcNumber = "vehicleRntrcNumber0$i";
      @endphp

      @if (
          $research->$vehiclePlate ||
              $research->$vehicleRenavam ||
              $research->$vehicleUf ||
              $research->$vehicleOwnerDocument ||
              $research->$vehicleRntrcNumber)
        <h4 class="mt-3">Veículo {{ $i }}</h4>
        <div class="row mt-2">
          <div class="form-group col-md-2">
            <label class="form-label" for="{{ $vehiclePlate }}">Placa</label>
            <div>{{ $research->$vehiclePlate }}</div>
          </div>
          <div class="form-group col-md-3">
            <label class="form-label" for="{{ $vehicleRenavam }}">Renavam</label>
            <div>{{ $research->$vehicleRenavam }}</div>
          </div>
          <div class="form-group col-md-2">
            <label class="form-label" for="{{ $vehicleUf }}">UF</label>
            <div>{{ $research->$vehicleUf }}</div>
          </div>
          <div class="form-group col-md-5">
            <label class="form-label" for="{{ $vehicleOwnerDocument }}">Documento do Proprietário</label>
            <div>{{ $research->$vehicleOwnerDocument }}</div>
          </div>
        </div>
        <div class="row mt-2">
          <div class="form-group col-md-2">
            <label class="form-label" for="{{ $vehicleRntrcNumber }}">RNTRC Número</label>
            <div>{{ $research->$vehicleRntrcNumber }}</div>
          </div>
        </div>
        <hr>
      @endif
    @endfor
    <div class="row mt-2 text-center">
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
@endsection
