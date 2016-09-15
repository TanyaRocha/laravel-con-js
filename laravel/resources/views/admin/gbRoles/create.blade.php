@extends('admin.app')
@section('htmlheader_title')
@endsection
@section('main-content')
  
    <div class="col-md-10 col-md-offset-1">
    <div class="thumbnail">
        <div class="caption">
            <h3 class="text-center"><b>REGISTRO ROLES</b></h3><hr>
             {!! Form::open(array('route' => 'Rol.store','method'=>'POST')) !!}
                   <div class="row">
                        <input type="hidden" name="csrf-token" value="{{ csrf_token() }}" id="token">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="form-group">
                                    <strong>Rol:</strong>@extends('admin.app')
@section('htmlheader_title')
@endsection
@section('main-content')
  
    <div class="col-md-10 col-md-offset-1">
    <div class="thumbnail">
        <div class="caption">
            <h3 class="text-center"><b>REGISTRO ROLES</b></h3><hr>
             {!! Form::open(array('route' => 'Rol.store','method'=>'POST','id'=>'roles')) !!}
                   <div class="row">
                        <input type="hidden" name="csrf-token" value="{{ csrf_token() }}" id="token">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="form-group">
                                    <strong>Rol:</strong>
                                        {!! Form::text('rls_rol', null, array('placeholder' => 'Nombre de Rol','class' => 'form-control','maxlength'=>'20')) !!}
                                </div>
                     

              <div class="col-xs-12 col-sm-12 col-md-12 text-center"><hr> 
                           <p  align="right"> <a href="{{ route('Rol.index') }}" class="btn btn-primary"  style="background:#A5A5B2">&nbsp; Volver</i></a>
                             <button type="submit" class="btn btn-primary" style="background:#61BC8C" >Guardar</button></p>
                        </div>
        </div>
    </div>

    {!! Form::close() !!}
    @push('scripts')
<script type="text/javascript">
$(document).ready(function() {
    $('#roles').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            rls_rol: {
                message: 'El Rol no es valido',
                validators: {
                    notEmpty: {
                        message: 'El nombre del rol es requerido'
                    },
                    stringLength: {
                        min: 3,
                        max: 20,
                        message: 'El rol requiere mas de 3 letras y un limite de 20'
                    },
                    regexp: {
                        regexp: /(\s*[a-zA-Z]+$)/,
                        message: 'El nombre del rol solo puede ser alfabetico'
                    }
                }
            }
        }
    });
});
</script>
@endpush
@endsection





                                        {!! Form::text('rls_rol', null, array('placeholder' => 'Nombre de Rol','class' => 'form-control')) !!}
                            </div>
                     

              <div class="col-xs-12 col-sm-12 col-md-12 text-center"><hr> 
                           <p  align="right"> <a href="{{ route('Rol.index') }}" class="btn btn-primary"  style="background:#A5A5B2">&nbsp; Volver</i></a>
                             <button type="submit" class="btn btn-primary" style="background:#61BC8C" >Guardar</button></p>
                        </div>
        </div>
    </div>

    {!! Form::close() !!}
@endsection


