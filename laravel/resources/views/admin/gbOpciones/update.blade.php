@extends('admin.app')
  @if(Session::has('message'))
      <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </botton>
          {{Session::get('message')}}
      </div>
  @endif
@section('main-content')
  <div class="col-md-5 col-md-offset-3">
    <div class="thumbnail">
      <div class="caption">
         <h3 class="text-center"><b>Editar Opcion</b></h3><hr>
        
            {!! Form::model($opcion,['route' => ['Opcion.update',$opcion->opc_id],'method'=>'PUT'])!!}
          
            <div class="row">
              <div class="col-md-12">
                
                  <div class="form-group">


    
          {!!Form::label('grupo', 'Nombre del grupo:')!!}
          {!! Form::select('opc_grp_id', $grp, null,['class'=>'form-control','name'=>'opc_grp_id', 'id'=>'opc_grp_id']) !!}

          {!!Form::label('nombre', 'Nombre:')!!}
          {!! Form::text('opc_opcion', null, ['placeholder' => 'Ingrese el nombre de Opcion','class'=>'form-control']) !!}

          {!!Form::label('contenido', 'Contenido:')!!}
          {!! Form::text('opc_contenido', null, ['placeholder' => 'Ingrese el nombre de Opcion','class'=>'form-control']) !!}

          {!!Form::label('adicional', 'Adicional:')!!}
          {!! Form::text('opc_adicional', null, ['placeholder' => 'Ingrese el nombre de Opcion','class'=>'form-control']) !!}

          {!!Form::label('orden', 'Orden:')!!}
          {!! Form::text('opc_orden', null, ['placeholder' => 'Ingrese el nombre de Opcion','class'=>'form-control']) !!}
   
          {!!Form::label('imagen', 'Imagen:')!!}
          {!! Form::text('opc_imagen', null, ['placeholder' => 'Ingrese el nombre de Opcion','class'=>'form-control']) !!}

          {!!Form::label('fecharegistro', 'Registro:')!!}
          {!! Form::text('opc_registrado', null, ['placeholder' => 'Ingrese el nombre de Opcion','class'=>'form-control']) !!}

          {!!Form::label('modificado', 'Modificado por &uacute;ltima vez:')!!}
          {!! Form::text('opc_modificado', null, ['placeholder' => 'Ingrese el nombre de Opcion','class'=>'form-control']) !!}

          {!!Form::label('UsuarioId', 'Codigo usuario:')!!}
          {!! Form::text('opc_usr_id', null, ['placeholder' => 'Ingrese el nombre de Opcion','class'=>'form-control']) !!}


          {!!Form::label('estado', 'Estado:')!!}
          {!! Form::text('opc_estado', null, ['placeholder' => 'Ingrese el nombre de Opcion','class'=>'form-control']) !!}
         
         
                  <div class="col-xs-12 col-sm-12 col-md-12 text-center"><hr>

                   <p align="right"> <a href="{{ route('Opcion.index') }}" class="btn btn-primary" style="background:#A5A5B2">&nbsp;Cerrar</a>
                    <button type="submit" class="btn btn-primary" style="background:#61BC8C">Modificar</button></p>
                  </div>
                </div>
                {!! Form::close() !!}
              </div>
            </div>
          </div>   

</div>

@endsection
