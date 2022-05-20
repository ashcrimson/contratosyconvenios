@extends('layouts.app')

@section('title_page',__('Carga Orden Compra Mercado Publicos'))
@include('layouts.plugins.bootstrap_fileinput')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Carga Orden Compra Mercado Publicos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a class="btn btn-outline-info float-right"
                               href="{{route('ocMercadoPublicos.index')}}">
                                <i class="fa fa-list" aria-hidden="true"></i>&nbsp;<span class="d-none d-sm-inline">{{__('Listado')}}</span>
                            </a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <div class="content">
        <div class="container-fluid">
            <div class="clearfix"></div>

            <div class="clearfix"></div>
            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="custom-content-below-importArchivo-tab" data-toggle="pill"
                       href="#custom-content-below-importArchivo" role="tab" aria-controls="custom-content-below-importArchivo"
                       aria-selected="true">Importar Archivo</a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" id="custom-content-below-historialCarga-tab" data-toggle="pill"--}}
{{--                       href="#custom-content-below-historialCarga" role="tab" aria-controls="custom-content-below-historialCarga"--}}
{{--                       aria-selected="false">Historial</a>--}}
{{--                </li>--}}
            </ul>
            <div class="card card-primary">
                <div class="card-body">
                    <div class="tab-content" id="custom-content-below-tabContent">
                        <div class="tab-pane fade active show" id="custom-content-below-importArchivo" role="tabpanel" aria-labelledby="custom-content-below-importArchivo-tab">
                            {!! Form::open([
                                'url' => route('ocMercadoPublicos.carga.store'),
                                'files' => true,
                                'role' => 'form',
                                'class' => 'form-loading-button',
                                'id' => 'formImportClientes'

                            ]) !!}
                            <div class="form-row">
                                <div class="form-group col-sm-12">
                                    <div class="alert alert-info alert-important" >
                                        Tipos de archivos permitidos: XLS, XLSX.
                                    </div>
                                </div>
                                <div class="form-group col-sm-12">

                                    <input name="file" id="file" type="file"  class="file-loading bs_fileinput">
                                </div>

                                <div class="form-group col-sm-12 text-right">
                                    <a href="{!! route('ocMercadoPublicos.index') !!}" class="btn btn-outline-secondary">
                                        Cancelar
                                    </a>
                                    &nbsp;
                                    <button type="submit" class="btn btn-outline-success">
                                        <i class="fa fa-floppy-o"></i> Guardar
                                    </button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <div class="tab-pane fade" id="custom-content-below-historialCarga" role="tabpanel" aria-labelledby="custom-content-below-historialCarga-tab">
                            <table class="table table-hover text-nowrap">
                                <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Nombre Archivo</th>
                                    <th>Total Registros</th>
                                    <th>Total Nuevos</th>
                                    <th>Usuario</th>
                                </tr>
                                </thead>
                                <tbody>
{{--                                @foreach(\App\Models\ClienteCarga::clientes()->get() as $carga)--}}
{{--                                    <tr>--}}
{{--                                        <td>{{$carga->fecha_carga}}</td>--}}
{{--                                        <td>{{$carga->nombre_archivo}}</td>--}}
{{--                                        <td>{{$carga->total_registros}}</td>--}}
{{--                                        <td>{{$carga->total_nuevos}}</td>--}}
{{--                                        <td>{{$carga->user->name}}</td>--}}
{{--                                    </tr>--}}
{{--                                @endforeach--}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">

            </div>
        </div>
    </div>

@endsection

@push('scripts')

    <script >

        $(function () {

            $("#file").fileinput({
                language: "es",
                maxFileCount: 1,
                maxFileSize: 4000,
                allowedFileExtensions: ["XLSX"],
                showUpload: false, // hide upload button
                showRemove: true, // hide remove button
                initialPreviewShowDelete: true,
                showDrag: false,
                theme: "fa",
            });

            $( "#formImportClientes" ).submit(function( event ) {
                Swal({
                    title: 'Espera por favor...',
                    allowEscapeKey: false,
                    allowOutsideClick: false
                });
                Swal.showLoading();
            });

        });

    </script>
@endpush
