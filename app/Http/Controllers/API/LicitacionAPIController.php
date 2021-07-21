<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLicitacionAPIRequest;
use App\Http\Requests\API\UpdateLicitacionAPIRequest;
use App\Models\Licitacion;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class LicitacionController
 * @package App\Http\Controllers\API
 */

class LicitacionAPIController extends AppBaseController
{
    /**
     * Display a listing of the Licitacion.
     * GET|HEAD /licitacions
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Licitacion::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $licitacions = $query->get();

        return $this->sendResponse($licitacions->toArray(), 'Licitacions retrieved successfully');
    }

    /**
     * Store a newly created Licitacion in storage.
     * POST /licitacions
     *
     * @param CreateLicitacionAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateLicitacionAPIRequest $request)
    {
        $input = $request->all();

        /** @var Licitacion $licitacion */
        $licitacion = Licitacion::create($input);

        return $this->sendResponse($licitacion->toArray(), 'Licitacion guardado exitosamente');
    }

    /**
     * Display the specified Licitacion.
     * GET|HEAD /licitacions/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Licitacion $licitacion */
        $licitacion = Licitacion::find($id);

        if (empty($licitacion)) {
            return $this->sendError('Licitacion no encontrado');
        }

        return $this->sendResponse($licitacion->toArray(), 'Licitacion retrieved successfully');
    }

    /**
     * Update the specified Licitacion in storage.
     * PUT/PATCH /licitacions/{id}
     *
     * @param int $id
     * @param UpdateLicitacionAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLicitacionAPIRequest $request)
    {
        /** @var Licitacion $licitacion */
        $licitacion = Licitacion::find($id);

        if (empty($licitacion)) {
            return $this->sendError('Licitacion no encontrado');
        }

        $licitacion->fill($request->all());
        $licitacion->save();

        return $this->sendResponse($licitacion->toArray(), 'Licitacion actualizado con éxito');
    }

    /**
     * Remove the specified Licitacion from storage.
     * DELETE /licitacions/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Licitacion $licitacion */
        $licitacion = Licitacion::find($id);

        if (empty($licitacion)) {
            return $this->sendError('Licitacion no encontrado');
        }

        $licitacion->delete();

        return $this->sendSuccess('Licitacion deleted successfully');
    }
}
