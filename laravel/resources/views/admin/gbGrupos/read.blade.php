@extends('admin.app')1


@section('main-content')

<div class="page-header"  align="right">
	<td><a href="{{route('Grupo.create')}}" style="background:#7ACCCE" class="btn btn-primary" style="background:#7ACCCE"><i class="fa fa-user-plus fa-1x">Nuevo Registro</i></a></td>
</div>
@if(Session::has('message'))
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		{{Session::get('message')}}
		</div>
	@endif
	<div id="no-more-tables">
		<table class="col-md-12 table-bordered table-striped table-condensed cf" id="lts-grupo">
			<thead class="cf">
				<tr>
					<th>.</th>
					<th>Grupo</th>
					<th>Nombre</th>
					<th>Imagen</th>
  					<th>Usuario Id</th>												
                    <th>Estado</th>
				</tr>
			</thead>
										
			@foreach($grupillo as $o)
				<tr>
					<td data-title="Controles" class="numeric">
	        			<table cellpadding="0" cellspacing="0">
	        			  <tr valign="top">
	        				<td>
	        					{!! link_to_route('Grupo.edit', $title = '', $parameters = $o->grp_id, $attributes =['class'=>'btncirculo btn-primary fa fa-pencil fa-1x','style'=>'background:#57BC90']) !!}
	        				</td>
	        				<td>
	        					{!! link_to_route('Grupo.show', $title = '', $parameters = $o->grp_id, $attributes = ['class'=>'btncirculo btn-warning btn-circle fa fa-trash-o fa-1x','style'=>'background:#7ACCCE']) !!}
	        				</td>
	        			  </tr>
	        			</table>
        			</td>
        				<td data-title="Grupo">{{ $o->grp_grupo }}</td>
						<td data-title="Imagen">{{ $o->grp_imagen }}</td>
						<td data-title="Fecha Registro">{{ $o->grp_registrado}}</td>
                    	<td data-title="Usuario ID">{{ $o->grp_usr_id }}</td>
                 		<td data-title="Estado">{{ $o->grp_estado}}</td>
				</tr>

			@endforeach
		</table>
	</div>	
@endsection
@push('scripts')
<script>
	$(document).ready(function(){
		$('#lts-grupo').DataTable({
			"LenghMenu":[[5,10,25,50, -1],[5,10,25,50,"All"]],
			"language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Spanish.json"
        	}

		});
	});
</script>
@endpush
