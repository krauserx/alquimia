<h1>Pedidos</h1>
<table>
  <thead>
    <tr>
            <th>#</th>
            <th>Factura</th>
            <th>Producto</th>
                                                <th>Cantidad</th>
                                                <th>Precio</th>
                                                <th>Estado</th>
                                                <th>Fecha de Entrega</th>
                                                <th>Entregado</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $customer)
      <tr>
        <td>{{ $customer['id'] }}</td>
        <td>{{ $customer['factura_id'] }}</td>
        <td>{{ $customer['producto'] }}</td>
        <td>{{ $customer['cantidad'] }}</td>
        <td>{{ $customer['precio'] }}</td>
        <td>@if ($customer['estado'] ==1)
            {{'Aprobado'}}
            @endif
            @if ($customer['estado'] ==2)
            {{'Rechazado'}}
            @endif
            @if ($customer['estado'] ==3)
            {{'Pendiente'}}
            @endif
    </td>
        <td>{{ $customer['fechaaentrega'] }}</td>
        <td>{{ $customer['fechaentrega'] }}</td>

      </tr>
    @endforeach
  </tbody>
</table>
