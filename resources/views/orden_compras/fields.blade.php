<div class="form-row" id="ordenCompraFields">
    <!-- Contrato Id Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('contrato_id', 'ID Mercado Público Contrato:') !!}
        <multiselect v-model="contrato" :options="contratos" label="text" placeholder="Seleccione uno...">
        </multiselect>
        <input type="hidden" name="contrato_id" :value="contrato ? contrato.id : null">

        <span v-show="contrato" v-text="'Saldo: '+ dvs()+nfp(saldoContrato)" class="text-success"></span>
    </div>

    <!-- Numero Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('numero', 'Número Orden de Compra:') !!}
        {!! Form::text('numero', null, ['class' => 'form-control','maxlength' => 255]) !!}
    </div>

    <!-- Fecha Envio Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('fecha_envio', 'Fecha de Envío:') !!}
        {!! Form::date('fecha_envio', onlyDate($ordenCompra->fecha_envio ?? null), ['class' => 'form-control']) !!}
    </div>

    <!-- Tiene Detalles Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('tiene_detalles', '¿Agregar detalles de Contrato?') !!}
        <div>

            <toggle-button v-model="tiene_detalles"
                           :sync="true"
                           :labels="{checked: 'SI', unchecked: 'NO'}"
                           :height="30"
                           :width="60"
                           :value="false"
            />

        </div>
        <input type="hidden" name="tiene_detalles" :value="tiene_detalles ? 1 : 0">

    </div>


    <!-- Descripcion Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('descripcion', 'Descripcion:') !!}
        {!! Form::textarea('descripcion', null, ['class' => 'form-control','maxlength' => 255,'rows' => 2]) !!}
    </div>

    <!-- Estado Field -->
    <div class="form-group col-sm-4">
        {!! Form::label('estado', 'Estado') !!}

        <multiselect v-model="estado" :options="estados" label="nombre" placeholder="Seleccione uno...">
        </multiselect>
        <input type="hidden" name="estado_id" :value="estado ? estado.id : null">
    </div>


    <div class="form-group col-sm-6 ">
        {!! Form::label('adjunto', 'Adjuntar Orden de Compra:') !!}
        {!! Form::file('adjunto', ['class' => 'form-control file']) !!}
    </div>

    <!-- Total Field -->
    <div class="form-group col-sm-6" v-if="!tiene_detalles">
        {!! Form::label('total', 'Monto:') !!}
        <input type="number" class="form-control" name="monto" v-model="monto" @keyup="totalMayorSaldo">

    </div>

    <input type="hidden" name="total" :value="total" v-if="tiene_detalles">


    <!--            Detalles
    ------------------------------------------------------------------------>

    <div class="form-group col-sm-12" v-show="tiene_detalles">
        <div class="card card-outline card-success">
            <div class="card-header pb-1">
                <h5 class="card-title">Detalles</h5>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                @if(isset($ordenCompra) && $ordenCompra->tiene_detalles)
                <table class="table table-bordered table-striped table-sm table-hover">
                    <thead>
                    <tr>
                        <th>CODIGO</th>
                        <th>DESCRIPCION</th>
                        <th>CANTIDAD</th>
                        <th>PRECIO</th>
                        <th>SUB TOTAL</th>
                        <th>OPCIONES</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach( $ordenCompra->detalles as $det)

                    <tr>
                        <td>{{$det->item->codigo}}</td>
                        <td>{{$det->item->text}}</td>
                        <td>{{dvs().nfp($det->cantidad)}}</td>
                        <td>{{dvs().nfp($det->precio)}}</td>
                        <td>{{dvs().nfp($det->subtotal)}}</td>
                        <td>
                            <a href="{{ route('ordenCompras.detalles.bitacora.vista', $det->id) }}" data-toggle="tooltip" title="Bitacora" class='btn btn-outline-secondary btn-sm'>
                                <i class="fa fa-book-open" style="color: @if($det->bitacoras->isNotEmpty()) green @else '' @endif;"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                    <tfoot>
                    <tr>
                        <th colspan="4">Total</th>
                        <th>{{dvs().nfp($ordenCompra->detalles->sum('subtotal'))}}</th>
                    </tr>
                    </tfoot>
                </table>
                @else
                <table class="table table-bordered table-sm">
                    <thead>
                    <tr>
                        <th>Descripción</th>
                        <th>Cantidad</th>
                        <th>Saldo</th>
                        <th>Precio</th>
                        <th>Sub Total</th>
                        <th>Agregar</th>
                    </tr>
                    </thead>
                    <tbody>

                    <tr v-for="(det,index) in detalles">
                        <td v-text="det.text"></td>
                        <td v-text="det.cantidad"></td>
                        <td v-text="det.saldo"></td>
                        <td v-text="dvs()+nfp(det.precio)"></td>
                        <td v-text="dvs()+nfp(subTotalDet(det))"></td>
                        <td>
                            <button class="btn btn-danger btn-sm" role="button" @click.prevent="removeDet(index,det)">Eliminar</button>
                        </td>
                    </tr>

                    <tr v-if="detalles.length == 0">
                        <td colspan="10" class="text-center text-warning">No hay ningún detalles agregado</td>
                    </tr>


                    <tr id="filaNuevoDetalle">
                        <td width="45%">
                            <multiselect
                                v-model="item"
                                :options="items"
                                :close-on-select="true"
                                :show-labels="false"
                                :placeholder="placeholderSelectItem"
                                track-by="id"
                                label="text"
                                @input="onSelectItem"
                            >
                            </multiselect>
                        </td>
                        <td>
                            <input type="text" class="form-control" v-model="detalle.cantidad" id="cantidad" >
                        </td>

                        <td>
                            <input type="text" class="form-control" readonly :value="detalle.saldo">
                        </td>
                        <td>
                            <input type="text" class="form-control"  readonly :value="detalle.precio">
                        </td>
                        <td>
                            <input type="text" class="form-control" readonly :value="subTotalDet(detalle)">
                        </td>
                        <td>
                            <button type="button" class="btn btn-success"  @click.prevent="addDet()">Agregar</button>
                        </td>
                    </tr>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th colspan="4">Total</th>
                        <th class="text-right" >
                            <span v-text="dvs()+nfp(total)"></span>
                        </th>
                        <th></th>
                    </tr>
                    </tfoot>
                </table>
                @endif


            </div>
            <!-- /.card-body -->
        </div>
    </div>

    <input type="hidden" name="detalles" :value="JSON.stringify(detalles, null, 3)">


