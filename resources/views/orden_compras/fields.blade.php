<div class="form-row" id="ordenCompraFields">
    <!-- Contrato Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('contrato_id', 'ID Mercado Público:') !!}
        <multiselect v-model="contrato" :options="contratos" label="text" placeholder="Seleccione uno...">
        </multiselect>
        <input type="hidden" name="contrato_id" :value="contrato ? contrato.id : null">
    </div>

    <!-- Numero Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('numero', 'Número Orden de Compra:') !!}
        {!! Form::text('numero', null, ['class' => 'form-control','maxlength' => 255]) !!}
    </div>

    <!-- Fecha Envio Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('fecha_envio', 'Fecha de Envío:') !!}
        {!! Form::date('fecha_envio', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Tiene Detalles Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('tiene_detalles', '¿Agregar detalles de Contrato?') !!}
        <div>

            <toggle-button v-model="tiene_detalles"
                           :sync="true"
                           :labels="{checked: 'SI', unchecked: 'NO'}"
                           :height="30"
                           :width="60"
                           :value="false"
            />
        </div>
    </div>


    <!-- Descripcion Field -->
    <div class="form-group col-sm-12">
        {!! Form::label('descripcion', 'Descripcion:') !!}
        {!! Form::textarea('descripcion', null, ['class' => 'form-control','maxlength' => 255,'rows' => 2]) !!}
    </div>




    <!-- Total Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('total', 'Monto:') !!}
        {!! Form::text('total', null, ['class' => 'form-control','maxlength' => 255]) !!}
    </div>
</div>


@push('scripts')
<script>
    const app = new Vue({
        el: '#ordenCompraFields',
        name: 'ordenCompraFields',
        created() {

        },
        data: {
            contratos : @json(\App\Models\Contrato::all() ?? []),
            contrato: @json($ordenCompra->contrato ?? null),

            tiene_detalles: false,
        },
        methods: {

        }
    });
</script>
@endpush
