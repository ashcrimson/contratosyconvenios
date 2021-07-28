<?php

namespace App\Http\Controllers;

use App\DataTables\OrdenCompraEstadoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateOrdenCompraEstadoRequest;
use App\Http\Requests\UpdateOrdenCompraEstadoRequest;
use App\Models\OrdenCompraEstado;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class OrdenCompraEstadoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Orden Compra Estados')->only(['show']);
        $this->middleware('permission:Crear Orden Compra Estados')->only(['create','store']);
        $this->middleware('permission:Editar Orden Compra Estados')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Orden Compra Estados')->only(['destroy']);
    }

    /**
     * Display a listing of the OrdenCompraEstado.
     *
     * @param OrdenCompraEstadoDataTable $ordenCompraEstadoDataTable
     * @return Response
     */
    public function index(OrdenCompraEstadoDataTable $ordenCompraEstadoDataTable)
    {
        return $ordenCompraEstadoDataTable->render('orden_compra_estados.index');
    }

    /**
     * Show the form for creating a new OrdenCompraEstado.
     *
     * @return Response
     */
    public function create()
    {
        return view('orden_compra_estados.create');
    }

    /**
     * Store a newly created OrdenCompraEstado in storage.
     *
     * @param CreateOrdenCompraEstadoRequest $request
     *
     * @return Response
     */
    public function store(CreateOrdenCompraEstadoRequest $request)
    {
        $input = $request->all();

        /** @var OrdenCompraEstado $ordenCompraEstado */
        $ordenCompraEstado = OrdenCompraEstado::create($input);

        Flash::success('Orden Compra Estado guardado exitosamente.');

        return redirect(route('ordenCompraEstados.index'));
    }

    /**
     * Display the specified OrdenCompraEstado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var OrdenCompraEstado $ordenCompraEstado */
        $ordenCompraEstado = OrdenCompraEstado::find($id);

        if (empty($ordenCompraEstado)) {
            Flash::error('Orden Compra Estado no encontrado');

            return redirect(route('ordenCompraEstados.index'));
        }

        return view('orden_compra_estados.show')->with('ordenCompraEstado', $ordenCompraEstado);
    }

    /**
     * Show the form for editing the specified OrdenCompraEstado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var OrdenCompraEstado $ordenCompraEstado */
        $ordenCompraEstado = OrdenCompraEstado::find($id);

        if (empty($ordenCompraEstado)) {
            Flash::error('Orden Compra Estado no encontrado');

            return redirect(route('ordenCompraEstados.index'));
        }

        return view('orden_compra_estados.edit')->with('ordenCompraEstado', $ordenCompraEstado);
    }

    /**
     * Update the specified OrdenCompraEstado in storage.
     *
     * @param  int              $id
     * @param UpdateOrdenCompraEstadoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrdenCompraEstadoRequest $request)
    {
        /** @var OrdenCompraEstado $ordenCompraEstado */
        $ordenCompraEstado = OrdenCompraEstado::find($id);

        if (empty($ordenCompraEstado)) {
            Flash::error('Orden Compra Estado no encontrado');

            return redirect(route('ordenCompraEstados.index'));
        }

        $ordenCompraEstado->fill($request->all());
        $ordenCompraEstado->save();

        Flash::success('Orden Compra Estado actualizado con éxito.');

        return redirect(route('ordenCompraEstados.index'));
    }

    /**
     * Remove the specified OrdenCompraEstado from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var OrdenCompraEstado $ordenCompraEstado */
        $ordenCompraEstado = OrdenCompraEstado::find($id);

        if (empty($ordenCompraEstado)) {
            Flash::error('Orden Compra Estado no encontrado');

            return redirect(route('ordenCompraEstados.index'));
        }

        $ordenCompraEstado->delete();

        Flash::success('Orden Compra Estado deleted successfully.');

        return redirect(route('ordenCompraEstados.index'));
    }
}
