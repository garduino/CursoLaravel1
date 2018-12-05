<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

/*
Route::get('/', function () {
return view('welcome');
});
 */

Route::get("/", "MiControlador@index");
Route::get("/crear", "MiControlador@create");
Route::get("/articulos", "MiControlador@store");
Route::get("/mostrar", "MiControlador@show");
Route::get("/contacto", "MiControlador@contactar");
Route::get("/galeria", "MiControlador@galeria");

Route::get("/insertar", function() {

DB::INSERT("INSERT INTO articulos (NOMBRE_ARTICULO, PRECIO, PAIS_ORIGEN, SECCION, OBSERVACIONES) 
VALUES(?,?,?,?,?)", ["JARRON", 15,2, "JAPON", "CERAMICA", "GANGA"]);

});


Route::get("/leer", function() {

    $resultados=DB::SELECT("SELECT * FROM articulos WHERE ID=?", [1]);

    foreach ($resultados as $articulo) {
        # code...
        return $articulo->Nombre_Articulo;
    }
    
    });
    
   
    
    Route::get("/borrar", function() {

        DB::DELETE("DELETE FROM articulos WHERE ID=?", [1]);
        
        });
