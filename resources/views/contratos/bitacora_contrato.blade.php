@extends('layouts.app')

@section('title_page',__('Contrato'))
@include('layouts.plugins.bootstrap_fileinput')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('Bitacora de contrato')}}</h1>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">Info Contrato</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @include('contratos.show_fields')

            </div>
            <!-- /.card-body -->
        </div>

        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">Bitacora</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <form action="{{route('contratos.bitacora.store',$contrato->id)}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">

{{--                        <div class="form-group col-sm-6">--}}
{{--                            {!! Form::label('titulo', 'Titulo:') !!}--}}
{{--                            {!! Form::text('titulo', null, ['class' => 'form-control']) !!}--}}
{{--                        </div>--}}

                        <div class="form-group col-sm-12" style="padding: 0px; margin: 0px"></div>

                        <div class="form-group col-sm-6">
                            {!! Form::label('descripcion', 'Glosa:') !!}
                            {!! Form::textarea('descripcion', null, ['class' => 'form-control','row' => 2]) !!}
                        </div>

                        <div class="form-group col-sm-6 ">
                            {!! Form::label('adjunto', 'Adjuntar archivo bitácora.:') !!}
                            {!! Form::file('adjunto', ['class' => 'form-control file']) !!}
                        </div>

                        <div class="form-group text-center col-sm-12">
                            <button type="submit" class="btn btn-success">
                                {{__('Guardar')}} <i class="fa fa-arrow-down"></i>
                            </button>
                        </div>



                    </div>

                </form>

                <div class="form-group col-sm-12">
                    <table class="table table-striped table-bordered table-sm">
                        <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Glosa</th>
                            <th>Documento</th>
                            <th>Ingresada por</th>
                            <th>Accion</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($contrato->bitacoras as $bitacora)
                            <tr>
                                <td>{{$bitacora->created_at}}</td>
                                <td>{{$bitacora->descripcion}}</td>
                                <td>
                                    @if($bitacora->getLastDocumento())
                                    <a href='{{route('documentos.descargar',$bitacora->getLastDocumento()->id)}}'
                                       data-togle='tooltip'
                                       title='{{$bitacora->getLastDocumento()->file_name}}'>
                                        {{$bitacora->getLastDocumento()->file_name}}
                                    </a>
                                    @endif
                                </td>
                                <td>{{$bitacora->userCrea->name}}</td>
                                <td>


{{--                                    @can('Editar Bitacoras')--}}
{{--                                        <a href="{{ route('contratos.bitacora.edit', $contrato->id) }}" data-toggle="tooltip" title="Editar" class='btn btn-outline-info btn-sm'>--}}
{{--                                            <i class="fa fa-edit"></i>--}}
{{--                                        </a>--}}
{{--                                    @endcan--}}


                                    @can('Eliminar Bitacora Contratos')
                                        <a href="#" onclick="deleteItemDt(this)" data-id="{{$contrato->id}}" data-toggle="tooltip" title="Eliminar" class='btn btn-outline-danger btn-sm'>
                                            <i class="fa fa-trash-alt"></i>
                                        </a>


                                        <form action="{{ route('contratos.bitacora.destroy', ['contrato' => $contrato->id,'bitacora' => $bitacora->id])}}" method="POST" id="delete-form{{$contrato->id }}">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                    @endcan

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="10">
                                    Ningun registro agregado
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
