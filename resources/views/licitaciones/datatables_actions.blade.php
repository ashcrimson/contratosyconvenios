@can('Ver Licitacions')
    <span data-toggle="tooltip" title="Ver">

        <a href="#"  data-toggle="modal" data-target="#modalDetalleLicitacion{{$id}}" class='btn btn-default btn-sm'>
            <i class="fa fa-eye"></i>
        </a>
    </span>

    <!-- Modal -->
    <div class="modal fade" id="modalDetalleLicitacion{{$id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modelTitleId">
                        Licitacion
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="form-group col-sm-12">
                            @include('licitaciones.show_fields')
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

@can('Editar Licitacions')
<a href="{{ route('licitaciones.edit', $id) }}" data-toggle="tooltip" title="Editar" class='btn btn-outline-info btn-sm'>
    <i class="fa fa-edit"></i>
</a>
@endcan

@can('Eliminar Licitacions')
<a href="#" onclick="deleteItemDt(this)" data-id="{{$id}}" data-toggle="tooltip" title="Eliminar" class='btn btn-outline-danger btn-sm'>
    <i class="fa fa-trash-alt"></i>
</a>


<form action="{{ route('licitaciones.destroy', $id)}}" method="POST" id="delete-form{{$id}}">
    @method('DELETE')
    @csrf
</form>
@endcan
