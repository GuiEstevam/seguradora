@extends('layouts.main')
@section('title', 'Pesquisa - Veículo')
@section('content')
  <div id="search-create-container" class="col-md-8 offset-md-2 border">
    <form action="/projetos" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col">
          Pesquisa / Veículo
        </div>
      </div>
      <div class="row mt-3 mb-3">
        <div class="col-md-5">
          <label class="toggle">
            <input class="toggle-checkbox" type="checkbox">
            <div class="toggle-switch"></div>
            <span class="toggle-label">Veículo possui placa de outro país</span>
          </label>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <label for="image">Placa</label>
          <div class="input-group">
            <input type="text" class="form-control">
            <div class="input-group-append">
              <button class="btn btn-primary" type="button"><ion-icon class="sync"
                  name="sync-outline"></ion-icon>Verificar</button>
            </div>
          </div>
        </div>
        <div class="col-md-2 mt-3">
          <div class="input-group mt-3">
            <button class="btn btn-primary" type="button">Realizar consulta</button>
          </div>
        </div>
        <div class="col-md-3 mt-1">
          <label for="image">Renavam</label>
          <div class="input-group">
            <input type="text" class="form-control">
          </div>
        </div>
        <div class="col-md-2 mt-1">
          <label>UF</label>
          <input type="text" class="form-control">
        </div>
      </div>
      <hr>
      <h5>Dados do proprietário</h5>
      <div class="row">
        <div class="col-md-2 mt-1">
          <label for="flexRadioDefault1">Sexo</label>
          <div>
            <div class="form-check-inline">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
              <label class="form-check-label" for="flexRadioDefault1">
                PF
              </label>
            </div>
            <div class="form-check-inline">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
              <label class="form-check-label" for="flexRadioDefault2">
                PJ
              </label>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <label>CPF</label>
          <input type="text" class="form-control">
        </div>
        <div class="col-md-4">
          <label>Nome</label>
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="form-group mt-2">
        <input type="submit" class="btn btn-primary" value="Enviar">
        <input type="submit" class="btn btn-light border" value="Limpar">
      </div>
    </form>
  </div>

@endsection
