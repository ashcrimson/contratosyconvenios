{!! Form::label('id_mercado_publico', 'Id Mercado Publico:') !!}
{!! $contrato->id_mercado_publico !!}<br>

<!-- Tipo Id Field -->
{!! Form::label('tipo_id', 'Tipo') !!}
{!! $contrato->tipo->nombre !!}<br>


@if($contrato->tipo->id != \App\Models\ContratoTipo::TRATO_DIRECTO)
    <!-- Licitacion Id Field -->
    {!! Form::label('licitacion_id', 'Licitacion') !!}
    {!! $contrato->licitacion->numero ?? '' !!}<br>
@endif

<!-- Proveedor Id Field -->
{!! Form::label('proveedor_id', 'Proveedor') !!}
{!! $contrato->proveedor->razon_social !!}<br>

<!-- Objeto Field -->
{!! Form::label('objeto', 'Objeto:') !!}
{!! $contrato->objeto !!}<br>

<br>
