<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Animal;
use App\Category;
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


    //          $categories = Category::all();
    //          $animals = Animal::all();


    //      $animals = Animal::orderby('id', 'desc')->paginate(10);
    // return view('wel', compact('animals','categories',  $categories, $animals));

     return view('wel');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/costs','CostController');


Route::resource('/bookings','BookingController');

Route::resource('/users', 'UserController');

Route::resource('/categories', 'CategoryController');

Route::resource('/animals','AnimalController');




Route::resource('/roles', 'RoleController');

Route::resource('/permissions', 'PermissionController');

Route::resource('/posts', 'PostController');
