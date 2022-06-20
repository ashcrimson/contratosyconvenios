<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOcMercadoPublicTipoPagoAPIRequest;
use App\Http\Requests\API\UpdateOcMercadoPublicTipoPagoAPIRequest;
use App\Models\OcMercadoPublicTipoPago;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class OcMercadoPublicTipoPagoController
 * @package App\Http\Controllers\API
 */

class OcMercadoPublicTipoPagoAPIController extends AppBaseController
{
    /**
     * Display a listing of the OcMercadoPublicTipoPago.
     * GET|HEAD /ocMercadoPublicTipoPagos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = OcMercadoPublicTipoPago::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $ocMercadoPublicTipoPagos = $query->get();

        return $this->sendResponse($ocMercadoPublicTipoPagos->toArray(), 'Oc Mercado Public Tipo Pagos retrieved successfully');
    }

    /**
     * Store a newly created OcMercadoPublicTipoPago in storage.
     * POST /ocMercadoPublicTipoPagos
     *
     * @param CreateOcMercadoPublicTipoPagoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOcMercadoPublicTipoPagoAPIRequest $request)
    {
        $input = $request->all();

        /** @var OcMercadoPublicTipoPago $ocMercadoPublicTipoPago */
        $ocMercadoPublicTipoPago = OcMercadoPublicTipoPago::create($input);

        return $this->sendResponse($ocMercadoPublicTipoPago->toArray(), 'Oc Mercado Public Tipo Pago guardado exitosamente');
    }

    /**
     * Display the specified OcMercadoPublicTipoPago.
     * GET|HEAD /ocMercadoPublicTipoPagos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var OcMercadoPublicTipoPago $ocMercadoPublicTipoPago */
        $ocMercadoPublicTipoPago = OcMercadoPublicTipoPago::find($id);

        if (empty($ocMercadoPublicTipoPago)) {
            return $this->sendError('Oc Mercado Public Tipo Pago no encontrado');
        }

        return $this->sendResponse($ocMercadoPublicTipoPago->toArray(), 'Oc Mercado Public Tipo Pago retrieved successfully');
    }

    /**
     * Update the specified OcMercadoPublicTipoPago in storage.
     * PUT/PATCH /ocMercadoPublicTipoPagos/{id}
     *
     * @param int $id
     * @param UpdateOcMercadoPublicTipoPagoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOcMercadoPublicTipoPagoAPIRequest $request)
    {
        /** @var OcMercadoPublicTipoPago $ocMercadoPublicTipoPago */
        $ocMercadoPublicTipoPago = OcMercadoPublicTipoPago::find($id);

        if (empty($ocMercadoPublicTipoPago)) {
            return $this->sendError('Oc Mercado Public Tipo Pago no encontrado');
        }

        $ocMercadoPublicTipoPago->fill($request->all());
        $ocMercadoPublicTipoPago->save();

        return $this->sendResponse($ocMercadoPublicTipoPago->toArray(), 'OcMercadoPublicTipoPago actualizado con éxito');
    }

    /**
     * Remove the specified OcMercadoPublicTipoPago from storage.
     * DELETE /ocMercadoPublicTipoPagos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var OcMercadoPublicTipoPago $ocMercadoPublicTipoPago */
        $ocMercadoPublicTipoPago = OcMercadoPublicTipoPago::find($id);

        if (empty($ocMercadoPublicTipoPago)) {
            return $this->sendError('Oc Mercado Public Tipo Pago no encontrado');
        }

        $ocMercadoPublicTipoPago->delete();

        return $this->sendSuccess('Oc Mercado Public Tipo Pago deleted successfully');
    }
}
