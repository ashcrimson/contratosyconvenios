<?php

namespace App\Http\Controllers;

use App\DataTables\OcMercadoPublicoTipoMonedaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateOcMercadoPublicoTipoMonedaRequest;
use App\Http\Requests\UpdateOcMercadoPublicoTipoMonedaRequest;
use App\Models\OcMercadoPublicoTipoMoneda;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class OcMercadoPublicoTipoMonedaController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Oc Mercado Publico Tipo Monedas')->only(['show']);
        $this->middleware('permission:Crear Oc Mercado Publico Tipo Monedas')->only(['create','store']);
        $this->middleware('permission:Editar Oc Mercado Publico Tipo Monedas')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Oc Mercado Publico Tipo Monedas')->only(['destroy']);
    }

    /**
     * Display a listing of the OcMercadoPublicoTipoMoneda.
     *
     * @param OcMercadoPublicoTipoMonedaDataTable $ocMercadoPublicoTipoMonedaDataTable
     * @return Response
     */
    public function index(OcMercadoPublicoTipoMonedaDataTable $ocMercadoPublicoTipoMonedaDataTable)
    {
        return $ocMercadoPublicoTipoMonedaDataTable->render('oc_mercado_publico_tipo_monedas.index');
    }

    /**
     * Show the form for creating a new OcMercadoPublicoTipoMoneda.
     *
     * @return Response
     */
    public function create()
    {
        return view('oc_mercado_publico_tipo_monedas.create');
    }

    /**
     * Store a newly created OcMercadoPublicoTipoMoneda in storage.
     *
     * @param CreateOcMercadoPublicoTipoMonedaRequest $request
     *
     * @return Response
     */
    public function store(CreateOcMercadoPublicoTipoMonedaRequest $request)
    {
        $input = $request->all();

        /** @var OcMercadoPublicoTipoMoneda $ocMercadoPublicoTipoMoneda */
        $ocMercadoPublicoTipoMoneda = OcMercadoPublicoTipoMoneda::create($input);

        Flash::success('Oc Mercado Publico Tipo Moneda guardado exitosamente.');

        return redirect(route('ocMercadoPublicoTipoMonedas.index'));
    }

    /**
     * Display the specified OcMercadoPublicoTipoMoneda.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var OcMercadoPublicoTipoMoneda $ocMercadoPublicoTipoMoneda */
        $ocMercadoPublicoTipoMoneda = OcMercadoPublicoTipoMoneda::find($id);

        if (empty($ocMercadoPublicoTipoMoneda)) {
            Flash::error('Oc Mercado Publico Tipo Moneda no encontrado');

            return redirect(route('ocMercadoPublicoTipoMonedas.index'));
        }

        return view('oc_mercado_publico_tipo_monedas.show')->with('ocMercadoPublicoTipoMoneda', $ocMercadoPublicoTipoMoneda);
    }

    /**
     * Show the form for editing the specified OcMercadoPublicoTipoMoneda.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var OcMercadoPublicoTipoMoneda $ocMercadoPublicoTipoMoneda */
        $ocMercadoPublicoTipoMoneda = OcMercadoPublicoTipoMoneda::find($id);

        if (empty($ocMercadoPublicoTipoMoneda)) {
            Flash::error('Oc Mercado Publico Tipo Moneda no encontrado');

            return redirect(route('ocMercadoPublicoTipoMonedas.index'));
        }

        return view('oc_mercado_publico_tipo_monedas.edit')->with('ocMercadoPublicoTipoMoneda', $ocMercadoPublicoTipoMoneda);
    }

    /**
     * Update the specified OcMercadoPublicoTipoMoneda in storage.
     *
     * @param  int              $id
     * @param UpdateOcMercadoPublicoTipoMonedaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOcMercadoPublicoTipoMonedaRequest $request)
    {
        /** @var OcMercadoPublicoTipoMoneda $ocMercadoPublicoTipoMoneda */
        $ocMercadoPublicoTipoMoneda = OcMercadoPublicoTipoMoneda::find($id);

        if (empty($ocMercadoPublicoTipoMoneda)) {
            Flash::error('Oc Mercado Publico Tipo Moneda no encontrado');

            return redirect(route('ocMercadoPublicoTipoMonedas.index'));
        }

        $ocMercadoPublicoTipoMoneda->fill($request->all());
        $ocMercadoPublicoTipoMoneda->save();

        Flash::success('Oc Mercado Publico Tipo Moneda actualizado con éxito.');

        return redirect(route('ocMercadoPublicoTipoMonedas.index'));
    }

    /**
     * Remove the specified OcMercadoPublicoTipoMoneda from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var OcMercadoPublicoTipoMoneda $ocMercadoPublicoTipoMoneda */
        $ocMercadoPublicoTipoMoneda = OcMercadoPublicoTipoMoneda::find($id);

        if (empty($ocMercadoPublicoTipoMoneda)) {
            Flash::error('Oc Mercado Publico Tipo Moneda no encontrado');

            return redirect(route('ocMercadoPublicoTipoMonedas.index'));
        }

        $ocMercadoPublicoTipoMoneda->delete();

        Flash::success('Oc Mercado Publico Tipo Moneda deleted successfully.');

        return redirect(route('ocMercadoPublicoTipoMonedas.index'));
    }
}
