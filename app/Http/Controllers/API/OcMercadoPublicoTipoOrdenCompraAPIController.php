<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOcMercadoPublicoTipoOrdenCompraAPIRequest;
use App\Http\Requests\API\UpdateOcMercadoPublicoTipoOrdenCompraAPIRequest;
use App\Models\OcMercadoPublicoTipoOrdenCompra;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class OcMercadoPublicoTipoOrdenCompraController
 * @package App\Http\Controllers\API
 */

class OcMercadoPublicoTipoOrdenCompraAPIController extends AppBaseController
{
    /**
     * Display a listing of the OcMercadoPublicoTipoOrdenCompra.
     * GET|HEAD /ocMercadoPublicoTipoOrdenCompras
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = OcMercadoPublicoTipoOrdenCompra::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $ocMercadoPublicoTipoOrdenCompras = $query->get();

        return $this->sendResponse($ocMercadoPublicoTipoOrdenCompras->toArray(), 'Oc Mercado Publico Tipo Orden Compras retrieved successfully');
    }

    /**
     * Store a newly created OcMercadoPublicoTipoOrdenCompra in storage.
     * POST /ocMercadoPublicoTipoOrdenCompras
     *
     * @param CreateOcMercadoPublicoTipoOrdenCompraAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOcMercadoPublicoTipoOrdenCompraAPIRequest $request)
    {
        $input = $request->all();

        /** @var OcMercadoPublicoTipoOrdenCompra $ocMercadoPublicoTipoOrdenCompra */
        $ocMercadoPublicoTipoOrdenCompra = OcMercadoPublicoTipoOrdenCompra::create($input);

        return $this->sendResponse($ocMercadoPublicoTipoOrdenCompra->toArray(), 'Oc Mercado Publico Tipo Orden Compra guardado exitosamente');
    }

    /**
     * Display the specified OcMercadoPublicoTipoOrdenCompra.
     * GET|HEAD /ocMercadoPublicoTipoOrdenCompras/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var OcMercadoPublicoTipoOrdenCompra $ocMercadoPublicoTipoOrdenCompra */
        $ocMercadoPublicoTipoOrdenCompra = OcMercadoPublicoTipoOrdenCompra::find($id);

        if (empty($ocMercadoPublicoTipoOrdenCompra)) {
            return $this->sendError('Oc Mercado Publico Tipo Orden Compra no encontrado');
        }

        return $this->sendResponse($ocMercadoPublicoTipoOrdenCompra->toArray(), 'Oc Mercado Publico Tipo Orden Compra retrieved successfully');
    }

    /**
     * Update the specified OcMercadoPublicoTipoOrdenCompra in storage.
     * PUT/PATCH /ocMercadoPublicoTipoOrdenCompras/{id}
     *
     * @param int $id
     * @param UpdateOcMercadoPublicoTipoOrdenCompraAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOcMercadoPublicoTipoOrdenCompraAPIRequest $request)
    {
        /** @var OcMercadoPublicoTipoOrdenCompra $ocMercadoPublicoTipoOrdenCompra */
        $ocMercadoPublicoTipoOrdenCompra = OcMercadoPublicoTipoOrdenCompra::find($id);

        if (empty($ocMercadoPublicoTipoOrdenCompra)) {
            return $this->sendError('Oc Mercado Publico Tipo Orden Compra no encontrado');
        }

        $ocMercadoPublicoTipoOrdenCompra->fill($request->all());
        $ocMercadoPublicoTipoOrdenCompra->save();

        return $this->sendResponse($ocMercadoPublicoTipoOrdenCompra->toArray(), 'OcMercadoPublicoTipoOrdenCompra actualizado con éxito');
    }

    /**
     * Remove the specified OcMercadoPublicoTipoOrdenCompra from storage.
     * DELETE /ocMercadoPublicoTipoOrdenCompras/{id}
     *
     * @param int $id
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
            return $this->sendError('Oc Mercado Publico Tipo Orden Compra no encontrado');
        }

        $ocMercadoPublicoTipoOrdenCompra->delete();

        return $this->sendSuccess('Oc Mercado Publico Tipo Orden Compra deleted successfully');
    }
}
