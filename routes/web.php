<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\LevelController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ProjectUserController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IncidentController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/seleccionar/proyecto/{id}', [HomeController::class, 'selectProject']);

//INCIDENT
Route::post('/reportar', [IncidentController::class, 'storeReport']);
Route::get('/reportar', [IncidentController::class, 'getReport']);
Route::get('/ver/{id}',  [IncidentController::class, 'showReport']);


Route::middleware(['admin'])->group(function () {
   
    //CONFIG
    Route::get('/config', [ConfigController::class, 'index']);
   
   
    //USER
    Route::get('/usuarios', [UserController::class, 'index']);
    Route::get('/usuarios/{data}', [UserController::class, 'editUser']);
    Route::get('/usuarios/{id}/eliminar', [UserController::class, 'deleteUser'])->name('deleteUser');

    Route::post('/usuarios', [UserController::class, 'storeUser']);
    Route::put('/usuarios/{id}', [UserController::class, 'updateUser'])->name('updateUser');

     //PROJECTS
    Route::get('/proyectos', [ProjectController::class, 'index']);
    Route::get('/proyectos/{data}', [ProjectController::class, 'editProject']);
    Route::get('/proyectos/{id}/eliminar', [ProjectController::class, 'deleteProject']);
    Route::get('/proyectos/{id}/restaurar', [ProjectController::class, 'restoreProject']);

    Route::post('/proyectos', [ProjectController::class, 'storeProject']);
    Route::put('/proyetos/{id}', [ProjectController::class, 'updateProject'])->name('updateProject');

   
    
    //CATEGORY
    Route::post('/categorias', [CategoryController::class, 'storeCategory']);
    Route::put('/categoria/editar', [CategoryController::class, 'updateCategory']);
    Route::get('/categoria/{id}/eliminar', [CategoryController::class, 'deleteCategory']);

    //LEVEL
    Route::post('/niveles', [LevelController::class, 'storeLevel']);
    Route::put('/nivel/editar', [LevelController::class, 'updateLevel']);
    Route::get('/nivel/{id}/eliminar', [LevelController::class, 'deleteLevel']);

    //PROJECT_USER
    Route::post('/proyecto-usuario', [ProjectUserController::class, 'store']);
    Route::get('/proyecto-usuario/{id}/eliminar', [ProjectUserController::class, 'delete']);
});

