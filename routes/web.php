<?php
use \App\Ad;
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
    $ads = Ad::paginate(10);
    return view('welcome',['items' => $ads] );
});

Route::get('/ads', 'HomeController@ads_list');
Route::get('/ad/{id}', 'HomeController@ad')->name('ad.single');
Route::post('/ad/comment', 'CommentController@save')->name('ad.comment.create');
Route::post('/ad/comment/{id}', 'CommentController@update')->name('ad.comment.update');
Route::post('/ad/comment/destroy/{id}', 'CommentController@destroy')->name('ad.comment.destroy');

Auth::routes();



Route::group(['middleware' => ['auth']], function () {
  Route::get('/home', 'HomeController@dashboard');
});
// AUTHENTICATED ROUTES
Route::group(['middleware' => ['auth' , 'acl']], function () {

  // ADMIN routes
  Route::resource('/admin/categories', 'CategoryController');
  Route::get('/admin/users', 'UserController@index')->name('admin.user.list');
  Route::get('/admin/views/categories', 'ReportController@adViewsByCategory')->name('admin.views.cateogries');
  Route::get('/admin/views', 'ReportController@adViews')->name('admin.views');
  //Route::get('/admin/category_views', 'ReportController');

  // SELLER ROUTES
  Route::resource('/seller/ad', 'AdController');
  // BUYER ROUTES

});
