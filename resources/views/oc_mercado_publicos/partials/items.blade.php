<div class="card card-outline card-primary col-lg-12" id="addOcMercadoPublicoItem">
    <div class="card-header py-0 px-1">
        <h3 class="card-title">ITEMS</h3>

        <div class="card-tools">

            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fa fa-minus"></i>
            </button>
        </div>
        <!-- /.card-tools -->
    </div>

    <div class="card-body">

        <div class="row">

            <div class="col-12 p-3">

                <div class="form-row">

                    <div class="form-group col-sm-2">
                        <div>
                            @if(!Route::is('ocMercadoPublicos.show') )
                                <button type="button" class="btn btn-success" @click.prevent="openModalAdd()" >
                                    <span >Agregar Item</span>
                                </button>
                            @endif
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <div class="modal fade" id="modalAddItemOcMercadoPublico" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
             aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modelTitleId" v-text="titleAddItem">
{{--                            {{__('Agregar Item')}}--}}
                        </h4>
                        <button type="button" class="close" @click.prevent="close()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-row col-lg-12">

                            <div class="form-group col-sm-3">
                                <label>Correlativo:</label>
                                <input class="form-control" type="number" :disabled="showItem" v-model="item.correlativo" >
                            </div>

                            <div class="form-group col-sm-3">
                                <label>Codigo Categoria:</label>
                                <input class="form-control" type="number" :disabled="showItem" v-model="item.codigo_categoria" >
                            </div>

                            <div class="form-group col-sm-3">
                                <label>Categoria:</label>
                                <input class="form-control" type="text" :disabled="showItem" v-model="item.categoria" >
                            </div>

                            <div class="form-group col-sm-3">
                                <label>Codigo Producto:</label>
                                <input class="form-control" type="number" :disabled="showItem" v-model="item.codigo_producto" >
                            </div>

                            <div class="form-group col-sm-3">
                                <label>Producto:</label>
                                <input class="form-control" type="text" :disabled="showItem" v-model="item.producto" >
                            </div>

                            <div class="form-group col-sm-3">
                                <label>Cantidad:</label>
                                <input class="form-control" type="number" :disabled="showItem" v-model="item.cantidad" >
                            </div>

                            <div class="form-group col-sm-3">
                                <label>Unidad:</label>
                                <input class="form-control" type="number" :disabled="showItem" v-model="item.unidad" >
                            </div>

                            <div class="form-group col-sm-3">
                                <label>Moneda:</label>
                                <input class="form-control" type="text" :disabled="showItem" v-model="item.moneda" >
                            </div>

                            <div class="form-group col-sm-3">
                                <label>Precio Neto:</label>
                                <input class="form-control" type="number" :disabled="showItem" v-model="item.precio_neto" >
                            </div>

                            <div class="form-group col-sm-3">
                                <label>Total Cargos:</label>
                                <input class="form-control" type="number" :disabled="showItem" v-model="item.total_cargos" >
                            </div>

                            <div class="form-group col-sm-3">
                                <label>Total Descuentos:</label>
                                <input class="form-control" type="number" :disabled="showItem" v-model="item.total_descuentos" >
                            </div>

                            <div class="form-group col-sm-3">
                                <label>Total Impuestos:</label>
                                <input class="form-control" type="number" :disabled="showItem" v-model="item.total_impuestos" >
                            </div>

                            <div class="form-group col-sm-3">
                                <label>Total:</label>
                                <input class="form-control" type="number" :disabled="showItem" v-model="item.total" >
                            </div>

                            <div class="form-group col-sm-3">
                                <label>Especificación Comprador:</label>
                                <textarea class="form-control" :disabled="showItem" v-model="item.especificacion_comprador" rows="2"></textarea>
                            </div>

                            <div class="form-group col-sm-3">
                                <label>Especificación Proveedor:</label>
                                <textarea class="form-control" :disabled="showItem" v-model="item.especificacion_proveedor" rows="2"></textarea>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" @click.prevent="close()">{{__('Cerrar')}}</button>
                        <button v-if="!showItem" type="button" class="btn btn-primary" @click.prevent="save()">{{__('Guardar')}}</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="table-responsive mb-0">
            <table class="table table-bordered table-sm table-striped mb-0">
                <thead>
                <tr>
                    <th>Codigo Producto</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Moneda</th>
                    <th>Precio Neto</th>
                    <th>Total</th>
                    <th>Aciones</th>
                </tr>
                </thead>
                <tbody>
                <tr v-if="itemsOcMercadoPublico.length == 0">
                    <td colspan="10" class="text-center">Ningún Registro agregado</td>
                </tr>
                <tr v-for="item in itemsOcMercadoPublico">
                    <td>
                        <span v-text="item.codigo_producto"></span>
                    </td>
                    <td>
                        <span v-text="item.producto"></span>
                    </td>
                    <td>
                        <span v-text="item.cantidad"></span>
                    </td>
                    <td>
                        <span v-text="item.moneda"></span>
                    </td>
                    <td>
                        <span v-text="item.precio_neto"></span>
                    </td>
                    <td>
                        <span v-text="item.total"></span>
                    </td>
                    <td class="text-nowrap text-center">

                        <button type="button" @click="verItem(item)" class='btn btn-outline-info btn-sm' data-toggle="tooltip" title="Vert" >
                            <i class="fa fa-eye"></i>
                        </button>

                        <a v-bind:href="'/ocMercadoPublicos/items/bitacoras/show/' + item.id " class='btn btn-outline-secondary btn-sm' data-toggle="tooltip" title="Bitacora" >
                            <i class="fa fa-book-open" :style="colorIconBitacora(item)"></i>
                        </a>

