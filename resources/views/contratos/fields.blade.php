<div class="form-row" id="fieldsContratos">

    <!-- Id Mercado Publico Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('id_mercado_publico', 'Id Mercado Publico:') !!}
        {!! Form::text('id_mercado_publico', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
    </div>

    <!-- Tipo Id Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('estado_id', 'Estado') !!}

        <multiselect v-model="tipo" :options="tipos" label="nombre" placeholder="Seleccione uno...">
        </multiselect>
        <input type="hidden" name="tipo_id" :value="tipo ? tipo.id : null">
    </div>

    <!-- Licitacion Id Field -->
    <div class="form-group col-sm-4" v-show="esConLicitacion">
        <select-licitacion :items="licitaciones" v-model="licitacion" label="Licitacion"></select-licitacion>
    </div>

    <!-- Proveedor Id Field -->
    <div class="form-group col-sm-4">
        <select-proveedor :items="proveedores" v-model="proveedor" label="Proveedor"></select-proveedor>
    </div>

    <!-- Cargo Id Field -->
    <div class="form-group col-sm-4">
        <select-cargo :items="cargos" v-model="cargo" label="Cargo"></select-cargo>
    </div>

    <!-- Moneda Id Field -->
    <div class="form-group col-sm-4">
        <select-moneda :items="monedas" v-model="moneda" label="Moneda"></select-moneda>
    </div>

    <!-- Monto Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('monto', 'Monto:') !!}
        {!! Form::number('monto', null, ['class' => 'form-control']) !!}

        <input type="hidden" name="estado_alerta" value="0">
    </div>

    <!-- Estado Alerta Field -->
{{--    <div class="form-group col-sm-4">--}}
{{--        {!! Form::label('estado_alerta', 'Estado Alerta:') !!}--}}
{{--        <label class="checkbox-inline">--}}

{{--            {!! Form::checkbox('estado_alerta', '1', null) !!}--}}
{{--        </label>--}}
{{--    </div>--}}


    <!-- Fecha Inicio Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('fecha_inicio', 'Fecha Inicio Contrato:') !!}
        {!! Form::date('fecha_inicio', onlyDate($contrato->fecha_inicio ?? null), ['class' => 'form-control','id'=>'fecha_inicio']) !!}
    </div>


    <!-- Fecha Termino Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('fecha_termino', 'Fecha T??rmino Contrato:') !!}
        {!! Form::date('fecha_termino', onlyDate($contrato->fecha_termino ?? null), ['class' => 'form-control','id'=>'fecha_termino']) !!}
    </div>



    <!-- Fecha Aprobacion Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('fecha_aprobacion', 'Fecha Resoluci??n Aprueba:') !!}
        {!! Form::date('fecha_aprobacion', onlyDate($contrato->fecha_aprobacion ?? null), ['class' => 'form-control','id'=>'fecha_aprobacion']) !!}
    </div>


    <!-- Fecha Alerta Vencimiento Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('fecha_alerta_vencimiento', 'Fecha Alerta T??rmino Contrato:') !!}
        {!! Form::date('fecha_alerta_vencimiento', onlyDate($contrato->fecha_alerta_vencimiento ?? null), ['class' => 'form-control','id'=>'fecha_alerta_vencimiento']) !!}
    </div>


    <!-- Objeto Field -->
    <div class="form-group col-sm-12 col-lg-12">
        {!! Form::label('objeto', 'Objeto del Contrato:') !!}
        {!! Form::textarea('objeto', null, ['class' => 'form-control','rows' => 2]) !!}
    </div>

    <!-- Numero Boleta Garantia Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('numero_boleta_garantia', 'N??mero Boleta Garantia:') !!}
        {!! Form::text('numero_boleta_garantia', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
    </div>

    <!-- Monto Boleta Garantia Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('monto_boleta_garantia', 'Monto Boleta Garantia:') !!}
        {!! Form::number('monto_boleta_garantia', null, ['class' => 'form-control']) !!}
    </div>


    <!-- Fecha Vencimiento Boleta Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('fecha_vencimiento_boleta', 'Fecha Vencimiento Boleta:') !!}
        {!! Form::date('fecha_vencimiento_boleta', onlyDate($contrato->fecha_vencimiento_boleta ?? null), ['class' => 'form-control','id'=>'fecha_vencimiento_boleta']) !!}
    </div>


    <!-- Alerta Vencimiento Boleta Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('alerta_vencimiento_boleta', 'Alerta Vencimiento Boleta:') !!}
        {!! Form::date('alerta_vencimiento_boleta', onlyDate($contrato->alerta_vencimiento_boleta ?? null), ['class' => 'form-control','id'=>'alerta_vencimiento_boleta']) !!}
    </div>


    <!-- Tiene Detalles Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('tiene_detalles', '??Tiene detalles?') !!}
        <div>

            <toggle-button v-model="tiene_detalles"
                           :sync="true"
                           :labels="{checked: 'SI', unchecked: 'NO'}"
                           :height="30"
                           :width="60"
                           :value="false"
            />

        </div>
        <input type="hidden" name="tiene_detalles" :value="tiene_detalles ? 1 : 0">

    </div>


    <div class="form-group col-sm-6 ">
        {!! Form::label('adjunto', 'Adjuntar contrato.:') !!}
        @isset($contrato)
            @include('contratos.partials.documento',['documento' => $contrato->getLastDocumento() ])
        @endisset
        {!! Form::file('adjuntos[]', ['id' => 'adjuntos','class' => 'form-control file','multiple']) !!}
    </div>

</div>
@push('scripts')
<script>
    new Vue({
        el: '#fieldsContratos',
        name: 'fieldsContratos',
        created() {

        },
        data: {
            cargos : @json(\App\Models\Cargo::all() ?? []),
            cargo: @json($contrato->cargo ?? null),

            proveedores : @json(\App\Models\Proveedor::all() ?? []),
            proveedor: @json($contrato->proveedor ?? null),

            licitaciones : @json(\App\Models\Licitacion::all() ?? []),
            licitacion: @json($contrato->licitacion ?? null),

            tipos : @json(\App\Models\ContratoTipo::all() ?? []),
            tipo: @json($contrato->tipo ?? null),

            monedas : @json(\App\Models\Moneda::all() ?? []),
            moneda: @json($contrato->moneda ?? null),
            tiene_detalles: @json($contrato->tiene_detalles ?? old('tiene_detalles') ?? null),


        },
        methods: {

        },
        computed:{
            esConLicitacion(){
                if (!this.tipo)
                    return false;

                return this.tipo.id=='{{\App\Models\ContratoTipo::CON_LICITACION}}';
            }

        }
    });
</script>
@endpush
