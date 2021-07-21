<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateMonedaAPIRequest;
use App\Http\Requests\API\UpdateMonedaAPIRequest;
use App\Models\Moneda;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class MonedaController
 * @package App\Http\Controllers\API
 */

class MonedaAPIController extends AppBaseController
{
    /**
     * Display a listing of the Moneda.
     * GET|HEAD /monedas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Moneda::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $monedas = $query->get();

        return $this->sendResponse($monedas->toArray(), 'Monedas retrieved successfully');
    }

    /**
     * Store a newly created Moneda in storage.
     * POST /monedas
     *
     * @param CreateMonedaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateMonedaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Moneda $moneda */
        $moneda = Moneda::create($input);

        return $this->sendResponse($moneda->toArray(), 'Moneda guardado exitosamente');
    }

    /**
     * Display the specified Moneda.
     * GET|HEAD /monedas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Moneda $moneda */
        $moneda = Moneda::find($id);

        if (empty($moneda)) {
            return $this->sendError('Moneda no encontrado');
        }

        return $this->sendResponse($moneda->toArray(), 'Moneda retrieved successfully');
    }

    /**
     * Update the specified Moneda in storage.
     * PUT/PATCH /monedas/{id}
     *
     * @param int $id
     * @param UpdateMonedaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMonedaAPIRequest $request)
    {
        /** @var Moneda $moneda */
        $moneda = Moneda::find($id);

        if (empty($moneda)) {
            return $this->sendError('Moneda no encontrado');
        }

        $moneda->fill($request->all());
        $moneda->save();

        return $this->sendResponse($moneda->toArray(), 'Moneda actualizado con éxito');
    }

    /**
     * Remove the specified Moneda from storage.
     * DELETE /monedas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Moneda $moneda */
        $moneda = Moneda::find($id);

        if (empty($moneda)) {
            return $this->sendError('Moneda no encontrado');
        }

        $moneda->delete();

        return $this->sendSuccess('Moneda deleted successfully');
    }
}
