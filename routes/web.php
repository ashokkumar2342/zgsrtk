<?php

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

 
Route::get('/', 'Front\HomeController@index')->name('front.home');
 
Route::group(['prefix' => 'about'], function() {
    Route::get('about-group', 'Front\HomeController@about')->name('front.about');
    Route::get('vision-mission', 'Front\HomeController@mission')->name('front.vision-mission');
    Route::get('chairman-message', 'Front\HomeController@chairman')->name('front.chairman-message'); 
});
Route::group(['prefix' => 'academic'], function() {
    Route::get('holiday-homework', 'Front\HomeController@holiday')->name('front.holiday-homework');
    Route::get('holiday-homework2', 'Front\HomeController@holiday2')->name('front.holiday-homework2');
    Route::get('holiday-homework3', 'Front\HomeController@holiday3')->name('front.holiday-homework3');
    Route::get('circular', 'Front\HomeController@circular')->name('front.circular');
    Route::get('syllabus', function(){
    	return view('front.syllabus');
    } )->name('front.syllabus');

});
Route::group(['prefix' => 'art'], function() {
	Route::get('art-craft', 'Front\HomeController@art')->name('front.art-craft');
    Route::get('dance', 'Front\HomeController@dance')->name('front.dance');
	Route::get('music', 'Front\HomeController@music')->name('front.music');
	Route::get('mini-theater', 'Front\HomeController@mini')->name('front.mini-theater');
});
Route::group(['prefix' => 'resources'], function() {
	Route::get('smart-class-rooms', 'Front\HomeController@smart')->name('front.smart-class-rooms');
    Route::get('computer-lab', 'Front\HomeController@computer')->name('front.computer-lab');
	Route::get('science-lab', 'Front\HomeController@science')->name('front.science-lab');
	Route::get('library', 'Front\HomeController@library')->name('front.library');
	Route::get('counselling-area', 'Front\HomeController@counselling')->name('front.counselling-area');
	Route::get('transport', 'Front\HomeController@transport')->name('front.transport');


});
Route::group(['prefix' => 'sports'], function() {
	Route::get('indoor-sports', 'Front\HomeController@indoor')->name('front.indoor-sports');
    Route::get('outoor-sports', 'Front\HomeController@outdoor')->name('front.outoor-sports');
	Route::get('yoga-aerobics', 'Front\HomeController@yoga')->name('front.yoga-aerobics');
	Route::get('taekwondo', 'Front\HomeController@taekwondo')->name('front.taekwondo');
});
Route::group(['prefix' => 'events'], function() {
	Route::get('tour-trips', 'Front\HomeController@tour')->name('front.tour-trips');
	Route::get('adventure-land', 'Front\HomeController@adventure')->name('front.adventure-land');
	Route::get('ganesha', 'Front\HomeController@ganesha')->name('front.ganesha');
	Route::get('rang-highway', 'Front\HomeController@highway')->name('front.highway-dhani');
	Route::get('rang-tickLing', 'Front\HomeController@tickLing')->name('front.tickLing');

    Route::get('class-room-activities', 'Front\HomeController@activities')->name('front.class-room-activities');

	Route::get('medi-care', 'Front\HomeController@medi')->name('front.medi-care');
	Route::get('diwali', 'Front\HomeController@diwali')->name('front.diwali');
	Route::get('white-day', 'Front\HomeController@white')->name('front.white-day');
	Route::get('blue-day', 'Front\HomeController@blue')->name('front.blue-day');
	Route::get('yellow-day', 'Front\HomeController@yellow')->name('front.yellow-day');
	  
});
Route::group(['prefix' => 'gallery'], function() {
Route::get('photo-gallery', 'Front\GalleryController@index')->name('front.gallery');
Route::get('photo-gallery-show', 'Front\GalleryController@galleryShow')->name('front.gallery.show');
Route::get('video-gallery', 'Front\GalleryController@video')->name('front.video');	  

});
Route::get('career', 'Front\CareerController@index')->name('front.career');
Route::get('enquiry', 'Front\CareerController@enquiry')->name('front.enquiry');
Route::get('enquiry-form', 'Front\CareerController@enquiry2')->name('front.enquiry.form');
Route::post('store', 'Front\CareerController@enquiryStore')->name('front.enquiry.post');
Route::post('store2', 'Front\CareerController@enquiryStore2')->name('front.enquiry.post2');
Route::post('career', 'Front\CareerController@store')->name('front.career.post');
Route::get('contact', 'Front\ContactController@index')->name('front.contact');
Route::post('contact', 'Front\ContactController@store')->name('front.contact.post');




 
 

// Route::group(['prefix' => 'd2m-admin'], function() {
//     Route::get('/', 'Auth\LoginController@index')->name('admin.home');
// 	Route::get('auth', 'Auth\LoginController@showLoginForm')->name('admin.login');
// 	Route::post('authenticate', 'Auth\LoginController@login')->name('admin.login.post');
// 	Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout.get');

//    	Route::get('password/forget-password', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('admin.forgot');
//     Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('admin.forgetPassword.post');    
//     // seller reset password routes
//     Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
//     Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('admin.password.reset.post');
    
//     });

 


// Auth::routes();
// 	Route::get('/home', 'HomeController@index')->name('home');


// Route::prefix('admin')->group(function(){
// 	Route::get('/admin/login', 'Admin\Auth\LoginController@showLoginForm')->name('admin');
// 	Route::get('/admin/login', 'Admin\Auth\LoginController@login')->name('admin.login.submit');
// 	Route::get('/admin', 'Admin\AdminController@index')->name('admin');
	

// });





