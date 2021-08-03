<?php

namespace App\Http\Controllers;

use App\DataTables\LicitacionDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLicitacionRequest;
use App\Http\Requests\UpdateLicitacionRequest;
use App\Models\Documento;
use App\Models\Licitacion;
use Exception;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
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
        return $licitacionDataTable->render('licitaciones.index');
    }

    /**
     * Show the form for creating a new Licitacion.
     *
     * @return Response
     */
    public function create()
    {
        return view('licitaciones.create');
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
        $request->merge([
            'user_crea' => auth()->user()->id
        ]);

        try {
            DB::beginTransaction();

            /** @var Licitacion $licitacion */
            $licitacion = Licitacion::create($request->all());



            if ($request->hasFile('adjunto')){
                $file = $request->file('adjunto');

                $licitacion->addDocumento($file);

            }

        } catch (Exception $exception) {
            DB::rollBack();

            throw new Exception($exception);
        }

        DB::commit();



        Flash::success('Licitacion guardado exitosamente.');

        return redirect(route('licitaciones.index'));
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

            return redirect(route('licitaciones.index'));
        }

        return view('licitaciones.show')->with('licitacion', $licitacion);
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

            return redirect(route('licitaciones.index'));
        }

        return view('licitaciones.edit')->with('licitacion', $licitacion);
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

            return redirect(route('licitaciones.index'));
        }

        $request->merge([
            'user_actualiza' => auth()->user()->id
        ]);

        try {
            DB::beginTransaction();

            /** @var Licitacion $licitacion */
            $licitacion->fill($request->all());
            $licitacion->save();



            if ($request->hasFile('adjunto')){
                $file = $request->file('adjunto');

                $licitacion->addDocumento($file);

            }

        } catch (Exception $exception) {
            DB::rollBack();

            throw new Exception($exception);
        }

        DB::commit();


        Flash::success('Licitacion actualizado con éxito.');

        return redirect(route('licitaciones.index'));
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

            return redirect(route('licitaciones.index'));
        }

        $licitacion->delete();

        Flash::success('Licitacion deleted successfully.');

        return redirect(route('licitaciones.index'));
    }
}
