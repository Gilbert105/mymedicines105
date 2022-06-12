<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Illuminate\Session\Middleware\AuthenticateSession::class;

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
// Route::get("formnewmedicine", "MedicineController@create");
// Route::get("formupdatemedicine", "MedicineController@update");
// Route::resource('medicine', 'MedicineResController');
// Route::get("report/medicine/json", "MedicineResController@jsonListData");
Route::resource('obat', 'MedicineController');
Route::resource('kategori_obat', 'CategoryController')->middleware('auth');
Route::resource('transactions', 'TransactionController')->middleware('auth');

Route::get('/report/listmedicine/{id}', 'CategoryController@showList')->name('reportShowMedicine');
Route::get('/report/cat_with_only_1_med', 'CategoryController@getCatWithOnly1Med');
Route::get('/report/list_category', 'CategoryController@listCategory');
Route::get('/report/count_category_with_med', 'CategoryController@countCategoryWithMedicine');
Route::get('/report/category_without_med', 'CategoryController@getCatNameWithoutMed');

Route::get('/report/sembarangMed', 'MedicineController@highestMedicine');
Route::post('/obat/showInfo','MedicineController@showInfo')->name('obat.showInfo');
Route::get('/transaction/index', 'TransactionController@allTransaction');

Route::get('/','MedicineController@front_index');
Route::get('/cart','MedicineController@cart');
Route::get('/add-to-cart/{id}','MedicineController@addToCart');

Route::post('/kategori_obat/getEditForm','CategoryController@getEditForm')->name('kategori_obat.getEditForm')->middleware("auth");
Route::post('/kategori_obat/getEditForm2','CategoryController@getEditForm2')->name('kategori_obat.getEditForm2')->middleware('auth');
Route::post('/kategori_obat/saveData','CategoryController@saveData')->name('kategori_obat.saveData')->middleware('auth');
Route::post('/kategori_obat/deleteData','CategoryController@deleteData')->name('kategori_obat.deleteData')->middleware('auth');
//Route::get('/transaction/showAjax', 'TransactionController@showAjax');

// Route::post('/obat/expensiveMed','MedicineController@expensiveMed')->name('obat.expensiveMed');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/checkout', 'TransactionController@form_submit_front')->middleware(['auth']);
Route::get('/submit_checkout', 'TransactionController@submit_front')->name('submitcheckout')->middleware(['auth']);
