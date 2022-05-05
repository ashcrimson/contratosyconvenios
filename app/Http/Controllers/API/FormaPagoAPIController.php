<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFormaPagoAPIRequest;
use App\Http\Requests\API\UpdateFormaPagoAPIRequest;
use App\Models\FormaPago;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class FormaPagoController
 * @package App\Http\Controllers\API
 */

class FormaPagoAPIController extends AppBaseController
{
    /**
     * Display a listing of the FormaPago.
     * GET|HEAD /formaPagos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $query = FormaPago::query();

        if ($request->get('skip')) {
            $query->skip($request->get('skip'));
        }
        if ($request->get('limit')) {
            $query->limit($request->get('limit'));
        }

        $formaPagos = $query->get();

        return $this->sendResponse($formaPagos->toArray(), 'Forma Pagos retrieved successfully');
    }

    /**
     * Store a newly created FormaPago in storage.
     * POST /formaPagos
     *
     * @param CreateFormaPagoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateFormaPagoAPIRequest $request)
    {
        $input = $request->all();

        /** @var FormaPago $formaPago */
        $formaPago = FormaPago::create($input);

        return $this->sendResponse($formaPago->toArray(), 'Forma Pago guardado exitosamente');
    }

    /**
     * Display the specified FormaPago.
     * GET|HEAD /formaPagos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var FormaPago $formaPago */
        $formaPago = FormaPago::find($id);

        if (empty($formaPago)) {
            return $this->sendError('Forma Pago no encontrado');
        }

        return $this->sendResponse($formaPago->toArray(), 'Forma Pago retrieved successfully');
    }

    /**
     * Update the specified FormaPago in storage.
     * PUT/PATCH /formaPagos/{id}
     *
     * @param int $id
     * @param UpdateFormaPagoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFormaPagoAPIRequest $request)
    {
        /** @var FormaPago $formaPago */
        $formaPago = FormaPago::find($id);

        if (empty($formaPago)) {
            return $this->sendError('Forma Pago no encontrado');
        }

        $formaPago->fill($request->all());
        $formaPago->save();

        return $this->sendResponse($formaPago->toArray(), 'FormaPago actualizado con éxito');
    }

    /**
     * Remove the specified FormaPago from storage.
     * DELETE /formaPagos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var FormaPago $formaPago */
        $formaPago = FormaPago::find($id);

        if (empty($formaPago)) {
            return $this->sendError('Forma Pago no encontrado');
        }

        $formaPago->delete();

        return $this->sendSuccess('Forma Pago deleted successfully');
    }
}
