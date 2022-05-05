<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateUnidadMonetariaAPIRequest;
use App\Http\Requests\API\UpdateUnidadMonetariaAPIRequest;
use App\Models\UnidadMonetaria;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class UnidadMonetariaController
 * @package App\Http\Controllers\API
 */

class UnidadMonetariaAPIController extends AppBaseController
{
    /**
     * Display a listing of the UnidadMonetaria.
     * GET|HEAD /unidadMonetarias
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = UnidadMonetaria::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $unidadMonetarias = $query->get();

        return $this->sendResponse($unidadMonetarias->toArray(), 'Unidad Monetarias retrieved successfully');
    }

    /**
     * Store a newly created UnidadMonetaria in storage.
     * POST /unidadMonetarias
     *
     * @param CreateUnidadMonetariaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateUnidadMonetariaAPIRequest $request)
    {
        $input = $request->all();

        /** @var UnidadMonetaria $unidadMonetaria */
        $unidadMonetaria = UnidadMonetaria::create($input);

        return $this->sendResponse($unidadMonetaria->toArray(), 'Unidad Monetaria guardado exitosamente');
    }

    /**
     * Display the specified UnidadMonetaria.
     * GET|HEAD /unidadMonetarias/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UnidadMonetaria $unidadMonetaria */
        $unidadMonetaria = UnidadMonetaria::find($id);

        if (empty($unidadMonetaria)) {
            return $this->sendError('Unidad Monetaria no encontrado');
        }

        return $this->sendResponse($unidadMonetaria->toArray(), 'Unidad Monetaria retrieved successfully');
    }

    /**
     * Update the specified UnidadMonetaria in storage.
     * PUT/PATCH /unidadMonetarias/{id}
     *
     * @param int $id
     * @param UpdateUnidadMonetariaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUnidadMonetariaAPIRequest $request)
    {
        /** @var UnidadMonetaria $unidadMonetaria */
        $unidadMonetaria = UnidadMonetaria::find($id);

        if (empty($unidadMonetaria)) {
            return $this->sendError('Unidad Monetaria no encontrado');
        }

        $unidadMonetaria->fill($request->all());
        $unidadMonetaria->save();

        return $this->sendResponse($unidadMonetaria->toArray(), 'UnidadMonetaria actualizado con éxito');
    }

    /**
     * Remove the specified UnidadMonetaria from storage.
     * DELETE /unidadMonetarias/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UnidadMonetaria $unidadMonetaria */
        $unidadMonetaria = UnidadMonetaria::find($id);

        if (empty($unidadMonetaria)) {
            return $this->sendError('Unidad Monetaria no encontrado');
        }

        $unidadMonetaria->delete();

        return $this->sendSuccess('Unidad Monetaria deleted successfully');
    }
}
