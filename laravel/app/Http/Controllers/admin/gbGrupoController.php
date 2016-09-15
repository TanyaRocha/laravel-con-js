<?php

namespace daf\Http\Controllers\admin;

use Illuminate\Http\Request;

use Session;
use Redirect;
use daf\Http\Requests;
use daf\Http\Controllers\Controller;
use daf\Grupo;
use daf\Opcion;

class gbGrupoController extends Controller
{
 public function index()
 {
   $grupillo=Grupo::where('grp_estado','A')->get();
   return view('admin.gbGrupos.read',compact('grupillo'));
 }
 public function create()
 {
   $grupillo=Grupo::all();
   
    return view('admin.gbGrupos.create',compact('grupillo'));
 }

 public function store(Request $request)
 {
 	$grupillo=Grupo::all();
     Grupo::create([
       'grp_grupo'=>$request['grp_grupo'],
       'grp_imagen'=>$request['grp_imagen'],
       'grp_usr_id'=>$request['grp_usr_id'],
       'grp_estado'=>'A',
     ]);

   Session::flash('message','El grupo fue creado correctamente.');
     return view('admin.gbGrupos.read',compact('grupillo'));

 }
 public function show($id)
 {

   $grupo = Grupo::where('grp_id', $id)->update(['grp_estado' => 'B']);
   Session::flash('message','Grupo eliminado correctamente');
   $grupillo=Grupo::all();
   Session::flash('message','El grupo fue eliminado correctamente.');
   return view('admin.gbGrupos.read',compact('grupo','grupillo'));
 }
 public function edit($id)
 {
   
     $grupo = Grupo::find($id);
     $grupillo = Grupo::all();
     return view('admin.gbGrupos.update',compact('grupo','grupillo'));
 }

 public function update(Request $request, $id)
 {
   
   $grupo = Grupo::find($id);
  
    
   $grupo->fill($request->all());
   $grupo->save();
   $grupillo=Grupo::all();
   Session::flash('message','El grupo se editado Correctamente');
   return view('admin.gbGrupos.read',compact('grupillo'));
   //return view('admin.Opcion.edit',['opcion'=>$opcion]);
 }

 public function DarBaja($id)
 {
     $opcion = Opcion::where('grp_id', $id)
               ->update(['grp_estado' => 'B']);
     Session::flash('message','El grupo se elimino Correctamente');
     return view('admin.gbGrupos.read');
 }

 public function destroy($id)
 {
  dd($id);
  
 }
}
