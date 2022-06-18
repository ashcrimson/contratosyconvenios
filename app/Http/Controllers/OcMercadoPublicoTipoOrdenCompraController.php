<?php

namespace App\Http\Controllers;

use App\DataTables\OcMercadoPublicoTipoOrdenCompraDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateOcMercadoPublicoTipoOrdenCompraRequest;
use App\Http\Requests\UpdateOcMercadoPublicoTipoOrdenCompraRequest;
use App\Models\OcMercadoPublicoTipoOrdenCompra;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class OcMercadoPublicoTipoOrdenCompraController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Oc Mercado Publico Tipo Orden Compras')->only(['show']);
        $this->middleware('permission:Crear Oc Mercado Publico Tipo Orden Compras')->only(['create','store']);
        $this->middleware('permission:Editar Oc Mercado Publico Tipo Orden Compras')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Oc Mercado Publico Tipo Orden Compras')->only(['destroy']);
    }

    /**
     * Display a listing of the OcMercadoPublicoTipoOrdenCompra.
     *
     * @param OcMercadoPublicoTipoOrdenCompraDataTable $ocMercadoPublicoTipoOrdenCompraDataTable
     * @return Response
     */
    public function index(OcMercadoPublicoTipoOrdenCompraDataTable $ocMercadoPublicoTipoOrdenCompraDataTable)
    {
        return $ocMercadoPublicoTipoOrdenCompraDataTable->render('oc_mercado_publico_tipo_orden_compras.index');
    }

    /**
     * Show the form for creating a new OcMercadoPublicoTipoOrdenCompra.
     *
     * @return Response
     */
    public function create()
    {
        return view('oc_mercado_publico_tipo_orden_compras.create');
    }

    /**
     * Store a newly created OcMercadoPublicoTipoOrdenCompra in storage.
     *
     * @param CreateOcMercadoPublicoTipoOrdenCompraRequest $request
     *
     * @return Response
     */
    public function store(CreateOcMercadoPublicoTipoOrdenCompraRequest $request)
    {
        $input = $request->all();

        /** @var OcMercadoPublicoTipoOrdenCompra $ocMercadoPublicoTipoOrdenCompra */
        $ocMercadoPublicoTipoOrdenCompra = OcMercadoPublicoTipoOrdenCompra::create($input);

        Flash::success('Oc Mercado Publico Tipo Orden Compra guardado exitosamente.');

        return redirect(route('ocMpTipoOrdenCompras.index'));
    }

    /**
     * Display the specified OcMercadoPublicoTipoOrdenCompra.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var OcMercadoPublicoTipoOrdenCompra $ocMercadoPublicoTipoOrdenCompra */
        $ocMercadoPublicoTipoOrdenCompra = OcMercadoPublicoTipoOrdenCompra::find($id);

        if (empty($ocMercadoPublicoTipoOrdenCompra)) {
            Flash::error('Oc Mercado Publico Tipo Orden Compra no encontrado');

            return redirect(route('ocMpTipoOrdenCompras.index'));
        }

        return view('oc_mercado_publico_tipo_orden_compras.show')->with('ocMercadoPublicoTipoOrdenCompra', $ocMercadoPublicoTipoOrdenCompra);
    }

    /**
     * Show the form for editing the specified OcMercadoPublicoTipoOrdenCompra.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var OcMercadoPublicoTipoOrdenCompra $ocMercadoPublicoTipoOrdenCompra */
        $ocMercadoPublicoTipoOrdenCompra = OcMercadoPublicoTipoOrdenCompra::find($id);

        if (empty($ocMercadoPublicoTipoOrdenCompra)) {
            Flash::error('Oc Mercado Publico Tipo Orden Compra no encontrado');

            return redirect(route('ocMpTipoOrdenCompras.index'));
        }

        return view('oc_mercado_publico_tipo_orden_compras.edit')->with('ocMercadoPublicoTipoOrdenCompra', $ocMercadoPublicoTipoOrdenCompra);
    }

    /**
     * Update the specified OcMercadoPublicoTipoOrdenCompra in storage.
     *
     * @param  int              $id
     * @param UpdateOcMercadoPublicoTipoOrdenCompraRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOcMercadoPublicoTipoOrdenCompraRequest $request)
    {
        /** @var OcMercadoPublicoTipoOrdenCompra $ocMercadoPublicoTipoOrdenCompra */
        $ocMercadoPublicoTipoOrdenCompra = OcMercadoPublicoTipoOrdenCompra::find($id);

        if (empty($ocMercadoPublicoTipoOrdenCompra)) {
            Flash::error('Oc Mercado Publico Tipo Orden Compra no encontrado');

            return redirect(route('ocMpTipoOrdenCompras.index'));
        }

        $ocMercadoPublicoTipoOrdenCompra->fill($request->all());
        $ocMercadoPublicoTipoOrdenCompra->save();

        Flash::success('Oc Mercado Publico Tipo Orden Compra actualizado con éxito.');

        return redirect(route('ocMpTipoOrdenCompras.index'));
    }

    /**
     * Remove the specified OcMercadoPublicoTipoOrdenCompra from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var OcMercadoPublicoTipoOrdenCompra $ocMercadoPublicoTipoOrdenCompra */
        $ocMercadoPublicoTipoOrdenCompra = OcMercadoPublicoTipoOrdenCompra::find($id);

        if (empty($ocMercadoPublicoTipoOrdenCompra)) {
            Flash::error('Oc Mercado Publico Tipo Orden Compra no encontrado');

            return redirect(route('ocMpTipoOrdenCompras.index'));
        }

        $ocMercadoPublicoTipoOrdenCompra->delete();

        Flash::success('Oc Mercado Publico Tipo Orden Compra deleted successfully.');

        return redirect(route('ocMpTipoOrdenCompras.index'));
    }
}
