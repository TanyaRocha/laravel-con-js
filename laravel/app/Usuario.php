<?php

namespace daf;

use Illuminate\Database\Eloquent\Model;
class Usuario extends Model
{
    protected $table='_bp_usuarios';
    protected $fillable=['usr_id','usr_usuario','usr_prs_id','usr_estado','usr_clave','usr_usr_id'];
    protected $primaryKey='usr_id';
    public $timestamps=false;
    public function Persona()
    {
    	return HasMany('daf\Usuario');
     }

    
}