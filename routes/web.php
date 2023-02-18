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

require __DIR__.'/auth.php';

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');



/*
|--------------------------------------------------------------------------
| Web Routes for Frontend 
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/ 

Route::get('/','App\Http\Controllers\Frontend\PagesController@index')->name('homepage');
 

// product group for CRUD
Route::group(['prefix' => 'products'],function(){
	Route::get('/','App\Http\Controllers\Frontend\PagesController@products')->name('allProducts');
	Route::get('/{slug}','App\Http\Controllers\Frontend\PagesController@productshow')->name('product.show');
	// Route::get('/details','App\Http\Controllers\Frontend\PagesController@details')->name('details'); 
	Route::get('/category','App\Http\Controllers\Frontend\PagesController@productcategory')->name('product.category');
	Route::get('/category/{slug}','App\Http\Controllers\Frontend\PagesController@categoryshow')->name('category.show');
});

// cart controller
Route::group(['prefix' => 'cart'],function(){
	Route::get('/','App\Http\Controllers\Frontend\CartController@index')->name('cart.items');
	Route::post('/store','App\Http\Controllers\Frontend\CartController@store')->name('cart.store'); 
	Route::post('/update/{id}','App\Http\Controllers\Frontend\CartController@update')->name('cart.update');
	Route::post('/destroy/{id}','App\Http\Controllers\Frontend\CartController@destroy')->name('cart.destroy');
});
// checkout page route
Route::group(['prefix' => 'checkout'],function(){
	Route::get('/','App\Http\Controllers\Backend\OrderController@index')->name('checkout.page');
	Route::post('/store','App\Http\Controllers\Backend\OrderController@store')->name('order.store');
});
// Route::get('/login','App\Http\Controllers\Frontend\PagesController@login')->name('login');
// Route::get('/registration','App\Http\Controllers\Frontend\PagesController@registration')->name('registration');


/*
|--------------------------------------------------------------------------
| Web Routes for Backend
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::group(['prefix'=>'admin'], function(){
	Route::get('/dashboard', 'App\Http\Controllers\Backend\PagesController@index')->middleware(['auth'])->name('dashboard'); 

	// Brand Route for CRUD

	Route::group(['prefix'=>'brand'], function(){
		Route::get('/manage', 'App\Http\Controllers\Backend\BrandController@index')->name('brand.manage'); // read data from database for brands
		Route::get('/create', 'App\Http\Controllers\Backend\BrandController@create')->name('brand.create'); // show html create page
		Route::post('/store', 'App\Http\Controllers\Backend\BrandController@store')->name('brand.store'); // store data into the database 
		Route::get('/edit/{id}', 'App\Http\Controllers\Backend\BrandController@edit')->name('brand.edit');  // edit kore html edit page e dekhano
		Route::post('/edit/{id}', 'App\Http\Controllers\Backend\BrandController@update')->name('brand.update');  // update data and update database value
		Route::post('/destroy/{id}', 'App\Http\Controllers\Backend\BrandController@destroy')->name('brand.destroy'); // delete data from database
	});

	// Category Route for CRUD

	Route::group(['prefix'=>'category'], function(){
		Route::get('/manage', 'App\Http\Controllers\Backend\CategoryController@index')->name('category.manage'); // read data from database for brands
		Route::get('/create', 'App\Http\Controllers\Backend\CategoryController@create')->name('category.create'); // show html create page
		Route::post('/store', 'App\Http\Controllers\Backend\CategoryController@store')->name('category.store'); // store data into the database 
		Route::get('/edit/{id}', 'App\Http\Controllers\Backend\CategoryController@edit')->name('category.edit');  // edit kore html edit page e dekhano
		Route::post('/edit/{id}', 'App\Http\Controllers\Backend\CategoryController@update')->name('category.update');  // update data and update database value
		Route::post('/destroy/{id}', 'App\Http\Controllers\Backend\CategoryController@destroy')->name('category.destroy'); // delete data from database
	});

	// Product Route for CRUD

	Route::group(['prefix'=>'product'], function(){
		Route::get('/manage', 'App\Http\Controllers\Backend\ProductController@index')->name('product.manage'); // read data from database for brands
		Route::get('/create', 'App\Http\Controllers\Backend\ProductController@create')->name('product.create'); // show html create page
		Route::post('/store', 'App\Http\Controllers\Backend\ProductController@store')->name('product.store'); // store data into the database 
		Route::get('/edit/{id}', 'App\Http\Controllers\Backend\ProductController@edit')->name('product.edit');  // edit kore html edit page e dekhano
		Route::post('/edit/{id}', 'App\Http\Controllers\Backend\ProductController@update')->name('product.update');  // update data and update database value
		Route::post('/destroy/{id}', 'App\Http\Controllers\Backend\ProductController@destroy')->name('product.destroy'); // delete data from database
	});

	// Division Route for CRUD

	Route::group(['prefix'=>'division'], function(){
		Route::get('/manage', 'App\Http\Controllers\Backend\DivisionController@index')->name('division.manage'); // read data from database for brands
		Route::get('/create', 'App\Http\Controllers\Backend\DivisionController@create')->name('division.create'); // show html create page
		Route::post('/store', 'App\Http\Controllers\Backend\DivisionController@store')->name('division.store'); // store data into the database 
		Route::get('/edit/{id}', 'App\Http\Controllers\Backend\DivisionController@edit')->name('division.edit');  // edit kore html edit page e dekhano
		Route::post('/edit/{id}', 'App\Http\Controllers\Backend\DivisionController@update')->name('division.update');  // update data and update database value
		Route::post('/destroy/{id}', 'App\Http\Controllers\Backend\DivisionController@destroy')->name('division.destroy'); // delete data from database
	});

	// District Route for CRUD

	Route::group(['prefix'=>'district'], function(){
		Route::get('/manage', 'App\Http\Controllers\Backend\DistrictController@index')->name('district.manage'); // read data from database for brands
		Route::get('/create', 'App\Http\Controllers\Backend\DistrictController@create')->name('district.create'); // show html create page
		Route::post('/store', 'App\Http\Controllers\Backend\DistrictController@store')->name('district.store'); // store data into the database 
		Route::get('/edit/{id}', 'App\Http\Controllers\Backend\DistrictController@edit')->name('district.edit');  // edit kore html edit page e dekhano
		Route::post('/edit/{id}', 'App\Http\Controllers\Backend\DistrictController@update')->name('district.update');  // update data and update database value
		Route::post('/destroy/{id}', 'App\Http\Controllers\Backend\DistrictController@destroy')->name('district.destroy'); // delete data from database
	});


});

