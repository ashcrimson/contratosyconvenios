<!-- Numero Field -->
{!! Form::label('numero', 'Numero:') !!}
{!! $licitacion->numero !!}<br>


<!-- Descripcion Field -->
{!! Form::label('descripcion', 'Descripcion:') !!}
{!! $licitacion->descripcion !!}<br>


<!-- Presupuesto Field -->
{!! Form::label('presupuesto', 'Presupuesto:') !!}
{!! dvs().nfp($licitacion->presupuesto) !!}<br>


<!-- Presupuesto Field -->
{!! Form::label('creado_por', 'Creado Por:') !!}
{!! $licitacion->userCrea->name !!}<br>
<!-- Presupuesto Field -->
{!! Form::label('creado_por', 'Actualizado Por:') !!}
{!! $licitacion->userActualiza->name ?? '' !!}<br>

{!! Form::label('presupuesto', 'Adjuntos:') !!}
@include('partials.listado_botones_documentos',['documentos' => $licitacion->documentos ?? []])
