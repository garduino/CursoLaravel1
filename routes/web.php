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


use App\Articulo;
use App\Cliente;

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

/*
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
*/

Route::get("/leer", function() {

    /*
    $articulos=Articulo::all();

    foreach($articulos as $articulo) {
        echo "Nombre: " . $articulo->Nombre_Articulo . "  Precio: " . $articulo->Precio . "<br>";
    }
    */

    /*
    $articulos=Articulo::where("pais_origen", "ARGENTINA")->get();
    */

    /*
    $articulos=Articulo::where("id", 4)->get();
    */

    $articulos = Articulo::withTrashed()
                ->where('id', 4)
                ->restore();
    /*
    return $articulos;
    */  
});


Route::get("/insertar", function() {

$articulos=new Articulo;

$articulos->Nombre_Articulo="Pantalones";
$articulos->Precio=10.30;
$articulos->pais_origen="España";
$articulos->observaciones="Lavados a la Piedra";
$articulos->seccion="Confección";

$articulos->save();

});

Route::get("/actualizar", function() {

    /*
    $articulos=Articulo::find(7);
    
    $articulos->Nombre_Articulo="Pantalones";
    $articulos->Precio=25;
    $articulos->pais_origen="España";
    $articulos->observaciones="Lavados a la Piedra";
    $articulos->seccion="Confección";
    
    $articulos->save();
    */
/*
    Articulo::where("seccion","DECORACION")->update(["seccion" => "Menajes"]);
    */
    Articulo::where("seccion","Menajes")->where("pais_origen","Argentina")->update(["precio" => 1.5]);
    /* Pregunta: ¿Cómo hacer para colocar en lugar de un precio fijo en el update, el resultado de una 
    fórmula, por ejemplo precio x 1,50?
    */
    });

    Route::get("/borrar", function() {

        $articulo=Articulo::find(7);

        $articulo->delete();


    /* Otra forma de borrar en base a un criterio de otro campo
    Articulo::where("seccion","Menajes")->delete();
    borraría todos los artículos que tengan el valor Menajes en el campo seccion.
    */

    });
    
    Route::get("/create", function() {

        Articulo::create(["Nombre_articulo"=>"Impresora","Precio"=>50,"Pais_origen"=>"Colombia","Observaciones"=>"S/D","seccion"=>"Informática"]);


    });

    Route::get("/cliente/{id}/articulo", function($id) {

        return Cliente::find($id)->articulo;

    });

    Route::get("/softdelete", function() {

        Articulo::find(4)->delete();

    });


    Route::get("/harddelete", function() {

        $articulos = Articulo::withTrashed()
                ->where('id', 4)
                ->forceDelete();
    });


    Route::get("/articulo/{id}/cliente", function($id) {

        /* return Articulo::find($id)->cliente['Nombre']; */
        
        return Articulo::findOrFail($id)->cliente->Nombre;

    });