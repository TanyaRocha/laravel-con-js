<?php

namespace daf\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use daf\Http\Controllers\Controller;

use Hash;
use Session;
use Redirect;

use daf\Grupo;
use daf\Opcion;
use daf\Rol;
use daf\Asignacion;
use daf\Acceso;

class gbAsignacionController extends Controller
{
   public function index()
    {
     $rol=Rol:: where('_bp_roles.rls_estado','A')
                ->join('_bp_usuarios as u','u.usr_id','=','_bp_roles.rls_usr_id')
                ->get();

      $opc=Opcion::join('_bp_grupos as grp','grp.grp_id','=','_bp_opciones.opc_grp_id')
      ->select('grp.grp_grupo','_bp_opciones.opc_contenido','_bp_opciones.opc_id','_bp_opciones.opc_usr_id',
        '_bp_opciones.opc_opcion')
      ->where('_bp_opciones.opc_estado','A')
      ->whereNotIn('_bp_opciones.opc_id',function($q){
        $q-> select('_bp_accesos.acc_opc_id')
          -> from('_bp_accesos')
          -> where('_bp_accesos.acc_rls_id','1')
          -> where('_bp_accesos.acc_estado','A');
      })->OrderBy('_bp_opciones.opc_id','ASC')
      ->get();
     // dd(rol,opc);

      $acceso=Acceso::join('_bp_opciones as o','o.opc_id','=','_bp_accesos.acc_opc_id')
                    -> join('_bp_roles as r','r.rls_id','=','_bp_accesos.acc_rls_id')
                    -> select('_bp_accesos.acc_id',
                              '_bp_accesos.acc_opc_id',
                              'o.opc_opcion',
                              '_bp_accesos.acc_rls_id',
                              'r.rls_rol',
                              '_bp_accesos.acc_registrado',
                              '_bp_accesos.acc_modificado')
                    -> where('_bp_accesos.acc_estado','A')
                    -> where('_bp_accesos.acc_rls_id','1')
                    ->OrderBy('o.opc_id','ASC')
                    ->get();

     return view('admin.gbAsignacion.index',compact('rol', 'opc','acceso'));

    }

 public function create()
 {
  return $grupillo=Grupo::all();

    //return view('admin.gbGrupos.create',compact('grupillo'));
 }

 public function store(Request $request)
 {
    $arr_opc = array();
    $arr_acc = array();

    $valor_boton1 = $request['rolos'];


    if(isset($_POST['opciones']))
    {
        $arr_opc = $_POST['opciones'];
        for($i=0; $i<count($arr_opc); $i++)
            {
              Acceso::create([
              'acc_rls_id'=>$request['rolos'],
              'acc_opc_id'=>$arr_opc[$i],
              'acc_usr_id'=>1
            ]);
            //echo $arr_opc[$i];
            //print_r($arr_opc);
            }
            return redirect()->route('Asignacion.index')->with('success','El acceso se registro correctamente');
      }
      else {
        $arr_acc = $_POST['asignaciones'];
        for($i=0; $i<count($arr_acc); $i++)
            {
              Acceso::where('acc_id', $arr_acc[$i])
                      ->update(['acc_estado' => 'B']);
            }
            return redirect()->route('Asignacion.index')->with('success','El acceso se a eliminado correctamente');
            }
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

 }

 public function destroy($id)
 {


 }
}
