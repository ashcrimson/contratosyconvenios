<?php

namespace App\Http\Controllers;

use App\DataTables\OrdenCompraDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateOrdenCompraRequest;
use App\Http\Requests\UpdateOrdenCompraRequest;
use App\Models\OrdenCompra;
use App\Models\OrdenCompraDetalle;
use App\Models\OrdenCompraEstado;
use Exception;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\DB;
use Response;

class OrdenCompraController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Orden Compras')->only(['show']);
        $this->middleware('permission:Crear Orden Compras')->only(['create','store']);
        $this->middleware('permission:Editar Orden Compras')->only(['edit','update',]);
        $this->middleware('permission:Eliminar Orden Compras')->only(['destroy']);
    }

    /**
     * Display a listing of the OrdenCompra.
     *
     * @param OrdenCompraDataTable $ordenCompraDataTable
     * @return Response
     */
    public function index(OrdenCompraDataTable $ordenCompraDataTable)
    {
        return $ordenCompraDataTable->render('orden_compras.index');
    }

    /**
     * Show the form for creating a new OrdenCompra.
     *
     * @return Response
     */
    public function create()
    {
        return view('orden_compras.create');
    }

    /**
     * Store a newly created OrdenCompra in storage.
     *
     * @param CreateOrdenCompraRequest $request
     *
     * @return Response
     */
    public function store(CreateOrdenCompraRequest $request)
    {

        $request->merge([
            'user_crea' => auth()->user()->id,
            'estado_id' => OrdenCompraEstado::INGRESADA,
        ]);




        try {
            DB::beginTransaction();

            /** @var OrdenCompra $ordenCompra */
            $ordenCompra = OrdenCompra::create($request->all());


            $detalles = collect(json_decode($request->detalles))->map(function ($item){

                return new OrdenCompraDetalle([
                    'item_id' => $item->id,
                    'precio' => $item->precio,
                    'cantidad' => $item->cantidad
                ]);
            });

            $ordenCompra->detalles()->saveMany($detalles);

            $ordenCompra->egreso();

            if ($request->hasFile('adjunto')){
                $file = $request->file('adjunto');

                $ordenCompra->addDocumento($file);

            }

        } catch (Exception $exception) {
            DB::rollBack();

            throw new Exception($exception);
        }

        DB::commit();


        Flash::success('Orden Compra guardado exitosamente.');

        return redirect(route('ordenCompras.index'));
    }

    /**
     * Display the specified OrdenCompra.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var OrdenCompra $ordenCompra */
        $ordenCompra = OrdenCompra::find($id);

        if (empty($ordenCompra)) {
            Flash::error('Orden Compra no encontrado');

            return redirect(route('ordenCompras.index'));
        }

        return view('orden_compras.show')->with('ordenCompra', $ordenCompra);
    }

    /**
     * Show the form for editing the specified OrdenCompra.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        /** @var OrdenCompra $ordenCompra */
        $ordenCompra = OrdenCompra::find($id);

        if (empty($ordenCompra)) {
            Flash::error('Orden Compra no encontrado');

            return redirect(route('ordenCompras.index'));
        }

        return view('orden_compras.edit')->with('ordenCompra', $ordenCompra);
    }

    /**
     * Update the specified OrdenCompra in storage.
     *
     * @param  int              $id
     * @param UpdateOrdenCompraRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateOrdenCompraRequest $request)
    {
        /** @var OrdenCompra $ordenCompra */
        $ordenCompra = OrdenCompra::find($id);

        if (empty($ordenCompra)) {
            Flash::error('Orden Compra no encontrado');

            return redirect(route('ordenCompras.index'));
        }

        $request->merge([
            'user_actualiza' => auth()->user()->id
        ]);


        try {
            DB::beginTransaction();

            /** @var OrdenCompra $ordenCompra */
            $ordenCompra->fill($request->all());
            $ordenCompra->save();


            if ($request->hasFile('adjunto')){
                $file = $request->file('adjunto');

                $ordenCompra->addDocumento($file);

            }

        } catch (Exception $exception) {
            DB::rollBack();

            throw new Exception($exception);
        }

        DB::commit();

        Flash::success('Orden Compra actualizado con éxito.');

        return redirect(route('ordenCompras.index'));
    }

    /**
     * Remove the specified OrdenCompra from storage.
     *
     * @param  int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var OrdenCompra $ordenCompra */
        $ordenCompra = OrdenCompra::find($id);

        if (empty($ordenCompra)) {
            Flash::error('Orden Compra no encontrado');

            return redirect(route('ordenCompras.index'));
        }

        $ordenCompra->delete();

        Flash::success('Orden Compra deleted successfully.');

        return redirect(route('ordenCompras.index'));
    }

    public function anular(OrdenCompra $compra)
    {


        try {
            DB::beginTransaction();

            $compra->anular();

        } catch (Exception $exception) {
            DB::rollBack();

            throw new Exception($exception);
        }

        DB::commit();

        Flash::success('Orden Compra anulada correctamente.');

        return redirect(route('ordenCompras.index'));
    }
}
