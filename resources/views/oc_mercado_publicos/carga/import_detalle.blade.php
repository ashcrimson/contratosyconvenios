@extends('layouts.app')

@section('title_page',__('Carga Orden Compra Mercado Publicos'))
@include('layouts.plugins.bootstrap_fileinput')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detalle Carga Orden Compra</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a class="btn btn-outline-info float-right ml-1"
                               href="{{route('ocMercadoPublicos.carga')}}">
                                <i class="fa fa-list" aria-hidden="true"></i>&nbsp;<span class="d-none d-sm-inline">{{__('Listado')}}</span>
                            </a>
                            <a class="btn btn-outline-info float-right" id="btnRealizarCarga"
                               href="{{route('ocMercadoPublicos.carga.detalle.consulta.api', $ocMercadoPublicoCarga->id)}}">
                                <i class="fa fa-search" aria-hidden="true"></i>&nbsp;<span class="d-none d-sm-inline">{{__('Realizar Consulta API')}}</span>
                            </a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <div class="content">
        <div class="container-fluid">
            <div class="card card-primary card-outline">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-4 col-6">
                            <div class="description-block border-right">
                                <h5 class="description-header text-gray">{{ $totalDetallesSinConsultar }}</h5>
                                <span class="description-text text-gray">TOTAL SIN CONSULTAR</span>
                            </div>
                        </div>

                        <div class="col-sm-4 col-6">
                            <div class="description-block border-right">
                                <h5 class="description-header text-success">{{ $totalDetallesConsultadoExito }}</h5>
                                <span class="description-text text-success">TOTAL CONSULTADO EXITO</span>
                            </div>
                        </div>

                        <div class="col-sm-4 col-6">
                            <div class="description-block border-right">
                                <h5 class="description-header text-danger">{{ $totalDetallesConsultadoError }}</h5>
                                <span class="description-text text-danger">TOTAL CONSULTADO ERROR</span>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="col-md-12">
                        <table class="table table-hover text-nowrap" id="tableCargaDetalle">
                            <thead>
                            <tr>
                                <th>ORDEN COMPRA</th>
                                <th>CONTRATO ID</th>
                                <th>ESTADO CONSULTA</th>
                                <th>DETALLE CONSULTA</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ocMercadoPublicoCargaDetalles as $detalle)
                                <tr>
                                    <td>{{$detalle->orden_compra}}</td>
                                    <td>{{$detalle->contrato_id}}</td>
                                    <td>{{$detalle->estado_consulta}}</td>
                                    <td>{{$detalle->detalle_consulta}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>

        $(function () {

            $('#tableCargaDetalle').DataTable({
                dom: "<'row'<'col-sm-6'l><'col-sm-6'fT>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-6'i><'col-sm-6'p>>",
                renderer: 'bootstrap',
                oLanguage: { "sUrl": "//cdn.datatables.net/plug-ins/1.10.7/i18n/Spanish.json" }
            });

            $('#btnRealizarCarga').click(function () {
                Swal({
                    title: 'Espera por favor...',
                    allowEscapeKey: false,
                    allowOutsideClick: false
                });
                Swal.showLoading();
            });

        }

    </script>
@endpush
