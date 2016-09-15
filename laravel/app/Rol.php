<?php

namespace daf;

use Illuminate\Database\Eloquent\Model;
use DB;

class Rol extends Model
{
    protected $table='_bp_roles';
    protected $fillable=['rls_id','rls_rol','rls_registrado','rls_modificado','rls_usr_id','rls_estado'];
    protected $primaryKey='rls_id';
    public $timestamps=false;

    protected static function listar()
    {
    	return DB::table('_bp_roles as r')
    			->join('_bp_usuarios as u','r.rls_usr_id','=','u.usr_id')
    			->paginate(5);
    }
    public function Usuario()
    {
    	return HasMany('daf\Rol');
    }

    protected static function DarBaja($id)
      {
        $idrol = $id;
        DB::table('_bp_roles')->where('rls_id', $idrol)
            ->update(['rls_estado' => 'B']);

      }
}
