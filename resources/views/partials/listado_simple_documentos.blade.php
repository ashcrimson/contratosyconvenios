@forelse($documentos as $documento)
    <a href='{{route('documentos.descargar',$documento->id)}}'>{{$documento->file_name}}</a>
    &nbsp;
@empty
{{--    sin documentos--}}
@endforelse
