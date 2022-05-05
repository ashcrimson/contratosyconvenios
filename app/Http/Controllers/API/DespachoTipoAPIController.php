<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDespachoTipoAPIRequest;
use App\Http\Requests\API\UpdateDespachoTipoAPIRequest;
use App\Models\DespachoTipo;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DespachoTipoController
 * @package App\Http\Controllers\API
 */

class DespachoTipoAPIController extends AppBaseController
{
    /**
     * Display a listing of the DespachoTipo.
     * GET|HEAD /despachoTipos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = DespachoTipo::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $despachoTipos = $query->get();

        return $this->sendResponse($despachoTipos->toArray(), 'Despacho Tipos retrieved successfully');
    }

    /**
     * Store a newly created DespachoTipo in storage.
     * POST /despachoTipos
     *
     * @param CreateDespachoTipoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDespachoTipoAPIRequest $request)
    {
        $input = $request->all();

        /** @var DespachoTipo $despachoTipo */
        $despachoTipo = DespachoTipo::create($input);

        return $this->sendResponse($despachoTipo->toArray(), 'Despacho Tipo guardado exitosamente');
    }

    /**
     * Display the specified DespachoTipo.
     * GET|HEAD /despachoTipos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DespachoTipo $despachoTipo */
        $despachoTipo = DespachoTipo::find($id);

        if (empty($despachoTipo)) {
            return $this->sendError('Despacho Tipo no encontrado');
        }

        return $this->sendResponse($despachoTipo->toArray(), 'Despacho Tipo retrieved successfully');
    }

    /**
     * Update the specified DespachoTipo in storage.
     * PUT/PATCH /despachoTipos/{id}
     *
     * @param int $id
     * @param UpdateDespachoTipoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDespachoTipoAPIRequest $request)
    {
        /** @var DespachoTipo $despachoTipo */
        $despachoTipo = DespachoTipo::find($id);

        if (empty($despachoTipo)) {
            return $this->sendError('Despacho Tipo no encontrado');
        }

        $despachoTipo->fill($request->all());
        $despachoTipo->save();

        return $this->sendResponse($despachoTipo->toArray(), 'DespachoTipo actualizado con éxito');
    }

    /**
     * Remove the specified DespachoTipo from storage.
     * DELETE /despachoTipos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DespachoTipo $despachoTipo */
        $despachoTipo = DespachoTipo::find($id);

        if (empty($despachoTipo)) {
            return $this->sendError('Despacho Tipo no encontrado');
        }

        $despachoTipo->delete();

        return $this->sendSuccess('Despacho Tipo deleted successfully');
    }
}
