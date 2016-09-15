<?php

namespace daf;

use Illuminate\Database\Eloquent\Model;
use DB;

class Acceso extends Model
{
    protected $table='_bp_accesos';
    protected $fillable=['acc_id','acc_opc_id','acc_rls_id','acc_registrado','acc_modificado','acc_estado','acc_usr_id'];
    protected $primaryKey='acc_id';
    public $timestamps=false;
}



