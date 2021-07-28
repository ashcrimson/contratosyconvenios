<!-- Contrato Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contrato_id', 'Contrato Id:') !!}
    {!! Form::number('contrato_id', null, ['class' => 'form-control']) !!}
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

<!-- Codigo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('codigo', 'Codigo:') !!}
    {!! Form::text('codigo', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Cantidad Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cantidad', 'Cantidad:') !!}
    {!! Form::text('cantidad', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Tiene Detalles Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tiene_detalles', 'Tiene Detalles:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('tiene_detalles', 0) !!}
        {!! Form::checkbox('tiene_detalles', '1', null) !!}
    </label>
</div>


<!-- Estado Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado_id', 'Estado Id:') !!}
    {!! Form::number('estado_id', null, ['class' => 'form-control']) !!}
</div>

<!-- User Crea Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_crea', 'User Crea:') !!}
    {!! Form::number('user_crea', null, ['class' => 'form-control']) !!}
</div>

<!-- User Actualiza Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_actualiza', 'User Actualiza:') !!}
    {!! Form::number('user_actualiza', null, ['class' => 'form-control']) !!}
</div>
