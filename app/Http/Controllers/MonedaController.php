<?php

namespace App\Http\Controllers;

use App\DataTables\MonedaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateMonedaRequest;
use App\Http\Requests\UpdateMonedaRequest;
use App\Models\Moneda;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class MonedaController extends AppBaseController
{

    public function __construct()
    {
        setConfigDailyIndicators();
        $this->middleware('permission:Ver Monedas')->only(['show']);
        $this->middleware('permission:Crear Monedas')->only(['create','store']);
        $this->middleware('permission:Editar Monedas')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Monedas')->only(['destroy']);
    }

    /**
     * Display a listing of the Moneda.
     *
     * @param MonedaDataTable $monedaDataTable
     * @return Response
     */
    public function index(MonedaDataTable $monedaDataTable)
    {
        return $monedaDataTable->render('monedas.index');
    }

    /**
     * Show the form for creating a new Moneda.
     *
     * @return Response
     */
    public function create()
    {
        return view('monedas.create');
    }

    /**
     * Store a newly created Moneda in storage.
     *
     * @param CreateMonedaRequest $request
     *
     * @return Response
     */
    public function store(CreateMonedaRequest $request)
    {
        $input = $request->all();

        /** @var Moneda $moneda */
        $moneda = Moneda::create($input);

        Flash::success('Moneda guardado exitosamente.');

        return redirect(route('monedas.index'));
    }

    /**
     * Display the specified Moneda.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Moneda $moneda */
        $moneda = Moneda::find($id);

        if (empty($moneda)) {
            Flash::error('Moneda no encontrado');

            return redirect(route('monedas.index'));
        }

        return view('monedas.show')->with('moneda', $moneda);
    }

    /**
     * Show the form for editing the specified Moneda.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Moneda $moneda */
        $moneda = Moneda::find($id);

        if (empty($moneda)) {
            Flash::error('Moneda no encontrado');

            return redirect(route('monedas.index'));
        }

        return view('monedas.edit')->with('moneda', $moneda);
    }

    /**
     * Update the specified Moneda in storage.
     *
     * @param  int              $id
     * @param UpdateMonedaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMonedaRequest $request)
    {
        /** @var Moneda $moneda */
        $moneda = Moneda::find($id);

        if (empty($moneda)) {
            Flash::error('Moneda no encontrado');

            return redirect(route('monedas.index'));
        }

        $moneda->fill($request->all());
        $moneda->save();

        Flash::success('Moneda actualizado con éxito.');

        return redirect(route('monedas.index'));
    }

    /**
     * Remove the specified Moneda from storage.
     *
     * @param  int $id
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
            Flash::error('Moneda no encontrado');

            return redirect(route('monedas.index'));
        }

        $moneda->delete();

        Flash::success('Moneda deleted successfully.');

        return redirect(route('monedas.index'));
    }
}
