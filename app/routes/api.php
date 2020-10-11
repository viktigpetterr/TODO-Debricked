<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// To do routes:
Route::middleware('api')->get('/{categoryId}/todos', [TodoController::class, 'getTodos']);
Route::middleware('api')->post('/{categoryId}/todos/add', [TodoController::class, 'addTodo']);
Route::middleware('api')->post('/{categoryId}/todos/delete/{todoId}', [TodoController::class, 'deleteTodo']);
Route::middleware('api')->post('/{categoryId}/todos/done/{todoId}', [TodoController::class, 'todoDone']);

// Category routes:
Route::middleware('api')->get('/categories', [CategoryController::class, 'getCategories']);
Route::middleware('api')->post('/categories/add', [CategoryController::class, 'addCategory']);
Route::middleware('api')->post('/categories/delete/{categoryId}', [CategoryController::class, 'deleteCategory']);

