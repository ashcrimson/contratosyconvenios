<div id="fieldsUser" class="form-row">

    <!-- Username Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('username', 'Username:') !!}
        {!! Form::text('username', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Name Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <!-- Email Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>


    <!-- Password Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>

    <!-- Avatar Field -->
    <div class="form-group col-sm-6">
        {!! Form::label('avatar', 'Avatar:') !!}
        <div class="custom-file">
            <input type="file" name="avatar" class="custom-file-input" >
            <label class="custom-file-label" for="exampleInputFile">{{__("Choose file")}}</label>
        </div>
    </div>

    <!-- Area Field -->
    <div class="form-group col-sm-6">
        <select-area :items="areas" v-model="area" label="Area"></select-area>
    </div>



</div>



<div class="form-group col-sm-12">
    {!! Form::label('name', 'Roles:') !!}
    <a class="success" data-toggle="modal" href="#modal-form-roles" tabindex="1000">nuevo</a>
    {!!
        Form::select(
            'roles[]',
            select(\App\Models\Role::class,'name','id',null)
            , null
            , ['id'=>'roless','class' => 'form-control duallistbox','single']
        )
    !!}
</div>


<!-- <div class="form-group col-sm-12">
    {!! Form::label('name', 'Permisos:') !!}
    <a class="success" data-toggle="modal" href="#modal-form-permissions" tabindex="1000">nuevo</a>
    {!!
        Form::select(
            'permissions_user[]',
            select(\App\Models\Permission::class,'name','id',null)
            , null
            , ['class' => 'form-control duallistbox','multiple']
        )
    !!}
</div> -->

<!-- @isset($user) -->
  
        <div class="form-group col-sm-12">
            {!! Form::label('name', 'Cargos:') !!}
            <a class="success" data-toggle="modal" href="#modal-form-cargos" tabindex="1000">nuevo</a>
            {!!
                Form::select(
                    'cargos[]',
                    select(\App\Models\Cargo::class,'nombre','id',null)
                    , null
                    , ['class' => 'form-control duallistbox','single']
                )
            !!}
        </div>
   
<!-- @endisset -->

@push('scripts')
<script>
    new Vue({
        el: '#fieldsUser',
        name: 'fieldsUser',
        created() {

        },
        data: {
            areas: @json(\App\Models\Area::all() ?? []),
            area: @json($user->area ?? \App\Models\Area::find(old('area_id')) ?? null)
        },
        methods: {

        }
    });
</script>
@endpush
