<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'category'], function () {

    Route::get('/index', 'CategoryController@index');

    Route::get('/categorydad', 'CategoryController@listcategorydad');

    Route::get('/show/{id}', 'CategoryController@show');

    Route::post('/store','CategoryController@store');

    Route::put('/update/{id}','CategoryController@update');

    Route::delete('/destroy/{id}','CategoryController@destroy');

    Route::get('/export', 'CategoryController@export')->name('export');

    Route::get('/getmenu', 'CategoryController@getmenu');
   
    Route::get('/getmenudetail/{id}', 'CategoryController@getmenudetail');
});
Route::group(['prefix' => 'course'], function () {

    Route::get('/index', 'CourseController@index');

    Route::get('/show/{id}', 'CourseController@show');

    Route::post('/store','CourseController@store');

    Route::put('/update/{id}','CategoryController@update');
    
    Route::delete('/destroy/{id}','CourseController@destroy');

    Route::get('/export', 'CourseController@export')->name('export');

    Route::get('/getcoursebycategory/{id}', 'CourseController@CourseByCategory');

    Route::get('/getcountcourse/{id}', 'CourseController@CountCourse');
});
Route::group(['prefix' => 'hastang'], function () {

    Route::get('/index', 'HastangController@index');

    Route::post('/store','HastangController@store');
 
    Route::delete('/destroy/{id}','HastangController@destroy');

    Route::get('/export', 'HastangController@export')->name('export');
});
Route::group(['prefix' => 'comment'], function () {

    Route::get('/index', 'CommentController@index');

    Route::post('/store','CommentController@store');

    
    Route::delete('/destroy/{id}','CommentController@destroy');

    Route::get('/export', 'CommentController@export')->name('export');
});
Route::group(['prefix' => 'teacher'], function () {

    Route::get('/index', 'TeacherController@index');

    Route::get('/show/{id}', 'TeacherController@show');

    Route::post('/store','TeacherController@store');

    
    Route::delete('/destroy/{id}','TeacherController@destroy');

    Route::get('/export', 'TeacherController@export')->name('export');
});
Route::group(['prefix' => 'new'], function () {

    Route::get('/index', 'NewController@index');

    Route::get('/show/{id}', 'NewController@show');

    Route::post('/store','NewController@store');

    Route::put('/update/{id}','NewController@update');
    
    Route::delete('/destroy/{id}','NewController@destroy');

    Route::get('/export', 'NewController@export')->name('export');
});
Route::group(['prefix' => 'certificate'], function () {

    Route::get('/index', 'CertificateController@index');

    Route::post('/store','CertificateController@store');
    
    Route::delete('/destroy/{id}','CertificateController@destroy');

    Route::get('/export', 'CertificateController@export')->name('export');
});
Route::group(['prefix' => 'order'], function () {

    Route::get('/index', 'OrderController@index');
  
    Route::get('/show/{id}', 'OrderController@show');

    Route::post('/store','OrderController@store');
    
    Route::delete('/destroy/{id}','OrderController@destroy');

    Route::get('/export', 'OrderController@export')->name('export');
});
Route::group(['prefix' => 'orderdetail'], function () {

    Route::get('/index', 'Order_detailController@index');
  
    Route::get('/show/{id}', 'Order_detailController@show');

    Route::post('/store','Order_detailController@store');
    
    Route::delete('/destroy/{id}','Order_detailController@destroy');

    Route::get('/export', 'Order_detailController@export')->name('export');
});
Route::group(['prefix' => 'customer'], function () {

    Route::get('/index', 'CustomerController@index');

    Route::post('/store','CustomerController@store');

    
    Route::delete('/destroy/{id}','CustomerController@destroy');

    Route::get('/export', 'CustomerController@export')->name('export');

    Route::get('/sumrecord', 'CustomerController@sumrecord');

    Route::get('/sumrecordindate', 'CustomerController@SumRecordInDate');

    Route::get('/sumrecordinmonth', 'CustomerController@SumRecordInMonth');

    Route::get('/monthlygrowthrate', 'CustomerController@MonthlyGrowthRate');

    Route::post('/register','CustomerController@register');

    Route::post('/login','CustomerController@login');

    Route::get('/logout','CustomerController@logout');

    Route::get('/user','CustomerController@logout');
    //send gmail
    Route::post('/sentmail', 'CustomerController@user');
    //reset password
    Route::post('/reset/{token}', 'CustomerController@resetPassword');


});
Route::group(['middleware' => ['web']], function () {
    Route::get('loginsocial/{provide}', 'SocialLogin');
    Route::get('loginsocial/{provide}/callback', 'SocialLogin@handerredirct');
});
   

Route::group(['prefix' => 'user'], function () {
    
    Route::post('/register','AuthController@register');

    Route::post('/login','AuthController@login');

    Route::get('/logout','AuthController@logout');

    Route::get('/users','AuthController@all');

    Route::post('/users','AuthController@create');

    Route::put('/users/{id}','AuthController@updateUser');

    Route::delete('/users/{id}','AuthController@delete');
    //send gmail
    Route::post('/sentmail', 'UserController@sendMail');
    //reset password
    Route::post('/reset/{token}', 'UserController@resetPassword');

});
