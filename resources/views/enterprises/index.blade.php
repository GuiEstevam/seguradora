@extends('layouts.main')
@section('title', 'Cadastramento de Empresas')
@section('content')
  <div id="event-create-container" class="col-md-8 offset-md-2 border">
    <div class="col-md mt-3 mb-3 text-right">
      <div class="btn-group" role="group">
        <a href="{{ route('enterprises.create') }}">
          <button class="btn btn-primary">
            Criar
          </button>
        </a>
      </div>
    </div>
    <div class="tab-pane {{ $user->role_id == 1 || $user->role_id == 2 ? 'active' : '' }}" id="personal" role="tabpanel"
      aria-labelledby="personal-tab">
      @if (count($enterprises) > 0)
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Empresa</th>
                <th class="text-center">CNPJ</th>
                <th class="text-center">Email</th>
                <th class="text-center">Responsável</th>
                <th class="text-center">Ações</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($enterprises as $enterprise)
                <tr>
                  <td class="text-center">{{ $enterprise->id }}</td>
                  <td class="text-center">{{ $enterprise->name }}</td>
                  <td class="text-center">{{ $enterprise->cnpj }}</td>
                  <td class="text-center">{{ $enterprise->responsibleUser->email }}</td>
                  <td class="text-center">{{ $enterprise->responsibleUser->name }}</td>
                  </a>
                  <td class="text-center">
                    <a href="/enterprises/show/{{ $enterprise->id }}" class="btn btn-primary mt-2">
                      <ion-icon name="eye"></ion-icon>
                    </a>
                    <a href="/enterprises/edit/{{ $enterprise->id }}" class="btn btn-primary mt-2">
                      <ion-icon name="create"></ion-icon>
                    </a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>
    @endif
  @endsection
