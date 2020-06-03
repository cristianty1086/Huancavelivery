<?php

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

Route::get('/', function () {
    return view('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');
Route::resource('categories', 'CategoryController');
Route::resource('suppliers', 'SupplierController');
Route::resource('roles', 'RoleController');
Route::resource('permission', 'PermissionController');
Route::resource('orders', 'OrderController');
Route::resource('products', 'ProductController');
Route::resource('billings', 'BillingController');
Route::resource('detaill_orders', 'DetaillOrderController');
Route::resource('role_user', 'RoleUserController');
Route::resource('supplier_user', 'SupplierUserController');
Route::resource('permission_role', 'PermissionRoleController');
Route::resource('permisssion_user', 'PermissionUserController');
