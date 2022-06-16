@can('Ver Oc Mercado Publicos')
<a href="{{ route('ocMercadoPublicos.show', $id) }}" data-toggle="tooltip" title="Ver" class='btn btn-default btn-sm'>
    <i class="fa fa-eye"></i>
</a>
@endcan

@can('Editar Oc Mercado Publicos')
<a href="{{ route('ocMercadoPublicos.edit', $id) }}" data-toggle="tooltip" title="Editar" class='btn btn-outline-info btn-sm'>
    <i class="fa fa-edit"></i>
</a>
@endcan

@can('Eliminar Oc Mercado Publicos')
<a href="#" onclick="deleteItemDt(this)" data-id="{{$id}}" data-toggle="tooltip" title="Eliminar" class='btn btn-outline-danger btn-sm'>
    <i class="fa fa-trash-alt"></i>
</a>


<form action="{{ route('ocMercadoPublicos.destroy', $id)}}" method="POST" id="delete-form{{$id}}">
    @method('DELETE')
    @csrf
</form>
@endcan

@can('Agregar Bitacora Oc Mercado Publicos')
    <a href="{{ route('ocMercadoPublicos.bitacora.vista', $id) }}" data-toggle="tooltip" title="Bitacora" class='btn btn-outline-secondary btn-sm'>
        <i class="fa fa-book-open"></i>
    </a>
@endcan
