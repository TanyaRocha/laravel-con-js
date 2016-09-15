@extends('admin.app')
@section('main-content')
	<div class="page-header"  align="right">
		<td> <a href="{{ route('Opcion.create') }}"  class="btn btn-primary" style="background:#7ACCCE"> <i class="fa fa-user-plus fa-1x"  >Nuevo Registro</i></a></td>
	</div>
		@if(Session::has('message'))
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			<h3>{{Session::get('message')}}</h3>
		</div>
	@endif
 
        <div id="no-more-tables">
            <table class="col-md-12 table-bordered table-striped table-condensed cf" id="lts-opcion">
        		<thead class="cf">
        			<tr>
        				<th class="numeric">Controles</th>
        				<th class="numeric">#</th>
						<th>Grupo</th>
						<th>Contenido</th>
						<th>Ruta</th>
					</tr>
        		</thead>
			@foreach($opc as $o)
        	<tr>
				<td data-title="Controles" class="numeric">
						<table cellpadding="0" cellspacing="0">
							<tr valign="top">
							<td>
								{!! link_to_route('Opcion.edit', $title = '', $parameters = $o->opc_id, $attributes = ['class'=>'btncirculo btn-primary fa fa-pencil fa-1x','style'=>'background:#57BC90']) !!}
							</td>
							<td>	
								{!! link_to_route('Opcion.show', $title = '', $parameters = $o->opc_id, $attributes = ['class'=>'btncirculo btn-warning btn-circle fa fa-trash-o fa-1x', 'style'=>'background:#7ACCCE','data-confirm'=>'Esta usted seguro?']) !!}</td>
							</tr>
						</table>
				</td>
						<td  data-title="Nro." >{{$o->opc_id}}</td>
						<td  data-title="Grupo">{{ $o->grp_grupo }}</td>
						<td  data-title="Contenido">{{ $o->opc_opcion }}</td>
						<td  data-title="Ruta">{{ $o->opc_contenido }}</td>
			</tr>
        	@endforeach
        	</table>
        </div>
	</div>
</div>
@endsection

@push('scripts')
<script>
	$(document).ready(function(){
		$('#lts-opcion').DataTable({
			"LenghMenu":[[5,10,25,50, -1],[5,10,25,50,"All"]],
			"language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
        	}
			 
		});
	});
</script>
@endpush
