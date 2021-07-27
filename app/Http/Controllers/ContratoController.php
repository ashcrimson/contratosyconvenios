<?php

namespace App\Http\Controllers;

use App\DataTables\ContratoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateContratoRequest;
use App\Http\Requests\UpdateContratoRequest;
use App\Models\Contrato;
use App\Models\ContratoEstado;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class ContratoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Contratos')->only(['show']);
        $this->middleware('permission:Crear Contratos')->only(['create','store']);
        $this->middleware('permission:Editar Contratos')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Contratos')->only(['destroy']);
    }

    /**
     * Display a listing of the Contrato.
     *
     * @param ContratoDataTable $contratoDataTable
     * @return Response
     */
    public function index(ContratoDataTable $contratoDataTable)
    {
        return $contratoDataTable->render('contratos.index');
    }

    /**
     * Show the form for creating a new Contrato.
     *
     * @return Response
     */
    public function create()
    {
        return view('contratos.create');
    }

    /**
     * Store a newly created Contrato in storage.
     *
     * @param CreateContratoRequest $request
     *
     * @return Response
     */
    public function store(CreateContratoRequest $request)
    {
        $request->merge([
            'user_crea' => auth()->user()->id,
            'estado_id' => ContratoEstado::INGRESADO,
        ]);

        /** @var Contrato $contrato */
        $contrato = Contrato::create($request->all());

        Flash::success('Contrato guardado exitosamente.');

        return redirect(route('contratos.index'));
    }

    /**
     * Display the specified Contrato.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Contrato $contrato */
        $contrato = Contrato::find($id);

        if (empty($contrato)) {
            Flash::error('Contrato no encontrado');

            return redirect(route('contratos.index'));
        }

        return view('contratos.show')->with('contrato', $contrato);
    }

    /**
     * Show the form for editing the specified Contrato.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Contrato $contrato */
        $contrato = Contrato::find($id);

        if (empty($contrato)) {
            Flash::error('Contrato no encontrado');

            return redirect(route('contratos.index'));
        }

        return view('contratos.edit')->with('contrato', $contrato);
    }

    /**
     * Update the specified Contrato in storage.
     *
     * @param  int              $id
     * @param UpdateContratoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateContratoRequest $request)
    {
        /** @var Contrato $contrato */
        $contrato = Contrato::find($id);

        if (empty($contrato)) {
            Flash::error('Contrato no encontrado');

            return redirect(route('contratos.index'));
        }

        $request->merge([
            'user_actualiza' => auth()->user()->id
        ]);

        $contrato->fill($request->all());
        $contrato->save();

        Flash::success('Contrato actualizado con éxito.');

        return redirect(route('contratos.index'));
    }

    /**
     * Remove the specified Contrato from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Contrato $contrato */
        $contrato = Contrato::find($id);

        if (empty($contrato)) {
            Flash::error('Contrato no encontrado');

            return redirect(route('contratos.index'));
        }

        $contrato->delete();

        Flash::success('Contrato deleted successfully.');

        return redirect(route('contratos.index'));
    }
}
