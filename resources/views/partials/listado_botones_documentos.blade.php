@forelse($documentos as $documento)
    <span class="badge badge-pill badge-light " style="border: solid;border-color: #0c84ff;border-width: 0.5px">

        <span class="text-uppercase">
            {{$documento->file_name}}
        </span>
        &nbsp;
        <a href='{{route('documentos.descargar',$documento->id)}}' class="btn btn-sm btn-outline-success">
            <i class="fa fa-download"></i>
        </a>
        &nbsp;

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target="#modalDeleteDocu{{$documento->id}}">
              <i class="fa fa-trash-alt"></i>
        </button>


        <!-- Modal -->
        <div class="modal fade" id="modalDeleteDocu{{$documento->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
             aria-hidden="true">
        	<div class="modal-dialog modal-dialog-centered" role="document">
        		<div class="modal-content">
        			<div class="modal-body">
        				<h2 class="swal2-title">¿Estás seguro?</h2>
                        <div class="swal2-html-container">
                            ¡No podrás revertir esto!
                        </div>
                        <div class="swal2-actions">
                            <a href="{{route('documentos.eliminar',$documento->id)}}" type="button" class="btn btn-primary mr-1" >
                                Si, elimínalo!
                            </a>
                            &nbsp;
                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                Cancel
                            </button>
                        </div>
        			</div>
        		</div>
        	</div>
        </div>


        <form action="{{ route('documentos.eliminar',$documento->id)}}" method="POST" id="delete-form{{$documento->id}}">
            @method('DELETE')
            @csrf
        </form>
    </span>
    &nbsp;
@empty
{{--    sin documentos--}}
@endforelse
