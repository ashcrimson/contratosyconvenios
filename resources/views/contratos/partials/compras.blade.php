<table class="table">
    <thead>
    <tr>
        <th>Id</th>
        <th>Fecha envio</th>
        <th>Numero</th>
        <th>Monto</th>
    </tr>
    </thead>
    <tbody>
    @foreach($contrato->compras->sortByDesc('id') as $compra)
    <tr>
        <td>{{$compra->id}}</td>
        <td>{{\Carbon\Carbon::parse($compra->fecha_envio)->format('d/m/Y')}}</td>
        <td>{{$compra->numero}}</td>
        <td>{{$compra->total}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
