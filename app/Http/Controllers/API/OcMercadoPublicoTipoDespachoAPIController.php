<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOcMercadoPublicoTipoDespachoAPIRequest;
use App\Http\Requests\API\UpdateOcMercadoPublicoTipoDespachoAPIRequest;
use App\Models\OcMercadoPublicoTipoDespacho;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class OcMercadoPublicoTipoDespachoController
 * @package App\Http\Controllers\API
 */

class OcMercadoPublicoTipoDespachoAPIController extends AppBaseController
{
    /**
     * Display a listing of the OcMercadoPublicoTipoDespacho.
     * GET|HEAD /ocMercadoPublicoTipoDespachos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = OcMercadoPublicoTipoDespacho::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $ocMercadoPublicoTipoDespachos = $query->get();

        return $this->sendResponse($ocMercadoPublicoTipoDespachos->toArray(), 'Oc Mercado Publico Tipo Despachos retrieved successfully');
    }

    /**
     * Store a newly created OcMercadoPublicoTipoDespacho in storage.
     * POST /ocMercadoPublicoTipoDespachos
     *
     * @param CreateOcMercadoPublicoTipoDespachoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOcMercadoPublicoTipoDespachoAPIRequest $request)
    {
        $input = $request->all();

        /** @var OcMercadoPublicoTipoDespacho $ocMercadoPublicoTipoDespacho */
        $ocMercadoPublicoTipoDespacho = OcMercadoPublicoTipoDespacho::create($input);

        return $this->sendResponse($ocMercadoPublicoTipoDespacho->toArray(), 'Oc Mercado Publico Tipo Despacho guardado exitosamente');
    }

    /**
     * Display the specified OcMercadoPublicoTipoDespacho.
     * GET|HEAD /ocMercadoPublicoTipoDespachos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var OcMercadoPublicoTipoDespacho $ocMercadoPublicoTipoDespacho */
        $ocMercadoPublicoTipoDespacho = OcMercadoPublicoTipoDespacho::find($id);

        if (empty($ocMercadoPublicoTipoDespacho)) {
            return $this->sendError('Oc Mercado Publico Tipo Despacho no encontrado');
        }

        return $this->sendResponse($ocMercadoPublicoTipoDespacho->toArray(), 'Oc Mercado Publico Tipo Despacho retrieved successfully');
    }

    /**
     * Update the specified OcMercadoPublicoTipoDespacho in storage.
     * PUT/PATCH /ocMercadoPublicoTipoDespachos/{id}
     *
     * @param int $id
     * @param UpdateOcMercadoPublicoTipoDespachoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOcMercadoPublicoTipoDespachoAPIRequest $request)
    {
        /** @var OcMercadoPublicoTipoDespacho $ocMercadoPublicoTipoDespacho */
        $ocMercadoPublicoTipoDespacho = OcMercadoPublicoTipoDespacho::find($id);

        if (empty($ocMercadoPublicoTipoDespacho)) {
            return $this->sendError('Oc Mercado Publico Tipo Despacho no encontrado');
        }

        $ocMercadoPublicoTipoDespacho->fill($request->all());
        $ocMercadoPublicoTipoDespacho->save();

        return $this->sendResponse($ocMercadoPublicoTipoDespacho->toArray(), 'OcMercadoPublicoTipoDespacho actualizado con éxito');
    }

    /**
     * Remove the specified OcMercadoPublicoTipoDespacho from storage.
     * DELETE /ocMercadoPublicoTipoDespachos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var OcMercadoPublicoTipoDespacho $ocMercadoPublicoTipoDespacho */
        $ocMercadoPublicoTipoDespacho = OcMercadoPublicoTipoDespacho::find($id);

        if (empty($ocMercadoPublicoTipoDespacho)) {
            return $this->sendError('Oc Mercado Publico Tipo Despacho no encontrado');
        }

        $ocMercadoPublicoTipoDespacho->delete();

        return $this->sendSuccess('Oc Mercado Publico Tipo Despacho deleted successfully');
    }
}
