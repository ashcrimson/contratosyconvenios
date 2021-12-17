<div class="form-row">

    <div class="form-group col-sm-6">

        <!-- Id Mercado Publico Field -->
        {!! Form::label('id_mercado_publico', 'Id Mercado Publico:') !!}
        {!! $contrato->id_mercado_publico ?? '' !!}<br>

        <!-- Tipo Id Field -->
        {!! Form::label('tipo_id', 'Tipo') !!}
        {!! $contrato->tipo->nombre ?? '' !!}<br>


        @if($contrato->tipo->id != \App\Models\ContratoTipo::TRATO_DIRECTO)
        <!-- Licitacion Id Field -->
        {!! Form::label('licitacion_id', 'Licitacion') !!}
        {!! $contrato->licitacion->numero ?? '' !!}<br>
        @endif

        <!-- Proveedor Id Field -->
        {!! Form::label('proveedor_id', 'Proveedor') !!}
        {!! $contrato->proveedor->razon_social ?? '' !!}<br>



        <!-- Monto Field -->
         {!! Form::label('monto', 'Monto:') !!}
         {!! $contrato->moneda->codigo." ".nfp($contrato->monto) !!}<br>

        <!-- Cargo Id Field -->
         {!! Form::label('cargo_id', 'Cargo') !!}
         {!! $contrato->cargo->nombre ?? '' !!}<br>

        <!-- Estado Alerta Field -->
        {!! Form::label('estado_alerta', 'Estado Alerta:') !!}
        {!! $contrato->estado_alerta ?? '' !!}<br>


        <!-- Fecha Inicio Field -->
        {!! Form::label('fecha_inicio', 'Fecha Inicio:') !!}
        {!! fechaLtn($contrato->fecha_inicio) ?? '' !!}<br>


        <!-- Fecha Termino Field -->
        {!! Form::label('fecha_termino', 'Fecha Termino:') !!}
        {!! fechaLtn($contrato->fecha_termino) ?? '' !!}<br>


        <!-- Fecha Aprobacion Field -->
        {!! Form::label('fecha_aprobacion', 'Fecha Aprobacion:') !!}
        {!! fechaLtn($contrato->fecha_aprobacion) ?? '' !!}<br>


    </div>

    <div class="form-group col-sm-6">
        <!-- Fecha Alerta Vencimiento Field -->
        {!! Form::label('fecha_alerta_vencimiento', 'Fecha Alerta Vencimiento:') !!}
        {!! fechaLtn($contrato->fecha_alerta_vencimiento) ?? '' !!}<br>


        <!-- Objeto Field -->
        {!! Form::label('objeto', 'Objeto:') !!}
        {!! $contrato->objeto ?? '' !!}<br>


        <!-- Numero Boleta Garantia Field -->
        {!! Form::label('numero_boleta_garantia', 'Numero Boleta Garantia:') !!}
        {!! $contrato->numero_boleta_garantia ?? '' !!}<br>


       <!-- Fecha Vencimiento Boleta Field -->
        {!! Form::label('fecha_vencimiento_boleta', 'Fecha Vencimiento Boleta:') !!}
        {!! fechaLtn($contrato->fecha_vencimiento_boleta) ?? '' !!}<br>


       <!-- Alerta Vencimiento Boleta Field -->
        {!! Form::label('alerta_vencimiento_boleta', 'Alerta Vencimiento Boleta:') !!}
        {!! fechaLtn($contrato->alerta_vencimiento_boleta) ?? '' !!}<br>


      <!-- Monto Boleta Garantia Field -->
        {!! Form::label('monto_boleta_garantia', 'Monto Boleta Garantia:') !!}
        {!! $contrato->monto_boleta_garantia_f ?? '' !!}<br>





        <!-- Estado Id Field -->
        {!! Form::label('estado_id', 'Estado') !!}
        {!! $contrato->estado->nombre ?? '' !!}<br>


        <!-- User Crea Field -->
        {!! Form::label('user_crea', 'User Crea:') !!}
        {!! $contrato->userCrea->name ?? '' !!}<br>


        <!-- User Actualiza Field -->
        {!! Form::label('user_actualiza', 'User Actualiza:') !!}
        {!! $contrato->userActualiza->name ?? '' !!}<br>



    </div>
</div>
