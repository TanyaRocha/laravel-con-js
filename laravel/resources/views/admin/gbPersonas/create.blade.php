@extends('admin.app')
@section('htmlheader_title')
    Personas
@endsection

@if(Session::has('message'))
      <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true ">&times;</span>
          </botton>
          {{Session::get('message')}}
      </div>
  @endif
@section('main-content')

<div class="col-md-10 col-md-offset-1">
    <div class="thumbnail">
        <div class="caption">
            <h3 class="text-center"><b>REGISTRO PERSONAS</b></h3><hr>
            {!! Form::open(array('route' => 'Persona.store','method'=>'POST','id'=>'persona')) !!}
                <div class="row">
                   
                         <input type="hidden" name="csrf-token" value="{{ csrf_token() }}" id="token">
                    <div class="col-md-4">
                        <div class="form-group">

                    <strong>Nombre:</strong>
                                {!! Form::text('prs_nombres', null, array('placeholder' => 'ingrese su Nombre ','maxlength'=>'20','class' => 'form-control')) !!}
                                           </div>
                                           
                    </div>
                    <div class="col-md-4">
                                     <div class="form-group">
                                         <strong>Paterno:</strong>
                                         {!! Form::text('prs_paterno', null, array('placeholder' => 'Ingrese su Apellido Paterno','maxlength'=>'15','class' => 'form-control')) !!}
                                    </div>
                    </div>
                    <div class="col-md-4">
                                     <div class="form-group">
                                        <strong>Materno:</strong>
                                        {!! Form::text('prs_materno', null, array('placeholder' =>  'Ingrese su Apellido Materno','maxlength'=>'15','class' => 'form-control')) !!}
                                     </div>
                    </div>   
                     <div class="col-md-4">
                                   <div class="form-group ">
                                     <strong>CI:</strong>
                                        {!! Form::text('prs_ci', null, array('placeholder' => 'Ingrese su CI ','maxlength'=>'10','class' => 'form-control',)) !!}
                                             </div>

                    </div>
                     <div class="col-md-4">
                                    <div class="form-group ">
                                    <strong>Direccion :</strong>
                                        {!! Form::text('prs_direccion', null, array('placeholder' => 'ingrese su direccion','maxlength'=>'30','class' => 'form-control')) !!}
                                            </div>
                     </div>

                    <div class="col-md-2">
                            <div class="form-group ">
                                <strong>Telefono:</strong>
                                {!! Form::text('prs_telefono', null, array('type' => 'number','maxlength' => '7','placeholder' => 'ingrese su telefono','type' =>'text','class' => 'form-control')) !!}
                            </div>
                            
                    </div>
                     <div class="col-md-2">
                            <div class="form-group ">
                                <strong>Celular:</strong>
                                    {!! Form::text('prs_celular', null, array('placeholder' => 'ingrese su celular ','maxlength' => '8','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-md-2">
                             <div class="form-group ">
                                <strong>Empresa Telefonica:</strong>
                                {!! Form::text('prs_empresa_telefonica', null, array('placeholder' => 'ingrese empresa telefonica','class' => 'form-control')) !!}
                            </div>
                        </div>
                       
                        <div class="col-md-4">
                                <div class="form-group ">
                                    <strong>Email:</strong>
                                    {!! Form::text('prs_correo', null, array('placeholder' => 'ejemplo@gmail.com','class' => 'form-control','type' => 'email','id'=>'email','data-error'=>'email invalido')) !!}
                                     <div class="help-block with-errors"></div>
                                 </div>
                        </div>   
                                                      
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center"><hr> 
                           <p  align="right"> <a href="{{ route('Persona.index') }}" class="btn btn-primary"  style="background:#A5A5B2">&nbsp; Cerrar</a>
                             <button type="submit" class="btn btn-primary" style="background:#61BC8C" >Guardar</button></p>
                        </div>
                  
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>


@push('scripts')
<script type="text/javascript">
$(document).ready(function() {
    $('#persona').bootstrapValidator({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            prs_nombres: {
                message: 'La persona no es valida',
                validators: {
                    notEmpty: {
                        message: 'La persona es requerida'
                    },
                    stringLength: {
                        min: 4,
                        max: 20,
                        message: 'La persona requiere mas de 4 letras y un limite de 20'
                    },
                    regexp: {
                        regexp: /(\s*[a-zA-Z]+$)/,
                        message: 'El nombre de la persona solo puede ser alfabetico'
                    }
                }
            },
            prs_paterno: {
                message: 'El apellido es requerido',
                validators: {
                    notEmpty: {
                        message: 'El apellido paterno es obligatorio y no puede estar vacía'
                    },
                    stringLength: {
                        min: 4,
                        max: 15,
                        message: 'El apellido requiere mas de 4 caracteres y un limite de 15'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'El apellido de la persona solo puede ser alfabetico'
                    }
                }
            },
            prs_materno: {
                message: 'El apellido es requerido',
                validators: {
                    notEmpty: {
                        message: 'El apellido paterno es obligatorio y no puede estar vacía'
                    },
                    stringLength: {
                        min: 4,
                        max: 15,
                        message: 'El apellido requiere mas de 4 caracteres y un limite de 15'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'El apellido de la persona solo puede ser alfabetico'
                    }
                }
            },
            prs_ci: {
                validators: {
                    notEmpty: {
                        message: 'El carnet de identidad es requerida'
                    }
                }
            },
            prs_direccion: {
                validators: {
                    notEmpty: {
                        message: 'La direccion es requerida'
                    }
                }
            },
            prs_telefono: {
                validators: {
                    notEmpty: {
                        message: 'La entrada del numero telefonico no es valida'
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'Solo puede ingresar numeros enteros'
                    }
                }
            },
            prs_celular: {
                validators: {
                    notEmpty: {
                        message: 'La entrada del numero no es valida',
                    },
                    regexp: {
                        regexp: /^[0-9]+$/,
                        message: 'Solo puede ingresar numeros enteros'
                    }
                }
            },
            prs_correo: {
                validators: {
                    notEmpty: {
                        message: 'La dirección de correo electrónico que se requiere y no puede estar vacía'
                    },
                    emailAddress: {
                        message: 'La entrada no es una dirección de correo electrónico válida'
                    }
                }
            },
            prs_empresa_telefonica: {
                validators: {
                    notEmpty: {
                        message: 'Ingrese la empresa telefonica'
                    }
                },
                    regexp: {
                        regexp: /^[a-zA-Z]+$/,
                        message: 'Solo puede ser de orden alfabetico'
                    }
            }
        }
    });
});
</script>
@endpush
@endsection








