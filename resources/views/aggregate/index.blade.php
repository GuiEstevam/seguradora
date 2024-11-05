@extends('layouts.search')

@php
  $title = 'Pesquisa - Agregado';
  $createRoute = 'aggregate.create';
  $indexRoute = 'aggregate.index';
  $showRoute = 'aggregate.show';
  $searchColumns = [
      'name' => 'Nome',
      'cpf' => 'CPF',
      'rgUf' => 'RG UF',
      'vehiclePlate01' => 'Placa do Veículo',
  ];
@endphp
