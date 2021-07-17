<!-- Area Field -->
<div class="form-group col-sm-6">
    {!! Form::label('area', 'Area:') !!}
    {!! Form::text('area', null, ['class' => 'form-control','maxlength' => 200,'maxlength' => 200]) !!}
</div>

<!-- Id Cargo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_cargo', 'Id Cargo:') !!}
    {!! Form::number('id_cargo', null, ['class' => 'form-control']) !!}
</div>
