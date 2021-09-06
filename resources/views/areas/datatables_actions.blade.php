{{--@can('Ver Areas')--}}
{{--<!-- <a href="{{ route('areas.show', $id) }}" data-toggle="tooltip" title="Ver" class='btn btn-default btn-sm'>--}}
{{--    <i class="fa fa-eye"></i>--}}
{{--</a> -->--}}
{{--@endcan--}}

@can('Editar Areas')
<a href="{{ route('areas.edit', $id) }}" data-toggle="tooltip" title="Editar" class='btn btn-outline-info btn-sm'>
    <i class="fa fa-edit"></i>
</a>
@endcan


@if($area->trashed())
    @can('Restaurar Areas')

        <a href="#" onclick="confirmRestore(this)" data-id="{{$id}}" data-toggle="tooltip" title="Restaurar" class='btn btn-outline-secondary btn-sm'>
            <i class="fa fa-trash-restore"></i>
        </a>


        <form action="{{ route('areas.restore', $id)}}" method="POST" id="restore-form{{$id}}">
            @method('POST')
            @csrf
        </form>
    @endcan
@else

    @can('Eliminar Areas')
        <a href="#" onclick="deleteItemDt(this)" data-id="{{$id}}" data-toggle="tooltip" title="Eliminar" class='btn btn-outline-danger btn-sm'>
            <i class="fa fa-trash-alt"></i>
        </a>


        <form action="{{ route('areas.destroy', $id)}}" method="POST" id="delete-form{{$id}}">
            @method('DELETE')
            @csrf
        </form>
    @endcan

@endif
