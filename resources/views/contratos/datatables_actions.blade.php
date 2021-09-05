@can('Ver Contratos')
    <span data-toggle="tooltip" title="Ver">

        <a href="#"  data-toggle="modal" data-target="#modalDetalleContrato{{$id}}" class='btn btn-default btn-sm'>
            <i class="fa fa-eye"></i>
        </a>
    </span>

    <!-- Modal -->
    <div class="modal fade" id="modalDetalleContrato{{$id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelTitleId">
                    Detalle de contrato {{$contrato->id_mercado_publico}}
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-1">
                <div class="container-fluid">
                    <div class="form-group col-sm-12 px-1">


                        <div class="card card-primary card-outline card-outline-tabs">
                            <div class="card-header p-0 border-bottom-0">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active"
                                           data-toggle="pill"
                                           href="#custom-tabs-info{{$contrato->id}}"
                                           role="tab"
                                           aria-selected="true">
                                            Contrato
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           data-toggle="pill"
                                           href="#custom-tabs-items{{$contrato->id}}"
                                           role="tab"
                                           aria-selected="false">
                                            Items
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link"
                                           data-toggle="pill"
                                           href="#custom-tabs-compras{{$contrato->id}}"
                                           role="tab"
                                           aria-selected="false">
                                            Compras
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content" >
                                    <div class="tab-pane fade show active"
                                         id="custom-tabs-info{{$contrato->id}}"
                                         role="tabpanel"
                                    >
                                        @include('contratos.show_fields')
                                    </div>
                                    <div class="tab-pane fade"
                                         id="custom-tabs-items{{$contrato->id}}"
                                         role="tabpanel"
                                    >
                                        @include('contratos.partials.items')
                                    </div>
                                    <div class="tab-pane fade"
                                         id="custom-tabs-compras{{$contrato->id}}"
                                         role="tabpanel"
                                    >
                                        @include('contratos.partials.compras')
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
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

@can('Admin detalles contrato')
    <a href="{{ route('contratos.admin.items', $id) }}" data-toggle="tooltip" title="Bitacora" class='btn btn-outline-info btn-sm'>
        <i class="fa fa-list"></i>
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
