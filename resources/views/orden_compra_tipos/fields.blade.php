<!-- Codigo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigo', 'Codigo:') !!}
    {!! Form::number('codigo', null, ['class' => 'form-control']) !!}
</div>

<!-- Abreviacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('abreviacion', 'Abreviacion:') !!}
    {!! Form::text('abreviacion', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control', 'rows' => 2]) !!}
</div>
