<?php

namespace App\Http\Controllers;

use App\DataTables\OcMercadoPublicTipoPagoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateOcMercadoPublicTipoPagoRequest;
use App\Http\Requests\UpdateOcMercadoPublicTipoPagoRequest;
use App\Models\OcMercadoPublicTipoPago;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class OcMercadoPublicTipoPagoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Oc Mercado Public Tipo Pagos')->only(['show']);
        $this->middleware('permission:Crear Oc Mercado Public Tipo Pagos')->only(['create','store']);
        $this->middleware('permission:Editar Oc Mercado Public Tipo Pagos')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Oc Mercado Public Tipo Pagos')->only(['destroy']);
    }

    /**
     * Display a listing of the OcMercadoPublicTipoPago.
     *
     * @param OcMercadoPublicTipoPagoDataTable $ocMercadoPublicTipoPagoDataTable
     * @return Response
     */
    public function index(OcMercadoPublicTipoPagoDataTable $ocMercadoPublicTipoPagoDataTable)
    {
        return $ocMercadoPublicTipoPagoDataTable->render('oc_mercado_public_tipo_pagos.index');
    }

    /**
     * Show the form for creating a new OcMercadoPublicTipoPago.
     *
     * @return Response
     */
    public function create()
    {
        return view('oc_mercado_public_tipo_pagos.create');
    }

    /**
     * Store a newly created OcMercadoPublicTipoPago in storage.
     *
     * @param CreateOcMercadoPublicTipoPagoRequest $request
     *
     * @return Response
     */
    public function store(CreateOcMercadoPublicTipoPagoRequest $request)
    {
        $input = $request->all();

        /** @var OcMercadoPublicTipoPago $ocMercadoPublicTipoPago */
        $ocMercadoPublicTipoPago = OcMercadoPublicTipoPago::create($input);

        Flash::success('Oc Mercado Public Tipo Pago guardado exitosamente.');

        return redirect(route('ocMercadoPublicTipoPagos.index'));
    }

    /**
     * Display the specified OcMercadoPublicTipoPago.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var OcMercadoPublicTipoPago $ocMercadoPublicTipoPago */
        $ocMercadoPublicTipoPago = OcMercadoPublicTipoPago::find($id);

        if (empty($ocMercadoPublicTipoPago)) {
            Flash::error('Oc Mercado Public Tipo Pago no encontrado');

            return redirect(route('ocMercadoPublicTipoPagos.index'));
        }

        return view('oc_mercado_public_tipo_pagos.show')->with('ocMercadoPublicTipoPago', $ocMercadoPublicTipoPago);
    }

    /**
     * Show the form for editing the specified OcMercadoPublicTipoPago.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var OcMercadoPublicTipoPago $ocMercadoPublicTipoPago */
        $ocMercadoPublicTipoPago = OcMercadoPublicTipoPago::find($id);

        if (empty($ocMercadoPublicTipoPago)) {
            Flash::error('Oc Mercado Public Tipo Pago no encontrado');

            return redirect(route('ocMercadoPublicTipoPagos.index'));
        }

        return view('oc_mercado_public_tipo_pagos.edit')->with('ocMercadoPublicTipoPago', $ocMercadoPublicTipoPago);
    }

    /**
     * Update the specified OcMercadoPublicTipoPago in storage.
     *
     * @param  int              $id
     * @param UpdateOcMercadoPublicTipoPagoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOcMercadoPublicTipoPagoRequest $request)
    {
        /** @var OcMercadoPublicTipoPago $ocMercadoPublicTipoPago */
        $ocMercadoPublicTipoPago = OcMercadoPublicTipoPago::find($id);

        if (empty($ocMercadoPublicTipoPago)) {
            Flash::error('Oc Mercado Public Tipo Pago no encontrado');

            return redirect(route('ocMercadoPublicTipoPagos.index'));
        }

        $ocMercadoPublicTipoPago->fill($request->all());
        $ocMercadoPublicTipoPago->save();

        Flash::success('Oc Mercado Public Tipo Pago actualizado con éxito.');

        return redirect(route('ocMercadoPublicTipoPagos.index'));
    }

    /**
     * Remove the specified OcMercadoPublicTipoPago from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var OcMercadoPublicTipoPago $ocMercadoPublicTipoPago */
        $ocMercadoPublicTipoPago = OcMercadoPublicTipoPago::find($id);

        if (empty($ocMercadoPublicTipoPago)) {
            Flash::error('Oc Mercado Public Tipo Pago no encontrado');

            return redirect(route('ocMercadoPublicTipoPagos.index'));
        }

        $ocMercadoPublicTipoPago->delete();

        Flash::success('Oc Mercado Public Tipo Pago deleted successfully.');

        return redirect(route('ocMercadoPublicTipoPagos.index'));
    }
}