</div>


@push('scripts')
<script>


    function toFloat(number) {

        if (isNaN(number)){
            return parseFloat(number.replace(',', '.'))
        }else {
            return parseFloat(number)
        }
    }

    const app = new Vue({
        el: '#ordenCompraFields',
        name: 'ordenCompraFields',
        created() {

        },
        data: {
            contratos : @json(\App\Models\Contrato::with('items')->get() ?? []),
            contrato: @json($ordenCompra->contrato ?? \App\Models\Contrato::with('items')->find(old('contrato_id')) ?? null),
            estados : @json(\App\Models\OrdenCompraEstado::all() ?? []),
            estado: @json($ordenCompra->estado  ?? \App\Models\OrdenCompraEstado::find(old('estado_id')) ?? null),

            tiene_detalles: @json($ordenCompra->tiene_detalles ?? old('tiene_detalles') ?? null),

            item: null,
            detalle: {
                cantidad: 0,
                precio: 0,
                saldo: 0
            },
            items : [],

            detalles: [],
            monto: 0,
            buscandoDetalles: false
        },
        methods: {
            dvs(){
                return "{{dvs()}}";
            },
            nfp(val){
                return number_format(val,'2',',','.');
            },
            onSelectItem(){
                this.item.cantidad = this.detalle.cantidad;
                this.detalle = Object.assign({}, this.item);
            },
            addDet(){
                var newDet = Object.assign({}, this.detalle);

                var cantidad = toFloat(newDet.cantidad);
                var saldo = toFloat(newDet.saldo);

                if(cantidad <= 0){

                    alertError('La cantidad debe ser mayor a 0');

                    $("#cantidad").focus().select();
                    return
                }

                if(cantidad > saldo){

                    alertError('La cantidad no  puede ser mayor al saldo');
                    $("#cantidad").focus().select();
                    return
                }

                if (this.totalMayorSaldo()){
                    alertError('El total de la compra no puede se mayor al saldo del contrato!');
                    $("#cantidad").focus().select();
                    return;
                }


                newDet.saldo -= cantidad;
                this.detalle.saldo -= cantidad;
                this.item.saldo -= cantidad;

                this.detalles.push(newDet);
            },
            removeDet(index,detalle){
                this.item.saldo += toFloat(detalle.cantidad);
                this.detalles.splice(index,1);
            },
            subTotalDet(item){
                var sub = 0;


                var cantidad = toFloat(item.cantidad );
                var precio = toFloat(item.precio );


                if (cantidad && precio){
                    sub = cantidad * precio;
                }

                return sub;
            },
            totalMayorSaldo(){
                console.log(this.monto);

                if (this.contrato){

                    if (this.tiene_detalles){

                        var total = this.total + (toFloat(this.detalle.cantidad) * toFloat(this.detalle.precio))

                        if (total > this.saldoContrato){

                            return true;
                        }
                    }else {
                        if (this.monto > this.saldoContrato){
                            Swal.fire({
                                icon: 'error',
                                title: 'Oops...',
                                text: 'El total de la compra no puede se mayor al saldo del contrato!',
                            })
                            return true;
                        }
                    }
                }

                return false;

            }

        },
        computed:{
            hayItems(){
                return this.items.length > 0;
            },
            placeholderSelectItem(){

                if (this.contrato){
                    return this.hayItems ? "Seleccione un artículo..." : "El contrato no tiene artículos";
                }

                return this.hayItems ? "Seleccione un artículo..." : "Seleccione un contrato";
            },
            total(){
                var total = 0;
                var cantidad = 0;
                var precio = 0;

                this.detalles.forEach(function (item) {
                    cantidad= toFloat(item.cantidad);
                    precio= toFloat(item.precio);
                    total+= (cantidad*precio);
                })

                return total;
            },
            saldoContrato(){
                if (this.contrato){
                    return this.contrato.saldo
                }
                else{

                    return 0;
                }
            }
        },
        watch:{
            contrato(val){
                if (val){
                    this.items = val.items;
                }else {
                    this.items = [];
                }
            }
        }
    });
</script>
@endpush
