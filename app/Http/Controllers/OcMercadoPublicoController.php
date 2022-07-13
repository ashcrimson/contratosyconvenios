<?php

namespace App\Http\Controllers;

use App\DataTables\OcMercadoPublicoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateOcMercadoPublicoRequest;
use App\Http\Requests\UpdateOcMercadoPublicoRequest;
use App\Imports\OcMercadoPublicoImport;
use App\Models\Bitacora;
use App\Models\DespachoTipo;
use App\Models\FormaPago;
use App\Models\Licitacion;
use App\Models\Moneda;
use App\Models\OcMercadoPublico;
use App\Models\OcMercadoPublicoCarga;
use App\Models\OcMercadoPublicoCargaDetalle;
use App\Models\OcmercadoPublicoComprador;
use App\Models\OcMercadoPublicoFechas;
use App\Models\OcMercadoPublicoItem;
use App\Models\OcMercadoPublicoProveedor;
use App\Models\OrdenCompraEstado;
use App\Models\OrdenCompraTipo;
use App\Traits\GuardarLogErroresTrait;
use Carbon\Carbon;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Response;

class OcMercadoPublicoController extends AppBaseController
{

    use GuardarLogErroresTrait;

    private $licitaciones;
    private $monedas;
    private $compraTipos;
    private $despachoTipos;
    private $formaPagos;

    public function __construct()
    {
        $this->middleware('permission:Ver Oc Mercado Publicos')->only(['show']);
        $this->middleware('permission:Crear Oc Mercado Publicos')->only(['create','store']);
        $this->middleware('permission:Editar Oc Mercado Publicos')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Oc Mercado Publicos')->only(['destroy']);
        $this->middleware('permission:Agregar Bitacora Oc Mercado Publicos')->only(['bitacoraVista','bitacoraStore']);
        $this->middleware('permission:Eliminar Bitacora Oc Mercado Publicos')->only(['bitacoraDestroy']);

        $this->licitaciones = Licitacion::all();
        $this->monedas = Moneda::all();
        $this->compraTipos = OrdenCompraTipo::all();
        $this->despachoTipos = DespachoTipo::all();
        $this->formaPagos = FormaPago::all();
    }

    /**
     * Display a listing of the OcMercadoPublico.
     *
     * @param OcMercadoPublicoDataTable $ocMercadoPublicoDataTable
     * @return Response
     */
    public function index(OcMercadoPublicoDataTable $ocMercadoPublicoDataTable)
    {
        return $ocMercadoPublicoDataTable->render('oc_mercado_publicos.index');
    }

    /**
     * Show the form for creating a new OcMercadoPublico.
     *
     * @return Response
     */
    public function create()
    {
        return view('oc_mercado_publicos.create');
    }

    /**
     * Store a newly created OcMercadoPublico in storage.
     *
     * @param CreateOcMercadoPublicoRequest $request
     *
     * @return Response
     */
    public function store(CreateOcMercadoPublicoRequest $request)
    {
        $input = $request->all();

        try {
            DB::beginTransaction();

            /** @var OcMercadoPublico $ocMercadoPublico */
            $ocMercadoPublico = OcMercadoPublico::create($input);

            /**
             * @var OcMercadoPublicoFechas $ocMercadoPublicoFechas
             */
            $ocMercadoPublicoFechas = OcMercadoPublicoFechas::create([
                'oc_mercado_publico_id' => $ocMercadoPublico->id,
                'fecha_creacion' => $request->get('fecha_creacion'),
                'fecha_envio' => $request->get('fecha_envio'),
                'fecha_aceptacion' => $request->get('fecha_aceptacion'),
                'fecha_cancelacion' => $request->get('fecha_cancelacion'),
                'fecha_ultima_modificacion' => $request->get('fecha_ultima_modificacion'),
            ]);

        } catch (\Exception $exception) {
            DB::rollBack();

            if (auth()->user()->can('puede depurar')) {
                throw $exception;
            }
            flash()->error($exception->getMessage());
            return back()->withInput();
        }
        DB::commit();

        Flash::success('Oc Mercado Publico guardado exitosamente.');

        return redirect(route('ocMercadoPublicos.index'));
    }

