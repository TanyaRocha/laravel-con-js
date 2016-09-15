<?php

namespace daf;

use Illuminate\Database\Eloquent\Model;
use DB;

class Grupo extends Model
{
    protected $table='_bp_grupos';
    protected $fillable=['grp_id', 'grp_grupo', 'grp_imagen', 'grp_registrado', 'grp_modificado', 'grp_usr_id', 'grp_estado'];
    public $timestamps = false;
    protected $primaryKey='grp_id';
}
