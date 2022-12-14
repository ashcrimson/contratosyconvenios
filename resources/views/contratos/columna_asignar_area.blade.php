
@can("Asignar Contratos a area")
    @if(is_null($contrato->areaAsignado) )

{{--        @if($contrato->cargo->areas->count() > 0)--}}
            <a href="#" class="btn btn-sm btn-warning btn-xs" data-target="#modalAsigna{{$id}}" data-toggle="modal">
                <i class="fa fa-plus-square"></i> Asignar
            </a>

            <div class="modal fade" id="modalAsigna{{$id}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" action="{{route('contratos.asignar.area',$id)}}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title">
                                    Asignar Contrato
                                </h5>
                            </div>


                            <div class="modal-body">
                                <div class="table-responsive table-sm -md -lg -x">
{{--                                    @foreach ($contrato->cargo->areas as $i => $area)--}}
                                    @forelse ((Auth::user()->cargo->areas ?? []) as $i => $area)
                                        <input type="radio" id="radio{{$i}}" name="area_id" value="{{$area->id}}" required>
                                        <label for="radio{{$i}}">{{$area->nombre}}</label><br>
                                    @empty
                                        <h5 class="text-center text-info">
                                            El cargo del usuario no tiene areas para asignar
                                        </h5>
                                    @endforelse
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                    Cancelar
                                </button>
                                @if((Auth::user()->cargo->areas ?? false))
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-floppy-o"></i>
                                        Guardar
                                    </button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
{{--        @endif--}}
    @else
        Asignado a: {{$contrato->areaAsignado->nombre}}
    @endif
@endcan
