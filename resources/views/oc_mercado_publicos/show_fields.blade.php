<div class="form-row col-lg-12" id="fieldsOcMercadoPublico">
    <!-- Codigo Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('codigo', 'Codigo:') !!}
        {!! Form::text('codigo', $ocMercadoPublico->codigo, ['class' => 'form-control','maxlength' => 255,'disabled']) !!}
    </div>

    <!-- Nombre Field -->
    <div class="form-group col-sm-8">
        {!! Form::label('nombre', 'Nombre:') !!}
        {!! Form::text('nombre', $ocMercadoPublico->nombre, ['class' => 'form-control','maxlength' => 255,'disabled']) !!}
    </div>

    <!-- Codigo Estado Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('codigo_estado', 'Codigo Estado:') !!}
        {!! Form::number('codigo_estado', $ocMercadoPublico->codigo_estado, ['class' => 'form-control','disabled']) !!}
    </div>

    <!-- Nombre Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('nombre_estado', 'Nombre Estado:') !!}
        {!! Form::text('nombre_estado', $ocMercadoPublico->nombre_estado, ['class' => 'form-control','maxlength' => 255,'disabled']) !!}
    </div>

    <!-- Codigo Licitacion Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('codigo_licitacion', 'Licitación:') !!}
        <multiselect v-model="licitacion" :options="licitaciones" label="numero" placeholder="Seleccione uno..." disabled>
        </multiselect>
        <input type="hidden" name="codigo_licitacion" :value="licitacion ? licitacion.id : null">
    </div>

    <!-- Codigo Tipo Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('codigo_tipo', 'Tipo:') !!}
        <multiselect v-model="ordenCompraTipo" :options="ordenCompraTipos" label="abreviacion" placeholder="Seleccione uno..." disabled>
        </multiselect>
        <input type="hidden" name="codigo_tipo" :value="ordenCompraTipo ? ordenCompraTipo.id : null">
    </div>

    <!-- Tipo Moneda Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('tipo_moneda', 'Tipo Moneda:') !!}
        <multiselect v-model="unidadMonetaria" :options="unidadMonetarias" label="valor" placeholder="Seleccione uno..." disabled>
        </multiselect>
        <input type="hidden" name="tipo_moneda" :value="unidadMonetaria ? unidadMonetaria.id : null">
    </div>

    <!-- Codigo Estado Proveedor Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('codigo_estado_proveedor', 'Codigo Estado Proveedor:') !!}
        {!! Form::number('codigo_estado_proveedor', $ocMercadoPublico->codigo_estado_proveedor, ['class' => 'form-control','disabled']) !!}
    </div>

    <!-- Promedio Calificacion Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('promedio_calificacion', 'Promedio Calificacion:') !!}
        {!! Form::number('promedio_calificacion', $ocMercadoPublico->promedio_calificacion, ['class' => 'form-control','disabled']) !!}
    </div>

    <!-- Cantidad Evaluacion Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('cantidad_evaluacion', 'Cantidad Evaluacion:') !!}
        {!! Form::number('cantidad_evaluacion', $ocMercadoPublico->cantidad_evaluacion, ['class' => 'form-control','disabled']) !!}
    </div>

    <!-- Descuentos Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('descuentos', 'Descuentos:') !!}
        {!! Form::number('descuentos', $ocMercadoPublico->descuentos, ['class' => 'form-control','disabled']) !!}
    </div>

    <!-- Cargos Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('cargos', 'Cargos:') !!}
        {!! Form::number('cargos', $ocMercadoPublico->cargos, ['class' => 'form-control','disabled']) !!}
    </div>

    <!-- Total Neto Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('total_neto', 'Total Neto:') !!}
        {!! Form::number('total_neto', $ocMercadoPublico->total_neto, ['class' => 'form-control','disabled']) !!}
    </div>

    <!-- Porcentaje Iva Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('porcentaje_iva', 'Porcentaje Iva:') !!}
        {!! Form::number('porcentaje_iva', $ocMercadoPublico->porcentaje_iva, ['class' => 'form-control','disabled']) !!}
    </div>

    <!-- Impuestos Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('impuestos', 'Impuestos:') !!}
        {!! Form::number('impuestos', $ocMercadoPublico->impuestos, ['class' => 'form-control','disabled']) !!}
    </div>

    <!-- Total Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('total', 'Total:') !!}
        {!! Form::number('total', $ocMercadoPublico->total, ['class' => 'form-control','disabled']) !!}
    </div>

    <!-- Financiamiento Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('financiamiento', 'Financiamiento:') !!}
        {!! Form::number('financiamiento', $ocMercadoPublico->financiamiento, ['class' => 'form-control','disabled']) !!}
    </div>

    <!-- Pais Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('pais', 'Pais:') !!}
        {!! Form::text('pais', $ocMercadoPublico->pais, ['class' => 'form-control','maxlength' => 255,'disabled']) !!}
    </div>

    <!-- Tipo Despacho Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('tipo_despacho', 'Tipo Despacho:') !!}
        <multiselect v-model="depachoTipo" :options="depachoTipos" label="descripcion" placeholder="Seleccione uno..." disabled>
        </multiselect>
        <input type="hidden" name="tipo_despacho" :value="depachoTipo ? depachoTipo.id : null">
    </div>

    <!-- Forma Pago Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('forma_pago', 'Forma Pago:') !!}
        <multiselect v-model="formaPago" :options="formaPagos" label="descripcion" placeholder="Seleccione uno..." disabled>
        </multiselect>
        <input type="hidden" name="forma_pago" :value="formaPago ? formaPago.id : null">
    </div>

    <!-- Estado Proveedor Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('estado_proveedor', 'Estado Proveedor:') !!}
        {!! Form::text('estado_proveedor', $ocMercadoPublico->estado_proveedor, ['class' => 'form-control','maxlength' => 255,'disabled']) !!}
    </div>

    <!-- Cantidad Items Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('cantidad_items', 'Cantidad Items:') !!}
        {!! Form::text('cantidad_items', $ocMercadoPublico->cantidad_items, ['class' => 'form-control','maxlength' => 255,'disabled']) !!}
    </div>

    <!-- Descripcion Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('descripcion', 'Descripcion:') !!}
        {!! Form::textarea('descripcion', $ocMercadoPublico->descripcion, ['class' => 'form-control', 'rows' => '4','disabled']) !!}
    </div>

</div>

@include('oc_mercado_publicos.partials.fechas_fields', ['isShow' => true])

@include('oc_mercado_publicos.partials.comprador', ['isShow' => true])

@include('oc_mercado_publicos.partials.proveedor', ['isShow' => true])

@include('oc_mercado_publicos.partials.items')

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
