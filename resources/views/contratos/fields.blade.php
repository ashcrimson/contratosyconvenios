<!-- Tipo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('tipo_id', 'Tipo Id:') !!}
    {!! Form::number('tipo_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Licitacion Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('licitacion_id', 'Licitacion Id:') !!}
    {!! Form::number('licitacion_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Proveedor Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('proveedor_id', 'Proveedor Id:') !!}
    {!! Form::number('proveedor_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Cargo Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cargo_id', 'Cargo Id:') !!}
    {!! Form::number('cargo_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Moneda Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('moneda_id', 'Moneda Id:') !!}
    {!! Form::number('moneda_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Monto Field -->
<div class="form-group col-sm-6">
    {!! Form::label('monto', 'Monto:') !!}
    {!! Form::number('monto', null, ['class' => 'form-control']) !!}
</div>

<!-- Estado Alerta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('estado_alerta', 'Estado Alerta:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('estado_alerta', 0) !!}
        {!! Form::checkbox('estado_alerta', '1', null) !!}
    </label>
</div>


<!-- Fecha Inicio Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_inicio', 'Fecha Inicio:') !!}
    {!! Form::date('fecha_inicio', null, ['class' => 'form-control','id'=>'fecha_inicio']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#fecha_inicio').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Fecha Termino Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_termino', 'Fecha Termino:') !!}
    {!! Form::date('fecha_termino', null, ['class' => 'form-control','id'=>'fecha_termino']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#fecha_termino').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Fecha Aprobacion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_aprobacion', 'Fecha Aprobacion:') !!}
    {!! Form::date('fecha_aprobacion', null, ['class' => 'form-control','id'=>'fecha_aprobacion']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#fecha_aprobacion').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Fecha Alerta Vencimiento Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_alerta_vencimiento', 'Fecha Alerta Vencimiento:') !!}
    {!! Form::date('fecha_alerta_vencimiento', null, ['class' => 'form-control','id'=>'fecha_alerta_vencimiento']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#fecha_alerta_vencimiento').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Objeto Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('objeto', 'Objeto:') !!}
    {!! Form::textarea('objeto', null, ['class' => 'form-control']) !!}
</div>

<!-- Numero Boleta Garantia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('numero_boleta_garantia', 'Numero Boleta Garantia:') !!}
    {!! Form::text('numero_boleta_garantia', null, ['class' => 'form-control','maxlength' => 45,'maxlength' => 45]) !!}
</div>

<!-- Fecha Vencimiento Boleta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fecha_vencimiento_boleta', 'Fecha Vencimiento Boleta:') !!}
    {!! Form::date('fecha_vencimiento_boleta', null, ['class' => 'form-control','id'=>'fecha_vencimiento_boleta']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#fecha_vencimiento_boleta').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Alerta Vencimiento Boleta Field -->
<div class="form-group col-sm-6">
    {!! Form::label('alerta_vencimiento_boleta', 'Alerta Vencimiento Boleta:') !!}
    {!! Form::date('alerta_vencimiento_boleta', null, ['class' => 'form-control','id'=>'alerta_vencimiento_boleta']) !!}
</div>

@section('scripts')
    <script type="text/javascript">
        $('#alerta_vencimiento_boleta').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: false
        })
    </script>
@endsection

<!-- Monto Boleta Garantia Field -->
<div class="form-group col-sm-6">
    {!! Form::label('monto_boleta_garantia', 'Monto Boleta Garantia:') !!}
    {!! Form::number('monto_boleta_garantia', null, ['class' => 'form-control']) !!}
</div>

<!-- Id Mercado Publico Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_mercado_publico', 'Id Mercado Publico:') !!}
    {!! Form::text('id_mercado_publico', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
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
