<?php

namespace App\Http\Controllers;

use App\DataTables\DiagnosticDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDiagnosticRequest;
use App\Http\Requests\UpdateDiagnosticRequest;
use App\Models\Diagnostic;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DiagnosticController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Diagnostics')->only(['show']);
        $this->middleware('permission:Crear Diagnostics')->only(['create','store']);
        $this->middleware('permission:Editar Diagnostics')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Diagnostics')->only(['destroy']);
    }

    /**
     * Display a listing of the Diagnostic.
     *
     * @param DiagnosticDataTable $diagnosticDataTable
     * @return Response
     */
    public function index(DiagnosticDataTable $diagnosticDataTable)
    {
        return $diagnosticDataTable->render('diagnostics.index');
    }

    /**
     * Show the form for creating a new Diagnostic.
     *
     * @return Response
     */
    public function create()
    {
        return view('diagnostics.create');
    }

    /**
     * Store a newly created Diagnostic in storage.
     *
     * @param CreateDiagnosticRequest $request
     *
     * @return Response
     */
    public function store(CreateDiagnosticRequest $request)
    {
        $input = $request->all();

        /** @var Diagnostic $diagnostic */
        $diagnostic = Diagnostic::create($input);

        Flash::success('Diagnostic guardado exitosamente.');

        return redirect(route('diagnostics.index'));
    }

    /**
     * Display the specified Diagnostic.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Diagnostic $diagnostic */
        $diagnostic = Diagnostic::find($id);

        if (empty($diagnostic)) {
            Flash::error('Diagnostic no encontrado');

            return redirect(route('diagnostics.index'));
        }

        return view('diagnostics.show')->with('diagnostic', $diagnostic);
    }

    /**
     * Show the form for editing the specified Diagnostic.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Diagnostic $diagnostic */
        $diagnostic = Diagnostic::find($id);

        if (empty($diagnostic)) {
            Flash::error('Diagnostic no encontrado');

            return redirect(route('diagnostics.index'));
        }

        return view('diagnostics.edit')->with('diagnostic', $diagnostic);
    }

    /**
     * Update the specified Diagnostic in storage.
     *
     * @param  int              $id
     * @param UpdateDiagnosticRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDiagnosticRequest $request)
    {
        /** @var Diagnostic $diagnostic */
        $diagnostic = Diagnostic::find($id);

        if (empty($diagnostic)) {
            Flash::error('Diagnostic no encontrado');

            return redirect(route('diagnostics.index'));
        }

        $diagnostic->fill($request->all());
        $diagnostic->save();

        Flash::success('Diagnostic actualizado con éxito.');

        return redirect(route('diagnostics.index'));
    }

    /**
     * Remove the specified Diagnostic from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Diagnostic $diagnostic */
        $diagnostic = Diagnostic::find($id);

        if (empty($diagnostic)) {
            Flash::error('Diagnostic no encontrado');

            return redirect(route('diagnostics.index'));
        }

        $diagnostic->delete();

        Flash::success('Diagnostic deleted successfully.');

        return redirect(route('diagnostics.index'));
    }
}
