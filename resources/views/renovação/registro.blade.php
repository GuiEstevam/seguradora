@extends('layouts.main')
@section('title', 'Registros')
@section('content')
  <div class="row">
    <div class="col-md-5 offset-md-2 p-4">
      Renovação
    </div>
  </div>
  <div id="search-create-container" class="col-md-8 offset-md-2">
    <div class="row">
      <div id="renew" class="col-md-12">
        <h5>RENOVAÇÃO DE REGISTRO</h5>
        <p>Os registros que estiverem próximo do seu vencimento serão apresentandos nesta página.
        </p>
      </div>
    </div>
    <form action="/projetos" method="POST" enctype="multipart/form-data">
      @csrf
  </div>
  <div id="search-create-container" class="col-md-8 offset-md-2 mt-3">
    <div class="row mt-3">
      <div class="col-md-4">
        <label for="image">Critério</label>
        <div class="input-group">
          <select class="form-control">
            <option>Selecione</option>
          </select>
        </div>
      </div>
      <div class="col-md-4">
        <label for="image">Documento</label>
        <div class="input-group">
          <input type="text" class="form-control">
        </div>
      </div>
      <div class="col-md-3">
        <label for="image">Placa</label>
        <div class="input-group">
          <input type="text" class="form-control">
        </div>
      </div>
    </div>
    <div class="form-group mt-2">
      <input type="submit" class="btn btn-primary" value="Enviar">
      <input type="submit" class="btn btn-light border" value="Limpar">
    </div>
    </form>
  </div>

@endsection
