
@extends('admin.app')

@section('htmlheader_title')
    Edit
@endsection
@section('main-content')
<div class="col-md-5 col-md-offset-3">
    <div class="thumbnail">
        <div class="caption">
            <h3 class="text-center"><b>EDITAR ROL</b></h3><hr>
            {!! Form::model($rol,['route' => ['Rol.update',$rol->rls_id],'method'=>'PUT'])!!}
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <strong>Rol:</strong>
                        {!! Form::text('rls_rol', null, array('placeholder' => 'Nombre de Rol','class' => 'form-control')) !!}
                    </div>
                </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center"><hr> 
                             <p  align="right"> <a href="{{ route('Acceso.index') }}" class="btn btn-primary"  style="background:#A5A5B2">&nbsp; Volver</i></a>
                             <button type="submit" class="btn btn-primary" style="background:#61BC8C" >Guardar</button></p>
            </div>
            </div>
            {!! Form::close() !!}  
        </div>
    </div>
</div>
@endsection





