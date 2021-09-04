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
                <div class="col ">
                    <a class="btn btn-outline-info float-right"
                       href="{{route('contratos.index')}}">
                        <i class="fa fa-backward" aria-hidden="true"></i>&nbsp;
                        <span class="d-none d-sm-inline">{{__('Volver Atraz')}}</span>
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="card card-outline card-success">
            <!-- /.card-header -->
            <div class="card-body">
                {!! Form::label('id_mercado_publico', 'Id Mercado Publico:') !!}
                {!! $contrato->id_mercado_publico !!}<br>

                <!-- Tipo Id Field -->
                {!! Form::label('tipo_id', 'Tipo') !!}
                {!! $contrato->tipo->nombre !!}<br>


                @if($contrato->tipo->id != \App\Models\ContratoTipo::TRATO_DIRECTO)
                <!-- Licitacion Id Field -->
                    {!! Form::label('licitacion_id', 'Licitacion') !!}
                    {!! $contrato->licitacion->numero ?? '' !!}<br>
                @endif

            <!-- Proveedor Id Field -->
                {!! Form::label('proveedor_id', 'Proveedor') !!}
                {!! $contrato->proveedor->razon_social !!}<br>

                <!-- Objeto Field -->
                {!! Form::label('objeto', 'Objeto:') !!}
                {!! $contrato->objeto !!}<br>

                <br>


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

                <form action="{{route('contratos.bitacora.store',$contrato->id)}}" method="post" enctype="multipart/form-data">
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
                            <a  href="{{route('contratos.index')}}" type="submit" class="btn btn-secondary">
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
