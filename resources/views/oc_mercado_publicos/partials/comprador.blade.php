<div class="card card-outline card-primary col-lg-12">
    <div class="card-header py-0 px-1">
        <h3 class="card-title">COMPRADOR</h3>

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
                        {!! Form::label('codigo_organismo', 'Codigo Organimos:') !!}
                        {!! Form::text('codigo_organismo_comprador', $ocMercadoPublico->ocMercadoPublicoComprador->codigo_organismo ?? null, ['class' => 'form-control', isset($isShow) ? 'disabled' : '']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        {!! Form::label('nombre_organismo', 'Nombre Organimos:') !!}
                        {!! Form::text('nombre_organismo_comprador', $ocMercadoPublico->ocMercadoPublicoComprador->nombre_organismo ?? null, ['class' => 'form-control', isset($isShow) ? 'disabled' : '']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        {!! Form::label('rut_unidad', 'RUT Unidad:') !!}
                        {!! Form::text('rut_unidad_comprador', $ocMercadoPublico->ocMercadoPublicoComprador->rut_unidad ?? null, ['class' => 'form-control', isset($isShow) ? 'disabled' : '']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        {!! Form::label('codigo_unidad', 'Codigo Unidad:') !!}
                        {!! Form::text('codigo_unidad_comprador', $ocMercadoPublico->ocMercadoPublicoComprador->codigo_unidad ?? null, ['class' => 'form-control', isset($isShow) ? 'disabled' : '']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        {!! Form::label('nombre_unidad', 'Nombre Unidad:') !!}
                        {!! Form::text('nombre_unidad_comprador', $ocMercadoPublico->ocMercadoPublicoComprador->nombre_unidad ?? null, ['class' => 'form-control', isset($isShow) ? 'disabled' : '']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        {!! Form::label('actividad', 'Actividad:') !!}
                        {!! Form::text('actividad_comprador', $ocMercadoPublico->ocMercadoPublicoComprador->actividad ?? null, ['class' => 'form-control', isset($isShow) ? 'disabled' : '']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        {!! Form::label('direccion_unidad', 'Direccion Unidad:') !!}
                        {!! Form::text('direccion_unidad_comprador', $ocMercadoPublico->ocMercadoPublicoComprador->direccion_unidad ?? null, ['class' => 'form-control', isset($isShow) ? 'disabled' : '']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        {!! Form::label('comuna_unidad', 'Comuna Unidad:') !!}
                        {!! Form::text('comuna_unidad_comprador', $ocMercadoPublico->ocMercadoPublicoComprador->comuna_unidad ?? null, ['class' => 'form-control', isset($isShow) ? 'disabled' : '']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        {!! Form::label('region_unidad', 'Region Unidad:') !!}
                        {!! Form::text('region_unidad_comprador', $ocMercadoPublico->ocMercadoPublicoComprador->region_unidad ?? null, ['class' => 'form-control', isset($isShow) ? 'disabled' : '']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        {!! Form::label('pais', 'Pais:') !!}
                        {!! Form::text('pais_comprador', $ocMercadoPublico->ocMercadoPublicoComprador->pais ?? null, ['class' => 'form-control', isset($isShow) ? 'disabled' : '']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        {!! Form::label('nombre_contacto', 'Nombre Contacto:') !!}
                        {!! Form::text('nombre_contacto_comprador', $ocMercadoPublico->ocMercadoPublicoComprador->nombre_contacto ?? null, ['class' => 'form-control', isset($isShow) ? 'disabled' : '']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        {!! Form::label('cargo_contacto', 'Cargo Contacto:') !!}
                        {!! Form::text('cargo_contacto_comprador', $ocMercadoPublico->ocMercadoPublicoComprador->cargo_contacto ?? null, ['class' => 'form-control', isset($isShow) ? 'disabled' : '']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        {!! Form::label('fono_contacto', 'Fono Contacto:') !!}
                        {!! Form::text('fono_contacto_comprador', $ocMercadoPublico->ocMercadoPublicoComprador->fono_contacto ?? null, ['class' => 'form-control', isset($isShow) ? 'disabled' : '']) !!}
                    </div>

                    <div class="form-group col-sm-4">
                        {!! Form::label('mail_contacto', 'Mail Contacto:') !!}
                        {!! Form::text('mail_contacto_comprador', $ocMercadoPublico->ocMercadoPublicoComprador->mail_contacto ?? null, ['class' => 'form-control', isset($isShow) ? 'disabled' : '']) !!}
                    </div>

                </div>

            </div>

        </div>

    </div>

</div>
