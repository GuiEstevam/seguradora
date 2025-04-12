@extends('layouts.main')
@section('title', 'Criar Pesquisa')
@section('content')
  <div id="search-create-container" class="col-md-8 offset-md-2 border">
    <form action="{{ route('research.store') }}" method="POST">
      @csrf
      <div class="form-group col-md-12">
        <label for="type">Tipo de Pesquisa:</label>
        <select name="type" id="type" class="form-control form-control-lg">
          <option value="individual_driver">Motorista</option>
          <option value="individual_vehicle">Veículo</option>
          <option value="unified">Unificada</option>
        </select>
      </div>
      <div id="driver-section" class="mt-3">
        <h5>Dados do Motorista</h5>
        <div class="row">
          <div class="col-md-4">
            <label for="cpf">CPF</label>
            <input type="text" name="cpf" class="form-control form-control-lg" id="cpf">
          </div>
          <div class="col-md-4">
            <label for="name">Nome</label>
            <input type="text" name="name" class="form-control form-control-lg">
          </div>
          <div class="col-md-4">
            <label for="birthDate">Data de Nascimento</label>
            <input type="date" name="birthDate" class="form-control form-control-lg">
          </div>
        </div>
      </div>
      <div id="vehicle-section" class="mt-3" style="display: none;">
        <h5>Dados do Veículo</h5>
        <div class="row">
          <div class="col-md-4">
            <label for="plate">Placa</label>
            <input type="text" name="plate" class="form-control form-control-lg">
          </div>
          <div class="col-md-4">
            <label for="renavam">RENAVAM</label>
            <input type="text" name="renavam" class="form-control form-control-lg">
          </div>
          <div class="col-md-4">
            <label for="uf">UF</label>
            <input type="text" name="uf" class="form-control form-control-lg">
          </div>
        </div>
      </div>
      <div class="form-group mt-3">
        <button type="submit" class="btn btn-primary">Criar Pesquisa</button>
      </div>
    </form>
  </div>

  <script>
    document.getElementById('type').addEventListener('change', function() {
      const type = this.value;
      document.getElementById('driver-section').style.display = type === 'individual_driver' || type === 'unified' ?
        'block' : 'none';
      document.getElementById('vehicle-section').style.display = type === 'individual_vehicle' || type === 'unified' ?
        'block' : 'none';
    });
  </script>
@endsection
