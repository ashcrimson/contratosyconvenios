@can('Ver Contratos')
    <span data-toggle="tooltip" title="Ver">

        <a href="#" data-toggle="modal" data-target="#modalDetalleContrato{{$id}}" class='btn btn-default btn-sm'>
            <i class="fa fa-eye"></i>
        </a>
    </span>
@endcan

@can('Editar Contratos')
<a href="{{ route('contratos.edit', $id) }}" data-toggle="tooltip" title="Editar" class='btn btn-outline-info btn-sm'>
    <i class="fa fa-edit"></i>
</a>
@endcan

@can('Agregar Bitacora Contratos')
    <a href="{{ route('contratos.bitacora.vista', $id) }}" data-toggle="tooltip" title="Bitacora" class='btn btn-outline-secondary btn-sm'>
        <i class="fa fa-book-open"></i>
    </a>
@endcan

@can('Eliminar Contratos')
<a href="#" onclick="deleteItemDt(this)" data-id="{{$id}}" data-toggle="tooltip" title="Eliminar" class='btn btn-outline-danger btn-sm'>
    <i class="fa fa-trash-alt"></i>
</a>


<form action="{{ route('contratos.destroy', $id)}}" method="POST" id="delete-form{{$id}}">
    @method('DELETE')
    @csrf
</form>
@endcan
