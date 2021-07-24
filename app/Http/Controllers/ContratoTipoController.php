<?php

namespace App\Http\Controllers;

use App\DataTables\ContratoTipoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateContratoTipoRequest;
use App\Http\Requests\UpdateContratoTipoRequest;
use App\Models\ContratoTipo;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ContratoTipoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Contrato Tipos')->only(['show']);
        $this->middleware('permission:Crear Contrato Tipos')->only(['create','store']);
        $this->middleware('permission:Editar Contrato Tipos')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Contrato Tipos')->only(['destroy']);
    }

    /**
     * Display a listing of the ContratoTipo.
     *
     * @param ContratoTipoDataTable $contratoTipoDataTable
     * @return Response
     */
    public function index(ContratoTipoDataTable $contratoTipoDataTable)
    {
        return $contratoTipoDataTable->render('contrato_tipos.index');
    }

    /**
     * Show the form for creating a new ContratoTipo.
     *
     * @return Response
     */
    public function create()
    {
        return view('contrato_tipos.create');
    }

    /**
     * Store a newly created ContratoTipo in storage.
     *
     * @param CreateContratoTipoRequest $request
     *
     * @return Response
     */
    public function store(CreateContratoTipoRequest $request)
    {
        $input = $request->all();

        /** @var ContratoTipo $contratoTipo */
        $contratoTipo = ContratoTipo::create($input);

        Flash::success('Contrato Tipo guardado exitosamente.');

        return redirect(route('contratoTipos.index'));
    }

    /**
     * Display the specified ContratoTipo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var ContratoTipo $contratoTipo */
        $contratoTipo = ContratoTipo::find($id);

        if (empty($contratoTipo)) {
            Flash::error('Contrato Tipo no encontrado');

            return redirect(route('contratoTipos.index'));
        }

        return view('contrato_tipos.show')->with('contratoTipo', $contratoTipo);
    }

    /**
     * Show the form for editing the specified ContratoTipo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var ContratoTipo $contratoTipo */
        $contratoTipo = ContratoTipo::find($id);

        if (empty($contratoTipo)) {
            Flash::error('Contrato Tipo no encontrado');

            return redirect(route('contratoTipos.index'));
        }

        return view('contrato_tipos.edit')->with('contratoTipo', $contratoTipo);
    }

    /**
     * Update the specified ContratoTipo in storage.
     *
     * @param  int              $id
     * @param UpdateContratoTipoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContratoTipoRequest $request)
    {
        /** @var ContratoTipo $contratoTipo */
        $contratoTipo = ContratoTipo::find($id);

        if (empty($contratoTipo)) {
            Flash::error('Contrato Tipo no encontrado');

            return redirect(route('contratoTipos.index'));
        }

        $contratoTipo->fill($request->all());
        $contratoTipo->save();

        Flash::success('Contrato Tipo actualizado con éxito.');

        return redirect(route('contratoTipos.index'));
    }

    /**
     * Remove the specified ContratoTipo from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var ContratoTipo $contratoTipo */
        $contratoTipo = ContratoTipo::find($id);

        if (empty($contratoTipo)) {
            Flash::error('Contrato Tipo no encontrado');

            return redirect(route('contratoTipos.index'));
        }

        $contratoTipo->delete();

        Flash::success('Contrato Tipo deleted successfully.');

        return redirect(route('contratoTipos.index'));
    }
}
