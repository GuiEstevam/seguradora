@extends('layouts.main')
@section('title', 'Registros')
@section('content')
  <div class="row">
    <div class="col-md-5 offset-md-2 p-4">
      Renovação
    </div>
  </div>
  <div id="search-create-container" class="col-md-8 offset-md-2">

    <!-- Tabs navs -->
    <ul class="nav nav-tabs nav-fill mb-3" id="ex1" role="tablist">
      <li class="nav-item" role="presentation">
        <a class="nav-link active" id="ex2-tab-1" data-mdb-toggle="tab" href="#ex2-tabs-1" role="tab"
          aria-controls="ex2-tabs-1" aria-selected="true">Link</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="ex2-tab-2" data-mdb-toggle="tab" href="#ex2-tabs-2" role="tab"
          aria-controls="ex2-tabs-2" aria-selected="false">Very very very very long link</a>
      </li>
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="ex2-tab-3" data-mdb-toggle="tab" href="#ex2-tabs-3" role="tab"
          aria-controls="ex2-tabs-3" aria-selected="false">Another link</a>
      </li>
    </ul>
    <!-- Tabs navs -->

    <!-- Tabs content -->
    <div class="tab-content" id="ex2-content">
      <div class="tab-pane fade show active" id="ex2-tabs-1" role="tabpanel" aria-labelledby="ex2-tab-1">
        Tab 1 content
      </div>
      <div class="tab-pane fade" id="ex2-tabs-2" role="tabpanel" aria-labelledby="ex2-tab-2">
        Tab 2 content
      </div>
      <div class="tab-pane fade" id="ex2-tabs-3" role="tabpanel" aria-labelledby="ex2-tab-3">
        Tab 3 content
      </div>
    </div>
    <!-- Tabs content -->
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
