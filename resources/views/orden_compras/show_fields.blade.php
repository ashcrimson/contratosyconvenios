<!-- Contrato Id Field -->
{!! Form::label('contrato_id', 'Contrato:') !!}
{!! $ordenCompra->contrato->id_mercado_publico ?? '' !!}<br>


<!-- Numero Field -->
{!! Form::label('numero', 'Numero:') !!}
{!! $ordenCompra->numero !!}<br>


<!-- Fecha Envio Field -->
{!! Form::label('fecha_envio', 'Fecha Envio:') !!}
{!! $ordenCompra->fecha_envio !!}<br>


<!-- Total Field -->
{!! Form::label('total', 'Total:') !!}
{!! dvs().nfp($ordenCompra->total) !!}<br>



<!-- Estado Id Field -->
{!! Form::label('estado_id', 'Estado:') !!}
{!! $ordenCompra->estado->nombre !!}<br>


<!-- User Crea Field -->
{!! Form::label('user_crea', 'User Crea:') !!}
{!! $ordenCompra->userCrea->name ?? ''!!}<br>


<!-- User Actualiza Field -->
{!! Form::label('user_actualiza', 'User Actualiza:') !!}
{!! $ordenCompra->userActualiza->name ?? '' !!}<br>


