<table class="table">
    <thead>
    <tr>
        <th>id</th>
        <th>Codigo</th>
        <th>Descripcion</th>
        <th>Saldo</th>
    </tr>
    </thead>
    <tbody>
    @foreach($contrato->items->sortByDesc('id') as $item)
    <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->codigo}}</td>
        <td>{{$item->text}}</td>
        <td>{{$item->saldo}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
