{!! Form::label('contrato_numero', 'Contrato Número:') !!}
{!! $ordenCompraDetalle->compra->numero ?? '' !!}<br>

{!! Form::label('item', 'Item:') !!}
{!! $ordenCompraDetalle->item->descripcion ?? '' !!}<br>

{!! Form::label('item', 'Item:') !!}
{!! $ordenCompraDetalle->precio ?? '' !!}<br>

{!! Form::label('cantidad', 'Cantidad:') !!}
{!! $ordenCompraDetalle->cantidad ?? '' !!}<br>

{!! Form::label('subtotal', 'Sub-Total:') !!}
{!! $ordenCompraDetalle->subtotal ?? '' !!}<br>
