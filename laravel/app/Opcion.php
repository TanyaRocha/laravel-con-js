<?php

namespace daf;

use Illuminate\Database\Eloquent\Model;
use DB;

class Opcion extends Model
{
protected $table='_bp_opciones';
protected $fillable=['opc_id','opc_grp_id','opc_opcion','opc_contenido','opc_adicional','opc_orden','opc_imagen',
'opc_registrado','opc_modificado','opc_usr_id', 'opc_estado'];
public $timestamps = false;
protected $primaryKey='opc_id';


public function Grupo()
{
  return HasMany('daf\Opcion');
}

}
