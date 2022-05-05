<?php

namespace App\Http\Controllers;

use App\DataTables\OrdenCompraTipoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateOrdenCompraTipoRequest;
use App\Http\Requests\UpdateOrdenCompraTipoRequest;
use App\Models\OrdenCompraTipo;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class OrdenCompraTipoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Orden Compra Tipos')->only(['show']);
        $this->middleware('permission:Crear Orden Compra Tipos')->only(['create','store']);
        $this->middleware('permission:Editar Orden Compra Tipos')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Orden Compra Tipos')->only(['destroy']);
    }

    /**
     * Display a listing of the OrdenCompraTipo.
     *
     * @param OrdenCompraTipoDataTable $ordenCompraTipoDataTable
     * @return Response
     */
    public function index(OrdenCompraTipoDataTable $ordenCompraTipoDataTable)
    {
        return $ordenCompraTipoDataTable->render('orden_compra_tipos.index');
    }

    /**
     * Show the form for creating a new OrdenCompraTipo.
     *
     * @return Response
     */
    public function create()
    {
        return view('orden_compra_tipos.create');
    }

    /**
     * Store a newly created OrdenCompraTipo in storage.
     *
     * @param CreateOrdenCompraTipoRequest $request
     *
     * @return Response
     */
    public function store(CreateOrdenCompraTipoRequest $request)
    {
        $input = $request->all();

        /** @var OrdenCompraTipo $ordenCompraTipo */
        $ordenCompraTipo = OrdenCompraTipo::create($input);

        Flash::success('Orden Compra Tipo guardado exitosamente.');

        return redirect(route('ordenCompraTipos.index'));
    }

    /**
     * Display the specified OrdenCompraTipo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var OrdenCompraTipo $ordenCompraTipo */
        $ordenCompraTipo = OrdenCompraTipo::find($id);

        if (empty($ordenCompraTipo)) {
            Flash::error('Orden Compra Tipo no encontrado');

            return redirect(route('ordenCompraTipos.index'));
        }

        return view('orden_compra_tipos.show')->with('ordenCompraTipo', $ordenCompraTipo);
    }

    /**
     * Show the form for editing the specified OrdenCompraTipo.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var OrdenCompraTipo $ordenCompraTipo */
        $ordenCompraTipo = OrdenCompraTipo::find($id);

        if (empty($ordenCompraTipo)) {
            Flash::error('Orden Compra Tipo no encontrado');

            return redirect(route('ordenCompraTipos.index'));
        }

        return view('orden_compra_tipos.edit')->with('ordenCompraTipo', $ordenCompraTipo);
    }

    /**
     * Update the specified OrdenCompraTipo in storage.
     *
     * @param  int              $id
     * @param UpdateOrdenCompraTipoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrdenCompraTipoRequest $request)
    {
        /** @var OrdenCompraTipo $ordenCompraTipo */
        $ordenCompraTipo = OrdenCompraTipo::find($id);

        if (empty($ordenCompraTipo)) {
            Flash::error('Orden Compra Tipo no encontrado');

            return redirect(route('ordenCompraTipos.index'));
        }

        $ordenCompraTipo->fill($request->all());
        $ordenCompraTipo->save();

        Flash::success('Orden Compra Tipo actualizado con éxito.');

        return redirect(route('ordenCompraTipos.index'));
    }

    /**
     * Remove the specified OrdenCompraTipo from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var OrdenCompraTipo $ordenCompraTipo */
        $ordenCompraTipo = OrdenCompraTipo::find($id);

        if (empty($ordenCompraTipo)) {
            Flash::error('Orden Compra Tipo no encontrado');

            return redirect(route('ordenCompraTipos.index'));
        }

        $ordenCompraTipo->delete();

        Flash::success('Orden Compra Tipo deleted successfully.');

        return redirect(route('ordenCompraTipos.index'));
    }
}
