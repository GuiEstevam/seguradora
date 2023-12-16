<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/css/style.css" media="screen" />
  {{-- Bootstrap --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  {{-- Fonts Google --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.13.0/Sortable.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">


  <title>@yield('title')</title>
</head>
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-center">
    <a class="navbar-brand" href="/">
      <img class="logo" src="/img/logo.png" alt="LOGO" />
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse text-center" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Pesquisa
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="/pesquisa/autonomo">Autônomo</a>
            <a class="dropdown-item" href="/pesquisa/agregado">Agregado</a>
            <a class="dropdown-item" href="/pesquisa/frota">Frota</a>
            <a class="dropdown-item" href="/pesquisa/individual">Individual</a>
            <a class="dropdown-item" href="/pesquisa/veiculo">Veículo</a>
            <a class="dropdown-item" href="/pesquisa/empresa">Empresa</a>
            <a class="dropdown-item" href="/pesquisa/boletim">Boletim de Ocorrência</a>
            <a class="dropdown-item" href="/pesquisa/cnh">CNH</a>
            <a class="dropdown-item" href="/pesquisa/excel">Pesquisas por Excel</a>
            <a class="dropdown-item" href="/pesquisa/consulta">Consultas Disponíveis</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/renovacao/registro">Renovação</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Relatório
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="/relatorio/recentes">Registros Recentes</a>
            <a class="dropdown-item" href="#">Buscar Registros</a>
            <a class="dropdown-item" href="#">Relatório Excel</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Cadastro
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Histórico de viagens</a>
            <a class="dropdown-item" href="#">Inclusão blacklist</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Gerenciamento
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="#">Cadastro facial</a>
            <a class="dropdown-item" href="{{ route('enterprises.index') }}">Cadastramento de empresa</a>
            <a class="dropdown-item" href="#">Cadastro facial</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/departaments/listagem">Treinamento</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <form action="/logout" method="POST">
            @csrf
            <a class="nav-link" href="/logout"
              onclick="event.preventDefault();
                  this.closest('form').submit();">
              SAIR
            </a>
          </form>
        </li>
      </ul>
    </div>
  </nav>
  </div>
  <div id="subnavbar" class="col-md-8 offset-md-2 navbar-sub">
    <div class="row">
      <div class="col-md-6"> Usuário: {{ Auth::user()->enterprise->name }} </div>
      <div class="col-md-6"> Usuário: {{ Auth::user()->name }}</div>
    </div>
  </div>
</header>

<body>
  <div class="container-fluid">
    <div class="row mb-3">
      @if ($errors->any())
        <div style="position:absolute; top:0px; width:100%; background:red">
          <pre>
    @foreach ($errors->all() as $erro)
{{ $erro }} <br>
@endforeach
</pre>
        </div>
      @endif
      {{-- @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif
      @if (session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
        @endif --}}
      {{-- @if (session('msg'))
        <p class="msg">
          {{ session('msg') }}
        </p> --}}
    </div>
    @yield('content')
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
<script>
  $.fn.select2.defaults.set("theme", "bootstrap5");
  $(document).ready(function() {
    $('#client_id').select2();
  });

  $(document).ready(function() {
    $('#classification_id').select2();
  });

  $(document).ready(function() {
    $('#searchType').select2();
  });
  $(document).ready(function() {
    $('#searchData').select2();
  });
</script>

</html>
