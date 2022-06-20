@can('Ver Oc Mercado Public Tipo Pagos')
<a href="{{ route('ocMercadoPublicTipoPagos.show', $id) }}" data-toggle="tooltip" title="Ver" class='btn btn-default btn-sm'>
    <i class="fa fa-eye"></i>
</a>
@endcan

@can('Editar Oc Mercado Public Tipo Pagos')
<a href="{{ route('ocMercadoPublicTipoPagos.edit', $id) }}" data-toggle="tooltip" title="Editar" class='btn btn-outline-info btn-sm'>
    <i class="fa fa-edit"></i>
</a>
@endcan

@can('Eliminar Oc Mercado Public Tipo Pagos')
<a href="#" onclick="deleteItemDt(this)" data-id="{{$id}}" data-toggle="tooltip" title="Eliminar" class='btn btn-outline-danger btn-sm'>
    <i class="fa fa-trash-alt"></i>
</a>


<form action="{{ route('ocMercadoPublicTipoPagos.destroy', $id)}}" method="POST" id="delete-form{{$id}}">
    @method('DELETE')
    @csrf
</form>
@endcan
