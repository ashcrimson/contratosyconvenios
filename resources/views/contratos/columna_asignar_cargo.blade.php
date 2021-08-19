
@can("Asignar Contratos")
    @if(is_null($contrato->cargoAsignado) )

            <a href="#" class="btn btn-sm btn-warning btn-xs" data-target="#modalAsigna{{$id}}" data-toggle="modal">
                <i class="fa fa-plus-square"></i> Asignar
            </a>

            <div class="modal fade" id="modalAsigna{{$id}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" action="{{route('contratos.asignar',$id)}}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    Asignar Contrato
                                </h5>
                            </div>


                            <div class="modal-body">
                                <div class="table-responsive table-sm -md -lg -x">
{{--                                    @foreach ($contrato->cargo->cargos as $i => $cargo)--}}
                                    @foreach (\App\Models\Cargo::all() as $i => $cargo)
                                        <input type="radio" id="radio{{$i}}" name="cargo_id" value="{{$cargo->id}}" required>
                                        <label for="radio{{$i}}">{{$cargo->nombre}}</label><br>
                                    @endforeach
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    Cancelar
                                </button>
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-floppy-o"></i>
                                    Guardar
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    @else
        {{$contrato->cargoAsignado->nombre}}
    @endif
@endcan
