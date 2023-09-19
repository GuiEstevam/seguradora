@extends('layouts.main')
@section('title', 'Pesquisa - Empresa')
@section('content')
  <div id="event-create-container" class="col-md-8 offset-md-2 border">
    <form action="/projetos" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="row">
        <div class="col">
          Pesquisa / Empresa
        </div>
      </div>
      <div class="row mt-2">
        <div class="col-md-3">
          <label for="image">CNPJ</label>
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
          <label for="image">Nome</label>
          <div class="input-group">
            <input type="text" class="form-control">
          </div>
        </div>
        <div class="col-md-2 mt-1">
          <label>UF</label>
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="form-group mt-3">
        <input type="submit" class="btn btn-primary" value="Enviar">
        <input type="submit" class="btn btn-light border" value="Limpar">
      </div>
    </form>
  </div>

@endsection
