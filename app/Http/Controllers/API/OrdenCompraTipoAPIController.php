<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOrdenCompraTipoAPIRequest;
use App\Http\Requests\API\UpdateOrdenCompraTipoAPIRequest;
use App\Models\OrdenCompraTipo;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class OrdenCompraTipoController
 * @package App\Http\Controllers\API
 */

class OrdenCompraTipoAPIController extends AppBaseController
{
    /**
     * Display a listing of the OrdenCompraTipo.
     * GET|HEAD /ordenCompraTipos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = OrdenCompraTipo::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $ordenCompraTipos = $query->get();

        return $this->sendResponse($ordenCompraTipos->toArray(), 'Orden Compra Tipos retrieved successfully');
    }

    /**
     * Store a newly created OrdenCompraTipo in storage.
     * POST /ordenCompraTipos
     *
     * @param CreateOrdenCompraTipoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOrdenCompraTipoAPIRequest $request)
    {
        $input = $request->all();

        /** @var OrdenCompraTipo $ordenCompraTipo */
        $ordenCompraTipo = OrdenCompraTipo::create($input);

        return $this->sendResponse($ordenCompraTipo->toArray(), 'Orden Compra Tipo guardado exitosamente');
    }

    /**
     * Display the specified OrdenCompraTipo.
     * GET|HEAD /ordenCompraTipos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var OrdenCompraTipo $ordenCompraTipo */
        $ordenCompraTipo = OrdenCompraTipo::find($id);

        if (empty($ordenCompraTipo)) {
            return $this->sendError('Orden Compra Tipo no encontrado');
        }

        return $this->sendResponse($ordenCompraTipo->toArray(), 'Orden Compra Tipo retrieved successfully');
    }

    /**
     * Update the specified OrdenCompraTipo in storage.
     * PUT/PATCH /ordenCompraTipos/{id}
     *
     * @param int $id
     * @param UpdateOrdenCompraTipoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrdenCompraTipoAPIRequest $request)
    {
        /** @var OrdenCompraTipo $ordenCompraTipo */
        $ordenCompraTipo = OrdenCompraTipo::find($id);

        if (empty($ordenCompraTipo)) {
            return $this->sendError('Orden Compra Tipo no encontrado');
        }

        $ordenCompraTipo->fill($request->all());
        $ordenCompraTipo->save();

        return $this->sendResponse($ordenCompraTipo->toArray(), 'OrdenCompraTipo actualizado con éxito');
    }

    /**
     * Remove the specified OrdenCompraTipo from storage.
     * DELETE /ordenCompraTipos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var OrdenCompraTipo $ordenCompraTipo */
        $ordenCompraTipo = OrdenCompraTipo::find($id);

        if (empty($ordenCompraTipo)) {
            return $this->sendError('Orden Compra Tipo no encontrado');
        }

        $ordenCompraTipo->delete();

        return $this->sendSuccess('Orden Compra Tipo deleted successfully');
    }
}
