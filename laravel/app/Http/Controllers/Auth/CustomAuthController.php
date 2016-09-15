<?php

namespace daf\Http\Controllers\Auth;
use Illuminate\Http\Request;
use daf\Usuario;
use daf\UsuarioRol;
use Validator;
use daf\Http\Controllers\Controller;
use Hash;
use Illuminate\Support\Facades\Input;
use Session;

use daf\Http\Requests;
class CustomAuthController extends Controller
{
     public function showLogin()
    {
      
        return view('auth.login');
    }

    public function postLogin()
    {
        $reglas=array('usr_usuario'=>'required',
        			'usr_clave'=>'required');
        $validacion=Validator::make(Input::all(),$reglas);
        if ($validacion->fails()) {
        	return Redirect::back()->withinput()->withErrors($validacion);
        }
        $id=
        $usr_usuario=Input::get('usr_usuario');

        $usr_clave=Input::get('usr_clave');

        $data_user=Usuario::where('usr_usuario','=',$usr_usuario,'and','usr_clave','=',$usr_clave)
                    ->join('_bp_personas as c','c.prs_id','=','_bp_usuarios.usr_prs_id')
                    ->join('_bp_usuarios_roles as a','a.usrls_usr_id','=','_bp_usuarios.usr_id')
                    ->join('_bp_roles as b','b.rls_id','=','a.usrls_rls_id')
                    ->select('_bp_usuarios.usr_usuario','_bp_usuarios.usr_estado','b.rls_rol','c.prs_nombres','c.prs_paterno','c.prs_materno','_bp_usuarios.usr_registrado')
                    ->first();
        
        if ($data_user) {
        	session_start();
        	$_SESSION['autentificado']=true;
        	$_SESSION['id']=$data_user['usr_id'];
        	$_SESSION['usuario']=$data_user['usr_usuario'];
        	$_SESSION['estado']=$data_user['usr_estado'];
            $_SESSION['registrado']=$data_user['usr_registrado'];
            $_SESSION['rol']=$data_user['rls_rol'];
            $_SESSION['nombres']=$data_user['prs_nombres'];
            $_SESSION['paterno']=$data_user['prs_paterno'];
            $_SESSION['materno']=$data_user['prs_materno'];

        	return view('admin.app');
        }else{
            return view('auth.login');
        	//return 'Error de Credenciales';
        }
    }
    public function destroy(Request $request)
    {
        session_start();
       
        
        session_destroy();
        session_unset($_SESSION);
 
     
       return view('welcome');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'terms' => 'required',
        ]);
    }

    protected function create(array $data)
    {
         Usuario::create([
            'usr_prs_id' =>1,
            'usr_usuario' => $data['name'],
            'usr_clave' => bcrypt($data['password']),
            'usr_usr_id'=>1,
            'usr_estado'=>'A'
        ]);
        return view('admin.app');
    }
}
