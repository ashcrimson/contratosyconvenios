<?php

namespace App\Http\Controllers;

use App\DataTables\CargoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateCargoRequest;
use App\Http\Requests\UpdateCargoRequest;
use App\Models\Cargo;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class CargoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Cargos')->only(['show']);
        $this->middleware('permission:Crear Cargos')->only(['create','store']);
        $this->middleware('permission:Editar Cargos')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Cargos')->only(['destroy']);
    }

    /**
     * Display a listing of the Cargo.
     *
     * @param CargoDataTable $cargoDataTable
     * @return Response
     */
    public function index(CargoDataTable $cargoDataTable)
    {
        return $cargoDataTable->render('cargos.index');
    }

    /**
     * Show the form for creating a new Cargo.
     *
     * @return Response
     */
    public function create()
    {
        return view('cargos.create');
    }

    /**
     * Store a newly created Cargo in storage.
     *
     * @param CreateCargoRequest $request
     *
     * @return Response
     */
    public function store(CreateCargoRequest $request)
    {
        $input = $request->all();

        /** @var Cargo $cargo */
        $cargo = Cargo::create($input);

        Flash::success('Cargo guardado exitosamente.');

        return redirect(route('cargos.index'));
    }

    /**
     * Display the specified Cargo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Cargo $cargo */
        $cargo = Cargo::find($id);

        if (empty($cargo)) {
            Flash::error('Cargo no encontrado');

            return redirect(route('cargos.index'));
        }

        return view('cargos.show')->with('cargo', $cargo);
    }

    /**
     * Show the form for editing the specified Cargo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Cargo $cargo */
        $cargo = Cargo::find($id);

        if (empty($cargo)) {
            Flash::error('Cargo no encontrado');

            return redirect(route('cargos.index'));
        }

        return view('cargos.edit')->with('cargo', $cargo);
    }

    /**
     * Update the specified Cargo in storage.
     *
     * @param  int              $id
     * @param UpdateCargoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCargoRequest $request)
    {
        /** @var Cargo $cargo */
        $cargo = Cargo::find($id);

        if (empty($cargo)) {
            Flash::error('Cargo no encontrado');

            return redirect(route('cargos.index'));
        }

        $cargo->fill($request->all());
        $cargo->save();

        Flash::success('Cargo actualizado con éxito.');

        return redirect(route('cargos.index'));
    }

    /**
     * Remove the specified Cargo from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Cargo $cargo */
        $cargo = Cargo::find($id);

        if (empty($cargo)) {
            Flash::error('Cargo no encontrado');

            return redirect(route('cargos.index'));
        }

        $cargo->delete();

        Flash::success('Cargo deleted successfully.');

        return redirect(route('cargos.index'));
    }
}
