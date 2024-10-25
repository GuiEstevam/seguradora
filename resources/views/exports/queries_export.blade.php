@php
  function translateParameter($parameter)
  {
      $translations = [
          'Aggregated' => 'Agregado',
          'Autonomous' => 'Autonomo',
          'Vehicle' => 'Veículo',
          'Fleet' => 'Frota',
          'driverLicense' => 'Motorista',
      ];

      return $translations[$parameter] ?? $parameter;
  }

  function translateStatus($status)
  {
      $translations = [
          'pending' => 'Pendente',
          'approved' => 'Aprovado',
          'denied' => 'Negado',
      ];

      return $translations[$status] ?? $status;
  }
@endphp

<table>
  <thead>
    <tr>
      <th class="text-center">ID</th>
      <th class="text-center">CPF</th>
      <th class="text-center">Nome</th>
      <th class="text-center">UF</th>
      <th class="text-center">Data solicitação</th>
      <th class="text-center">Consultante</th>
      <th class="text-center">Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($queries as $query)
      <tr>
        <td class="text-center">{{ $query['id'] }}</td>
        <td class="text-center">{{ $query['cpf'] }}</td>
        <td class="text-center">{{ $query['name'] }}</td>
        <td class="text-center">{{ $query['rgUf'] }}</td>
        <td class="text-center">{{ $query['created_at'] }}</td>
        <td class="text-center">{{ $query['user_name'] }}</td>
        <td class="text-center">{{ $query['status'] }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
