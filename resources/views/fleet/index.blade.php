@extends('layouts.search')

@php
  $title = 'Pesquisa - Frota';
  $createRoute = 'fleet.create';
  $indexRoute = 'fleet.index';
  $showRoute = 'fleet.show';
  $searchColumns = [
      'name' => 'Nome',
      'cpf' => 'CPF',
      'rgUf' => 'RG UF',
      'vehiclePlate01' => 'Placa do Veículo',
  ];
@endphp
