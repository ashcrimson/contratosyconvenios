<div class="card card-outline card-primary col-lg-12">
    <div class="card-header py-0 px-1">
        <h3 class="card-title">FECHAS</h3>

        <div class="card-tools">

            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
        <!-- /.card-tools -->
    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-lg-12">

                <div class="form-row">

                    <!-- Fecha Creacion Field -->
                    <div class="form-group col-sm-4">
                        {!! Form::label('fecha_creacion', 'Fecha Creación:') !!}
                        {!! Form::date('fecha_creacion', onlyDate($ocMercadoPublico->ocMercadoPublicoFechas->fecha_creacion ?? null), ['class' => 'form-control','id'=>'fecha_creacion']) !!}
                    </div>

                    <!-- Fecha Envio Field -->
                    <div class="form-group col-sm-4">
                        {!! Form::label('fecha_envio', 'Fecha Envió:') !!}
                        {!! Form::date('fecha_envio', onlyDate($ocMercadoPublico->ocMercadoPublicoFechas->fecha_envio ?? null), ['class' => 'form-control','id'=>'fecha_envio']) !!}
                    </div>

                    <!-- Fecha Aceptacion Field -->
                    <div class="form-group col-sm-4">
                        {!! Form::label('fecha_aceptacion', 'Fecha Aceptación:') !!}
                        {!! Form::date('fecha_aceptacion', onlyDate($ocMercadoPublico->ocMercadoPublicoFechas->fecha_aceptacion ?? null), ['class' => 'form-control','id'=>'fecha_aceptacion']) !!}
                    </div>

                    <!-- Fecha Cancelacion Field -->
                    <div class="form-group col-sm-4">
                        {!! Form::label('fecha_cancelacion', 'Fecha Cancelación:') !!}
                        {!! Form::date('fecha_cancelacion', onlyDate($ocMercadoPublico->ocMercadoPublicoFechas->fecha_cancelacion ?? null), ['class' => 'form-control','id'=>'fecha_cancelacion']) !!}
                    </div>

                    <!-- Fecha Ultima Modificacion Field -->
                    <div class="form-group col-sm-4">
                        {!! Form::label('fecha_ultima_modificacion', 'Fecha Ultima Modificación:') !!}
                        {!! Form::date('fecha_ultima_modificacion', onlyDate($ocMercadoPublico->ocMercadoPublicoFechas->fecha_ultima_modificacion ?? null), ['class' => 'form-control','id'=>'fecha_ultima_modificacion']) !!}
                    </div>

                </div>

            </div>

        </div>

    </div>
</div>
