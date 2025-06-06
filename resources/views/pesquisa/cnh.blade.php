@extends('layouts.main')
@section('title', 'Pesquisa - Autônomo')
@section('content')
  <div id="search-create-container" class="col-md-8 offset-md-2 border">
    <form action="/projetos" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col">
          Pesquisa / CNH
        </div>
      </div>
      <div class="row">
        <div class="col-md-5">
          <label for="image">CPF</label>
          <div class="input-group">
            <input type="text" class="form-control">
            <div class="input-group-append">
              <button class="btn btn-primary" type="button"><ion-icon class="sync" name="sync-outline"></ion-icon>
            </div>
          </div>
        </div>
        <div class="col-md-5 mt-3">
          <div class="input-group mt-3">
            <button class="btn btn-primary" type="button">Realizar consulta</button>
          </div>
        </div>
      </div>
      <div class="row mt-2">
        <div class="col-md-4">
          <label for="image">Nome</label>
          <div class="input-group">
            <input type="text" class="form-control">
          </div>
        </div>
        <div class="col-md-4 mt-1">
          <label for="flexRadioDefault1">Sexo</label>
          <div>
            <div class="form-check-inline">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
              <label class="form-check-label" for="flexRadioDefault1">
                Masculino
              </label>
            </div>
            <div class="form-check-inline">
              <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
              <label class="form-check-label" for="flexRadioDefault2">
                Feminino
              </label>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <label for="compliance_date"> Data </label>
          <input type="date" name="compliance_date" class="form-control" value="{{ date('Y-m-d') }}" required />
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-md-4">
          <label for="image">Nome da mãe</label>
          <div class="input-group">
            <input type="text" class="form-control">
          </div>
        </div>
        <div class="col-md-4">
          <label for="image">Nome do pai</label>
          <div class="input-group">
            <input type="text" class="form-control">
          </div>
        </div>
      </div>
      <hr>
      <h5>Carteira nacional de habilitação (CNH)</h5>
      <div class="row">
        <div class="col-md-4 mt-1">
          <label>CNH</label>
          <input type="text" class="form-control">
        </div>
        <div class="col-md-2">
          <label>UF</label>
          <input type="text" class="form-control">
        </div>
        <div class="col-md-4 mt-1">
          <label>Data da 1ª habilitação</label>
          <input type="date" name="compliance_date" class="form-control" value="{{ date('Y-m-d') }}" required />
        </div>
        <div class="col-md-4 mt-2">
          <label>Data de validade</label>
          <input type="date" name="compliance_date" class="form-control" value="{{ date('Y-m-d') }}" required />
        </div>
        <div class="col-md-4 mt-2">
          <label>Código de segurança</label>
          <input type="text" class="form-control">
        </div>
        <div class="col-md-1 mt-2">
          <label>Tipo</label>
          <select class="form-control">
            <option>A</option>
            <option>B</option>
            <option>C</option>
            <option>D</option>
          </select>
        </div>
      </div>
      <div class="form-group mt-2">
        <input type="submit" class="btn btn-primary" value="Enviar">
        <input type="submit" class="btn btn-light border" value="Limpar">
      </div>
    </form>
  </div>

@endsection
