<?php

namespace App\Http\Controllers;

use App\DataTables\OcMercadoPublicoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateOcMercadoPublicoRequest;
use App\Http\Requests\UpdateOcMercadoPublicoRequest;
use App\Imports\OcMercadoPublicoImport;
use App\Models\DespachoTipo;
use App\Models\FormaPago;
use App\Models\Moneda;
use App\Models\OcMercadoPublico;
use App\Models\OcMercadoPublicoFechas;
use App\Models\OcMercadoPublicoItem;
use App\Models\OrdenCompraTipo;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Response;

class OcMercadoPublicoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Oc Mercado Publicos')->only(['show']);
        $this->middleware('permission:Crear Oc Mercado Publicos')->only(['create','store']);
        $this->middleware('permission:Editar Oc Mercado Publicos')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Oc Mercado Publicos')->only(['destroy']);
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
        $ocMercadoPublico = OcMercadoPublico::with(['ocMercadoPublicoFechas'])->find($id);

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
    public function update($id, UpdateOcMercadoPublicoRequest $request)
    {
        /** @var OcMercadoPublico $ocMercadoPublico */
        $ocMercadoPublico = OcMercadoPublico::find($id);

        if (empty($ocMercadoPublico)) {
            Flash::error('Oc Mercado Publico no encontrado');

            return redirect(route('ocMercadoPublicos.index'));
        }

        $ocMercadoPublico->fill($request->all());
        $ocMercadoPublico->save();

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

        $import = new OcMercadoPublicoImport();

        $import->import($archivo);

        flash('Listo! datos importados.')->success();

        return redirect(route('ocMercadoPublicos.index'));

    }

    public function carga2()
    {
        return view('oc_mercado_publicos.carga.import2');
    }

    public function cargaStore2(Request $request)
    {

        try {
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

//        $response = Http::get('http://api.mercadopublico.cl/servicios/v1/publico/ordenesdecompra.json',
//            [
//                'codigo' => $request->get('no_oc'),
//                'ticket' => 'B5E38DC9-CE33-43A4-A364-F5F6DAE82328'
//            ]
//        );

        $obj = $oc['Listado'][0];

        /**
         * @var Moneda $moneda
         */
        $moneda = Moneda::where('codigo', $obj['TipoMoneda'])->first();

        /**
         * @var OrdenCompraTipo $compraTipo
         */
        $compraTipo = OrdenCompraTipo::where('codigo', $obj['CodigoTipo'])->first();

        /**
         * @var DespachoTipo $despachoTipo
         */
        $despachoTipo = DespachoTipo::where('valor', $obj['TipoDespacho'])->first();

        /**
         * @var FormaPago $formaPago
         */
        $formaPago = FormaPago::where('valor', $obj['FormaPago'])->first();

        try {
            DB::beginTransaction();

            /**
             * @var OcMercadoPublico $ocMercadoPublico
             */
            $ocMercadoPublico = OcMercadoPublico::create([
                'codigo' => $obj['Codigo'],
                'nombre' => $obj['Nombre'],
                'codigo_estado' => intval($obj['CodigoEstado']),
                'codigo_licitacion' => intval($obj['CodigoLicitacion']),
                'descripcion' => $obj['Descripcion'],
                'codigo_tipo' => $compraTipo->id,
                'tipo_moneda' => $moneda->id ?? 1,
                'codigo_estado_proveedor' => intval($obj['CodigoEstadoProveedor']),
                'promedio_calificacion' => intval($obj['PromedioCalificacion']),
                'cantidad_evaluacion' => intval($obj['CantidadEvaluacion']),
                'descuentos' => floatval($obj['Descuentos']),
                'cargos' => floatval($obj['Cargos']),
                'total_neto' => floatval($obj['TotalNeto']),
                'porcentaje_iva' => floatval($obj['PorcentajeIva']),
                'impuestos' => floatval($obj['Impuestos']),
                'total' => floatval($obj['Total']),
                'financiamiento' => floatval($obj['Financiamiento']),
                'pais' => $obj['Pais'],
                'tipo_despacho' => $despachoTipo->id,
                'forma_pago' => $formaPago->id ?? 5
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
}
