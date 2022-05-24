<div class="card card-outline card-primary col-lg-12">
    <div class="card-header py-0 px-1">
        <h3 class="card-title">PROVEEDOR</h3>

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

                    <div class="form-group col-sm-4">
                        {!! Form::label('codigo', 'Codigo:') !!}
                        {!! Form::text('codigo', $ocMercadoPublico->ocMercadoPublicoProveedor->codigo ?? null, ['class' => 'form-control','id'=>'fecha_creacion']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        {!! Form::label('nombre', 'Nombre:') !!}
                        {!! Form::text('nombre', $ocMercadoPublico->ocMercadoPublicoProveedor->nombre ?? null, ['class' => 'form-control','id'=>'fecha_creacion']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        {!! Form::label('actividad', 'Actividad:') !!}
                        {!! Form::text('actividad', $ocMercadoPublico->ocMercadoPublicoProveedor->actividad ?? null, ['class' => 'form-control','id'=>'fecha_creacion']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        {!! Form::label('codigo_sucursal', 'Codigo Sucursal:') !!}
                        {!! Form::text('codigo_sucursal', $ocMercadoPublico->ocMercadoPublicoProveedor->codigo_sucursal ?? null, ['class' => 'form-control','id'=>'fecha_creacion']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        {!! Form::label('nombre_sucursal', 'Nombre Sucursal:') !!}
                        {!! Form::text('nombre_sucursal', $ocMercadoPublico->ocMercadoPublicoProveedor->nombre_sucursal ?? null, ['class' => 'form-control','id'=>'fecha_creacion']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        {!! Form::label('rut_sucursal', 'RUT Sucursal:') !!}
                        {!! Form::text('rut_sucursal', $ocMercadoPublico->ocMercadoPublicoProveedor->rut_sucursal ?? null, ['class' => 'form-control','id'=>'fecha_creacion']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        {!! Form::label('direccion', 'Direccion:') !!}
                        {!! Form::text('direccion', $ocMercadoPublico->ocMercadoPublicoProveedor->direccion ?? null, ['class' => 'form-control','id'=>'fecha_creacion']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        {!! Form::label('comuna', 'Comuna:') !!}
                        {!! Form::text('comuna', $ocMercadoPublico->ocMercadoPublicoProveedor->comuna ?? null, ['class' => 'form-control','id'=>'fecha_creacion']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        {!! Form::label('region', 'Region:') !!}
                        {!! Form::text('region', $ocMercadoPublico->ocMercadoPublicoProveedor->region ?? null, ['class' => 'form-control','id'=>'fecha_creacion']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        {!! Form::label('pais', 'Pais:') !!}
                        {!! Form::text('pais', $ocMercadoPublico->ocMercadoPublicoProveedor->pais ?? null, ['class' => 'form-control','id'=>'fecha_creacion']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        {!! Form::label('nombre_contacto', 'Nombre Contacto:') !!}
                        {!! Form::text('nombre_contacto', $ocMercadoPublico->ocMercadoPublicoProveedor->nombre_contacto ?? null, ['class' => 'form-control','id'=>'fecha_creacion']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        {!! Form::label('cargo_contacto', 'Cargo Contacto:') !!}
                        {!! Form::text('cargo_contacto', $ocMercadoPublico->ocMercadoPublicoProveedor->cargo_contacto ?? null, ['class' => 'form-control','id'=>'fecha_creacion']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        {!! Form::label('fono_contacto', 'Fono Contacto:') !!}
                        {!! Form::text('fono_contacto', $ocMercadoPublico->ocMercadoPublicoProveedor->fono_contacto ?? null, ['class' => 'form-control','id'=>'fecha_creacion']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        {!! Form::label('mail_contacto', 'Mail Contacto:') !!}
                        {!! Form::text('mail_contacto', $ocMercadoPublico->ocMercadoPublicoProveedor->mail_contacto ?? null, ['class' => 'form-control','id'=>'fecha_creacion']) !!}
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
