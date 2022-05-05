<?php

namespace App\Http\Controllers;

use App\DataTables\UnidadMonetariaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateUnidadMonetariaRequest;
use App\Http\Requests\UpdateUnidadMonetariaRequest;
use App\Models\UnidadMonetaria;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class UnidadMonetariaController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Unidad Monetarias')->only(['show']);
        $this->middleware('permission:Crear Unidad Monetarias')->only(['create','store']);
        $this->middleware('permission:Editar Unidad Monetarias')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Unidad Monetarias')->only(['destroy']);
    }

    /**
     * Display a listing of the UnidadMonetaria.
     *
     * @param UnidadMonetariaDataTable $unidadMonetariaDataTable
     * @return Response
     */
    public function index(UnidadMonetariaDataTable $unidadMonetariaDataTable)
    {
        return $unidadMonetariaDataTable->render('unidad_monetarias.index');
    }

    /**
     * Show the form for creating a new UnidadMonetaria.
     *
     * @return Response
     */
    public function create()
    {
        return view('unidad_monetarias.create');
    }

    /**
     * Store a newly created UnidadMonetaria in storage.
     *
     * @param CreateUnidadMonetariaRequest $request
     *
     * @return Response
     */
    public function store(CreateUnidadMonetariaRequest $request)
    {
        $input = $request->all();

        /** @var UnidadMonetaria $unidadMonetaria */
        $unidadMonetaria = UnidadMonetaria::create($input);

        Flash::success('Unidad Monetaria guardado exitosamente.');

        return redirect(route('unidadMonetarias.index'));
    }

    /**
     * Display the specified UnidadMonetaria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var UnidadMonetaria $unidadMonetaria */
        $unidadMonetaria = UnidadMonetaria::find($id);

        if (empty($unidadMonetaria)) {
            Flash::error('Unidad Monetaria no encontrado');

            return redirect(route('unidadMonetarias.index'));
        }

        return view('unidad_monetarias.show')->with('unidadMonetaria', $unidadMonetaria);
    }

    /**
     * Show the form for editing the specified UnidadMonetaria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var UnidadMonetaria $unidadMonetaria */
        $unidadMonetaria = UnidadMonetaria::find($id);

        if (empty($unidadMonetaria)) {
            Flash::error('Unidad Monetaria no encontrado');

            return redirect(route('unidadMonetarias.index'));
        }

        return view('unidad_monetarias.edit')->with('unidadMonetaria', $unidadMonetaria);
    }

    /**
     * Update the specified UnidadMonetaria in storage.
     *
     * @param  int              $id
     * @param UpdateUnidadMonetariaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUnidadMonetariaRequest $request)
    {
        /** @var UnidadMonetaria $unidadMonetaria */
        $unidadMonetaria = UnidadMonetaria::find($id);

        if (empty($unidadMonetaria)) {
            Flash::error('Unidad Monetaria no encontrado');

            return redirect(route('unidadMonetarias.index'));
        }

        $unidadMonetaria->fill($request->all());
        $unidadMonetaria->save();

        Flash::success('Unidad Monetaria actualizado con éxito.');

        return redirect(route('unidadMonetarias.index'));
    }

    /**
     * Remove the specified UnidadMonetaria from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var UnidadMonetaria $unidadMonetaria */
        $unidadMonetaria = UnidadMonetaria::find($id);

        if (empty($unidadMonetaria)) {
            Flash::error('Unidad Monetaria no encontrado');

            return redirect(route('unidadMonetarias.index'));
        }

        $unidadMonetaria->delete();

        Flash::success('Unidad Monetaria deleted successfully.');

        return redirect(route('unidadMonetarias.index'));
    }
}
