@extends('layouts.main')
@section('title', $title)
@section('content')
  <div id="event-create-container" class="col-md-8 offset-md-2">
    <div class="row mb-3">
      <div class="col d-flex justify-content-end">
        <div class="btn-group" role="group">
          <a href="{{ route($backRoute) }}" class="btn btn-secondary d-flex align-items-center">
            <ion-icon name="arrow-back-outline"></ion-icon>
            <span class="ms-1">Voltar</span>
          </a>
        </div>
      </div>
    </div>
    <h4>Dados cadastrais</h4>
    <div class="row mt-2">
      <div class="form-group col-md-3">
        <label class="form-label" for="cpf">CPF:</label>
        {{ formatCpf($entity->cpf) }}
      </div>
      <div class="form-group col-md-3">
        <label class="form-label" for="name">Nome:</label>
        {{ $entity->name }}
      </div>
      <div class="form-group col-md-3">
        <label class="form-label" for="motherName">Nome da Mãe:</label>
        {{ $entity->motherName }}
      </div>
    </div>
    <div class="row mt-2">
      <div class="form-group col-md-3">
        <label class="form-label" for="birthDate">Data de Nascimento:</label>
        {{ \Carbon\Carbon::parse($entity->birthDate)->format('d/m/Y') }}
      </div>
      <div class="form-group col-md-3">
        <label class="form-label" for="rgNumber">RG Número:</label>
        {{ formatRg($entity->rgNumber) }}
      </div>
      <div class="form-group col-md-3">
        <label class="form-label" for="rgUf">RG UF:</label>
        {{ $entity->rgUf }}
      </div>
      <div class="form-group col-md-3">
        <label class="form-label" for="cnhRegisterNumber">CNH Número de Registro:</label>
        {{ $entity->cnhRegisterNumber }}
      </div>
      <div class="row mt-2">
        <div class="form-group col-md-3">
          <label class="form-label" for="cnhSecurityNumber">CNH Número de Segurança:</label>
          {{ $entity->cnhSecurityNumber }}
        </div>
        <div class="form-group col-md-3">
          <label class="form-label" for="cnhUf">CNH UF:</label>
          {{ $entity->cnhUf }}
        </div>
      </div>
      @for ($i = 1; $i <= 4; $i++)
        @php
          $vehiclePlate = "vehiclePlate0$i";
          $vehicleRenavam = "vehicleRenavam0$i";
          $vehicleUf = "vehicleUf0$i";
          $vehicleOwnerDocument = "vehicleOwnerDocument0$i";
          $vehicleRntrcNumber = "vehicleRntrcNumber0$i";
          $vehicleFlagAntt = "vehicleFlagAntt0$i";
          $dProcessOnVehicle = "dProcessOnVehicle0$i";
        @endphp

        @if (
            $entity->$vehiclePlate ||
                $entity->$vehicleRenavam ||
                $entity->$vehicleUf ||
                $entity->$vehicleOwnerDocument ||
                $entity->$vehicleRntrcNumber ||
                $entity->$vehicleFlagAntt ||
                $entity->$dProcessOnVehicle)
          <h4>Veículo {{ $i }}</h4>
          <div class="row mt-2">
            <div class="form-group col-md-3">
              <label class="form-label" for="{{ $vehiclePlate }}">Placa</label>
              <input type="text" name="{{ $vehiclePlate }}" class="form-control form-control-lg"
                value="{{ $entity->$vehiclePlate }}" disabled>
            </div>
            <div class="form-group col-md-3">
              <label class="form-label" for="{{ $vehicleRenavam }}">Renavam</label>
              <input type="text" name="{{ $vehicleRenavam }}" class="form-control form-control-lg"
                value="{{ $entity->$vehicleRenavam }}" disabled>
            </div>
            <div class="form-group col-md-3">
              <label class="form-label" for="{{ $vehicleUf }}">UF</label>
              <input type="text" name="{{ $vehicleUf }}" class="form-control form-control-lg"
                value="{{ $entity->$vehicleUf }}" disabled>
            </div>
            <div class="form-group col-md-3">
              <label class="form-label" for="{{ $vehicleOwnerDocument }}">Documento do Proprietário</label>
              <input type="text" name="{{ $vehicleOwnerDocument }}" class="form-control form-control-lg"
                value="{{ $entity->$vehicleOwnerDocument }}" disabled>
            </div>
          </div>
          <div class="row mt-2">
            <div class="form-group col-md-3">
              <label class="form-label" for="{{ $vehicleRntrcNumber }}">RNTRC Número</label>
              <input type="text" name="{{ $vehicleRntrcNumber }}" class="form-control form-control-lg"
                value="{{ $entity->$vehicleRntrcNumber }}" disabled>
            </div>
            <div class="form-group col-md-3">
              <label class="form-label" for="{{ $vehicleFlagAntt }}">Flag ANTT</label>
              <input type="text" name="{{ $vehicleFlagAntt }}" class="form-control form-control-lg"
                value="{{ $entity->$vehicleFlagAntt }}" disabled>
            </div>
            <div class="form-group col-md-3">
              <label class="form-label" for="{{ $dProcessOnVehicle }}">Processo no Veículo</label>
              <input type="text" name="{{ $dProcessOnVehicle }}" class="form-control form-control-lg"
                value="{{ $entity->$dProcessOnVehicle }}" disabled>
            </div>
          </div>
        @endif
      @endfor
      <div class="row mt-2 text-center">
        <hr>
        <div class="col-md-6">
          <label for="created_at">Criado em</label>
          {{ \Carbon\Carbon::parse($entity->created_at)->format('d/m/Y H:i') }}
        </div>
        <div class="col-md-6">
          <label for="updated_at">Atualizado em</label>
          {{ \Carbon\Carbon::parse($entity->updated_at)->format('d/m/Y H:i') }}
        </div>
      </div>
    </div>
  @endsection
