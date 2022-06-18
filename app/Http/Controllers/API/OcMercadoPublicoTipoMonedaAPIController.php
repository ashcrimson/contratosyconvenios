<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOcMercadoPublicoTipoMonedaAPIRequest;
use App\Http\Requests\API\UpdateOcMercadoPublicoTipoMonedaAPIRequest;
use App\Models\OcMercadoPublicoTipoMoneda;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class OcMercadoPublicoTipoMonedaController
 * @package App\Http\Controllers\API
 */

class OcMercadoPublicoTipoMonedaAPIController extends AppBaseController
{
    /**
     * Display a listing of the OcMercadoPublicoTipoMoneda.
     * GET|HEAD /ocMercadoPublicoTipoMonedas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = OcMercadoPublicoTipoMoneda::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $ocMercadoPublicoTipoMonedas = $query->get();

        return $this->sendResponse($ocMercadoPublicoTipoMonedas->toArray(), 'Oc Mercado Publico Tipo Monedas retrieved successfully');
    }

    /**
     * Store a newly created OcMercadoPublicoTipoMoneda in storage.
     * POST /ocMercadoPublicoTipoMonedas
     *
     * @param CreateOcMercadoPublicoTipoMonedaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOcMercadoPublicoTipoMonedaAPIRequest $request)
    {
        $input = $request->all();

        /** @var OcMercadoPublicoTipoMoneda $ocMercadoPublicoTipoMoneda */
        $ocMercadoPublicoTipoMoneda = OcMercadoPublicoTipoMoneda::create($input);

        return $this->sendResponse($ocMercadoPublicoTipoMoneda->toArray(), 'Oc Mercado Publico Tipo Moneda guardado exitosamente');
    }

    /**
     * Display the specified OcMercadoPublicoTipoMoneda.
     * GET|HEAD /ocMercadoPublicoTipoMonedas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var OcMercadoPublicoTipoMoneda $ocMercadoPublicoTipoMoneda */
        $ocMercadoPublicoTipoMoneda = OcMercadoPublicoTipoMoneda::find($id);

        if (empty($ocMercadoPublicoTipoMoneda)) {
            return $this->sendError('Oc Mercado Publico Tipo Moneda no encontrado');
        }

        return $this->sendResponse($ocMercadoPublicoTipoMoneda->toArray(), 'Oc Mercado Publico Tipo Moneda retrieved successfully');
    }

    /**
     * Update the specified OcMercadoPublicoTipoMoneda in storage.
     * PUT/PATCH /ocMercadoPublicoTipoMonedas/{id}
     *
     * @param int $id
     * @param UpdateOcMercadoPublicoTipoMonedaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOcMercadoPublicoTipoMonedaAPIRequest $request)
    {
        /** @var OcMercadoPublicoTipoMoneda $ocMercadoPublicoTipoMoneda */
        $ocMercadoPublicoTipoMoneda = OcMercadoPublicoTipoMoneda::find($id);

        if (empty($ocMercadoPublicoTipoMoneda)) {
            return $this->sendError('Oc Mercado Publico Tipo Moneda no encontrado');
        }

        $ocMercadoPublicoTipoMoneda->fill($request->all());
        $ocMercadoPublicoTipoMoneda->save();

        return $this->sendResponse($ocMercadoPublicoTipoMoneda->toArray(), 'OcMercadoPublicoTipoMoneda actualizado con éxito');
    }

    /**
     * Remove the specified OcMercadoPublicoTipoMoneda from storage.
     * DELETE /ocMercadoPublicoTipoMonedas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var OcMercadoPublicoTipoMoneda $ocMercadoPublicoTipoMoneda */
        $ocMercadoPublicoTipoMoneda = OcMercadoPublicoTipoMoneda::find($id);

        if (empty($ocMercadoPublicoTipoMoneda)) {
            return $this->sendError('Oc Mercado Publico Tipo Moneda no encontrado');
        }

        $ocMercadoPublicoTipoMoneda->delete();

        return $this->sendSuccess('Oc Mercado Publico Tipo Moneda deleted successfully');
    }
}
