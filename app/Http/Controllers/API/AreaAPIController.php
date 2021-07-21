<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAreaAPIRequest;
use App\Http\Requests\API\UpdateAreaAPIRequest;
use App\Models\Area;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AreaController
 * @package App\Http\Controllers\API
 */

class AreaAPIController extends AppBaseController
{
    /**
     * Display a listing of the Area.
     * GET|HEAD /areas
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = Area::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $areas = $query->get();

        return $this->sendResponse($areas->toArray(), 'Areas retrieved successfully');
    }

    /**
     * Store a newly created Area in storage.
     * POST /areas
     *
     * @param CreateAreaAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateAreaAPIRequest $request)
    {
        $input = $request->all();

        /** @var Area $area */
        $area = Area::create($input);

        return $this->sendResponse($area->toArray(), 'Area guardado exitosamente');
    }

    /**
     * Display the specified Area.
     * GET|HEAD /areas/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Area $area */
        $area = Area::find($id);

        if (empty($area)) {
            return $this->sendError('Area no encontrado');
        }

        return $this->sendResponse($area->toArray(), 'Area retrieved successfully');
    }

    /**
     * Update the specified Area in storage.
     * PUT/PATCH /areas/{id}
     *
     * @param int $id
     * @param UpdateAreaAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAreaAPIRequest $request)
    {
        /** @var Area $area */
        $area = Area::find($id);

        if (empty($area)) {
            return $this->sendError('Area no encontrado');
        }

        $area->fill($request->all());
        $area->save();

        return $this->sendResponse($area->toArray(), 'Area actualizado con éxito');
    }

    /**
     * Remove the specified Area from storage.
     * DELETE /areas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Area $area */
        $area = Area::find($id);

        if (empty($area)) {
            return $this->sendError('Area no encontrado');
        }

        $area->delete();

        return $this->sendSuccess('Area deleted successfully');
    }
}
