<!-- Numero Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero', 'Numero:') !!}
    {!! Form::text('numero', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Presupuesto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('presupuesto', 'Presupuesto:') !!}
    {!! Form::number('presupuesto', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6 ">
    {!! Form::label('adjunto', 'Adjuntar licitación.:') !!}
    {!! Form::file('adjunto', ['class' => 'form-control file']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
</div>









@push('scripts')
<script>
    $(function () {
        $("#ojt").select2({
            placeholder: 'Seleccione uno...',
            language: "es",
            maximumSelectionLength: 1,
            allowClear: true
        });
    })
</script>
@endpush
