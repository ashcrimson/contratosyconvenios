@can('Ver Orden Compras')
    <span data-toggle="tooltip" title="Ver">

        <a href="#"  data-toggle="modal" data-target="#modalDetalleOrdenCompra{{$id}}" class='btn btn-default btn-sm'>
            <i class="fa fa-eye"></i>
        </a>
    </span>

    <!-- Modal -->
    <div class="modal fade" id="modalDetalleOrdenCompra{{$id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelTitleId">
                        Detalle orden compra
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group col-sm-12">
                            @include('orden_compras.show_fields')
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endcan

@can('Editar Orden Compras')
<a href="{{ route('ordenCompras.edit', $id) }}" data-toggle="tooltip" title="Editar" class='btn btn-outline-info btn-sm'>
    <i class="fa fa-edit"></i>
</a>
@endcan

@if($ordenCompra->puedeAnular())
    @can('Anular Orden Compras')
    <a href="#" onclick="deleteItemDt(this)" data-id="{{$id}}" data-toggle="tooltip" title="Anular" class='btn btn-outline-danger btn-sm'>
        <i class="fa fa-undo"></i>
    </a>


    <form action="{{ route('ordenCompras.anular', $id)}}" method="POST" id="delete-form{{$id}}">
        @method('PATCH')
        @csrf
    </form>
    @endcan
@endif

@can('Agregar Bitacora Orden Compras')
    <a href="{{ route('ordenCompras.bitacora.vista', $id) }}" data-toggle="tooltip" title="Bitacora" class='btn btn-outline-secondary btn-sm'>
        <i class="fa fa-book-open"></i>
    </a>
@endcan
