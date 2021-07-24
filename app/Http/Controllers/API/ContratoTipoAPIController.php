<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateContratoTipoAPIRequest;
use App\Http\Requests\API\UpdateContratoTipoAPIRequest;
use App\Models\ContratoTipo;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ContratoTipoController
 * @package App\Http\Controllers\API
 */

class ContratoTipoAPIController extends AppBaseController
{
    /**
     * Display a listing of the ContratoTipo.
     * GET|HEAD /contratoTipos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = ContratoTipo::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $contratoTipos = $query->get();

        return $this->sendResponse($contratoTipos->toArray(), 'Contrato Tipos retrieved successfully');
    }

    /**
     * Store a newly created ContratoTipo in storage.
     * POST /contratoTipos
     *
     * @param CreateContratoTipoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateContratoTipoAPIRequest $request)
    {
        $input = $request->all();

        /** @var ContratoTipo $contratoTipo */
        $contratoTipo = ContratoTipo::create($input);

        return $this->sendResponse($contratoTipo->toArray(), 'Contrato Tipo guardado exitosamente');
    }

    /**
     * Display the specified ContratoTipo.
     * GET|HEAD /contratoTipos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ContratoTipo $contratoTipo */
        $contratoTipo = ContratoTipo::find($id);

        if (empty($contratoTipo)) {
            return $this->sendError('Contrato Tipo no encontrado');
        }

        return $this->sendResponse($contratoTipo->toArray(), 'Contrato Tipo retrieved successfully');
    }

    /**
     * Update the specified ContratoTipo in storage.
     * PUT/PATCH /contratoTipos/{id}
     *
     * @param int $id
     * @param UpdateContratoTipoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContratoTipoAPIRequest $request)
    {
        /** @var ContratoTipo $contratoTipo */
        $contratoTipo = ContratoTipo::find($id);

        if (empty($contratoTipo)) {
            return $this->sendError('Contrato Tipo no encontrado');
        }

        $contratoTipo->fill($request->all());
        $contratoTipo->save();

        return $this->sendResponse($contratoTipo->toArray(), 'ContratoTipo actualizado con éxito');
    }

    /**
     * Remove the specified ContratoTipo from storage.
     * DELETE /contratoTipos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ContratoTipo $contratoTipo */
        $contratoTipo = ContratoTipo::find($id);

        if (empty($contratoTipo)) {
            return $this->sendError('Contrato Tipo no encontrado');
        }

        $contratoTipo->delete();

        return $this->sendSuccess('Contrato Tipo deleted successfully');
    }
}
