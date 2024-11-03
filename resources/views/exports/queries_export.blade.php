<table>
  <thead>
    <tr>
      <th class="text-center">ID</th>
      <th class="text-center">Tipo</th>
      <th class="text-center">Parâmetro</th>
      <th class="text-center">Nome</th>
      <th class="text-center">UF</th>
      <th class="text-center">Data da solicitação</th>
      <th class="text-center">Consultante</th>
      <th class="text-center">Status</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($queries as $query)
      <tr>
        <td class="text-center">{{ $query['id'] }}</td>
        <td class="text-center">{{ $query['type'] }}</td>
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
