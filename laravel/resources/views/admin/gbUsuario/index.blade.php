@extends('admin.app')

@section('main-content')
@if(Session::has('message'))
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		{{Session::get('message')}}
		</div>
	@endif
<div class="page-header"  align="right">
		<td><a href="{{ route('Usuario.create') }}"  class="btn btn-primary" style="background:#7ACCCE"> <i class="fa fa-user-plus fa-1x"  >Nuevo Registro</i></a></td>
	</div> 
        <div id="no-more-tables">
            <table class="col-md-12 table-bordered table-striped table-condensed cf" id="lts-usuario">
        		<thead class="cf">
        			<tr>				
	        			<th>Opciones</th>
						<th>Usuario</th>
						<th>Clave</th>
						<th>Estado</th>
						<th>Registro</th>
						<th>Modificado</th>
					</tr>
        		</thead> 
      			@foreach($usr as $u)			
        		<tr>
					<td data-title="Controles" class="numeric1">
					<td data-title="Controles" class="numeric1">
						<table cellpadding="0" cellspacing="0">
						<tr valign="top">
						<td>
						{!! link_to_route('Usuario.edit', $title = '', $parameters = $u->usr_id, $attributes = ['class'=>'btncirculo btn-primary fa fa-pencil fa_1x', 'style'=>'background:#57BC90']) !!}
						</td>
						<td>	
						{!! link_to_route('Usuario.show', $title = '', $parameters = $u->usr_id, $attributes = ['class'=>'btncirculo btn-warning btn-circle fa fa-trash-o fa-1x', 'style'=>'background:#7ACCCE','data-confirm'=>'Esta usted seguro?']) !!}</td>
						</tr>
						</table>
					</td>					
					<td  data-title="Usuario">{{ $u->usr_usuario }}</td>
					<td  data-title="clave">{{ $u->usr_clave }}</td>
					<td  data-title="Estado">{{ $u->usr_estado }}</td>
					<td  data-title="Fecha Registro">{{ $u->usr_registrado }}</td>
					<td  data-title="Fecha Modificado">{{ $u->usr_modificado }}</td>
			
			      </tr>        		
        	@endforeach
        	</table>
        </div>


<!--·888888888888888888888888888888888888888888888888888888888888888 inicio codigo 8888888888888888888 -->
<div id="divMain"></div>
 


<!--·888888888888888888888888888888888888888888888888888888888888888 end codigo 8888888888888888888 -->

	
@endsection	

@push('scripts')
	
{!! Html::script('js/vistas/blpAlmacenes.js') !!}
<script>
	$(document).ready(function(){
		$('#lts-usuario').DataTable({
			"LenghMenu":[[5,10,25,50, -1],[5,10,25,50,"All"]],
			"language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
        	}
			 
		});
	});
</script>
@endpush