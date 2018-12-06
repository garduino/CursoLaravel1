<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Articulo extends Model
{
    //
    protected $fillable=[

        "Nombre_articulo",
        "Precio",
        "Pais_origen",
        "Observaciones",
        "seccion"
    ];

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    public function cliente() {

        return $this->belongsTo("App\Cliente");

    }


}
