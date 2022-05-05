<?php

namespace App\Http\Controllers;

use App\DataTables\DespachoTipoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDespachoTipoRequest;
use App\Http\Requests\UpdateDespachoTipoRequest;
use App\Models\DespachoTipo;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DespachoTipoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Despacho Tipos')->only(['show']);
        $this->middleware('permission:Crear Despacho Tipos')->only(['create','store']);
        $this->middleware('permission:Editar Despacho Tipos')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Despacho Tipos')->only(['destroy']);
    }

    /**
     * Display a listing of the DespachoTipo.
     *
     * @param DespachoTipoDataTable $despachoTipoDataTable
     * @return Response
     */
    public function index(DespachoTipoDataTable $despachoTipoDataTable)
    {
        return $despachoTipoDataTable->render('despacho_tipos.index');
    }

    /**
     * Show the form for creating a new DespachoTipo.
     *
     * @return Response
     */
    public function create()
    {
        return view('despacho_tipos.create');
    }

    /**
     * Store a newly created DespachoTipo in storage.
     *
     * @param CreateDespachoTipoRequest $request
     *
     * @return Response
     */
    public function store(CreateDespachoTipoRequest $request)
    {
        $input = $request->all();

        /** @var DespachoTipo $despachoTipo */
        $despachoTipo = DespachoTipo::create($input);

        Flash::success('Despacho Tipo guardado exitosamente.');

        return redirect(route('despachoTipos.index'));
    }

    /**
     * Display the specified DespachoTipo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DespachoTipo $despachoTipo */
        $despachoTipo = DespachoTipo::find($id);

        if (empty($despachoTipo)) {
            Flash::error('Despacho Tipo no encontrado');

            return redirect(route('despachoTipos.index'));
        }

        return view('despacho_tipos.show')->with('despachoTipo', $despachoTipo);
    }

    /**
     * Show the form for editing the specified DespachoTipo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var DespachoTipo $despachoTipo */
        $despachoTipo = DespachoTipo::find($id);

        if (empty($despachoTipo)) {
            Flash::error('Despacho Tipo no encontrado');

            return redirect(route('despachoTipos.index'));
        }

        return view('despacho_tipos.edit')->with('despachoTipo', $despachoTipo);
    }

    /**
     * Update the specified DespachoTipo in storage.
     *
     * @param  int              $id
     * @param UpdateDespachoTipoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDespachoTipoRequest $request)
    {
        /** @var DespachoTipo $despachoTipo */
        $despachoTipo = DespachoTipo::find($id);

        if (empty($despachoTipo)) {
            Flash::error('Despacho Tipo no encontrado');

            return redirect(route('despachoTipos.index'));
        }

        $despachoTipo->fill($request->all());
        $despachoTipo->save();

        Flash::success('Despacho Tipo actualizado con éxito.');

        return redirect(route('despachoTipos.index'));
    }

    /**
     * Remove the specified DespachoTipo from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DespachoTipo $despachoTipo */
        $despachoTipo = DespachoTipo::find($id);

        if (empty($despachoTipo)) {
            Flash::error('Despacho Tipo no encontrado');

            return redirect(route('despachoTipos.index'));
        }

        $despachoTipo->delete();

        Flash::success('Despacho Tipo deleted successfully.');

        return redirect(route('despachoTipos.index'));
    }
}