    /**
     * Display the specified OcMercadoPublico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var OcMercadoPublico $ocMercadoPublico */
        $ocMercadoPublico = OcMercadoPublico::with(['ocMercadoPublicoFechas'])->find($id);

        if (empty($ocMercadoPublico)) {
            Flash::error('Oc Mercado Publico no encontrado');

            return redirect(route('ocMercadoPublicos.index'));
        }

        return view('oc_mercado_publicos.show')->with('ocMercadoPublico', $ocMercadoPublico);
    }

    /**
     * Show the form for editing the specified OcMercadoPublico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var OcMercadoPublico $ocMercadoPublico */
        $ocMercadoPublico = OcMercadoPublico::with(['ocMercadoPublicoFechas','ocMercadoPublicoComprador'])->find($id);

        if (empty($ocMercadoPublico)) {
            Flash::error('Oc Mercado Publico no encontrado');

            return redirect(route('ocMercadoPublicos.index'));
        }

        return view('oc_mercado_publicos.edit')->with('ocMercadoPublico', $ocMercadoPublico);
    }

    /**
     * Update the specified OcMercadoPublico in storage.
     *
     * @param  int              $id
     * @param UpdateOcMercadoPublicoRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {

        /** @var OcMercadoPublico $ocMercadoPublico */
        $ocMercadoPublico = OcMercadoPublico::find($id);

        if (empty($ocMercadoPublico)) {
            Flash::error('Oc Mercado Publico no encontrado');

            return redirect(route('ocMercadoPublicos.index'));
        }

        try {
            DB::beginTransaction();

            $ocMercadoPublico->fill($request->all());
            $ocMercadoPublico->save();

            $ocMercadoPublico->ocMercadoPublicoProveedor()->update([
                'codigo' => $request->get('codigo_proveedor'),
                'nombre' => $request->get('nombre_proveedor'),
                'actividad' => $request->get('actividad_proveedor'),
                'codigo_sucursal' => $request->get('codigo_sucursal_proveedor'),
                'nombre_sucursal' => $request->get('nombre_sucursal_proveedor'),
                'rut_sucursal' => $request->get('rut_sucursal_proveedor'),
                'direccion' => $request->get('direccion_proveedor'),
                'comuna' => $request->get('comuna_proveedor'),
                'region' => $request->get('region_proveedor'),
                'pais' => $request->get('pais_proveedor'),
                'nombre_contacto' => $request->get('nombre_contacto_proveedor'),
                'cargo_contacto' => $request->get('cargo_contacto_proveedor'),
                'fono_contacto' => $request->get('fono_contacto_proveedor'),
                'mail_contacto' => $request->get('mail_contacto_proveedor'),
            ]);

            $ocMercadoPublico->ocMercadoPublicoComprador()->update([
                'codigo_organismo' => $request->get('codigo_organismo_comprador'),
                'nombre_organismo' => $request->get('nombre_organismo_comprador'),
                'rut_unidad' => $request->get('rut_unidad_comprador'),
                'codigo_unidad' => $request->get('codigo_unidad_comprador'),
                'nombre_unidad' => $request->get('nombre_unidad_comprador'),
                'actividad' => $request->get('actividad_comprador'),
                'direccion_unidad' => $request->get('direccion_unidad_comprador'),
                'comuna_unidad' => $request->get('comuna_unidad_comprador'),
                'region_unidad' => $request->get('region_unidad_comprador'),
                'pais' => $request->get('pais_comprador'),
                'nombre_contacto' => $request->get('nombre_contacto_comprador'),
                'cargo_contacto' => $request->get('cargo_contacto_comprador'),
                'fono_contacto' => $request->get('fono_contacto_comprador'),
                'mail_contacto' => $request->get('mail_contacto_comprador'),
            ]);

        } catch (\Exception $exception) {
            DB::rollBack();

            if (auth()->user()->can('puede depurar')) {
                throw $exception;
            }
            flash()->error($exception->getMessage());
            return back()->withInput();
        }
        DB::commit();

        Flash::success('Oc Mercado Publico actualizado con éxito.');

        return redirect(route('ocMercadoPublicos.index'));
    }

    /**
     * Remove the specified OcMercadoPublico from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var OcMercadoPublico $ocMercadoPublico */
        $ocMercadoPublico = OcMercadoPublico::find($id);

        if (empty($ocMercadoPublico)) {
            Flash::error('Oc Mercado Publico no encontrado');

            return redirect(route('ocMercadoPublicos.index'));
        }

        $ocMercadoPublico->delete();

        Flash::success('Oc Mercado Publico deleted successfully.');

        return redirect(route('ocMercadoPublicos.index'));
    }

    public function carga()
    {
        return view('oc_mercado_publicos.carga.import');
    }

    public function cargaStore(Request $request)
    {

        $archivo = $request->file('file');

        /**
         * @var OcMercadoPublicoCarga $ocMercadoPublicoCarga
         */
        $carga = OcMercadoPublicoCarga::create([
            'fecha_carga' => Carbon::now(),
            'nombre_archivio' => $archivo->getClientOriginalName(),
            'fecha_datos' => null,
            'total_registros' => 0,
            'total_nuevos' => 0,
            'total_actualizados' => 0,
            'tipo' => 'CARGA OC MERCADO PUBLICO DB',
            'user_id' => auth()->user()->id
        ]);

        $import = new OcMercadoPublicoImport();

        $import->import($archivo);

        $carga->total_registros = $import->getNumeroRegistos();
        $carga->save();

        $listadoNumeroOc = $import->getListOrdenCompras();

        try {
            DB::beginTransaction();

            foreach ($listadoNumeroOc as $oc) {

                OcMercadoPublicoCargaDetalle::create([
                    'orden_compra' => $oc,
                    'contrato_id' => NULL,
                    'estado_consulta' => 'SIN CONSULTA',
                    'detalle_consulta' => NULL,
                    'carga_id' => $carga->id
                ]);

            }

        } catch (\Exception $exception) {
            DB::rollBack();

            if (auth()->user()->can('puede depurar')) {
                throw $exception;
            }
            flash()->error($exception->getMessage());
            return back()->withInput();
        }
        DB::commit();

        flash('Listo! datos importados.')->success();

        return redirect(route('ocMercadoPublicos.index'));

    }

    public function cargaDetalle($cargaId)
    {

        /**
         * @var OcMercadoPublicoCarga $ocMercadoPublicoCarga
         */
        $ocMercadoPublicoCarga = OcMercadoPublicoCarga::findOrFail($cargaId);

        /**
         * @var OcMercadoPublicoCargaDetalle $ocMercadoPublicoCargaDetalles
         */
        $ocMercadoPublicoCargaDetalles = OcMercadoPublicoCargaDetalle::with(['carga'])->where('carga_id', $cargaId)->get();

        $totalDetallesSinConsultar = OcMercadoPublicoCargaDetalle::where([['carga_id', $cargaId], ['estado_consulta', 'SIN CONSULTA']])->count();
        $totalDetallesConsultadoExito = OcMercadoPublicoCargaDetalle::where([['carga_id', $cargaId], ['estado_consulta', 'CONSULTADO EXITO']])->count();
        $totalDetallesConsultadoError = OcMercadoPublicoCargaDetalle::where([['carga_id', $cargaId], ['estado_consulta', 'CONSULTADO ERROR']])->count();
        $totalDetallesConsultadoDuplicado = OcMercadoPublicoCargaDetalle::where([['carga_id', $cargaId], ['estado_consulta', 'CONSULTADO DUPLICADO BASE DATOS']])->count();

        return view('oc_mercado_publicos.carga.import_detalle', compact('ocMercadoPublicoCargaDetalles',
            'totalDetallesSinConsultar','totalDetallesConsultadoExito','totalDetallesConsultadoError','ocMercadoPublicoCarga',
            'totalDetallesConsultadoDuplicado'));
    }

    public function cagarDetalleConsultaApi($cargaId)
    {

        /**
         * @var OcMercadoPublicoCargaDetalle $ocMercadoPublicoCargaDetalles
         */
        $ocMercadoPublicoCargaDetalles = OcMercadoPublicoCargaDetalle::with(['carga'])->where('carga_id', $cargaId)->get();

        if ($ocMercadoPublicoCargaDetalles->isEmpty()) {
            Flash::error('No es posible realizar la consulta, no hay ordenes de compra cargados!');

            return redirect(route('ocMercadoPublicos.carga.detalle', $cargaId));
        }

        /**
         * @var OcMercadoPublicoCargaDetalle $ordenCompra
         */
        foreach ($ocMercadoPublicoCargaDetalles as $ordenCompra) {

            /**
             * @var OcMercadoPublico $ocMercadoPublico
             */
            $ocMecadoPublico = OcMercadoPublico::where('codigo', $ordenCompra->orden_compra)->first();

            if ($ocMecadoPublico) {

                $ordenCompra->estado_consulta = 'CONSULTADO DUPLICADO BASE DATOS';
                $ordenCompra->detalle_consulta = 'El numero orden ya existe en la base de datos';
                $ordenCompra->save();

            } else {

                $urlApi = 'http://api.mercadopublico.cl/servicios/v1/publico/ordenesdecompra.json';

                if (app()->environment()=='production') {
                    $oc = \Illuminate\Support\Facades\Http::withOptions([
                        'proxy' => config('app.proxy'),
                        'debug' => false
                    ])->get($urlApi,
                        [
                            'codigo' => $ordenCompra->orden_compra,
                            'ticket' => 'B5E38DC9-CE33-43A4-A364-F5F6DAE82328'
                        ]
                    )->json();
                } else {
                    $oc = \Illuminate\Support\Facades\Http::get($urlApi,
                        [
                            'codigo' => $ordenCompra->orden_compra,
                            'ticket' => 'B5E38DC9-CE33-43A4-A364-F5F6DAE82328'
                        ]
                    )->json();
                }

                if ( !empty($oc["Listado"]) ) {

                    $obj = $oc["Listado"][0];

                    try {
                        DB::beginTransaction();

                        /**
                         * @var OcMercadoPublico $ocMercadoPublico
                         */
                        $ocMercadoPublico = OcMercadoPublico::create([
                            'codigo' => $obj['Codigo'],
                            'nombre' => $obj['Nombre'],
                            'codigo_estado' => intval($obj['CodigoEstado']),
                            'nombre_estado' => $obj['Estado'],
                            'codigo_licitacion' => $this->getLicitacionPorNumero($obj['CodigoLicitacion'])->id ?? null,
                            'descripcion' => $obj['Descripcion'],
                            'codigo_tipo' => $this->getCompraTipoPorCodigo($obj['CodigoTipo'])->id ?? null,
                            'tipo_moneda' => $this->getMonedaPorCodigo($obj['TipoMoneda'])->id ?? 1,
                            'codigo_estado_proveedor' => intval($obj['CodigoEstadoProveedor']),
                            'promedio_calificacion' => intval($obj['PromedioCalificacion']),
                            'cantidad_evaluacion' => intval($obj['CantidadEvaluacion']),
                            'descuentos' => floatval($obj['Descuentos']),
                            'cargos' => floatval($obj['Cargos']),
                            'total_neto' => floatval($obj['TotalNeto']),
                            'porcentaje_iva' => floatval($obj['PorcentajeIva']),
                            'impuestos' => floatval($obj['Impuestos']),
                            'total' => floatval($obj['Total']),
                            'financiamiento' => $obj['Financiamiento'],
                            'pais' => $obj['Pais'],
                            'tipo_despacho' => $this->getDespachoTipoPorValor($obj['TipoDespacho'])->id,
                            'forma_pago' => $this->getFormaPagoPorValor($obj['FormaPago'])->id ?? 5,
                            'estado_proveedor' => $obj['EstadoProveedor'],
                            'cantidad_items' => $obj['Items']['Cantidad'],
                        ]);

                        /**
                         * @var OcMercadoPublicoFechas $ocMercadoPublicoFechas
                         */
                        $ocMercadoPublicoFechas = OcMercadoPublicoFechas::create([
                            'oc_mercado_publico_id' => $ocMercadoPublico->id,
                            'fecha_creacion' => $obj['Fechas']['FechaCreacion'],
                            'fecha_envio' => $obj['Fechas']['FechaEnvio'],
                            'fecha_aceptacion' => $obj['Fechas']['FechaAceptacion'],
                            'fecha_cancelacion' => $obj['Fechas']['FechaCancelacion'],
                            'fecha_ultima_modificacion' => $obj['Fechas']['FechaUltimaModificacion'],
                        ]);

                        if ($obj['Comprador']) {
                            /**
                             * @var OcmercadoPublicoComprador $ocMercadoPublicoComprador
                             */
                            $ocMercadoPublicoComprador = OcmercadoPublicoComprador::create([
                                'oc_mercado_publico_id' => $ocMercadoPublico->id,
                                'codigo_organismo' => $obj['Comprador']['CodigoOrganismo'],
                                'nombre_organismo' => $obj['Comprador']['NombreOrganismo'],
                                'rut_unidad' => $obj['Comprador']['RutUnidad'],
                                'codigo_unidad' => $obj['Comprador']['CodigoUnidad'],
                                'nombre_unidad' => $obj['Comprador']['NombreUnidad'],
                                'actividad' => $obj['Comprador']['Actividad'],
                                'direccion_unidad' => $obj['Comprador']['DireccionUnidad'],
                                'comuna_unidad' => $obj['Comprador']['ComunaUnidad'],
                                'region_unidad' => $obj['Comprador']['RegionUnidad'],
                                'pais' => $obj['Comprador']['Pais'],
                                'nombre_contacto' => $obj['Comprador']['NombreContacto'],
                                'cargo_contacto' => $obj['Comprador']['CargoContacto'],
                                'fono_contacto' => $obj['Comprador']['FonoContacto'],
                                'mail_contacto' => $obj['Comprador']['MailContacto'],
                            ]);
                        }

                        if ($obj['Proveedor']) {
                            /**
                             * @var OcMercadoPublicoProveedor $ocMercadoPublicoProveedor
                             */
                            $ocMercadoPublicoProveedor = OcMercadoPublicoProveedor::create([
                                'oc_mercado_publico_id' => $ocMercadoPublico->id,
                                'codigo' => $obj['Proveedor']['Codigo'],
                                'nombre' => $obj['Proveedor']['Nombre'],
                                'actividad' => $obj['Proveedor']['Actividad'],
                                'codigo_sucursal' => $obj['Proveedor']['CodigoSucursal'],
                                'nombre_sucursal' => $obj['Proveedor']['NombreSucursal'],
                                'rut_sucursal' => $obj['Proveedor']['RutSucursal'],
                                'direccion' => $obj['Proveedor']['Direccion'],
                                'comuna' => $obj['Proveedor']['Comuna'],
                                'region' => $obj['Proveedor']['Region'],
                                'pais' => $obj['Proveedor']['Pais'],
                                'nombre_contacto' => $obj['Proveedor']['NombreContacto'],
                                'cargo_contacto' => $obj['Proveedor']['CargoContacto'],
                                'fono_contacto' => $obj['Proveedor']['FonoContacto'],
                                'mail_contacto' => $obj['Proveedor']['MailContacto'],
                            ]);
                        }

                        foreach ($obj['Items']['Listado'] as $item) {
                            /**
                             * @var OcMercadoPublicoItem $ocMercadoPublicoItem
                             */
                            $ocMercadoPublicoItem = OcMercadoPublicoItem::create([
                                'oc_mercado_publico_id' => $ocMercadoPublico->id,
                                'correlativo' => $item['Correlativo'],
                                'codigo_categoria' => $item['CodigoCategoria'],
                                'categoria' => $item['Categoria'],
                                'codigo_producto' => $item['CodigoProducto'],
                                'producto' => $item['Producto'],
                                'especificacion_comprador' => $item['EspecificacionComprador'],
                                'especificacion_proveedor' => $item['EspecificacionProveedor'],
                                'cantidad' => $item['Cantidad'],
                                'unidad' => $item['Unidad'],
                                'moneda' => $item['Moneda'],
                                'precio_neto' => $item['PrecioNeto'],
                                'total_cargos' => $item['TotalCargos'],
                                'total_descuentos' => $item['TotalDescuentos'],
                                'total_impuestos' => $item['TotalImpuestos'],
                                'total' => $item['Total'],
                            ]);
                        }

                        $ordenCompra->estado_consulta = 'CONSULTADO EXITO';
                        $ordenCompra->detalle_consulta = null;
                        $ordenCompra->save();

                    } catch (\Exception $exception) {
                        DB::rollBack();

                        if (auth()->user()->can('puede depurar')) {
                            throw $exception;
                        }
                        flash()->error($exception->getMessage());
                        return back()->withInput();
                    }
                    DB::commit();

                    sleep(3);
                } else {
                    $ordenCompra->estado_consulta = 'CONSULTADO ERROR';
                    $ordenCompra->detalle_consulta = 'El numero orden no existe en la consulta API';
                    $ordenCompra->save();
//                $this->guardarLog('No pudo Consultar o Guardar el OC: '.$ordenCompra->orden_compra);
                }

            }

        }

        Flash::success('Consulta realizada exitosamente.');
        return redirect(route('ocMercadoPublicos.carga.detalle', $cargaId));

    }

    public function carga2()
    {
        return view('oc_mercado_publicos.carga.import2');
    }

    public function cargaStore2(Request $request)
    {

        try {

//            /**
//             * @var OcMercadoPublico $ocMercadoPublicoValidar
//             */
//            $ocMercadoPublicoValidar = OcMercadoPublico::where('codigo', $request->get('no_oc'))->first();
//
//            if ($ocMercadoPublicoValidar) {
//                return redirect()->back()->withInput([$request->get('no_oc')])->withErrors(['La Orden de Compra '.$request->get('no_oc').' que ingreso ya existe en la Base de Datos']);
//            }

            $urlApi = 'http://api.mercadopublico.cl/servicios/v1/publico/ordenesdecompra.json';

            if (app()->environment()=='production'){
                $oc = \Illuminate\Support\Facades\Http::withOptions([
                    'proxy' => config('app.proxy'),
                    'debug' => false
                ])->get($urlApi,
                    [
                        'codigo' => $request->get('no_oc'),
                        'ticket' => 'B5E38DC9-CE33-43A4-A364-F5F6DAE82328'
                    ]
                )->json();
            } else {
                $oc = \Illuminate\Support\Facades\Http::get($urlApi,
                    [
                        'codigo' => $request->get('no_oc'),
                        'ticket' => 'B5E38DC9-CE33-43A4-A364-F5F6DAE82328'
                    ]
                )->json();
            }
        } catch (\Exception $exception) {
            flash()->error($exception->getMessage());
            return back()->withInput();
        }

        $obj = $oc['Listado'][0];

        try {
            DB::beginTransaction();

            /**
             * @var OcMercadoPublico $ocMercadoPublico
             */
            $ocMercadoPublico = OcMercadoPublico::create([
                'codigo' => $obj['Codigo'],
                'nombre' => $obj['Nombre'],
                'codigo_estado' => intval($obj['CodigoEstado']),
                'nombre_estado' => $obj['Estado'],
                'codigo_licitacion' => $this->getLicitacionPorNumero($obj['CodigoLicitacion'])->id ?? null,
                'descripcion' => $obj['Descripcion'],
                'codigo_tipo' => $this->getCompraTipoPorCodigo($obj['CodigoTipo'])->id ?? null,
                'tipo_moneda' => $this->getMonedaPorCodigo($obj['TipoMoneda'])->id ?? 1,
                'codigo_estado_proveedor' => intval($obj['CodigoEstadoProveedor']),
                'promedio_calificacion' => intval($obj['PromedioCalificacion']),
                'cantidad_evaluacion' => intval($obj['CantidadEvaluacion']),
                'descuentos' => floatval($obj['Descuentos']),
                'cargos' => floatval($obj['Cargos']),
                'total_neto' => floatval($obj['TotalNeto']),
                'porcentaje_iva' => floatval($obj['PorcentajeIva']),
                'impuestos' => floatval($obj['Impuestos']),
                'total' => floatval($obj['Total']),
                'financiamiento' => $obj['Financiamiento'],
                'pais' => $obj['Pais'],
                'tipo_despacho' => $this->getDespachoTipoPorValor($obj['TipoDespacho'])->id,
                'forma_pago' => $this->getFormaPagoPorValor($obj['FormaPago'])->id ?? 5,
                'estado_proveedor' => $obj['EstadoProveedor'],
                'cantidad_items' => $obj['Items']['Cantidad'],
            ]);

            /**
             * @var OcMercadoPublicoFechas $ocMercadoPublicoFechas
             */
            $ocMercadoPublicoFechas = OcMercadoPublicoFechas::create([
                'oc_mercado_publico_id' => $ocMercadoPublico->id,
                'fecha_creacion' => $obj['Fechas']['FechaCreacion'],
                'fecha_envio' => $obj['Fechas']['FechaEnvio'],
                'fecha_aceptacion' => $obj['Fechas']['FechaAceptacion'],
                'fecha_cancelacion' => $obj['Fechas']['FechaCancelacion'],
                'fecha_ultima_modificacion' => $obj['Fechas']['FechaUltimaModificacion'],
            ]);

            if ($obj['Comprador']) {
                /**
                 * @var OcmercadoPublicoComprador $ocMercadoPublicoComprador
                 */
                $ocMercadoPublicoComprador = OcmercadoPublicoComprador::create([
                    'oc_mercado_publico_id' => $ocMercadoPublico->id,
                    'codigo_organismo' => $obj['Comprador']['CodigoOrganismo'],
                    'nombre_organismo' => $obj['Comprador']['NombreOrganismo'],
                    'rut_unidad' => $obj['Comprador']['RutUnidad'],
                    'codigo_unidad' => $obj['Comprador']['CodigoUnidad'],
                    'nombre_unidad' => $obj['Comprador']['NombreUnidad'],
                    'actividad' => $obj['Comprador']['Actividad'],
                    'direccion_unidad' => $obj['Comprador']['DireccionUnidad'],
                    'comuna_unidad' => $obj['Comprador']['ComunaUnidad'],
                    'region_unidad' => $obj['Comprador']['RegionUnidad'],
                    'pais' => $obj['Comprador']['Pais'],
                    'nombre_contacto' => $obj['Comprador']['NombreContacto'],
                    'cargo_contacto' => $obj['Comprador']['CargoContacto'],
                    'fono_contacto' => $obj['Comprador']['FonoContacto'],
                    'mail_contacto' => $obj['Comprador']['MailContacto'],
                ]);
            }

            if ($obj['Proveedor']) {
                /**
                 * @var OcMercadoPublicoProveedor $ocMercadoPublicoProveedor
                 */
                $ocMercadoPublicoProveedor = OcMercadoPublicoProveedor::create([
                    'oc_mercado_publico_id' => $ocMercadoPublico->id,
                    'codigo' => $obj['Proveedor']['Codigo'],
                    'nombre' => $obj['Proveedor']['Nombre'],
                    'actividad' => $obj['Proveedor']['Actividad'],
                    'codigo_sucursal' => $obj['Proveedor']['CodigoSucursal'],
                    'nombre_sucursal' => $obj['Proveedor']['NombreSucursal'],
                    'rut_sucursal' => $obj['Proveedor']['RutSucursal'],
                    'direccion' => $obj['Proveedor']['Direccion'],
                    'comuna' => $obj['Proveedor']['Comuna'],
                    'region' => $obj['Proveedor']['Region'],
                    'pais' => $obj['Proveedor']['Pais'],
                    'nombre_contacto' => $obj['Proveedor']['NombreContacto'],
                    'cargo_contacto' => $obj['Proveedor']['CargoContacto'],
                    'fono_contacto' => $obj['Proveedor']['FonoContacto'],
                    'mail_contacto' => $obj['Proveedor']['MailContacto'],
                ]);
            }

            foreach ($obj['Items']['Listado'] as $item) {
                /**
                 * @var OcMercadoPublicoItem $ocMercadoPublicoItem
                 */
                $ocMercadoPublicoItem = OcMercadoPublicoItem::create([
                    'oc_mercado_publico_id' => $ocMercadoPublico->id,
                    'correlativo' => $item['Correlativo'],
                    'codigo_categoria' => $item['CodigoCategoria'],
                    'categoria' => $item['Categoria'],
                    'codigo_producto' => $item['CodigoProducto'],
                    'producto' => $item['Producto'],
                    'especificacion_comprador' => $item['EspecificacionComprador'],
                    'especificacion_proveedor' => $item['EspecificacionProveedor'],
                    'cantidad' => $item['Cantidad'],
                    'unidad' => $item['Unidad'],
                    'moneda' => $item['Moneda'],
                    'precio_neto' => $item['PrecioNeto'],
                    'total_cargos' => $item['TotalCargos'],
                    'total_descuentos' => $item['TotalDescuentos'],
                    'total_impuestos' => $item['TotalImpuestos'],
                    'total' => $item['Total'],
                ]);
            }
        } catch (\Exception $exception) {
            DB::rollBack();

            if (auth()->user()->can('puede depurar')) {
                throw $exception;
            }
            flash()->error($exception->getMessage());
            return back()->withInput();
        }
        DB::commit();

        flash('Listo! datos importados.')->success();

        return redirect( route('ocMercadoPublicos.index') );

    }

    public function getLicitacionPorNumero($numero)
    {
        return $this->licitaciones->where('numero', $numero)->first();
    }

    public function getMonedaPorCodigo($codigo)
    {
        return $this->monedas->where('codigo', $codigo)->first();
    }

    public function getCompraTipoPorCodigo($codigo)
    {
        return $this->compraTipos->where('codigo', $codigo)->first();
    }

    public function getDespachoTipoPorValor($valor)
    {
        return $this->despachoTipos->where('valor', $valor)->first();
    }

    public function getFormaPagoPorValor($valor)
    {
        return $this->formaPagos->where('valor', $valor)->first();
    }

    public function bitacoraVista(OcMercadoPublico $ocMercadoPublico)
    {
        return view('oc_mercado_publicos.bitacora_orden_compra', compact('ocMercadoPublico'));
    }

    public function bitacoraStore(OcMercadoPublico $ocMercadoPublico, Request $request)
    {
        try {
            DB::beginTransaction();

            /**
             * @var Bitacora $bitacora
             */
            $bitacora = $ocMercadoPublico->addBitacora($request->titulo,$request->descripcion);

            if ($request->hasFile('adjunto')){
                $bitacora->addDocumento($request->file('adjunto'));
            }

        } catch (\Exception $exception) {
            DB::rollBack();

            if (auth()->user()->can('puede depurar')) {
                throw $exception;
            }
            flash()->error($exception->getMessage());
            return back()->withInput();
        }
        DB::commit();

        flash('Bitacora agregada!')->success();

        return redirect(route('ocMercadoPublicos.bitacora.vista',compact('ocMercadoPublico')));
    }

    public function bitacoraDestroy(OcMercadoPublico $ocMercadoPublico,Bitacora $bitacora,Request $request)
    {
        $bitacora->delete();

        flash('Bitacora Eliminada!')->success();

        return redirect(route('ocMercadoPublicos.bitacora.vista',compact('ocMercadoPublico')));
    }

    public function bitacoraVistaItem(Request $request, $ocMercadoPublicoItemId)
    {
        $ocMercadoPublicoItem = OcMercadoPublicoItem::with(['OcMercadoPublico'])->findOrFail($ocMercadoPublicoItemId);
//        return $ocMercadoPublicoItem;
        return view('oc_mercado_publicos.bitacora_orden_compra_item', compact('ocMercadoPublicoItem'));
    }

    public function bitacoraStoreItem($ocMercadoPublicoItemId, Request $request)
    {

        $ocMercadoPublicoItem = OcMercadoPublicoItem::with(['OcMercadoPublico'])->findOrFail($ocMercadoPublicoItemId);

        try {
            DB::beginTransaction();

            /**
             * @var Bitacora $bitacora
             */
            $bitacora = $ocMercadoPublicoItem->addBitacora($request->titulo,$request->descripcion);

            if ($request->hasFile('adjunto')){
                foreach ($request->file('adjunto') as $file) {
                    $bitacora->addDocumento($file);
                }
            }

        } catch (\Exception $exception) {
            DB::rollBack();

            if (auth()->user()->can('puede depurar')) {
                throw $exception;
            }
            flash()->error($exception->getMessage());
            return back()->withInput();
        }
        DB::commit();

        flash('Bitacora agregada!')->success();

        return redirect(route('ocMercadoPublicos.items.bitacora.vista', $ocMercadoPublicoItem->id));
    }

    public function bitacoraDestroyItem($ocMercadoPublicoItemId,Bitacora $bitacora,Request $request)
    {
        $ocMercadoPublicoItem = OcMercadoPublicoItem::with(['OcMercadoPublico'])->findOrFail($ocMercadoPublicoItemId);

        $bitacora->delete();

        flash('Bitacora Eliminada!')->success();

        return redirect(route('ocMercadoPublicos.items.bitacora.vista', $ocMercadoPublicoItem->id));
    }
}
