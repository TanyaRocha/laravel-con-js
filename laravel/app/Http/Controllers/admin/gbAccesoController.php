<?php

namespace daf\Http\Controllers\admin;

use Illuminate\Http\Request;

use Session;
use Redirect;
use daf\Http\Requests;
use daf\Http\Controllers\Controller;
use daf\Acceso;
use daf\Opcion;
use daf\Rol;
use daf\Usuario;

class gbAccesoController extends Controller
{
    public function index()
    {
         $acceso=Acceso::where('acc_estado','A')
        ->join('_bp_opciones as o','o.opc_id','=','_bp_accesos.acc_opc_id')
        ->join('_bp_roles as r','r.rls_id','=','_bp_accesos.acc_rls_id')
        ->join('_bp_usuarios as u','u.usr_id','=','_bp_accesos.acc_usr_id')
        ->get();
        //return json_encode($acceso);
        return view('admin.gbAccesos.index',compact('acceso'));

    }

    public function create()
    {
        $rol=Rol::OrderBy('rls_id','asc')->lists('rls_rol','rls_id');
        $opc=Opcion::OrderBy('opc_id','asc')->lists('opc_opcion','opc_id');
        //dd($rol);
        return view('admin.gbAccesos.create',compact('rol','opc'));
    }

    public function store(Request $request)
    {
        Acceso::create([
        //'acc_id'=> $request['acc_id'],
        'acc_rls_id'=>$request['acc_rls_id'],
        'acc_opc_id'=>$request['acc_opc_id'],
        'acc_usr_id'=>1
      ]);
      return redirect()->route('Acceso.index')->with('success','El acceso se registro correctamente');
    }
    public function show($id)
    {
        $acceso = Acceso::DarBaja($id);
        Session::flash('message','Acceso eliminado correctamente');        
        $acc=Acceso::all();
        return redirect()->route('Acceso.index')->with('success','El Acceso se elimino correctamente');   
    
    }
    public function edit($id)
    {
        $rol= Rol::OrderBy('rls_id','desc')->lists('rls_rol','rls_id');
        $opc= Opcion::OrderBy('opc_id','desc')->lists('opc_opcion','opc_id');
        $acceso = Acceso::find($id);
         return view('admin.gbAccesos.update',compact('acceso','rol','opc'));
    }
    public function update(Request $request, $id)
    {
      $acceso = Acceso::find($id);
      $acceso->fill($request->all());
      $acceso->save();
      Session::flash('message','Acceso Editado Correctamente');
      return redirect()->route('Acceso.index')->with('success','El acceso se actualizo correctamente');
    }

    public function baja($id)
        {
          $acceso = Acceso::DarBaja($id);
          $acceso->save();
          Session::flash('message','Acceso Editado Correctamente');
          return redirect::to('Acceso.index');
        }
        
    public function destroy($id)
    {
      
    }
}







