@can('Ver Orden Compras')
    <span data-toggle="tooltip" title="Ver">

        <a href="#"  data-toggle="modal" data-target="#modalDetalleOrdenCompra{{$id}}" class='btn btn-default btn-sm'>
            <i class="fa fa-eye"></i>
        </a>
    </span>
@endcan

@can('Editar Orden Compras')
<a href="{{ route('ordenCompras.edit', $id) }}" data-toggle="tooltip" title="Editar" class='btn btn-outline-info btn-sm'>
    <i class="fa fa-edit"></i>
</a>
@endcan

@can('Eliminar Orden Compras')
<a href="#" onclick="deleteItemDt(this)" data-id="{{$id}}" data-toggle="tooltip" title="Eliminar" class='btn btn-outline-danger btn-sm'>
    <i class="fa fa-trash-alt"></i>
</a>


<form action="{{ route('ordenCompras.destroy', $id)}}" method="POST" id="delete-form{{$id}}">
    @method('DELETE')
    @csrf
</form>
@endcan
