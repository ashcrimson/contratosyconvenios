<?php

namespace App\Http\Controllers;

use App\DataTables\ContratoEstadoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateContratoEstadoRequest;
use App\Http\Requests\UpdateContratoEstadoRequest;
use App\Models\ContratoEstado;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ContratoEstadoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Contrato Estados')->only(['show']);
        $this->middleware('permission:Crear Contrato Estados')->only(['create','store']);
        $this->middleware('permission:Editar Contrato Estados')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Contrato Estados')->only(['destroy']);
    }

    /**
     * Display a listing of the ContratoEstado.
     *
     * @param ContratoEstadoDataTable $contratoEstadoDataTable
     * @return Response
     */
    public function index(ContratoEstadoDataTable $contratoEstadoDataTable)
    {
        return $contratoEstadoDataTable->render('contrato_estados.index');
    }

    /**
     * Show the form for creating a new ContratoEstado.
     *
     * @return Response
     */
    public function create()
    {
        return view('contrato_estados.create');
    }

    /**
     * Store a newly created ContratoEstado in storage.
     *
     * @param CreateContratoEstadoRequest $request
     *
     * @return Response
     */
    public function store(CreateContratoEstadoRequest $request)
    {
        $input = $request->all();

        /** @var ContratoEstado $contratoEstado */
        $contratoEstado = ContratoEstado::create($input);

        Flash::success('Contrato Estado guardado exitosamente.');

        return redirect(route('contratoEstados.index'));
    }

    /**
     * Display the specified ContratoEstado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ContratoEstado $contratoEstado */
        $contratoEstado = ContratoEstado::find($id);

        if (empty($contratoEstado)) {
            Flash::error('Contrato Estado no encontrado');

            return redirect(route('contratoEstados.index'));
        }

        return view('contrato_estados.show')->with('contratoEstado', $contratoEstado);
    }

    /**
     * Show the form for editing the specified ContratoEstado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var ContratoEstado $contratoEstado */
        $contratoEstado = ContratoEstado::find($id);

        if (empty($contratoEstado)) {
            Flash::error('Contrato Estado no encontrado');

            return redirect(route('contratoEstados.index'));
        }

        return view('contrato_estados.edit')->with('contratoEstado', $contratoEstado);
    }

    /**
     * Update the specified ContratoEstado in storage.
     *
     * @param  int              $id
     * @param UpdateContratoEstadoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContratoEstadoRequest $request)
    {
        /** @var ContratoEstado $contratoEstado */
        $contratoEstado = ContratoEstado::find($id);

        if (empty($contratoEstado)) {
            Flash::error('Contrato Estado no encontrado');

            return redirect(route('contratoEstados.index'));
        }

        $contratoEstado->fill($request->all());
        $contratoEstado->save();

        Flash::success('Contrato Estado actualizado con éxito.');

        return redirect(route('contratoEstados.index'));
    }

    /**
     * Remove the specified ContratoEstado from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ContratoEstado $contratoEstado */
        $contratoEstado = ContratoEstado::find($id);

        if (empty($contratoEstado)) {
            Flash::error('Contrato Estado no encontrado');

            return redirect(route('contratoEstados.index'));
        }

        $contratoEstado->delete();

        Flash::success('Contrato Estado deleted successfully.');

        return redirect(route('contratoEstados.index'));
    }
}
