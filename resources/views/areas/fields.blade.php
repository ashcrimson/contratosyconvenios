<div class="form-row" id="areasFields">

    <!-- Cargo Id Field -->
    <div class="form-group col-sm-6">
        <select-cargo :items="cargos" v-model="cargo" label="Cargo" :disabled="disabled"></select-cargo>
    </div>

    <!-- Nombre Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('nombre', 'Nombre:') !!}
        {!! Form::text('nombre', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
    </div>

</div>

@push('scripts')
<script>
    new Vue({
        el: '#areasFields',
        name: 'areasFields',
        created() {

        },
        data: {
            cargos : @json(\App\Models\Cargo::all() ?? []),
            cargo: @json($area->cargo ?? auth()->user()->cargo ?? null),
            disabled: @json(auth()->user()->cannot('Ver todas las areas'))
        },
        methods: {

        },
    });
</script>
@endpush
