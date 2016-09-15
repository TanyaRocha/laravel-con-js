<?php

namespace daf\Http\Controllers\admin;

use Illuminate\Http\Request;
use Session;
use Redirect;
use daf\Http\Requests;
use daf\Http\Controllers\Controller;
use daf\Grupo;
use daf\Opcion;

class gbOpcionController extends Controller
{

 public function index()
 {
     $opc = Opcion::join('_bp_grupos','_bp_opciones.opc_grp_id','=','_bp_grupos.grp_id')
              ->select('_bp_opciones.opc_id','_bp_grupos.grp_grupo','_bp_opciones.opc_opcion','_bp_opciones.opc_contenido')
               ->where('_bp_opciones.opc_estado','A')
               ->get();
     return view('admin.gbOpciones.read',compact('opc'));
 }
 public function create()
 {
     $grp=Grupo::OrderBy('grp_id','desc')->lists('grp_grupo','grp_id');
     return view('admin.gbOpciones.create',compact('grp'));
 }

 public function store(Request $request)
 {
   
   Opcion::create([
     'opc_opcion'=> $request['opc_opcion'],
     'opc_contenido'=>$request['opc_contenido'],
     'opc_grp_id'=>$request['opc_grp_id'],
     'opc_adicional'=>'1',
     'opc_orden'=>1,
     'opc_usr_id'=>1,
     'opc_estado'=>'A'
   ]);
   $opc=Opcion::all();
   Session::flash('message','La opción fue creado correctamente.');
   return view('admin.gbOpciones.read',compact('opc'));
 }
 public function show($id)
 {
   $opcion = Opcion::where('opc_id',$id)->update(['opc_estado' => 'B']);
   Session::flash('message','La Opción fue eliminado correctamente.');
   $opc=Opcion::all();
   return view('admin.gbOpciones.read',compact('opc'));
 }

 public function edit($id)
 {
   
     $opcion = Opcion::find($id);
     $grp = Grupo::OrderBy('grp_id','desc')->lists('grp_grupo','grp_id');

     return view('admin.gbOpciones.update',compact('opcion','grp'));
 }

 public function update(Request $request, $id)
 {
   $opcion = Opcion::find($id);
   $opc=Opcion::all();
   $opcion->fill($request->all());
   $opcion->save();

   Session::flash('message','La opción fue editado Correctamente');
   return view('admin.gbOpciones.read',compact('opc'));
   }

 public function DarBaja($id)
 {
     $opcion = Opcion::where('opc_id', $id)
               ->update(['opc_estado' => 'B']);
    $opc=Opcion::all();
     Session::flash('message','La opci&oacute;n fue eliminada Correctamente');
     return view('admin.gbOpciones.read',compact('opc'));
 }

 public function destroy($id)
 {
    
 }
}
