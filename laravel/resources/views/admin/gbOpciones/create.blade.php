@extends('admin.app')

@section('htmlheader_title')
 Opcion
@endsection

@section('main-content')
@if(Session::has('message'))
      <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </botton>
          {{Session::get('message')}}
      </div>
  @endif
<div class= "col-md-5 col-md-offset-3">
    <div class="thumbnail">
       <div class="caption">
           <h3 class="text-center"><b>Registrar Opción</b></h3>
              {!! Form::open(array('route' => 'Opcion.store','method'=>'POST','id'=>'opciones')) !!}
             <div class="row">
                <div class="col-xs-12 col-md-12">
                  <form role="form" class="form-horizontal" action="">
                        <input type="hidden" name="csrf-token" value="{{csrf_token()}}" id="token">
                          <div class="form-group">
                            <strong>Nombre:</strong>
                            {!! Form::text('opc_opcion', null, array('placeholder' => 'Nombre de Opcion','class' => 'form-control','maxlength'=>'20')) !!}
                           </div>

                            <div class="form-group">
                              <strong>Contenido:</strong>
                              {!! Form::text('opc_contenido', null, array('placeholder' => 'Nombre de Contenido','class' => 'form-control','maxlength'=>'30')) !!}
                            </div>
                            
                            <div class="form-group ">
                              <strong>Grupo:</strong>
                              {!! Form::select('grp_grupo',$grp,null,['class'=>'form-control','name'=>'opc_grp_id'],'required') !!}       
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <p align="right">
                                    <a href="{{ route('Opcion.index') }}" class="btn btn-primary" style="background:#A5A5B2">Cerrar</a>
                                    <button type="submit" class="btn btn-primary" style="background:#61BC8C">Guardar</button>
                                </p>
                            </div>
                  </form>  
                </div>
             </div>
              {!! Form::close() !!}
        </div>
    </div>
</div>

@push('scripts')
<script type="text/javascript">
$(document).ready(function() {
    $('#opciones').bootstrapValidator({
        message: 'El valor no es valido',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            opc_opcion: {
                message: 'El Usuario no es valido',
                validators: {
                    notEmpty: {
                        message: 'El nombre de la Opcion es requerido'
                    },
                    stringLength: {
                        min: 3,
                        max: 20,
                        message: 'La Opcion requiere mas de 3 letras y un limite de 20'
                    },
                    regexp: {
                        //regexp: /^[a-zA-Z0-9_\.]+$/,
                        regexp: /^[a-zA-Z]+$/,
                        message: 'El nombre de la opcion solo puede ser alfabetico'
                    }
                }
            },
            opc_contenido: {
                validators: {
                    notEmpty: {
                        message: 'Se requiere el Contenido'
                    },
                    stringLength: {
                        min: 4,
                        max: 30,
                        message: 'El contenido requiere mas de 4 letras y un limite de 30'
                    }
                }
            }
        }
    });
});
</script>
@endpush
@endsection



