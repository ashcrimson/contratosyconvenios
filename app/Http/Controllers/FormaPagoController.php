<?php

namespace App\Http\Controllers;

use App\DataTables\FormaPagoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateFormaPagoRequest;
use App\Http\Requests\UpdateFormaPagoRequest;
use App\Models\FormaPago;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class FormaPagoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Forma Pagos')->only(['show']);
        $this->middleware('permission:Crear Forma Pagos')->only(['create','store']);
        $this->middleware('permission:Editar Forma Pagos')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Forma Pagos')->only(['destroy']);
    }

    /**
     * Display a listing of the FormaPago.
     *
     * @param FormaPagoDataTable $formaPagoDataTable
     * @return Response
     */
    public function index(FormaPagoDataTable $formaPagoDataTable)
    {
        return $formaPagoDataTable->render('forma_pagos.index');
    }

    /**
     * Show the form for creating a new FormaPago.
     *
     * @return Response
     */
    public function create()
    {
        return view('forma_pagos.create');
    }

    /**
     * Store a newly created FormaPago in storage.
     *
     * @param CreateFormaPagoRequest $request
     *
     * @return Response
     */
    public function store(CreateFormaPagoRequest $request)
    {
        $input = $request->all();

        /** @var FormaPago $formaPago */
        $formaPago = FormaPago::create($input);

        Flash::success('Forma Pago guardado exitosamente.');

        return redirect(route('formaPagos.index'));
    }

    /**
     * Display the specified FormaPago.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var FormaPago $formaPago */
        $formaPago = FormaPago::find($id);

        if (empty($formaPago)) {
            Flash::error('Forma Pago no encontrado');

            return redirect(route('formaPagos.index'));
        }

        return view('forma_pagos.show')->with('formaPago', $formaPago);
    }

    /**
     * Show the form for editing the specified FormaPago.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var FormaPago $formaPago */
        $formaPago = FormaPago::find($id);

        if (empty($formaPago)) {
            Flash::error('Forma Pago no encontrado');

            return redirect(route('formaPagos.index'));
        }

        return view('forma_pagos.edit')->with('formaPago', $formaPago);
    }

    /**
     * Update the specified FormaPago in storage.
     *
     * @param  int              $id
     * @param UpdateFormaPagoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFormaPagoRequest $request)
    {
        /** @var FormaPago $formaPago */
        $formaPago = FormaPago::find($id);

        if (empty($formaPago)) {
            Flash::error('Forma Pago no encontrado');

            return redirect(route('formaPagos.index'));
        }

        $formaPago->fill($request->all());
        $formaPago->save();

        Flash::success('Forma Pago actualizado con éxito.');

        return redirect(route('formaPagos.index'));
    }

    /**
     * Remove the specified FormaPago from storage.
     *
     * @param  int $id
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
            Flash::error('Forma Pago no encontrado');

            return redirect(route('formaPagos.index'));
        }

        $formaPago->delete();

        Flash::success('Forma Pago deleted successfully.');

        return redirect(route('formaPagos.index'));
    }
}
