@extends('layouts.search')

@php
  $title = 'Pesquisa - Autônomo';
  $createRoute = 'autonomous.create';
  $indexRoute = 'autonomous.index';
  $showRoute = 'autonomous.show';
  $searchColumns = [
      'name' => 'Nome',
      'cpf' => 'CPF',
      'rgUf' => 'RG UF',
      'vehiclePlate01' => 'Placa do Veículo',
  ];
@endphp
