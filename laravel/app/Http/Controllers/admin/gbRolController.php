<?php

namespace daf\Http\Controllers\admin;

use Illuminate\Http\Request;

use daf\Http\Requests;
use daf\Http\Controllers\Controller;
use Session;
use Redirect;
use daf\Rol;
use daf\Usuario;

class gbRolController extends Controller
{
    public function index()
    {
        $rol=Rol::where('rls_estado','A')
        ->join('_bp_usuarios as u','u.usr_id','=','_bp_roles.rls_usr_id')
        ->get();
        return view('admin.gbRoles.index',compact('rol')); 
    }

    
    public function create()
    {
        $usr=Usuario::OrderBy('usr_id','asc')->lists('usr_usuario','usr_id');
        return view('admin.gbRoles.create', compact ('usr'));
    }
    
    public function store(Request $request)
    {
        Rol::create([
       'rls_rol'=> $request['rls_rol'],
        'rls_usr_id'=>1,
        'rls_estado'=>'A',
        ]);
      return redirect()->route('Rol.index')->with('success','El rol se registro correctamente');
    }
    public function show($id)
    {
      $rol = Rol::DarBaja($id);
      //$rol = Rol::where('rls_id',$id)->update(['opc_estado' => 'B']);  
      Session::flash('message','Rol eliminado correctamente');
      $rls=Rol::all();
      //return view('rol',compact('rls'));
      return redirect()->route('Rol.index')->with('success','El rol se elimino correctamente');
    }
    public function edit($id)
    {
        $usr=Usuario::OrderBy('usr_id','asc')->lists('usr_usuario','usr_id');
        $rol = Rol::find($id);
        //return view('admin.gbRoles.update',['rol'=>$rol]);
        return view('admin.gbRoles.update',compact('rol','usr'));
    }
    public function update(Request $request, $id)
    {
      $rol = Rol::find($id);
      $rol->fill($request->all());
      $rol->save();

      Session::flash('message','Usuario Editado Correctamente');
      return redirect()->route('Rol.index')->with('success','El rol se actualizo correctamente');
    }
    public function baja($id)
        {
          $rol = Rol::DarBaja($id);
          $rol->save();
          Session::flash('message','Acceso Editado Correctamente');
          return redirect::to('Rol.index');
        }
    public function destroy($id)
    {
        
    }
}


