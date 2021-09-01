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
    <br>
    @include('partials.listado_botones_documentos',['documentos' => $licitacion->documentos ?? []])

    {!! Form::file('adjuntos[]', ['id' => 'adjuntos','class' => 'form-control file','multiple']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6 col-lg-6">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::textarea('descripcion', null, ['class' => 'form-control']) !!}
</div>






