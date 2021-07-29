<div class="form-row" id="ordenCompraFields">
    <!-- Contrato Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('contrato_id', 'Contrato Id:') !!}
        <multiselect v-model="contrato" :options="contratos" label="id_mercado_publico" placeholder="Seleccione uno...">
        </multiselect>
        <input type="hidden" name="contrato_id" :value="contrato ? contrato.id : null">
    </div>

    <!-- Numero Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('numero', 'Numero:') !!}
        {!! Form::text('numero', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
    </div>

    <!-- Fecha Envio Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('fecha_envio', 'Fecha Envio:') !!}
        {!! Form::text('fecha_envio', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
    </div>

    <!-- Total Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('total', 'Total:') !!}
        {!! Form::text('total', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
    </div>



    <!-- Descripcion Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('descripcion', 'Descripcion:') !!}
        {!! Form::text('descripcion', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
    </div>

    <!-- Tiene Detalles Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('tiene_detalles', 'Tiene Detalles:') !!}

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
        },
        methods: {

        }
    });
</script>
@endpush
