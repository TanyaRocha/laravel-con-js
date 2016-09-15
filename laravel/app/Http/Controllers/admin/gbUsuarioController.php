<?php

namespace daf\Http\Controllers\admin;
use Illuminate\Http\Request;
use daf\Http\Requests;
use daf\Http\Controllers\Controller;
use Session;
use Redirect;
use daf\Persona;
use daf\Usuario;
use Yajra\Datatables\Datatables;

class gbUsuarioController extends Controller
{
    public function index()
    {
        $usr=Usuario::join('_bp_personas','_bp_usuarios.usr_prs_id','=','_bp_personas.prs_id')
          ->select('_bp_usuarios.usr_id','_bp_usuarios.usr_usuario','_bp_usuarios.usr_clave','_bp_usuarios.usr_estado','_bp_usuarios.usr_registrado','_bp_usuarios.usr_modificado')
          ->where('_bp_usuarios.usr_estado','A')
          ->get();
        return view('admin.gbUsuario.index',compact('usr'));
       /* ******************
        $opc = Opcion::join('_bp_grupos','_bp_opciones.opc_grp_id','=','_bp_grupos.grp_id')
              ->select('_bp_opciones.opc_id','_bp_grupos.grp_grupo','_bp_opciones.opc_opcion','_bp_opciones.opc_contenido')
               ->where('_bp_opciones.opc_estado','A')
               ->get();
     return view('admin.gbOpciones.read',compact('opc'));
        **************/
    }
    public function create()
    {
        $persona=Persona::OrderBy('prs_id','desc')->lists('prs_nombres','prs_id');
        return view('admin.gbUsuario.create',compact('persona'));
    }   
    public function store(Request $request)
    {             
      Usuario::create([
        'usr_usuario'=> $request['usr_usuario'],
        'usr_clave'=>$request['usr_clave'],
        'usr_prs_id'=>$request['usr_prs_id'],
         'usr_usr_id'=>1,
      ]);

      $usr=Usuario::all();
   Session::flash('message','El usuario fue creado correctamente.');
      return redirect()->route('Usuario.index')->with('success','El usuario se registro correctamente');
    }

    public function show($id)
    {
         $usuario = Usuario::where('usr_id',$id)-> update(['usr_estado' => 'B']);
      Session::flash('message','Usuario eliminado correctamente');
      $usr1=Usuario::all();
      return redirect()->route('Usuario.index')->with('success','El usuario se elimino correctamente');
    }

    public function edit($id)
    {
         $persona=Persona::OrderBy('prs_id','desc')->lists('prs_nombres','prs_id');
        $usuario = Usuario::find($id);
        return view('admin.gbUsuario.update',compact('usuario','persona'));
    }
    
    public function update(Request $request, $id)
    {
      $usuario = Usuario::find($id);
      $usuario->fill($request->all());
      $usuario->save();
      
      Session::flash('message','Usuario Editado Correctamente');
      return redirect()->route('Usuario.index')->with('success','El usuario se actualizo correctamente');

    }
    public function baja($id)
        {
          $usuario = Usuario::where('usr_id',$id) 
              -> update(['usr_estado'=>'B']);
          
          Session::flash('message','Usuario fue dado de baja Correctamente');
          return Redirect::to('usuario');
     //return view('admin.gbGrupos.read');
        
        }
    
    public function destroy($id)
    {
            }
}