{{--                        <button type="button" @click="editarItem(item)" class='btn btn-outline-primary btn-sm' v-tooltip="'Editar'" >--}}
{{--                            <i class="fa fa-edit"></i>--}}
{{--                        </button>--}}

{{--                        <button type="button" @click="eliminarItem(item)" class='btn btn-outline-danger btn-sm' v-tooltip="'Eliminar'" >--}}
{{--                            <i class="fa fa-trash"></i>--}}
{{--                        </button>--}}

                    </td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>

@push('scripts')
    <script>
        new Vue({
            el: '#addOcMercadoPublicoItem',
            name: 'addOcMercadoPublicoItem',
            created() {

                this.getItems();

                this.titleAddItem;

            },
            data: {

                item: {
                    id: 0,
                    oc_mercado_publico_id: @json($ocMercadoPublico->id),
                    correlativo: null,
                    codigo_categoria: null,
                    categoria: null,
                    codigo_producto: null,
                    producto: null,
                    especificacion_comprador: null,
                    especificacion_proveedor: null,
                    cantidad: null,
                    unidad: null,
                    moneda: null,
                    precio_neto: null,
                    total_cargos: null,
                    total_descuentos: null,
                    total_impuestos: null,
                    total: null,
                },
                itemDefault: {
                    id: 0,
                    oc_mercado_publico_id: @json($ocMercadoPublico->id),
                    correlativo: null,
                    codigo_categoria: null,
                    categoria: null,
                    codigo_producto: null,
                    producto: null,
                    especificacion_comprador: null,
                    especificacion_proveedor: null,
                    cantidad: null,
                    unidad: null,
                    moneda: null,
                    precio_neto: null,
                    total_cargos: null,
                    total_descuentos: null,
                    total_impuestos: null,
                    total: null,
                },

                oc_mercado_publico_id: @json($ocMercadoPublico->id),

                itemsOcMercadoPublico: [],

                titleAddItem: 'Agregar Item',
                showItem: false,

            },
            methods: {
                async getItems() {
                    const res = await axios.get(route('api.oc_mercado_publico_items.index',{oc_mercado_publico_id: this.oc_mercado_publico_id}));

                    console.log('res getItems:',res)
                    this.itemsOcMercadoPublico = res.data.data;
                },
                openModalAdd() {
                    this.titleAddItem = 'Agregar Item';
                    $("#modalAddItemOcMercadoPublico").modal('show');
                },
                close() {
                    setTimeout(() => {
                        this.titleAddItem = 'Agregar Item';
                        this.item = Object.assign({}, this.itemDefault);
                        this.showItem = false;
                        $("#modalAddItemOcMercadoPublico").modal('hide');
                    }, 300);
                },
                async save() {

                    try {

                        if (this.item.id === 0) {

                            console.log(this.item)

                            let res = await axios.post( route('api.oc_mercado_publico_items.store') ,this.item);

                            logI(res);
                            iziTs(res.data.message);

                            this.close();

                        } else {

                           let res = await axios.patch(route('api.oc_mercado_publico_items.update', this.item.id), this.item);

                            logI(res);
                            iziTs(res.data.message);

                            this.close();

                        }
                        this.getItems();

                    }catch (e) {
                        notifyErrorApi(e);
                    }

                },
                verItem(item) {
                    setTimeout(() => {
                        this.titleAddItem = 'Ver Item';
                        this.showItem = true;
                        this.item = Object.assign({}, item);
                        $("#modalAddItemOcMercadoPublico").modal('show');
                    }, 300);
                },
                editarItem(item) {
                    setTimeout(() => {
                        this.titleAddItem = 'Editar Item';
                        this.item = Object.assign({}, item);
                        $("#modalAddItemOcMercadoPublico").modal('show');
                    }, 300);
                },
                async eliminarItem(item) {

                    let confirm = await Swal.fire({
                        title: '¿Estás seguro de eliminar?',
                        text: "¡No podrás revertir esto!",
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Si, eliminar\n!'
                    });

                    if (confirm.isConfirmed) {
                        try{

                            let res = await  axios.delete(route('api.oc_mercado_publico_items.destroy', item.id));
                            logI(res.data);

                            iziTs(res.data.message);
                            this.getItems();

                        }catch (e){
                            notifyErrorApi(e);
                        }
                    }

                    console.log("Retirar",confirm);

                },
                colorIconBitacora(item) {
                    console.log(item.bitacoras.length)
                    if (item.bitacoras) {
                        if (item.bitacoras.length > 0) {
                            return {color: 'green',};
                        }
                    }
                    return {};
                }
            },
            computed: {

            },
        });
    </script>
@endpush
