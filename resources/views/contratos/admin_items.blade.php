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

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#modalNuevoItem">
                                <i class="fa fa-plus"></i> Nuevo Detalle
                            </button>

                            <br>

                            <!-- Modal -->
                            <div class="modal fade" id="modalNuevoItem" tabindex="-1" role="dialog"
                                 aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" v-text="modalFormTitle"></h4>
                                            <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Body
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="button" class="btn btn-primary">Save</button>
                                        </div>
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
                                            <button type="button" class="btn btn-sm btn-outline-info" data-toggle="tooltip" title="Editar" >
                                                <i class="fa fa-edit"></i>
                                            </button>

                                            <button type="button"  class='btn btn-outline-danger btn-sm' data-toggle="tooltip" title="Eliminar" >
                                                <i class="fa fa-trash-alt"></i>
                                            </button>
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
                $('[data-toggle="tooltip"]').tooltip();
            },
            data: {

                items: [],
                editedItem: {
                    id : 0,
                },
                defaultItem: {
                    id : 0,
                    nombre: '',
                },
                itemElimina: {

                },

                loading: false,

                contrato_id: @json($contrato->id ?? null),

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
                newItem () {
                    $("#"+this.id).modal('show');
                    this.editedItem = Object.assign({}, this.defaultItem);
                },
                editItem (item) {
                    $("#"+this.id).modal('show');
                    this.editedItem = Object.assign({}, item);

                },
                close () {
                    $("#"+this.id).modal('hide');
                    this.loading = false;
                    setTimeout(() => {
                        this.editedItem = Object.assign({}, this.defaultItem);
                    }, 300)
                },
                async save () {

                    this.loading = true;


                    try {

                        const data = this.editedItem;

                        if(this.editedItem.id === 0){

                            var res = await axios.post(route('api.cargos.store'),data);

                        }else {

                            var res = await axios.patch(route('api.cargos.update',this.editedItem.id),data);

                        }

                        logI(res.data);

                        const item  = res.data.data;

                        this.actualizaSelect(item);

                        iziTs(res.data.message);

                        this.close();

                    }catch (e) {
                        notifyErrorApi(e);
                        this.loading = false;
                    }

                },
                confirmDelete: function(item) {
                    this.itemElimina = item;
                    $('#modalDeleteItem').modal('show');
                },
                deleteItem: function(item) {

                }
            },
            computed: {
                modalFormTitle () {
                    return this.editedItem.id === 0 ? 'Nuevo Detalle' : 'Editar Detalle'
                }
            },
        });


</script>
@endpush
