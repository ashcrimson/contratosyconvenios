<?php

namespace App\Http\Controllers;

use App\DataTables\LicitacionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLicitacionRequest;
use App\Http\Requests\UpdateLicitacionRequest;
use App\Models\Licitacion;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LicitacionController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Licitacions')->only(['show']);
        $this->middleware('permission:Crear Licitacions')->only(['create','store']);
        $this->middleware('permission:Editar Licitacions')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Licitacions')->only(['destroy']);
    }

    /**
     * Display a listing of the Licitacion.
     *
     * @param LicitacionDataTable $licitacionDataTable
     * @return Response
     */
    public function index(LicitacionDataTable $licitacionDataTable)
    {
        return $licitacionDataTable->render('licitacions.index');
    }

    /**
     * Show the form for creating a new Licitacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('licitacions.create');
    }

    /**
     * Store a newly created Licitacion in storage.
     *
     * @param CreateLicitacionRequest $request
     *
     * @return Response
     */
    public function store(CreateLicitacionRequest $request)
    {
        $input = $request->all();

        /** @var Licitacion $licitacion */
        $licitacion = Licitacion::create($input);

        Flash::success('Licitacion guardado exitosamente.');

        return redirect(route('licitacions.index'));
    }

    /**
     * Display the specified Licitacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Licitacion $licitacion */
        $licitacion = Licitacion::find($id);

        if (empty($licitacion)) {
            Flash::error('Licitacion no encontrado');

            return redirect(route('licitacions.index'));
        }

        return view('licitacions.show')->with('licitacion', $licitacion);
    }

    /**
     * Show the form for editing the specified Licitacion.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Licitacion $licitacion */
        $licitacion = Licitacion::find($id);

        if (empty($licitacion)) {
            Flash::error('Licitacion no encontrado');

            return redirect(route('licitacions.index'));
        }

        return view('licitacions.edit')->with('licitacion', $licitacion);
    }

    /**
     * Update the specified Licitacion in storage.
     *
     * @param  int              $id
     * @param UpdateLicitacionRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLicitacionRequest $request)
    {
        /** @var Licitacion $licitacion */
        $licitacion = Licitacion::find($id);

        if (empty($licitacion)) {
            Flash::error('Licitacion no encontrado');

            return redirect(route('licitacions.index'));
        }

        $licitacion->fill($request->all());
        $licitacion->save();

        Flash::success('Licitacion actualizado con éxito.');

        return redirect(route('licitacions.index'));
    }

    /**
     * Remove the specified Licitacion from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Licitacion $licitacion */
        $licitacion = Licitacion::find($id);

        if (empty($licitacion)) {
            Flash::error('Licitacion no encontrado');

            return redirect(route('licitacions.index'));
        }

        $licitacion->delete();

        Flash::success('Licitacion deleted successfully.');

        return redirect(route('licitacions.index'));
    }
}
