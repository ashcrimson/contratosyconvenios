@extends('layouts.app')

@section('title_page',__('Oc Mercado Public Tipo Pago'))

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('Oc Mercado Public Tipo Pago')}}</h1>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="content">
        <div class="card card-primary">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-sm-12">
                        @include('oc_mercado_public_tipo_pagos.show_fields')
                        <a href="{{ route('ocMercadoPublicTipoPagos.index') }}" class="btn btn-default">
                        {{__('Back')}}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
