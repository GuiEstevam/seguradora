<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="/css/style.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="/css/navbar.css" media="screen" />
  {{-- Bootstrap --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  {{-- Fonts Google --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.13.0/Sortable.min.js"></script>
  <script src="{{ asset('js/cep.js') }}"></script>

  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>

  <title>@yield('title')</title>
</head>
<header>
  <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-center">
    <a class="navbar-brand" href="/">
      <img class="logo" src="/img/logo.jpg" alt="LOGO" />
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
            <a class="dropdown-item" href="{{ route('driverLicense.index') }}">Autônomo</a>
            <a class="dropdown-item" href="{{ route('driverLicense.index') }}">Agregado</a>
            <a class="dropdown-item" href="{{ route('driverLicense.index') }}">Frota</a>
            <a class="dropdown-item" href="{{ route('driverLicense.index') }}">Individual</a>
            <a class="dropdown-item" href="{{ route('driverLicense.index') }}">Veículo</a>
            <a class="dropdown-item" href="{{ route('driverLicense.index') }}">Empresa</a>
            <a class="dropdown-item" href="{{ route('driverLicense.index') }}">Processo</a>
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
            <a class="dropdown-item" href="{{ route('users.index') }}">Usuários</a>
            <a class="dropdown-item" href="{{ route('enterprises.index') }}">Empresas</a>
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
      <div class="col-md-6"> Empresa: {{ Auth::user()->enterprise->name }} </div>
      <div class="col-md-6"> Usuário: {{ Auth::user()->name }}</div>
    </div>
  </div>
</header>

<body>
  {{-- @if ($errors->any())
    <script>
      $(document).ready(function() {
        $('#myModal').modal('show');
      });
    </script>
  @endif

  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Erros de validação</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          @if ($errors->any())
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        </div>
      </div>
    </div>
  </div> --}}
  <main>
    <div class="modal fade" id="messageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Mensagem</h5>
          </div>
          <div class="modal-body">
            @if (session('msg'))
              {{ session('msg') }}
            @endif
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>

    @yield('content')

    {{-- <div class="row">
      @if (session('msg'))
        <p class="msg col-md-8 offset-md-2 mt-2 mb-3">{{ session('msg') }}</p>
      @endif

    </div> --}}
  </main>
  {{-- <div class="row mb-3">
      @if (session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
      @endif
      @if (session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
      @endif
      @if (session('msg'))
        <p class="msg">
          {{ session('msg') }}
        </p>
      @endif
    </div> --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
{{-- <script>
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
</script> --}}

<script>
  $(document).ready(function() {
    @if (session('msg'))
      $('#messageModal').modal('show');
    @endif
  });
</script>

</html>
