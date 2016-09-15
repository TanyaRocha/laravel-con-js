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

class gbPersonaController extends Controller
{
    public function index()
    {
       $persona=Persona::join('_bp_usuarios','_bp_personas.prs_usr_id','=','_bp_usuarios.usr_id')
       ->select('_bp_personas.prs_id','_bp_personas.prs_nombres','_bp_personas.prs_paterno','_bp_personas.prs_materno','_bp_personas.prs_ci','_bp_personas.prs_direccion','_bp_personas.prs_telefono',
          '_bp_personas.prs_celular','_bp_personas.prs_empresa_telefonica','_bp_personas.prs_correo','_bp_personas.prs_estado')
          ->where('_bp_personas.prs_estado','A')
          ->get();  
         
        return view('admin.gbPersonas.index',compact('persona'));


    }

    public function create()
    {
        $pers1=Persona::OrderBy('prs_id','desc')->lists('prs_nombres','prs_id');
        return view('admin.gbPersonas.create',compact('pers1'));
    }

    
    public function store(Request $request)
    {
        Persona::create([
        'prs_nombres'=> $request['prs_nombres'],
        'prs_paterno'=>$request['prs_paterno'],
        'prs_materno'=>$request['prs_materno'],
        'prs_ci'=>$request['prs_ci'],
        'prs_direccion'=>$request['prs_direccion'],
        //'prs_direccion2'=>$request['prs_direccion2'],
        'prs_telefono'=>$request['prs_telefono'],
        //'prs_telefono2'=>$request['prs_telefono2'],
        'prs_celular' =>$request['prs_celular'],
        'prs_empresa_telefonica'=>$request['prs_empresa_telefonica'],
        'prs_correo'=>$request['prs_correo'],
        'prs_id_estado_civil'=>1,
        'prs_sexo'=>'F',
        'prs_fec_nacimiento'=>'2016-08-16',
        'prs_id_archivo_cv'=>1,
         'prs_usr_id'=>2  
         ]);

        $persona=Persona::all();
            Session::flash('message','La persona fue creado correctamente.');
      return redirect()->route('Persona.index')->with('success','La persona se registro correctamente');
    }
    public function show($id)
    {
        
        $persona = Persona::where('prs_id',$id)
                  ->update(['prs_estado' => 'B']);
      
      Session::flash('message','La persona fue eliminado correctamente.');
     $persona=Persona::all();
      return redirect()->route('Persona.index')->with('success','El usuario se elimino correctamente');
     // return view('admin.gbPersonas.index');
    }

       public function edit($id)
    {
         $usuario=Usuario::OrderBy('usr_id','desc')->lists('usr_usuario','usr_id');
        $persona = Persona::find($id);

        return view('admin.gbPersonas.update',compact('persona','usuario'));
  
    }

    
    public function update(Request $request, $id)
    {
        
      $persona = Persona::find($id);
      $persona->fill($request->all());
      $persona->save();
      Session::flash('message','Persona fue editado Correctamente');
      return redirect()->route('Persona.index')->with('success','La Persona se actualizo correctamente');

    }

    public function baja($id)
        {
           $persona = Persona::where('prs_id', $id)
               ->update(['prs_estado' => 'B']);
     Session::flash('message','La persona fue eliminada Correctamente');
     return Redirect::to('admin.gbPersona.index');
        }

    
    public function destroy($id)
    {
        
    }
}