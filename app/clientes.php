<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    protected $table = 'clientes';

    public function tipo_documento() {
        return $this->hasOne( TiposDocumento::class , 'id' , 'tipo_documento_id');
    }
}
