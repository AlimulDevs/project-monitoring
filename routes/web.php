<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

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

Route::get("/", [Controller::class, "index"]);
Route::get("/loginIndex", [Controller::class, "loginIndex"]);
Route::post("/login", [Controller::class, "login"]);
Route::get("/logout", [Controller::class, "logout"]);
Route::get("/registerIndex", [Controller::class, "registerIndex"]);
Route::post("/register", [Controller::class, "register"]);
Route::get("/search", [Controller::class, "search"]);
Route::get("/createIndex", [Controller::class, "createIndex"]);
Route::post("/create", [Controller::class, "create"]);
Route::post("/edit", [Controller::class, "edit"]);
Route::get("/delete/{id}", [Controller::class, "delete"]);
Route::get("/editIndex/{id}", [Controller::class, "editIndex"]);
