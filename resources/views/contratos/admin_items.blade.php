@extends('layouts.app')

@section('htmlheader_title')
    Detalles Contrato
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h1 class="m-0 text-dark">Detalles Contrato</h1>
                </div><!-- /.col -->
                <div class="col">
                    <a class="btn btn-outline-info float-right" href="{!! route('contratos.index') !!}">
                        <i class="fa fa-backward"></i>
                        <span class="d-none d-sm-inline">Regresar</span>
                    </a>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content" id="root">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            @include('contratos.partials.show_field_min')


                        <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#modalFormContratoItem">
                                <i class="fa fa-plus"></i> Nuevo Detalle
                            </button>

                            <br>

                            <!-- Modal -->
                            <div class="modal fade" id="modalFormContratoItem" tabindex="-1" role="dialog"
                                 aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" v-text="modalFormTitle"></h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form @submit.prevent="save()">
                                            <div class="modal-body">
                                                <div class="form-row">
                                                    <!-- Codigo Field -->
                                                    <div class="form-group col-sm-4">
                                                        <label for="">Codigo:</label>
                                                        <input class="form-control" type="text" v-model="editedItem.codigo" maxlength="45">
                                                    </div>

                                                    <!-- Descripcion Field -->
                                                    <div class="form-group col-sm-4">
                                                        <label for="">Descripcion:</label>
                                                        <input class="form-control" type="text" v-model="editedItem.descripcion" maxlength="255">
                                                    </div>

                                                    <!-- Cantidad Total Field -->
                                                    <div class="form-group col-sm-4">
                                                        <label for="">Cantidad Total:</label>
                                                        <input class="form-control" type="number" v-model="editedItem.cantidad_total" step="any">
                                                    </div>

                                                    <!-- Precio Field -->
                                                    <div class="form-group col-sm-4">
                                                        <label for="">Precio:</label>
                                                        <input class="form-control" type="number" v-model="editedItem.precio" step="any">
                                                    </div>

                                                    <!-- Grupo Field -->
                                                    <div class="form-group col-sm-4">
                                                        <label for="">Grupo:</label>
                                                        <input class="form-control" type="text" v-model="editedItem.grupo" maxlength="255">
                                                    </div>

                                                    <!-- Presentacion Prod Soli Field -->
                                                    <div class="form-group col-sm-4">
                                                        <label for="">Presentacion Prod Soli:</label>
                                                        <input class="form-control" type="text" v-model="editedItem.presentacion_prod_soli">
                                                    </div>

                                                    <!-- F F Field -->
                                                    <div class="form-group col-sm-4">
                                                        <label for="">F F:</label>
                                                        <input class="form-control" type="text" v-model="editedItem.f_f">
                                                    </div>

                                                    <!-- Desc Tec Prod Ofertado Field -->
                                                    <div class="form-group col-sm-4">
                                                        <label for="">Desc Tec Prod Ofertado:</label>
                                                        <input class="form-control" type="text" v-model="editedItem.desc_tec_prod_ofertado">
                                                    </div>

                                                    <!-- U Entrega Oferente Field -->
                                                    <div class="form-group col-sm-4">
                                                        <label for="">U Entrega Oferente:</label>
                                                        <input class="form-control" type="text" v-model="editedItem.u_entrega_oferente">
                                                    </div>

                                                    <!-- Saldo Field -->
                                                    <div class="form-group col-sm-4">
                                                        <label for="">Saldo:</label>
                                                        <input class="form-control" type="text" v-model="editedItem.saldo">
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" @click="close()">
                                                    Cancelar
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-save"></i>
                                                    <span v-text="textButtonSubmint"></span>
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="table-responsive">

                                <table class="table table-bordered table-sm table-striped nowrap">
                                    <thead>
                                    <tr >
                                        <th>id</th>
                                        <th>Código</th>
                                        <th>DESC PROD SOLI</th>
                                        <th>CANTIDAD TOTAL</th>
                                        <th>PRECIO U BRUTO</th>
                                        <th>GRUPO</th>
                                        <th>PRESENTACION PROD SOLI</th>
                                        <th>F_F</th>
                                        <th>DESC TEC PROD OFERTADO</th>
                                        <th>U ENTREGA OFERENTE</th>
                                        <th class="text-nowrap">Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr v-if="items.length == 0">
                                        <td colspan="20" class="text-center">Ningún Registro agregado</td>
                                    </tr>
                                    <tr v-for="item in items" >
                                        <td v-text="item.id"></td>
                                        <td v-text="item.codigo"></td>
                                        <td v-text="item.descripcion"></td>
                                        <td v-text="item.cantidad_total"> </td>
                                        <td v-text="item.precio"></td>
                                        <td v-text="item.grupo"></td>
                                        <td v-text="item.presentacion_prod_soli"></td>
                                        <td v-text="item.f_f"></td>
                                        <td v-text="item.desc_tec_prod_ofertado"></td>
                                        <td v-text="item.u_entrega_oferente"></td>
                                        <td  class="text-nowrap">
                                            @can('Editar detalle contrato')
                                            <button type="button" @click="editItem(item)" class="btn btn-sm btn-outline-info" v-tooltip="'Editar'"  >
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            @endcan

                                            @can('Eliminar detalle contrato')
                                            <button type="button" @click="deleteItem(item)"  class='btn btn-outline-danger btn-sm' v-tooltip="'Eliminar'" >
                                                <i class="fa fa-trash-alt"></i>
                                            </button>
                                            @endcan
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

