<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateContratoEstadoAPIRequest;
use App\Http\Requests\API\UpdateContratoEstadoAPIRequest;
use App\Models\ContratoEstado;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ContratoEstadoController
 * @package App\Http\Controllers\API
 */

class ContratoEstadoAPIController extends AppBaseController
{
    /**
     * Display a listing of the ContratoEstado.
     * GET|HEAD /contratoEstados
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = ContratoEstado::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $contratoEstados = $query->get();

        return $this->sendResponse($contratoEstados->toArray(), 'Contrato Estados retrieved successfully');
    }

    /**
     * Store a newly created ContratoEstado in storage.
     * POST /contratoEstados
     *
     * @param CreateContratoEstadoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateContratoEstadoAPIRequest $request)
    {
        $input = $request->all();

        /** @var ContratoEstado $contratoEstado */
        $contratoEstado = ContratoEstado::create($input);

        return $this->sendResponse($contratoEstado->toArray(), 'Contrato Estado guardado exitosamente');
    }

    /**
     * Display the specified ContratoEstado.
     * GET|HEAD /contratoEstados/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ContratoEstado $contratoEstado */
        $contratoEstado = ContratoEstado::find($id);

        if (empty($contratoEstado)) {
            return $this->sendError('Contrato Estado no encontrado');
        }

        return $this->sendResponse($contratoEstado->toArray(), 'Contrato Estado retrieved successfully');
    }

    /**
     * Update the specified ContratoEstado in storage.
     * PUT/PATCH /contratoEstados/{id}
     *
     * @param int $id
     * @param UpdateContratoEstadoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContratoEstadoAPIRequest $request)
    {
        /** @var ContratoEstado $contratoEstado */
        $contratoEstado = ContratoEstado::find($id);

        if (empty($contratoEstado)) {
            return $this->sendError('Contrato Estado no encontrado');
        }

        $contratoEstado->fill($request->all());
        $contratoEstado->save();

        return $this->sendResponse($contratoEstado->toArray(), 'ContratoEstado actualizado con éxito');
    }

    /**
     * Remove the specified ContratoEstado from storage.
     * DELETE /contratoEstados/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ContratoEstado $contratoEstado */
        $contratoEstado = ContratoEstado::find($id);

        if (empty($contratoEstado)) {
            return $this->sendError('Contrato Estado no encontrado');
        }

        $contratoEstado->delete();

        return $this->sendSuccess('Contrato Estado deleted successfully');
    }
}
