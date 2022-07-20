<table class="table">
    <thead>
    <tr>
        <!-- <th>Id</th> -->
        <th>Numero</th>
        <th>Fecha envio</th>
        <th>Estado</th>
        <th>Monto</th>
    </tr>
    </thead>
    <tbody>
    @foreach($contrato->compras as $compra)
    <tr>
       <!--  <td>{{$compra->id}}</td> -->
        <td>{{$compra->numero}}</td>
        <td>{{\Carbon\Carbon::parse($compra->fecha_envio)->format('d/m/Y')}}</td>
        <td>{{$compra->nombre_estado}}</td>
        <td>${{number_format($compra->total,0,',','.')}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
