@extends('admin.app')
@section('htmlheader_title')
	Home
@endsection

@section('main-content')
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	{{Session::get('message')}}
</div>
@endif
				<div style="text-align: right" ><a href="{{ route('Acceso.create') }}" style="background:#7ACCCE" class="btn btn-primary"><i class="    fa fa-user-plus fa-1x"></i>  Nuevo Registro</a>
				</div>
				    <br>
				        <br>
						<div id="no-more-tables">
            						<table class="col-md-12 table-bordered table-striped table-condensed cf" id="lts-acceso">
        								<thead class="cf">
        									<tr>	
												<th>Controles</th>
												<th>Acceso Opcion</th>
												<th>Acceso Rol</th>
												<th>Fecha Registro</th>
												<th>Fecha Modificacion</th>
												<th>Acceso Usuario</th>
												<th>Estado</th>
												
											</tr>
									    </thead>
										
										@foreach($acceso as $acc)
										<tr>
									       <td data-title="Controles" class="numeric"> 
									       {!! link_to_route('Acceso.edit',$title='',$parameters=$acc->acc_id,$attributes=['class'=>'btncirculo btn-primary fa fa-pencil fa-1x','style'=>'background:#57BC90']) !!} 

									       &nbsp; {!! link_to_route('Acceso.show',$title='',$parameters=$acc->acc_id,$attributes=['class'=>'btncirculo btn-primary fa fa-trash-o fa-1x','style'=>'background:#7ACCCE','data-confirm'=>'Esta usted seguro?']) !!}
									       </td>
												<!--td data-title="ID">{{ $acc->acc_id }}</td-->
												<td data-title="AccOpcion">{{ $acc->opc_opcion }}</td>
												<td data-title="AccRol">{{ $acc->rls_rol }}</td>
												<td data-title="Fecha Registro">{{ $acc->acc_registrado }}</td>
								   				<td data-title="Fecha Modificado">{{ $acc->acc_modificado }}</td>
										        <td data-title="AccUsuario">{{ $acc->usr_usuario }}</td>
										        <td data-title="Estado">{{ $acc->acc_estado }}</td>	
										</tr>
										@endforeach
									</table>
								</div>
@endsection
@push ('scripts')
<script>
$(document).ready(function(){
	$('#lts-acceso').DataTable ({
		"lengthMenu":[[5,10,25,50, -1], [5,10,25,50, "All"]],
		"language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
        	}
	});
  });	
</script>
@endpush










