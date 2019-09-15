<?php
Route::get('/', 'DashboardController@index')->name('student.dashboard');
 
Route::get('/', 'Auth\LoginController@index')->name('student.home');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('student.login.form');
Route::post('login', 'Auth\LoginController@login')->name('student.login.post');
//------------------------------------password reset--------------------------
Route::get('forget-password', 'Auth\ForgotPasswordController@showResetForm')->name('student.forgetpassword.form');
Route::post('send-password', 'Auth\ForgotPasswordController@passwordSend')->name('student.send-password.post');
Route::get('logout', 'Auth\LoginController@logout')->name('student.logout.get');
Route::group(['middleware' => 'student'], function() {
    Route::get('dashboard', 'DashboardController@index')->name('student.dashboard');
    Route::group(['prefix' => 'student'], function() {
        Route::get('add', 'StudentController@create')->name('student.student.form');
        Route::get('view', 'StudentController@index')->name('student.view');
         Route::get('image/{image}', 'StudentController@image')->name('student.student.image');
        

        Route::post('image/{student}/update', 'StudentController@imageUpdate')->name('student.student.profilepic.update');
        // Route::get('view', 'StudentController@show')->name('student.view');

        // Route::get('{student}/edit', 'StudentController@edit')->name('student.student.edit');
        // Route::post('add', 'StudentController@store')->name('student.student.post');
        // Route::get('list', 'StudentController@index')->name('student.student.list');

    });
    Route::group(['prefix' => 'password'], function() {         
        Route::get('/', 'ProfileController@index')->name('student.password.change');
        Route::put('/update', 'ProfileController@update')->name('student.changepassword.update');
    });
    // ------------------------transport-------------------------------------------
     Route::group(['prefix' => 'attendance'], function() {
         
        Route::get('view', 'StudentAttendanceController@index')->name('student.attendance.view');         
    });
     //------------------------news-------------------------------------------

     Route::group(['prefix' => 'news'], function() {
        
        Route::get('list', 'NewsController@index')->name('student.news.list');        
   
      });
     
     //------------------------Homework-------------------------------------------
     Route::group(['prefix' => 'homework'], function() {       
        Route::get('list', 'HomeWorkController@index')->name('student.homework.list');
       
        Route::get('{homework}/view', 'HomeWorkController@show')->name('student.homework.view');
         
    });
      Route::group(['prefix' => 'holidayhomework'], function() {         
        Route::get('list', 'HolidayHomeworkController@index')->name('student.holidayhomework.list');
        // Route::get('{download}/download', 'HolidayHomeworkController@download')->name('student.holidayhomework.download');
         Route::get('download/{holidayhomework}', 'HolidayHomeworkController@download')->name('student.holidayhomework.download');

        Route::get('{holidayhomework}/show', 'HolidayHomeworkController@show')->name('student.holidayhomework.show');
    });
       Route::group(['prefix' => 'eventcalender'], function() {         
        Route::get('list', 'EventcalenderController@index')->name('student.eventcalender.list');
        Route::get('{download}/download', 'EventcalenderController@download')->name('student.eventcalender.download');
        Route::get('{eventcalender}/show', 'EventcalenderController@show')->name('student.eventcalender.show');
    });
        Route::group(['prefix' => 'datesheet'], function() {         
        Route::get('list', 'DatesheetController@index')->name('student.datesheet.list');
        Route::get('{download}/download', 'DatesheetController@download')->name('student.datesheet.download');
        Route::get('{datesheet}/show', 'DatesheetController@show')->name('student.datesheet.show');
    });
         Route::group(['prefix' => 'syllabus'], function() {         
        Route::get('list', 'SyllabusController@index')->name('student.syllabus.list');
        // Route::get('{download}/download', 'SyllabusController@download')->name('student.syllabus.download');
         Route::get('download/{syllabus}', 'SyllabusController@download')->name('student.syllabus.download');

        Route::get('{syllabus}/show', 'SyllabusController@show')->name('student.syllabus.show');
    });
          Route::group(['prefix' => 'feedetails'], function() {
         
        Route::get('list', 'StudentController@feedetails')->name('student.feedetails.list');
     
         
    });
    Route::group(['prefix' => 'remarks'], function(){
      Route::get('/', 'RemarksController@index')->name('student.remarks.list'); 
      Route::post('store', 'RemarksController@store')->name('student.remarks.post');
      Route::get('delete/{remark}', 'RemarksController@destroy')->name('student.remarks.delete'); 
       Route::get('reply/{remark}', 'RemarksController@show')->name('student.replyRemark.show');

 
    });
        //------------------------Calender-------------------------------------------     
        
        Route::get('calendar', 'FullController@index')->name('student.calender.calendar'); 
        Route::get('result', 'ResultController@index')->name('student.result.list');
        Route::get('communicate', 'CommController@index')->name('student.communicate.list'); 
        Route::get('circular', 'CircularController@index')->name('student.circular.list');  
        Route::get('gallery', 'GalleryController@index')->name('student.gallery.list');  

        Route::get('list', 'MesageController@index')->name('student.sms.list'); 
        Route::get('show/{mesage}', 'MesageController@show')->name('student.sms.show'); 

         
     
});   
     
   
  
