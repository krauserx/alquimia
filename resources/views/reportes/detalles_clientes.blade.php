<h1>Customer List</h1>
<table>
  <thead>
    <tr>
            <th>#</th>
            <th>Factura</th>
            <th>Producto</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $customer)
      <tr>
        <td>{{ $customer->id }}</td>
        <td>{{ $customer->c_texto }}</td>
        <td>{{ $customer->c_descripcion }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
