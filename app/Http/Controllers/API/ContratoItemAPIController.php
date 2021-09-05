<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateContratoItemAPIRequest;
use App\Http\Requests\API\UpdateContratoItemAPIRequest;
use App\Models\ContratoItem;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ContratoItemController
 * @package App\Http\Controllers\API
 */

class ContratoItemAPIController extends AppBaseController
{
    /**
     * Display a listing of the ContratoItem.
     * GET|HEAD /contratoItems
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = ContratoItem::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        if ($request->contrato_id){
            $query->where('contrato_id',$request->contrato_id);
        }

        $contratoItems = $query->get();

        return $this->sendResponse($contratoItems->toArray(), 'Contrato Items retrieved successfully');
    }

    /**
     * Store a newly created ContratoItem in storage.
     * POST /contratoItems
     *
     * @param CreateContratoItemAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateContratoItemAPIRequest $request)
    {
        $input = $request->all();

        /** @var ContratoItem $contratoItem */
        $contratoItem = ContratoItem::create($input);

        return $this->sendResponse($contratoItem->toArray(), 'Contrato Item guardado exitosamente');
    }

    /**
     * Display the specified ContratoItem.
     * GET|HEAD /contratoItems/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ContratoItem $contratoItem */
        $contratoItem = ContratoItem::find($id);

        if (empty($contratoItem)) {
            return $this->sendError('Contrato Item no encontrado');
        }

        return $this->sendResponse($contratoItem->toArray(), 'Contrato Item retrieved successfully');
    }

    /**
     * Update the specified ContratoItem in storage.
     * PUT/PATCH /contratoItems/{id}
     *
     * @param int $id
     * @param UpdateContratoItemAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContratoItemAPIRequest $request)
    {
        /** @var ContratoItem $contratoItem */
        $contratoItem = ContratoItem::find($id);

        if (empty($contratoItem)) {
            return $this->sendError('Contrato Item no encontrado');
        }

        $contratoItem->fill($request->all());
        $contratoItem->save();

        return $this->sendResponse($contratoItem->toArray(), 'ContratoItem actualizado con éxito');
    }

    /**
     * Remove the specified ContratoItem from storage.
     * DELETE /contratoItems/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ContratoItem $contratoItem */
        $contratoItem = ContratoItem::find($id);

        if (empty($contratoItem)) {
            return $this->sendError('Contrato Item no encontrado');
        }

        $contratoItem->delete();

        return $this->sendSuccess('Contrato Item deleted successfully');
    }
}
