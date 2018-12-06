<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
}
