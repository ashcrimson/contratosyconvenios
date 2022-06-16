<!-- Codigo Field -->
{!! Form::label('codigo', 'Codigo:') !!}
{!! $ocMercadoPublico->codigo !!}<br>

<!-- Nombre Field -->
{!! Form::label('nombre', 'Nombre:') !!}
{!! $ocMercadoPublico->nombre !!}<br>

<!-- Codigo Estado Field -->
{!! Form::label('codigo_estado', 'Codigo Estado:') !!}
{!! $ocMercadoPublico->estado->nombre ?? '' !!}<br>

<!-- Codigo Licitacion Field -->
{!! Form::label('codigo_licitacion', 'Codigo Licitacion:') !!}
{!! $ocMercadoPublico->licitacion->numero ?? '' !!}<br>

<!-- Descripcion Field -->
{!! Form::label('descripcion', 'Descripcion:') !!}
{!! $ocMercadoPublico->descripcion !!}<br>
