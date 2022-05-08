<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateOcMercadoPublicoItemAPIRequest;
use App\Http\Requests\API\UpdateOcMercadoPublicoItemAPIRequest;
use App\Models\OcMercadoPublicoItem;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class OcMercadoPublicoItemController
 * @package App\Http\Controllers\API
 */

class OcMercadoPublicoItemAPIController extends AppBaseController
{
    /**
     * Display a listing of the OcMercadoPublicoItem.
     * GET|HEAD /ocMercadoPublicoItems
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = OcMercadoPublicoItem::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }
        if ($request->get('oc_mercado_publico_id')) {
            $query->where('oc_mercado_publico_id', $request->get('oc_mercado_publico_id'));
        }

        $ocMercadoPublicoItems = $query->get();

        return $this->sendResponse($ocMercadoPublicoItems->toArray(), 'Oc Mercado Publico Items retrieved successfully');
    }

    /**
     * Store a newly created OcMercadoPublicoItem in storage.
     * POST /ocMercadoPublicoItems
     *
     * @param CreateOcMercadoPublicoItemAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateOcMercadoPublicoItemAPIRequest $request)
    {
        $input = $request->all();

        /** @var OcMercadoPublicoItem $ocMercadoPublicoItem */
        $ocMercadoPublicoItem = OcMercadoPublicoItem::create($input);

        return $this->sendResponse($ocMercadoPublicoItem->toArray(), 'Oc Mercado Publico Item guardado exitosamente');
    }

    /**
     * Display the specified OcMercadoPublicoItem.
     * GET|HEAD /ocMercadoPublicoItems/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var OcMercadoPublicoItem $ocMercadoPublicoItem */
        $ocMercadoPublicoItem = OcMercadoPublicoItem::find($id);

        if (empty($ocMercadoPublicoItem)) {
            return $this->sendError('Oc Mercado Publico Item no encontrado');
        }

        return $this->sendResponse($ocMercadoPublicoItem->toArray(), 'Oc Mercado Publico Item retrieved successfully');
    }

    /**
     * Update the specified OcMercadoPublicoItem in storage.
     * PUT/PATCH /ocMercadoPublicoItems/{id}
     *
     * @param int $id
     * @param UpdateOcMercadoPublicoItemAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOcMercadoPublicoItemAPIRequest $request)
    {
        /** @var OcMercadoPublicoItem $ocMercadoPublicoItem */
        $ocMercadoPublicoItem = OcMercadoPublicoItem::find($id);

        if (empty($ocMercadoPublicoItem)) {
            return $this->sendError('Oc Mercado Publico Item no encontrado');
        }

        $ocMercadoPublicoItem->fill($request->all());
        $ocMercadoPublicoItem->save();

        return $this->sendResponse($ocMercadoPublicoItem->toArray(), 'OcMercadoPublicoItem actualizado con éxito');
    }

    /**
     * Remove the specified OcMercadoPublicoItem from storage.
     * DELETE /ocMercadoPublicoItems/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var OcMercadoPublicoItem $ocMercadoPublicoItem */
        $ocMercadoPublicoItem = OcMercadoPublicoItem::find($id);

        if (empty($ocMercadoPublicoItem)) {
            return $this->sendError('Oc Mercado Publico Item no encontrado');
        }

        $ocMercadoPublicoItem->delete();

        return $this->sendSuccess('Oc Mercado Publico Item deleted successfully');
    }
}
