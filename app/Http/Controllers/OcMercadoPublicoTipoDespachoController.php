<?php

namespace App\Http\Controllers;

use App\DataTables\OcMercadoPublicoTipoDespachoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateOcMercadoPublicoTipoDespachoRequest;
use App\Http\Requests\UpdateOcMercadoPublicoTipoDespachoRequest;
use App\Models\OcMercadoPublicoTipoDespacho;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class OcMercadoPublicoTipoDespachoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Oc Mercado Publico Tipo Despachos')->only(['show']);
        $this->middleware('permission:Crear Oc Mercado Publico Tipo Despachos')->only(['create','store']);
        $this->middleware('permission:Editar Oc Mercado Publico Tipo Despachos')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Oc Mercado Publico Tipo Despachos')->only(['destroy']);
    }

    /**
     * Display a listing of the OcMercadoPublicoTipoDespacho.
     *
     * @param OcMercadoPublicoTipoDespachoDataTable $ocMercadoPublicoTipoDespachoDataTable
     * @return Response
     */
    public function index(OcMercadoPublicoTipoDespachoDataTable $ocMercadoPublicoTipoDespachoDataTable)
    {
        return $ocMercadoPublicoTipoDespachoDataTable->render('oc_mercado_publico_tipo_despachos.index');
    }

    /**
     * Show the form for creating a new OcMercadoPublicoTipoDespacho.
     *
     * @return Response
     */
    public function create()
    {
        return view('oc_mercado_publico_tipo_despachos.create');
    }

    /**
     * Store a newly created OcMercadoPublicoTipoDespacho in storage.
     *
     * @param CreateOcMercadoPublicoTipoDespachoRequest $request
     *
     * @return Response
     */
    public function store(CreateOcMercadoPublicoTipoDespachoRequest $request)
    {
        $input = $request->all();

        /** @var OcMercadoPublicoTipoDespacho $ocMercadoPublicoTipoDespacho */
        $ocMercadoPublicoTipoDespacho = OcMercadoPublicoTipoDespacho::create($input);

        Flash::success('Oc Mercado Publico Tipo Despacho guardado exitosamente.');

        return redirect(route('ocMercadoPublicoTipoDespachos.index'));
    }

    /**
     * Display the specified OcMercadoPublicoTipoDespacho.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var OcMercadoPublicoTipoDespacho $ocMercadoPublicoTipoDespacho */
        $ocMercadoPublicoTipoDespacho = OcMercadoPublicoTipoDespacho::find($id);

        if (empty($ocMercadoPublicoTipoDespacho)) {
            Flash::error('Oc Mercado Publico Tipo Despacho no encontrado');

            return redirect(route('ocMercadoPublicoTipoDespachos.index'));
        }

        return view('oc_mercado_publico_tipo_despachos.show')->with('ocMercadoPublicoTipoDespacho', $ocMercadoPublicoTipoDespacho);
    }

    /**
     * Show the form for editing the specified OcMercadoPublicoTipoDespacho.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var OcMercadoPublicoTipoDespacho $ocMercadoPublicoTipoDespacho */
        $ocMercadoPublicoTipoDespacho = OcMercadoPublicoTipoDespacho::find($id);

        if (empty($ocMercadoPublicoTipoDespacho)) {
            Flash::error('Oc Mercado Publico Tipo Despacho no encontrado');

            return redirect(route('ocMercadoPublicoTipoDespachos.index'));
        }

        return view('oc_mercado_publico_tipo_despachos.edit')->with('ocMercadoPublicoTipoDespacho', $ocMercadoPublicoTipoDespacho);
    }

    /**
     * Update the specified OcMercadoPublicoTipoDespacho in storage.
     *
     * @param  int              $id
     * @param UpdateOcMercadoPublicoTipoDespachoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOcMercadoPublicoTipoDespachoRequest $request)
    {
        /** @var OcMercadoPublicoTipoDespacho $ocMercadoPublicoTipoDespacho */
        $ocMercadoPublicoTipoDespacho = OcMercadoPublicoTipoDespacho::find($id);

        if (empty($ocMercadoPublicoTipoDespacho)) {
            Flash::error('Oc Mercado Publico Tipo Despacho no encontrado');

            return redirect(route('ocMercadoPublicoTipoDespachos.index'));
        }

        $ocMercadoPublicoTipoDespacho->fill($request->all());
        $ocMercadoPublicoTipoDespacho->save();

        Flash::success('Oc Mercado Publico Tipo Despacho actualizado con éxito.');

        return redirect(route('ocMercadoPublicoTipoDespachos.index'));
    }

    /**
     * Remove the specified OcMercadoPublicoTipoDespacho from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var OcMercadoPublicoTipoDespacho $ocMercadoPublicoTipoDespacho */
        $ocMercadoPublicoTipoDespacho = OcMercadoPublicoTipoDespacho::find($id);

        if (empty($ocMercadoPublicoTipoDespacho)) {
            Flash::error('Oc Mercado Publico Tipo Despacho no encontrado');

            return redirect(route('ocMercadoPublicoTipoDespachos.index'));
        }

        $ocMercadoPublicoTipoDespacho->delete();

        Flash::success('Oc Mercado Publico Tipo Despacho deleted successfully.');

        return redirect(route('ocMercadoPublicoTipoDespachos.index'));
    }
}
