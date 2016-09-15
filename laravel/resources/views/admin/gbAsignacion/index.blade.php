@extends('admin.app')

@section('htmlheader_title')
@endsection
@section('main-content')

{!! Form::open(array('route' => 'Asignacion.store','method'=>'POST','class'=>'')) !!}
            <h2>Accesos</h2>

    <!-- dropdownlist para el rol -->
            <div class="btn-group" role="group">
								<div class="form-group">
									<label> Roles</label>
									<select class="form-control" name="rolos">
										  @foreach($rol as $vaciado_rol)
											<option value="{{$vaciado_rol->rls_id}}"> {{$vaciado_rol->rls_rol}} </option>
											@endforeach
									</select>
								</div>
            </div>


    <!-- este div es para la primera tabla-->
    			<div>
					     					<div id="no-more-tables">
														<table class="col-md-4 table-striped table-condensed cf" id="lts-asignacion" border="1" bordercolor="#999">
															<thead class="cf">
																<tr>
																	<th colspan="4"> OPCIONES </th>
																</tr>
																<tr>
																	<th>Seleccionar</th>
																	<th>Grupo</th>
																	<th>Opcion</th>
																	<th>Contenido</th>
																</tr>
															</thead>
															@foreach($opc as $o)
												<tr>
					        				<td data-title="Seleccionar">
					        					<input tabindex="1" type="checkbox" name="opciones[]" id="{{ $o->opc_id }}" value="{{ $o->opc_id }}">
					        				</td>
					        				<td data-title="Grupo">{{ $o->grp_grupo }}</td>
													<td data-title="Opcion">{{ $o->opc_opcion }}</td>
													<td data-title="Contenido">{{ $o->opc_contenido}}</td>
												</tr>
												@endforeach
										</table>
						</div>
	<!--botones-->
	<div class="col-md-2">
	       <button type="submit" name="agregar" class="btn btn-primary" style="background:#61BC8C">Agregar</button>
	       <button type="submit" name="retirar" class="btn btn-primary" style="background:#61BC8C">Retirar</button>
	</div>
	<!--botones-->

	<!-- este div es para la segunda tabla-->
					<div id="no-more-tables">
						<table class="col-md-4 table-striped table-condensed cf" id="lts-asignacion2"  border="1" bordercolor="#999">
							<thead class="cf">
								<tr>
										<th colspan="6"> ACCESOS </th>
								</tr>
								<tr>
									<th>Seleccionar</th>
									<th>Rol</th>
									<th>Opcion</th>
									<th>Contenido</th>
									<th>Registrado</th>
									<th>Modificado</th>
								</tr>
							</thead>

							@foreach($acceso as $a)
								<tr>
				        				<td data-title="Seleccionar">
				        					<input tabindex="1" type="checkbox" name="asignaciones[]" id="{{ $o->acc_id }}" value=" {{ $a->acc_id }}">
				        				</td>
				        				<td data-title="Rol">{{ $a->rls_rol }}</td>
												<td data-title="Opcion">{{ $a->opc_opcion }}</td>
												<td data-title="Contenido">{{ $a->opc_contenido}}</td>
				                <td data-title="Contenido">{{ $a->acc_registrado}}</td>
				                <td data-title="Contenido">{{ $a->acc_modificado}}</td>
								</tr>
							@endforeach
								</table>
							</div>
	</div>
@endsection
