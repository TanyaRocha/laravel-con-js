<?php

namespace daf\Http\Controllers;

use Illuminate\Http\Request;

use daf\Http\Requests;

class ProcesosController extends Controller
{
    //
	public function index()
	{
		$procesos = array();
		array_push($procesos,array('ALMACEN_ID'=>'1','ALMACEN_CODIGO'=>'alm123','ALMACEN_TIPO'=>'CENTRAL','ALMACEN_NIT'=>'123456789','ALMACEN_DESCRIPCION'=>'CENTRAL','ALMACEN_OBSERVACION'=>'Sin observaciones'
,'ALMACEN_DIRECCION'=>'calle calle','ALMACEN_TELEFONO'=>'2345678','ALMACEN_CAPACIDAD'=>'100000','ALMACEN_REGISTRO'
=>'2013-07-16','ALMACEN_MODIFICACION'=>'2013-07-25','ALMACEN_USUARIO'=>'admin','ALMACEN_ESTADO'=>'ACTIVO'));
		
		return response()->json([
				'success'=>true,
				'resultTotal'=>1,
				'resultRoot'=>$procesos]);


	}

	public function allProcesos()
	{
		return Proceso::allProcesos();
		

	}
	
	public function store()
	{
		

	}
	public function show($id)
	{
		

	}
	public function update($id)
	{
		

	}
	public function destroy($id)
	{
		

	}
}
