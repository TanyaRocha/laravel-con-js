<?php

namespace daf\Http\Controllers;

use Illuminate\Http\Request;

use daf\Http\Requests;

use daf\User;
use Validator;
use daf\Grupo;
use daf\Opcion;

class MenuController extends Controller
{
    public function index()
  {
            /*$opcmenu = Opcion::join('_bp_accesos','_bp_opciones.opc_id','=','_bp_accesos.acc_opc_id')
              ->select('_bp_opciones.opc_id','_bp_opciones.opc_opcion','_bp_opciones.opc_contenido')
               ->where('_bp_opciones.opc_estado','A')
               //->where('_bp_accesos.acc_rls_id',$id_rol) get();
               ->where('_bp_accesos.acc_rls_id',1)->get();
               //dd($opcmenu);
               return view('admin.app', compact('opcmenu'));*/
  }

    public function links()
    {
      $links = Opcion::join('_bp_accesos','_bp_opciones.opc_id','=','_bp_accesos.acc_opc_id')
      ->join('_bp_grupos', '_bp_opciones.opc_grp_id','=','_bp_grupos.grp_id')
              ->distinct()
              ->select('_bp_opciones.opc_id','_bp_opciones.opc_opcion','_bp_opciones.opc_contenido','_bp_opciones.opc_grp_id', '_bp_grupos.grp_grupo')
              ->where('_bp_opciones.opc_estado','A')
               //->where('_bp_accesos.acc_rls_id',$id_rol)
              ->where('_bp_accesos.acc_rls_id',1)
              ->where('_bp_accesos.acc_estado','A')
              ->OrderBy('_bp_opciones.opc_grp_id','asc')->get();
              //dd($links);
              return $links;
    }

  public function submenus()
    {
      $submenus = Grupo::join('_bp_opciones','_bp_opciones.opc_grp_id','=','_bp_grupos.grp_id')
              ->distinct()
              ->select('_bp_grupos.grp_id','_bp_grupos.grp_grupo')
              ->where('grp_estado','A')
              ->OrderBy('_bp_grupos.grp_id','asc')->get();
              //dd($submenus);
      return $submenus;
    }
}
