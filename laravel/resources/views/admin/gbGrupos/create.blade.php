@extends('admin.app')
@section('main-content')
@if(Session::has('message'))
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </botton>
        {{Session::get('message')}}
        </div>

 @endif
    <div class="col-md-5 col-md-offset-3">
        <div class="thumbnail">
            <div class="caption">
                <h3 class="text-center"> <b> REGISTRO GRUPOS</b></h3><hr>
                    {!! Form::open(array('route' => 'Grupo.store','method'=>'POST','id'=>'grupo')) !!}
                        <div class="row">
                            <div class="col-md-12">
		                      <input type="hidden" name="csrf-token" value="{{ csrf_token() }}" id="token">
                                <div class="form-group">
                                    <strong>Nombre de grupo:</strong>
                                        {!! Form::text('grp_grupo', null, array('placeholder' => 'Nombre de Grupo','class' => 'form-control')) !!}
                                 </div>

                                <div class="form-group">
                                      <strong>Imagen:</strong>
                                     {!! Form::text('grp_imagen', null, array('placeholder' => 'Nombre de la ruta','class' => 'form-control')) !!}
                                 </div>
                                 <div class="form-group">
                                    <strong>Usuario Id:</strong>
                                        {!! Form::text('grp_usr_id', null, array('placeholder' => 'Id usuario','class' => 'form-control')) !!}
                                 </div>

                                     <div class="col-xs-12 col-sm-12 col-md-12 text-center"><hr>

                                         <p align="right">
                                           
                                                <a href="{{ route('Grupo.index') }}" class="btn btn-primary" style="background:#A5A5B2">&nbsp; Cerrar</a>
                                                <button type="submit" class="btn btn-primary" style="background:#61BC8C">Guardar</button></p>
            </div>
         </div>
    </div>
</div>


@push('scripts')
<script type="text/javascript">
$(document).ready(function() {
    $('#grupo').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            grp_grupo: {
                message: 'El grupo no es valido',
                validators: {
                    notEmpty: {
                        message: 'El nombre del grupo es requerido'
                    },
                    stringLength: {
                        min: 3,
                        max: 15,
                        message: 'EL grupo requiere mas de 3 letras y un limite de 15'
                    },
                    regexp: {
                        regexp: /(\s*[a-zA-Z]+$)/,
                        message: 'El nombre del grupo solo puede ser alfabetico'
                    }
                }
            },
            grp_imagen: {
                validators: {
                    notEmpty: {
                        message: 'El nombre de la ruta es requerido',
                    },
                    stringLength: {
                        min: 3,
                        max: 15,
                        message: 'EL nombre de la ruta requiere mas de 3 letras y un limite de 15'
                    }   
                }
            },
            grp_usr_id: {
                validators: {
                    notEmpty: {
                        message: 'El usuario es requerido',
                    }   
                }      
            }
        }
    });
});
</script>
@endpush
@endsection



