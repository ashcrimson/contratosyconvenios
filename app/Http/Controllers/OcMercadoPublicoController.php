<?php

namespace App\Http\Controllers;

use App\DataTables\OcMercadoPublicoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateOcMercadoPublicoRequest;
use App\Http\Requests\UpdateOcMercadoPublicoRequest;
use App\Models\OcMercadoPublico;
use App\Models\OcMercadoPublicoFechas;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Response;

class OcMercadoPublicoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Oc Mercado Publicos')->only(['show']);
        $this->middleware('permission:Crear Oc Mercado Publicos')->only(['create','store']);
        $this->middleware('permission:Editar Oc Mercado Publicos')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Oc Mercado Publicos')->only(['destroy']);
    }

    /**
     * Display a listing of the OcMercadoPublico.
     *
     * @param OcMercadoPublicoDataTable $ocMercadoPublicoDataTable
     * @return Response
     */
    public function index(OcMercadoPublicoDataTable $ocMercadoPublicoDataTable)
    {
        return $ocMercadoPublicoDataTable->render('oc_mercado_publicos.index');
    }

    /**
     * Show the form for creating a new OcMercadoPublico.
     *
     * @return Response
     */
    public function create()
    {
        return view('oc_mercado_publicos.create');
    }

    /**
     * Store a newly created OcMercadoPublico in storage.
     *
     * @param CreateOcMercadoPublicoRequest $request
     *
     * @return Response
     */
    public function store(CreateOcMercadoPublicoRequest $request)
    {
        $input = $request->all();

        try {
            DB::beginTransaction();

            /** @var OcMercadoPublico $ocMercadoPublico */
            $ocMercadoPublico = OcMercadoPublico::create($input);

            /**
             * @var OcMercadoPublicoFechas $ocMercadoPublicoFechas
             */
            $ocMercadoPublicoFechas = OcMercadoPublicoFechas::create([
                'oc_mercado_publico_id' => $ocMercadoPublico->id,
                'fecha_creacion' => $request->get('fecha_creacion'),
                'fecha_envio' => $request->get('fecha_envio'),
                'fecha_aceptacion' => $request->get('fecha_aceptacion'),
                'fecha_cancelacion' => $request->get('fecha_cancelacion'),
                'fecha_ultima_modificacion' => $request->get('fecha_ultima_modificacion'),
            ]);

        } catch (\Exception $exception) {
            DB::rollBack();

            if (auth()->user()->can('puede depurar')) {
                throw $exception;
            }
            flash()->error($exception->getMessage());
            return back()->withInput();
        }
        DB::commit();

        Flash::success('Oc Mercado Publico guardado exitosamente.');

        return redirect(route('ocMercadoPublicos.index'));
    }

    /**
     * Display the specified OcMercadoPublico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var OcMercadoPublico $ocMercadoPublico */
        $ocMercadoPublico = OcMercadoPublico::with(['ocMercadoPublicoFechas'])->find($id);

        if (empty($ocMercadoPublico)) {
            Flash::error('Oc Mercado Publico no encontrado');

            return redirect(route('ocMercadoPublicos.index'));
        }

        return view('oc_mercado_publicos.show')->with('ocMercadoPublico', $ocMercadoPublico);
    }

    /**
     * Show the form for editing the specified OcMercadoPublico.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var OcMercadoPublico $ocMercadoPublico */
        $ocMercadoPublico = OcMercadoPublico::with(['ocMercadoPublicoFechas'])->find($id);

        if (empty($ocMercadoPublico)) {
            Flash::error('Oc Mercado Publico no encontrado');

            return redirect(route('ocMercadoPublicos.index'));
        }

        return view('oc_mercado_publicos.edit')->with('ocMercadoPublico', $ocMercadoPublico);
    }

    /**
     * Update the specified OcMercadoPublico in storage.
     *
     * @param  int              $id
     * @param UpdateOcMercadoPublicoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOcMercadoPublicoRequest $request)
    {
        /** @var OcMercadoPublico $ocMercadoPublico */
        $ocMercadoPublico = OcMercadoPublico::find($id);

        if (empty($ocMercadoPublico)) {
            Flash::error('Oc Mercado Publico no encontrado');

            return redirect(route('ocMercadoPublicos.index'));
        }

        $ocMercadoPublico->fill($request->all());
        $ocMercadoPublico->save();

        Flash::success('Oc Mercado Publico actualizado con éxito.');

        return redirect(route('ocMercadoPublicos.index'));
    }

    /**
     * Remove the specified OcMercadoPublico from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var OcMercadoPublico $ocMercadoPublico */
        $ocMercadoPublico = OcMercadoPublico::find($id);

        if (empty($ocMercadoPublico)) {
            Flash::error('Oc Mercado Publico no encontrado');

            return redirect(route('ocMercadoPublicos.index'));
        }

        $ocMercadoPublico->delete();

        Flash::success('Oc Mercado Publico deleted successfully.');

        return redirect(route('ocMercadoPublicos.index'));
    }
}
