@extends('admin.app')

@section('htmlheader_title')
    Edit
@endsection


@section('main-content')


<div class="col-md-10 col-md-offset-1">
    <div class="thumbnail">
        <div class="caption">
            <h3 class="text-center"><b>EDITAR PERSONAS</b></h3><hr>
            {!! Form::model($persona,['route' => ['Persona.update',$persona->prs_id],'method'=>'PUT'])!!}
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        {!!Form::label('Nombre', 'Nombre:')!!}
                        {!! Form::text('prs_nombres', null, array('placeholder' => 'ingrese su Nombre ','class' => 'form-control')) !!}
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="form-group">
                        {!!Form::label('paterno', 'Paterno:')!!}
                        {!! Form::text('prs_paterno', null, array('placeholder' => 'Ingrese su Apellido Paterno ','class' => 'form-control')) !!}
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="form-group">
                        {!!Form::label('materno', 'Materno:')!!}
                        {!! Form::text('prs_materno', null, array('placeholder' => 'Ingrese su Apellido Materno','class' => 'form-control')) !!}
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="form-group">
                        {!!Form::label('ci', 'CI:')!!}
                        {!! Form::text('prs_ci', null, array('placeholder' => 'Ingrese su CI ','class' => 'form-control')) !!}
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="form-group">
                         {!!Form::label('Direccion', 'Dirección:')!!}
                         {!! Form::text('prs_direccion', null, array('placeholder' => 'ingrese su direccion ','class' => 'form-control')) !!}
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="form-group">
                        {!!Form::label('telefono', 'Telefono:')!!}
                        {!! Form::text('prs_telefono', null, array('placeholder' => 'ingrese su telefono','class' => 'form-control')) !!}

                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="form-group">
                      {!!Form::label('celular', 'Celular:')!!}
                      {!! Form::text('prs_celular', null, array('placeholder' => 'ingrese su celular ','class' => 'form-control')) !!}   
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="form-group">
                     {!!Form::label('Empresa Telefonica', 'Empresa Telefonica:')!!}
                     {!! Form::text('prs_empresa_telefonica', null, array('placeholder' => 'ingrese empresa telefonica ','class' => 'form-control')) !!}    
                    </div>
                </div>
                 <div class="col-md-4">
                    <div class="form-group">
                     {!!Form::label('correo', 'Correo:')!!}
                     {!! Form::text('prs_correo', null, array('placeholder' => 'ingrese su correo electronico ','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center"><hr>

                       <p  align="right"> <a href="{{ route('Persona.index') }}" class="btn btn-primary"  align="right"  style="background:#A5A5B2">Cerrar</a>
                             <button type="submit" class="btn btn-primary" style="background:#61BC8C" >Modificar</button></p>
                </div>

            </div>
            {!! Form::close() !!}  
        </div>
    </div>
</div>
@endsection