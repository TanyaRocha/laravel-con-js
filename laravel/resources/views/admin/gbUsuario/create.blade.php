@extends('admin.app')
@section('htmlheader_title')
Usuario
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
<div class="col-md-5 col-md-offset-3">
    <div class="thumbnail">
        <div class="caption">
            <h3 class="text-center"><b>REGISTRO USUARIOS</b></h3><hr>
            {!! Form::open(array('route' => 'Usuario.store','method'=>'POST')) !!}

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
            		<input type="hidden" name="csrf-token" value="{{ csrf_token() }}" id="token">
                    <div class="form-group">
                            <strong>Nombre:</strong>
                            {!! Form::text('usr_usuario', null, array('placeholder' => 'Nombre de Opcion','class' => 'form-control')) !!}
                    </div>
                     <div class="form-group">
                            <strong>Contraseña:</strong>
                            {!! Form::text('usr_clave', null, array('placeholder' => 'Nombre de la ruta','class' => 'form-control')) !!}
                     </div>
                   
                    <div class="form-group">
                            <strong>Grupo:</strong>
                            {!! Form::Label('item','Personas:')!!}
                                 {!! Form::select('prs_id', $persona, null,['class'=>'form-control','name'=>'usr_prs_id', 'id'=>'usr_prs_id']) !!}
                    </div>
                     </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">

                            <p  align="right">
                            <a href="{{ route('Usuario.index') }}" class="btn btn-primary" style="background:#A5A5B2"> Cerrar</a>
                            <button type="submit" class="btn btn-primary" style="background:#61BC8C" >Guardar</button></p>
                    </div>


                </div>

                {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection