<div class="form-row col-lg-12" id="fieldsOcMercadoPublico">
    <!-- Codigo Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('codigo', 'Codigo:') !!}
        {!! Form::text('codigo', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
    </div>

    <!-- Nombre Field -->
    <div class="form-group col-sm-8">
        {!! Form::label('nombre', 'Nombre:') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
    </div>

    <!-- Codigo Estado Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('codigo_estado', 'Codigo Estado:') !!}
        {!! Form::number('codigo_estado', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Nombre Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('nombre_estado', 'Nombre Estado:') !!}
        {!! Form::text('nombre_estado', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
    </div>

    <!-- Codigo Licitacion Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('codigo_licitacion', 'Licitación:') !!}
        <multiselect v-model="licitacion" :options="licitaciones" label="numero" placeholder="Seleccione uno...">
        </multiselect>
        <input type="hidden" name="codigo_licitacion" :value="licitacion ? licitacion.id : null">
{{--        {!! Form::number('codigo_licitacion', null, ['class' => 'form-control']) !!}--}}
    </div>

    <!-- Codigo Tipo Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('codigo_tipo', 'Tipo:') !!}
        <multiselect v-model="ordenCompraTipo" :options="ordenCompraTipos" label="abreviacion" placeholder="Seleccione uno...">
        </multiselect>
        <input type="hidden" name="codigo_tipo" :value="ordenCompraTipo ? ordenCompraTipo.id : null">
{{--        {!! Form::number('codigo_tipo', null, ['class' => 'form-control']) !!}--}}
    </div>

    <!-- Tipo Moneda Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('tipo_moneda', 'Tipo Moneda:') !!}
        <multiselect v-model="unidadMonetaria" :options="unidadMonetarias" label="valor" placeholder="Seleccione uno...">
        </multiselect>
        <input type="hidden" name="tipo_moneda" :value="unidadMonetaria ? unidadMonetaria.id : null">
{{--        {!! Form::number('tipo_moneda', null, ['class' => 'form-control']) !!}--}}
    </div>

    <!-- Codigo Estado Proveedor Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('codigo_estado_proveedor', 'Codigo Estado Proveedor:') !!}
        {!! Form::number('codigo_estado_proveedor', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Promedio Calificacion Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('promedio_calificacion', 'Promedio Calificacion:') !!}
        {!! Form::number('promedio_calificacion', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Cantidad Evaluacion Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('cantidad_evaluacion', 'Cantidad Evaluacion:') !!}
        {!! Form::number('cantidad_evaluacion', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Descuentos Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('descuentos', 'Descuentos:') !!}
        {!! Form::number('descuentos', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Cargos Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('cargos', 'Cargos:') !!}
        {!! Form::number('cargos', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Total Neto Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('total_neto', 'Total Neto:') !!}
        {!! Form::number('total_neto', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Porcentaje Iva Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('porcentaje_iva', 'Porcentaje Iva:') !!}
        {!! Form::number('porcentaje_iva', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Impuestos Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('impuestos', 'Impuestos:') !!}
        {!! Form::number('impuestos', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Total Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('total', 'Total:') !!}
        {!! Form::number('total', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Financiamiento Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('financiamiento', 'Financiamiento:') !!}
        {!! Form::number('financiamiento', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Pais Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('pais', 'Pais:') !!}
        {!! Form::text('pais', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
    </div>

    <!-- Tipo Despacho Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('tipo_despacho', 'Tipo Despacho:') !!}
        <multiselect v-model="depachoTipo" :options="depachoTipos" label="descripcion" placeholder="Seleccione uno...">
        </multiselect>
        <input type="hidden" name="tipo_despacho" :value="depachoTipo ? depachoTipo.id : null">
{{--        {!! Form::number('tipo_despacho', null, ['class' => 'form-control']) !!}--}}
    </div>

    <!-- Forma Pago Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('forma_pago', 'Forma Pago:') !!}
        <multiselect v-model="formaPago" :options="formaPagos" label="descripcion" placeholder="Seleccione uno...">
        </multiselect>
        <input type="hidden" name="forma_pago" :value="formaPago ? formaPago.id : null">
{{--        {!! Form::number('forma_pago', null, ['class' => 'form-control']) !!}--}}
    </div>

    <!-- Descripcion Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('descripcion', 'Descripcion:') !!}
        {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => '4']) !!}
    </div>
</div>

@include('oc_mercado_publicos.partials.fechas_fields')
@if(Route::is('ocMercadoPublicos.edit') )
    @include('oc_mercado_publicos.partials.items')
@endif

@push('scripts')
    <script>
        new Vue({
            el: '#fieldsOcMercadoPublico',
            name: 'fieldsOcMercadoPublico',
            created() {

            },
            data: {
                ordenCompraEstado: @json($ocMercadoPublico->estado ?? null),
                ordenCompraEstados: @json(\App\Models\OrdenCompraEstado::all() ?? []),

                licitaciones: @json(\App\Models\Licitacion::all() ?? []),
                licitacion: @json($ocMercadoPublico->licitacion ?? null),

                ordenCompraTipos: @json(\App\Models\OrdenCompraTipo::all() ?? []),
                ordenCompraTipo: @json($ocMercadoPublico->codigoTipo ?? null),

                unidadMonetarias: @json(\App\Models\UnidadMonetaria::all() ?? []),
                unidadMonetaria: @json($ocMercadoPublico->tipoMoneda ?? null),

                depachoTipos: @json(\App\Models\DespachoTipo::all() ?? []),
                depachoTipo: @json($ocMercadoPublico->tipoDespacho ?? null),

                formaPagos: @json(\App\Models\FormaPago::all() ?? []),
                formaPago: @json($ocMercadoPublico->formaPago ?? null),
            },
        });
    </script>
@endpush
