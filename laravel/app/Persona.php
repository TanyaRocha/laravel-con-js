<?php
namespace daf;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table='_bp_personas';
    protected $fillable=['prs_id','prs_nombres','prs_paterno','prs_materno','prs_ci','prs_id_estado_civil','prs_id_archivo_cv','prs_direccion','prs_direccion2','prs_telefono','prs_telefono2','prs_celular','prs_empresa_telefonica','prs_correo','prs_sexo','prs_fec_nacimiento','prs_estado','prs_usr_id'];
    protected $primaryKey='prs_id';
     public $timestamps=false;

     public function Usuario()
    {
        return HasMany('daf\Persona');
    }


    
}