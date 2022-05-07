<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOcMercadoPublicoAPIRequest;
use App\Http\Requests\API\UpdateOcMercadoPublicoAPIRequest;
use App\Models\OcMercadoPublico;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class OcMercadoPublicoController
 * @package App\Http\Controllers\API
 */

class OcMercadoPublicoAPIController extends AppBaseController
{
    /**
     * Display a listing of the OcMercadoPublico.
     * GET|HEAD /ocMercadoPublicos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = OcMercadoPublico::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $ocMercadoPublicos = $query->get();

        return $this->sendResponse($ocMercadoPublicos->toArray(), 'Oc Mercado Publicos retrieved successfully');
    }

    /**
     * Store a newly created OcMercadoPublico in storage.
     * POST /ocMercadoPublicos
     *
     * @param CreateOcMercadoPublicoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOcMercadoPublicoAPIRequest $request)
    {
        $input = $request->all();

        /** @var OcMercadoPublico $ocMercadoPublico */
        $ocMercadoPublico = OcMercadoPublico::create($input);

        return $this->sendResponse($ocMercadoPublico->toArray(), 'Oc Mercado Publico guardado exitosamente');
    }

    /**
     * Display the specified OcMercadoPublico.
     * GET|HEAD /ocMercadoPublicos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var OcMercadoPublico $ocMercadoPublico */
        $ocMercadoPublico = OcMercadoPublico::find($id);

        if (empty($ocMercadoPublico)) {
            return $this->sendError('Oc Mercado Publico no encontrado');
        }

        return $this->sendResponse($ocMercadoPublico->toArray(), 'Oc Mercado Publico retrieved successfully');
    }

    /**
     * Update the specified OcMercadoPublico in storage.
     * PUT/PATCH /ocMercadoPublicos/{id}
     *
     * @param int $id
     * @param UpdateOcMercadoPublicoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOcMercadoPublicoAPIRequest $request)
    {
        /** @var OcMercadoPublico $ocMercadoPublico */
        $ocMercadoPublico = OcMercadoPublico::find($id);

        if (empty($ocMercadoPublico)) {
            return $this->sendError('Oc Mercado Publico no encontrado');
        }

        $ocMercadoPublico->fill($request->all());
        $ocMercadoPublico->save();

        return $this->sendResponse($ocMercadoPublico->toArray(), 'OcMercadoPublico actualizado con éxito');
    }

    /**
     * Remove the specified OcMercadoPublico from storage.
     * DELETE /ocMercadoPublicos/{id}
     *
     * @param int $id
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
            return $this->sendError('Oc Mercado Publico no encontrado');
        }

        $ocMercadoPublico->delete();

        return $this->sendSuccess('Oc Mercado Publico deleted successfully');
    }
}
