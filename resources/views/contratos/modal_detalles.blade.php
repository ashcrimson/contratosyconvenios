<!-- Button trigger modal -->
<a href="#" type="button"  data-toggle="modal" data-target="#modalDetalleContrato{{$id}}">
  {{$id}}
</a>

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
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="form-group col-sm-12">
                        @include('contratos.show_fields')
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>