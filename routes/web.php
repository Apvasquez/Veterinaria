<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\CampusComponent;
use App\Models\Campus;
use App\Http\Livewire\BarsComponent;
use App\Http\Livewire\ControlTotal;
use App\Http\Livewire\Alex;
use App\Http\Controllers\AccesoriosController;
use App\Models\Bar;
use App\Models\User;
use Illuminate\Contracts\Cache\Factory as CacheFactory;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Faker\Factory as Faker;

use Illuminate\Database\Eloquent\Factories\Factory;


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

Route::get('/', function () {
    // Role::first()->givePermissionTo(Permission::first());
    // dd(Role::first()->permissions);

    // dd(Role::all(), Permission::all());
    // User::last()->assignRole('Admin');
        // User::find(2)->givePermissionTo('Edit');
      return view ('welcome');

})->name('home');
Route::get('/create', function () {
    // User::factory()->create();




    // Role::create(['name' => 'escritor']);
    // Permission::create(['name' => 'editar articulos']);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/campuses', CampusComponent::class)->name('campuses');
Route::middleware(['auth:sanctum', 'verified'])->get('/bars', BarsComponent::class)->name('bars');
Route::middleware(['auth:sanctum', 'verified'])->get('/alex', Alex::class)->name('alex');
Route::middleware(['auth:sanctum', 'verified'])->get('/controls', ControlTotal::class)->name('controls');
// Rutas CRUD
 
/* Crear */
Route::middleware(['auth:sanctum', 'verified'])->get('admin/accesorios/crear', [AccesoriosController::class, 'crear' ] )->name('admin/accesorios/crear');
Route::middleware(['auth:sanctum', 'verified'])->put('admin/accesorios/store', [AccesoriosController::class, 'store' ] )->name('admin/accesorios/store');

 
/* Leer */
Route::middleware(['auth:sanctum', 'verified'])->get('admin/accesorios', [AccesoriosController::class, 'index' ] )->name('admin/accesorios');
 
/* Actualizar */
Route::middleware(['auth:sanctum', 'verified'])->get('admin/accesorios/actualizar/{id}', [AccesoriosController::class, 'actualizar'])->name('admin/accesorios/actualizar');
Route::middleware(['auth:sanctum', 'verified'])->put('admin/accesorios/update/{id}', [AccesoriosController::class, 'update'])->name('admin/accesorios/update');
 
/* Eliminar */
Route::middleware(['auth:sanctum', 'verified'])->put('admin/accesorios/eliminar/{id}',[AccesoriosController::class,'eliminar'])->name('admin/accesorios/eliminar');
 
/* Eliminar imagen de un registro */
Route::middleware(['auth:sanctum', 'verified'])->get('admin/accesorios/eliminarimagen/{id}{bid}',[AccesoriosController::class,'eliminarimagen'])->name('admin/accesorios/eliminarimagen');
 
/* Vista para los detalles de un registro */
Route::middleware(['auth:sanctum', 'verified'])->get('admin/accesorios/detallesproducto/{id}', [AccesoriosController::class ,'detallesproducto']);
