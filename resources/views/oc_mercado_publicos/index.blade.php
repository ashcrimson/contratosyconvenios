@extends('layouts.app')

@section('title_page',__('Orden Compra Mercado Publicos'))

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Orden Compra Mercado Publicos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item">
                            <a class="btn btn-outline-primary"
                                href="{!! route('ocMercadoPublicos.create') !!}">
                                <i class="fa fa-plus"></i>
                                <span class="d-none d-sm-inline">{{__('Realizar Carga')}}</span>
                            </a>
                            <a class="btn btn-outline-success"
                                href="{!! route('ocMercadoPublicos.create') !!}">
                                <i class="fa fa-plus"></i>
                                <span class="d-none d-sm-inline">{{__('Nueva')}}</span>
                            </a>
                        </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="container-fluid">
            <div class="clearfix"></div>



            <div class="clearfix"></div>
            <div class="card card-primary">
                <div class="card-body">
                        @include('oc_mercado_publicos.table')
                </div>
            </div>
            <div class="text-center">

            </div>
        </div>
    </div>
@endsection

