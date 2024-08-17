@extends('layouts.main')
@section('title', 'Detalhes do Autônomo')
@section('content')
  <div id="event-create-container" class="col-md-8 offset-md-2">
    <div class="row mb-3">
      <div class="col d-flex justify-content-end">
        <div class="btn-group" role="group">
          <a href="{{ route('aggregate.index') }}" class="btn btn-secondary d-flex align-items-center">
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
        {{ formatCpf($aggregate->cpf) }}
      </div>
      <div class="form-group col-md-3">
        <label class="form-label" for="name">Nome:</label>
        {{ $aggregate->name }}
      </div>
      <div class="form-group col-md-3">
        <label class="form-label" for="motherName">Nome da Mãe:</label>
        {{ $aggregate->motherName }}
      </div>
    </div>
    <div class="row mt-2">
      <div class="form-group col-md-3">
        <label class="form-label" for="birthDate">Data de Nascimento:</label>
        {{ \Carbon\Carbon::parse($aggregate->birthDate)->format('d/m/Y') }}
      </div>
      <div class="form-group col-md-3">
        <label class="form-label" for="rgNumber">RG Número:</label>
        {{ formatRg($aggregate->rgNumber) }}
      </div>
      <div class="form-group col-md-3">
        <label class="form-label" for="rgUf">RG UF:</label>
        {{ $aggregate->rgUf }}
      </div>
      <div class="form-group col-md-3">
        <label class="form-label" for="cnhRegisterNumber">CNH Número de Registro:</label>
        {{ $aggregate->cnhRegisterNumber }}
      </div>
      <div class="row mt-2">
        <div class="form-group col-md-3">
          <label class="form-label" for="cnhSecurityNumber">CNH Número de Segurança:</label>
          {{ $aggregate->cnhSecurityNumber }}
        </div>
        <div class="form-group col-md-3">
          <label class="form-label" for="cnhUf">CNH UF:</label>
          {{ $aggregate->cnhUf }}
        </div>
        <div class="form-group col-md-3">
          <label class="form-label" for="personFlagAntt">Flag ANTT:</label>
          {{ $aggregate->personFlagAntt }}
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
            $aggregate->$vehiclePlate ||
                $aggregate->$vehicleRenavam ||
                $aggregate->$vehicleUf ||
                $aggregate->$vehicleOwnerDocument ||
                $aggregate->$vehicleRntrcNumber ||
                $aggregate->$vehicleFlagAntt ||
                $aggregate->$dProcessOnVehicle)
          <h4>Veículo {{ $i }}</h4>
          <div class="row mt-2">
            <div class="form-group col-md-3">
              <label class="form-label" for="{{ $vehiclePlate }}">Placa</label>
              <input type="text" name="{{ $vehiclePlate }}" class="form-control form-control-lg"
                value="{{ $aggregate->$vehiclePlate }}" disabled>
            </div>
            <div class="form-group col-md-3">
              <label class="form-label" for="{{ $vehicleRenavam }}">Renavam</label>
              <input type="text" name="{{ $vehicleRenavam }}" class="form-control form-control-lg"
                value="{{ $aggregate->$vehicleRenavam }}" disabled>
            </div>
            <div class="form-group col-md-3">
              <label class="form-label" for="{{ $vehicleUf }}">UF</label>
              <input type="text" name="{{ $vehicleUf }}" class="form-control form-control-lg"
                value="{{ $aggregate->$vehicleUf }}" disabled>
            </div>
            <div class="form-group col-md-3">
              <label class="form-label" for="{{ $vehicleOwnerDocument }}">Documento do Proprietário</label>
              <input type="text" name="{{ $vehicleOwnerDocument }}" class="form-control form-control-lg"
                value="{{ $aggregate->$vehicleOwnerDocument }}" disabled>
            </div>
          </div>
          <div class="row mt-2">
            <div class="form-group col-md-3">
              <label class="form-label" for="{{ $vehicleRntrcNumber }}">RNTRC Número</label>
              <input type="text" name="{{ $vehicleRntrcNumber }}" class="form-control form-control-lg"
                value="{{ $aggregate->$vehicleRntrcNumber }}" disabled>
            </div>
            <div class="form-group col-md-3">
              <label class="form-label" for="{{ $vehicleFlagAntt }}">Flag ANTT</label>
              <input type="text" name="{{ $vehicleFlagAntt }}" class="form-control form-control-lg"
                value="{{ $aggregate->$vehicleFlagAntt }}" disabled>
            </div>
            <div class="form-group col-md-3">
              <label class="form-label" for="{{ $dProcessOnVehicle }}">Processo no Veículo</label>
              <input type="text" name="{{ $dProcessOnVehicle }}" class="form-control form-control-lg"
                value="{{ $aggregate->$dProcessOnVehicle }}" disabled>
            </div>
          </div>
        @endif
      @endfor
      <div class="row mt-2 text-center">
        <hr>
        <div class="col-md-6">
          <label for="created_at">Criado em</label>
          {{ \Carbon\Carbon::parse($aggregate->created_at)->format('d/m/Y H:i') }}
        </div>
        <div class="col-md-6">
          <label for="updated_at">Criado em</label>
          {{ \Carbon\Carbon::parse($aggregate->updated_at)->format('d/m/Y H:i') }}
        </div>
      </div>
    </div>
  @endsection
