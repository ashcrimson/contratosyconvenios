<?php

namespace App\Http\Controllers;

use App\DataTables\IntervencionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateIntervencionRequest;
use App\Http\Requests\UpdateIntervencionRequest;
use App\Models\Intervencion;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class IntervencionController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Intervencions')->only(['show']);
        $this->middleware('permission:Crear Intervencions')->only(['create','store']);
        $this->middleware('permission:Editar Intervencions')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Intervencions')->only(['destroy']);
    }

    /**
     * Display a listing of the Intervencion.
     *
     * @param IntervencionDataTable $intervencionDataTable
     * @return Response
     */
    public function index(IntervencionDataTable $intervencionDataTable)
    {
        return $intervencionDataTable->render('intervencions.index');
    }

    /**
     * Show the form for creating a new Intervencion.
     *
     * @return Response
     */
    public function create()
    {
        return view('intervencions.create');
    }

    /**
     * Store a newly created Intervencion in storage.
     *
     * @param CreateIntervencionRequest $request
     *
     * @return Response
     */
    public function store(CreateIntervencionRequest $request)
    {
        $input = $request->all();

        /** @var Intervencion $intervencion */
        $intervencion = Intervencion::create($input);

        Flash::success('Intervencion guardado exitosamente.');

        return redirect(route('intervencions.index'));
    }

    /**
     * Display the specified Intervencion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Intervencion $intervencion */
        $intervencion = Intervencion::find($id);

        if (empty($intervencion)) {
            Flash::error('Intervencion no encontrado');

            return redirect(route('intervencions.index'));
        }

        return view('intervencions.show')->with('intervencion', $intervencion);
    }

    /**
     * Show the form for editing the specified Intervencion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Intervencion $intervencion */
        $intervencion = Intervencion::find($id);

        if (empty($intervencion)) {
            Flash::error('Intervencion no encontrado');

            return redirect(route('intervencions.index'));
        }

        return view('intervencions.edit')->with('intervencion', $intervencion);
    }

    /**
     * Update the specified Intervencion in storage.
     *
     * @param  int              $id
     * @param UpdateIntervencionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateIntervencionRequest $request)
    {
        /** @var Intervencion $intervencion */
        $intervencion = Intervencion::find($id);

        if (empty($intervencion)) {
            Flash::error('Intervencion no encontrado');

            return redirect(route('intervencions.index'));
        }

        $intervencion->fill($request->all());
        $intervencion->save();

        Flash::success('Intervencion actualizado con éxito.');

        return redirect(route('intervencions.index'));
    }

    /**
     * Remove the specified Intervencion from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Intervencion $intervencion */
        $intervencion = Intervencion::find($id);

        if (empty($intervencion)) {
            Flash::error('Intervencion no encontrado');

            return redirect(route('intervencions.index'));
        }

        $intervencion->delete();

        Flash::success('Intervencion deleted successfully.');

        return redirect(route('intervencions.index'));
    }
}
