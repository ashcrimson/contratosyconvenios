<?php

namespace App\Http\Controllers;

use App\DataTables\AreaDataTable;
use App\DataTables\Scopes\ScopeAreaDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAreaRequest;
use App\Http\Requests\UpdateAreaRequest;
use App\Models\Area;
use App\Http\Controllers\AppBaseController;

class AreaController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Areas')->only(['show']);
        $this->middleware('permission:Crear Areas')->only(['create','store']);
        $this->middleware('permission:Editar Areas')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Areas')->only(['destroy']);
    }

    /**
     * Display a listing of the Area.
     *
     * @param AreaDataTable $areaDataTable
     * @return Response
     */
    public function index(AreaDataTable $areaDataTable)
    {
        $scope = new ScopeAreaDataTable();

        if (auth()->user()->cannot('Ver todas las areas')){
            $scope->cargos = auth()->user()->cargo_id;
        }

        $scope->eliminadas =1 ;

        $areaDataTable->addScope($scope);

        return $areaDataTable->render('areas.index');
    }

    /**
     * Show the form for creating a new Area.
     *
     * @return Response
     */
    public function create()
    {
        return view('areas.create');
    }

    /**
     * Store a newly created Area in storage.
     *
     * @param CreateAreaRequest $request
     *
     * @return Response
     */
    public function store(CreateAreaRequest $request)
    {
        $input = $request->all();

        /** @var Area $area */
        $area = Area::create($input);

        flash()->success('Area guardado exitosamente.');

        return redirect(route('areas.index'));
    }

    /**
     * Display the specified Area.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Area $area */
        $area = Area::find($id);

        if (empty($area)) {
            flash()->error('Area no encontrada');

            return redirect(route('areas.index'));
        }

        return view('areas.show')->with('area', $area);
    }

    /**
     * Show the form for editing the specified Area.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var Area $area */
        $area = Area::find($id);

        if (empty($area)) {
            flash()->error('Area no encontrada');

            return redirect(route('areas.index'));
        }

        return view('areas.edit')->with('area', $area);
    }

    /**
     * Update the specified Area in storage.
     *
     * @param  int              $id
     * @param UpdateAreaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAreaRequest $request)
    {
        /** @var Area $area */
        $area = Area::find($id);

        if (empty($area)) {
            flash()->error('Area no encontrada');

            return redirect(route('areas.index'));
        }

        $area->fill($request->all());
        $area->save();

        flash()->success('Area actualizado con éxito.');

        return redirect(route('areas.index'));
    }

    /**
     * Remove the specified Area from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Area $area */
        $area = Area::find($id);

        if (empty($area)) {
            flash()->error('Area no encontrada');

            return redirect(route('areas.index'));
        }

        $area->delete();

        flash()->success('Area deleted successfully.');

        return redirect(route('areas.index'));
    }

    public function restore($id)
    {

        /** @var Area $area */
        $area = Area::onlyTrashed()->find($id);

        if (empty($area)) {
            flash()->error('Area no encontrada');

            return redirect(route('areas.index'));
        }

        $area->restore();

        flash()->success('Area restaurada!');

        return redirect(route('areas.index'));
    }
}
