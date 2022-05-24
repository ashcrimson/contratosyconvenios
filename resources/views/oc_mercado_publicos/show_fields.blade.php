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

<!-- Codigo Tipo Field -->
{!! Form::label('codigo_tipo', 'Codigo Tipo:') !!}
{!! $ocMercadoPublico->codigoTipo->abreviacion !!}<br>

<!-- Tipo Moneda Field -->
{!! Form::label('tipo_moneda', 'Tipo Moneda:') !!}
{!! $ocMercadoPublico->tipoMoneda->valor !!}<br>

<!-- Codigo Estado Proveedor Field -->
{!! Form::label('codigo_estado_proveedor', 'Codigo Estado Proveedor:') !!}
{!! $ocMercadoPublico->codigo_estado_proveedor !!}<br>

<!-- Promedio Calificacion Field -->
{!! Form::label('promedio_calificacion', 'Promedio Calificacion:') !!}
{!! $ocMercadoPublico->promedio_calificacion !!}<br>

<!-- Cantidad Evaluacion Field -->
{!! Form::label('cantidad_evaluacion', 'Cantidad Evaluacion:') !!}
{!! $ocMercadoPublico->cantidad_evaluacion !!}<br>

<!-- Descuentos Field -->
{!! Form::label('descuentos', 'Descuentos:') !!}
{!! $ocMercadoPublico->descuentos !!}<br>

<!-- Cargos Field -->
{!! Form::label('cargos', 'Cargos:') !!}
{!! $ocMercadoPublico->cargos !!}<br>

<!-- Total Neto Field -->
{!! Form::label('total_neto', 'Total Neto:') !!}
{!! $ocMercadoPublico->total_neto !!}<br>

<!-- Porcentaje Iva Field -->
{!! Form::label('porcentaje_iva', 'Porcentaje Iva:') !!}
{!! $ocMercadoPublico->porcentaje_iva !!}<br>

<!-- Impuestos Field -->
{!! Form::label('impuestos', 'Impuestos:') !!}
{!! $ocMercadoPublico->impuestos !!}<br>

<!-- Total Field -->
{!! Form::label('total', 'Total:') !!}
{!! $ocMercadoPublico->total !!}<br>

<!-- Financiamiento Field -->
{!! Form::label('financiamiento', 'Financiamiento:') !!}
{!! $ocMercadoPublico->financiamiento !!}<br>

<!-- Pais Field -->
{!! Form::label('pais', 'Pais:') !!}
{!! $ocMercadoPublico->pais !!}<br>

<!-- Tipo Despacho Field -->
{!! Form::label('tipo_despacho', 'Tipo Despacho:') !!}
{!! $ocMercadoPublico->tipoDespacho->descripcion !!}<br>

<!-- Forma Pago Field -->
{!! Form::label('forma_pago', 'Forma Pago:') !!}
{!! $ocMercadoPublico->formaPago->descripcion !!}<br>

<!-- Estado Proveedor Field -->
{!! Form::label('estado_proveedor', 'Estado Proveedor:') !!}
{!! $ocMercadoPublico->estado_proveedor !!}<br>

<!-- Cantidad Items Field -->
{!! Form::label('cantidad_items', 'Cantidad Items:') !!}
{!! $ocMercadoPublico->cantidad_items !!}<br>

@include('oc_mercado_publicos.partials.fechas_fields')

@include('oc_mercado_publicos.partials.comprador')

@include('oc_mercado_publicos.partials.proveedor')

@include('oc_mercado_publicos.partials.items')
