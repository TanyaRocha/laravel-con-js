@extends('admin.app')
@section('htmlheader_title')
	Home
@endsection
@if(Session::has('message'))
<div class="alert alert-success alert-dismissible" role="alert">
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
	{{Session::get('message')}}
</div>
@endif
@section('main-content')
<div style="text-align: right" ><a href="{{ route('Rol.create') }}" style="background:#7ACCCE" class="btn btn-primary"><i class="    fa fa-user-plus fa-1x"></i>  Nuevo Registro</a>
				</div><br><br>
	<div id="no-more-tables">
        <table class="col-md-12 table-bordered table-striped table-condensed cf" id="lts-rol">
        	<thead class="cf">
        		<tr>	
					<th>Controles</th>
					<th>Rol</th>
					<th>Fecha Registro</th>
					<th>Fecha Modificacion</th>
					<th>Rol Usuario</th>
					<th>Estado</th>
				</tr>
			</thead>
			@foreach($rol as $r)
			<tr>
				<td data-title="Controles" class="numeric"> 
					{!! link_to_route('Rol.edit',$title='',$parameters=$r->rls_id,$attributes=['class'=>'btncirculo btn-primary  fa fa-pencil fa-1x','style'=>'background:#57BC90']) !!} 

				    &nbsp; {!! link_to_route('Rol.show',$title='',$parameters=$r->rls_id,$attributes=['class'=>'btncirculo btn-primary fa fa-trash-o fa-1x','style'=>'background:#7ACCCE','data-confirm'=>'Esta usted seguro?']) !!}
			    </td>				
					<td data-title="Rol">{{ $r->rls_rol }}</td>
					<td data-title="Fecha Registro">{{ $r->rls_registrado }}</td>
					<td data-title="Fecha MOdificado">{{ $r->rls_modificado }}</td>
					<td data-title="Rol Usuario">{{ $r->rls_usr_id }}</td>
					<td data-title="Estado">{{ $r->rls_estado }}</td>
			</tr>
			@endforeach
			</table>
	</div>

@endsection
@push ('scripts')
<script>
$(document).ready(function(){
	$('#lts-rol').DataTable ({
		"lengthMenu":[[5,10,25,50, -1], [5,10,25,50, "All"]],
		"language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
        	}
	});
  });	
</script>
@endpush