@push('scripts')
<script>

    var vmItem = new Vue({
            el: '#root',
            name: '#adminContratoItems',
            created: function() {
                this.getItems();
            },
            mounted() {
            },
            data: {

                items: [],
                editedItem: {
                    id : 0,
                    contrato_id: @json($contrato->id),
                },
                defaultItem: {
                    id : 0,
                    contrato_id: @json($contrato->id),

                },
                itemElimina: {

                },

                loading: false,

                contrato_id: @json($contrato->id),

            },
            methods: {
                async getItems() {
                    const res = await  axios.get(route('api.contrato_items.index',{contrato_id: this.contrato_id}));

                    console.log('res getItems:',res)
                    this.items = res.data.data;
                },
                getId(item){
                    if(item)
                        return item.id;

                    return null
                },
                editItem (item) {
                    $("#modalFormContratoItem").modal('show');
                    this.editedItem = Object.assign({}, item);

                },
                close () {
                    $("#modalFormContratoItem").modal('hide');
                    this.loading = false;
                    setTimeout(() => {
                        this.editedItem = Object.assign({}, this.defaultItem);
                    }, 300)
                },
                async save () {

                    this.loading = true;



                    try {

                        const data = this.editedItem;

                        console.log(data);

                        if(this.editedItem.id === 0){

                            var res = await axios.post(route('api.contrato_items.store'),data);

                        }else {

                            var res = await axios.patch(route('api.contrato_items.update',this.editedItem.id),data);

                        }

                        logI(res.data);

                        iziTs(res.data.message);
                        this.getItems();

                        this.close();

                    }catch (e) {
                        notifyErrorApi(e);
                        this.loading = false;
                    }

                },
                async deleteItem(item) {

                    let confirm = await Swal.fire({
                        title: '¿Estás seguro?',
                        text: "¡No podrás revertir esto!",
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, elimínalo\n!'
                    });

                    if (confirm.isConfirmed){
                        try{
                            let res = await  axios.delete(route('api.contrato_items.destroy',item.id))
                            logI(res.data);

                            iziTs(res.data.message);
                            this.getItems();


                        }catch (e){
                            notifyErrorApi(e);
                            this.itemElimina = {};
                        }

                    }

                    console.log("Confirmacion",confirm);
                }
            },
            computed: {
                modalFormTitle () {
                    return this.editedItem.id === 0 ? 'Nuevo Detalle' : 'Editar Detalle'
                },
                textButtonSubmint () {
                    return this.editedItem.id === 0 ? 'Guardar' : 'Actualizar'
                }
            },
        });


</script>
@endpush
