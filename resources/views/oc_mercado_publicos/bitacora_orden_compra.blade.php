@extends('layouts.app')

@section('title_page',__('Bitácora de OC Mercado Publico'))
@include('layouts.plugins.bootstrap_fileinput')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('Bitácora de OC Mercado Publico')}}</h1>
                </div>
                <div class="col ">
                    <a class="btn btn-outline-info float-right"
                       href="{{route('ocMercadoPublicos.index')}}">
                        <i class="fa fa-backward" aria-hidden="true"></i>&nbsp;
                        <span class="d-none d-sm-inline">{{__('Volver Atrás')}}</span>
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="content">
        <div class="card card-outline card-success">
            <!-- /.card-header -->
            <div class="card-body">
                @include('oc_mercado_publicos.partials.show_mini_fields')

            </div>
            <!-- /.card-body -->

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
                    @forelse($ocMercadoPublico->bitacoras as $bitacora)
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

                                @can('Eliminar Bitacora Oc Mercado Publicos')
                                    <a href="#" onclick="deleteItemDt(this)" data-id="{{$bitacora->id}}" data-toggle="tooltip" title="Eliminar" class='btn btn-outline-danger btn-sm'>
                                        <i class="fa fa-trash-alt"></i>
                                    </a>

                                    <form action="{{ route('ocMercadoPublicos.bitacora.destroy', ['ocMercadoPublico' => $ocMercadoPublico->id,'bitacora' => $bitacora->id])}}" method="POST" id="delete-form{{$bitacora->id }}">
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

        <div class="card card-outline card-success">
            <div class="card-header">
                <h3 class="card-title">Nueva Bitacora</h3>

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

                <form action="{{route('ocMercadoPublicos.bitacora.store',$ocMercadoPublico->id)}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">

                        {{--                        <div class="form-group col-sm-6">--}}
                        {{--                            {!! Form::label('titulo', 'Titulo:') !!}--}}
                        {{--                            {!! Form::text('titulo', null, ['class' => 'form-control']) !!}--}}
                        {{--                        </div>--}}

                        <div class="form-group col-sm-12" style="padding: 0px; margin: 0px"></div>

                        <div class="form-group col-sm-5 ">
                            {!! Form::label('adjunto', 'Adjuntar archivo bitácora.:') !!}
                            {!! Form::file('adjunto', ['class' => 'form-control file']) !!}
                        </div>
                        <div class="form-group col-sm-7">
                            {!! Form::label('descripcion', 'Glosa:') !!}
                            {!! Form::textarea('descripcion', null, ['class' => 'form-control','row' => 2]) !!}
                        </div>


                        <div class="form-group text-center col-sm-12">
                            <a  href="{{route('ocMercadoPublicos.index')}}" type="submit" class="btn btn-secondary">
                                {{__('Cancelar')}}
                            </a>
                            &nbsp;
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-save"></i> &nbsp;
                                {{__('Guardar')}}
                            </button>
                        </div>



                    </div>

                </form>

            </div>
            <!-- /.card-body -->
        </div>
    </div>
@endsection
