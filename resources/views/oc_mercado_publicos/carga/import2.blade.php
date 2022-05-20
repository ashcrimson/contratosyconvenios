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
            <div class="card card-primary">
                <div class="card-body">
                    {!! Form::open([
                                'url' => route('ocMercadoPublicos.carga.store2'),
                                'files' => true,
                                'role' => 'form',
                                'class' => 'form-loading-button',
                                'id' => 'formImportOc2'
                            ]) !!}
                        <div class="form-row" id="obtenerOcMercadoPublico">
                        <div class="form-group col-sm-6">
                            <label>Número Orden Compra:</label>
                            <input name="no_oc" id="no_oc" type="text" class="form-control">
                        </div>

                        <div class="form-group col-sm-6">
                            <label>Ticket:</label>
                            <input name="ticket" id="ticket" type="text" value="B5E38DC9-CE33-43A4-A364-F5F6DAE82328"
                                   class="form-control" disabled>
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
            </div>
            <div class="text-center">

            </div>
        </div>
    </div>

@endsection

@push('scripts')

    <script>

        $( document ).ready(function() {
            console.log( "ready!" );
            $( "#formImportOc2" ).submit(function( event ) {
                Swal.fire({
                    title: 'Espera por favor...',
                    allowEscapeKey: false,
                    allowOutsideClick: false,
                    timerProgressBar: true,
                });

                Swal.showLoading();
            });
        });

        new Vue({
            el: '#obtenerOcMercadoPublico',
            name: 'obtenerOcMercadoPublico',
            created() {

            },
            data: {

            },
        });
    </script>
@endpush
