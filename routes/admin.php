<?php
Route::get('/', 'Auth\LoginController@index')->name('admin.home');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('admin.login.form');
Route::post('login', 'Auth\LoginController@login')->name('admin.login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('admin.logout.get');
Route::group(['middleware' => 'admin'], function() {
    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::group(['prefix' => 'student'], function() {
        Route::get('add', 'StudentController@create')->name('admin.student.form');
        Route::get('{student}/view', 'StudentController@show')->name('admin.student.view');
        Route::get('{student}/edit', 'StudentController@edit')->name('admin.student.edit');
        Route::get('{student}/delete', 'StudentController@destroy')->name('admin.student.delete');
        Route::get('{student}/profileedit', 'StudentController@profileedit')->name('admin.student.profileedit');
        Route::get('{student}/totalfeeedit', 'StudentController@totalfeeedit')->name('admin.student.totalfeeedit');
        Route::post('{student}/totalfeeupdate', 'StudentController@totalfeeupdate')->name('admin.student.totalfeeupdate');
        Route::post('add', 'StudentController@store')->name('admin.student.post');
         Route::post('{student}/update', 'StudentController@update')->name('admin.student.update');
         Route::post('{student}/profileupdate', 'StudentController@profileupdate')->name('admin.student.profileupdate');

        Route::get('list', 'StudentController@index')->name('admin.student.list'); 
        Route::get('huda', 'StudentController@huda')->name('admin.student.huda');
        Route::get('jind', 'StudentController@jind')->name('admin.student.jind'); 
        Route::get('omax', 'StudentController@omax')->name('admin.student.omax'); 
        Route::get('{student}/password-reset', 'StudentController@passwordReset')->name('admin.student.passwordreset'); 
        Route::get('image/{image}', 'StudentController@image')->name('admin.student.image');
        Route::post('image/{student}/update', 'StudentController@imageUpdate')->name('admin.student.profilepic.update');
        Route::get('export', 'StudentController@excelData')->name('admin.student.excel');
        Route::post('import', 'StudentController@importStudent')->name('admin.student.excel.import');
        Route::group(['prefix' => 'receipt'], function() {
            Route::get('admission/{student}', 'StudentController@admissionReceipt')->name('admin.student.receipt.admission');
            Route::get('fee/{studentFee}', 'StudentController@feeReceipt')->name('admin.student.receipt.fee');
        });
        Route::group(['prefix' => 'fee'], function() {
            Route::post('pay', 'StudentController@payFee')->name('admin.student.fee.paid');
            Route::get('{studentFee}/edit', 'StudentController@studentFeeEdit')->name('admin.student.fee.edit');
            Route::get('{studentFee}/delete', 'StudentController@studentFeeDelete')->name('admin.student.fee.delete');
            Route::post('{studentFee}/update', 'StudentController@studentFeeUpdate')->name('admin.student.fee.update');
             Route::get('class-fees-form', 'StudentController@studentClassByFeeForm')->name('admin.student.class.fees.form');
              Route::get('class-fees-form-details', 'StudentController@studentClassByFeeFormDetails')->name('admin.student.class.fees.form.details');
             Route::post('class-fees-update', 'StudentController@studentClassByFeeUpdate')->name('admin.student.class.fees.update');
        });
    });
    Route::group(['prefix' => 'class'], function() {
        Route::get('/', 'ClassTypeController@index')->name('admin.class.list');        
        Route::get('search', 'ClassTypeController@search')->name('admin.class.search');
        Route::get('search2', 'ClassTypeController@search2')->name('admin.class.search2');
        Route::post('add', 'ClassTypeController@store')->name('admin.class.add');
        Route::get('{classType}/edit', 'ClassTypeController@edit')->name('admin.class.edit');
        Route::post('{classType}/update', 'ClassTypeController@update')->name('admin.class.update');
        Route::get('{classType}/delete', 'ClassTypeController@destroy')->name('admin.class.delete');
    });
    Route::group(['prefix' => 'section'], function() {
        Route::get('/', 'SectionController@index')->name('admin.section.list');
        Route::get('search', 'SectionController@search')->name('admin.section.search');
        Route::post('add', 'SectionController@store')->name('admin.section.add');
        Route::get('{sectionEdit}/edit', 'SectionController@edit')->name('admin.section.edit');
        Route::post('{section}/update', 'SectionController@update')->name('admin.section.update');
        Route::get('{section}/delete', 'SectionController@destroy')->name('admin.section.delete');        
    });
    Route::group(['prefix' => 'account'], function() {
        Route::group(['prefix' => 'class-fee'], function() {
             Route::get('/', 'ClassFeeController@index')->name('admin.account.classfee.list');
             Route::get('omax', 'ClassFeeController@omax')->name('admin.account.classfee.omax');
            Route::post('add', 'ClassFeeController@store')->name('admin.account.classfee.add');
            Route::get('{classFee}/edit', 'ClassFeeController@edit')->name('admin.account.classfee.edit');
            Route::post('{classFee}/update', 'ClassFeeController@update')->name('admin.account.classfee.update');
            Route::get('{classFee}/delete', 'ClassFeeController@destroy')->name('admin.account.classfee.delete');
        });
    });
    Route::group(['prefix' => 'attendance'], function() {
        Route::group(['prefix' => 'student'], function() {
            Route::get('/', 'StudentAttendanceController@index')->name('admin.attendance.student.form');
        });
    });
    Route::group(['prefix' => 'route'], function() {
        Route::get('search', 'TransportController@searchRoute')->name('admin.route.search');
    });
     // ------------------------transport-------------------------------------------
     Route::group(['prefix' => 'transpoprt'], function() {
        Route::get('add', 'TransportController@index')->name('admin.transport.list');
        Route::get('search', 'TransportController@search')->name('admin.transport.search');
        Route::post('add', 'TransportController@store')->name('admin.transport.post');
        Route::get('{transport}/edit', 'TransportController@edit')->name('admin.transport.edit');
        Route::get('{transport}/delete', 'TransportController@destroy')->name('admin.transport.delete');
        Route::post('{transport}/update', 'TransportController@update')->name('admin.transport.update');         
    });
      //------------------------Homework-------------------------------------------
     Route::group(['prefix' => 'homework'], function() {
        Route::get('add', 'HomeWorkController@create')->name('admin.homework.form');
        Route::post('add', 'HomeWorkController@store')->name('admin.homework.post');
        Route::get('list', 'HomeWorkController@index')->name('admin.homework.list');
        Route::get('search', 'HomeWorkController@search')->name('admin.homework.search');
        Route::get('{homework}/edit', 'HomeWorkController@edit')->name('admin.homework.edit');
        Route::post('{homework}/update', 'HomeWorkController@update')->name('admin.homework.update');
        Route::get('{homework}/delete', 'HomeWorkController@destroy')->name('admin.homework.delete');
        Route::get('{homework}/status', 'HomeWorkController@status')->name('admin.homework.status');

    });
     //------------------------Holiday Homework-------------------------------------------
     Route::group(['prefix' => 'holidayhomework'], function() {
        Route::get('add', 'HolidayHomeworkController@create')->name('admin.holidayhomework.form');
        Route::post('add', 'HolidayHomeworkController@store')->name('admin.holidayhomework.post');
        Route::get('list', 'HolidayHomeworkController@index')->name('admin.holidayhomework.list');
        Route::get('search', 'HolidayHomeworkController@search')->name('admin.holidayhomework.search');
        // Route::get('{holidayhomework}/show', 'HolidayHomeworkController@show')->name('admin.holidayhomework.show');
        Route::get('download/{holidayhomework}', 'HolidayHomeworkController@download')->name('admin.holidayhomework.download');


        Route::get('{holidayhomework}/edit', 'HolidayHomeworkController@edit')->name('admin.holidayhomework.edit');
        Route::post('{holidayhomework}/update', 'HolidayHomeworkController@update')->name('admin.holidayhomework.update');
        Route::get('{holidayHomework}/delete', 'HolidayHomeworkController@destroy')->name('admin.holidayhomework.delete');
    });
      //------------------------Holiday Homework Front-------------------------------------------
      Route::group(['prefix' => 'holidayhomeworkFront'], function() {
         Route::get('add', 'HolidayHomeworkFrontController@create')->name('admin.holidayhomeworkFront.form');
         Route::post('add', 'HolidayHomeworkFrontController@store')->name('admin.holidayhomeworkFront.post');
         Route::get('list', 'HolidayHomeworkFrontController@index')->name('admin.holidayhomeworkFront.list');
         Route::get('search', 'HolidayHomeworkFrontController@search')->name('admin.holidayhomeworkFront.search');
         // Route::get('{holidayhomeworkFront}/show', 'HolidayHomeworkFrontController@show')->name('admin.holidayhomeworkFront.show');
         Route::get('download/{holidayhomeworkFront}', 'HolidayHomeworkFrontController@download')->name('admin.holidayhomeworkFront.download');


         Route::get('{holidayhomeworkFront}/edit', 'HolidayHomeworkFrontController@edit')->name('admin.holidayhomeworkFront.edit');
         Route::post('{holidayhomeworkFront}/update', 'HolidayHomeworkFrontController@update')->name('admin.holidayhomeworkFront.update');
         Route::get('delete/{holidayHomeworkFront}', 'HolidayHomeworkFrontController@destroy')->name('admin.holidayhomeworkFront.delete');
     });
       //------------------------Datesheet-------------------------------------------
     Route::group(['prefix' => 'datesheet'], function() {
        Route::get('add', 'DatesheetController@create')->name('admin.datesheet.form');
        Route::post('add', 'DatesheetController@store')->name('admin.datesheet.post');
        Route::get('list', 'DatesheetController@index')->name('admin.datesheet.list');
        Route::get('search', 'DatesheetController@search')->name('admin.datesheet.search');
        Route::get('{datesheet}/edit', 'DatesheetController@edit')->name('admin.datesheet.edit');
        Route::get('{datesheet}/show', 'DatesheetController@show')->name('admin.datesheet.show');

        Route::post('{datesheet}/update', 'DatesheetController@update')->name('admin.datesheet.update');
        Route::get('{datesheet}/delete', 'DatesheetController@destroy')->name('admin.datesheet.delete');
    });
       //------------------------Eventcalender-------------------------------------------
     Route::group(['prefix' => 'eventcalender'], function() {
        Route::get('add', 'EventcalenderController@create')->name('admin.eventcalender.form');
        Route::post('add', 'EventcalenderController@store')->name('admin.eventcalender.post');
        Route::get('list', 'EventcalenderController@index')->name('admin.eventcalender.list');
        Route::get('search', 'EventcalenderController@search')->name('admin.eventcalender.search');
        Route::get('{eventcalender}/edit', 'EventcalenderController@edit')->name('admin.eventcalender.edit');
        Route::get('{eventcalender}/show', 'EventcalenderController@show')->name('admin.eventcalender.show');

        Route::post('{eventcalender}/update', 'EventcalenderController@update')->name('admin.eventcalender.update');
        Route::get('{eventcalender}/delete', 'EventcalenderController@destroy')->name('admin.eventcalender.delete');
    });
       //------------------------Sullabus-------------------------------------------
     Route::group(['prefix' => 'sullabus'], function() {
        Route::get('add', 'SyllabusController@create')->name('admin.syllabus.form');
        Route::post('add', 'SyllabusController@store')->name('admin.syllabus.post');
        Route::get('list', 'SyllabusController@index')->name('admin.syllabus.list');
        Route::get('search', 'SyllabusController@search')->name('admin.syllabus.search');
        Route::get('{syllabus}/edit', 'SyllabusController@edit')->name('admin.syllabus.edit');
        // Route::get('{syllabus}/show', 'SyllabusController@show')->name('admin.syllabus.show');
         Route::get('download/{syllabus}', 'SyllabusController@download')->name('admin.syllabus.download');

        Route::post('{syllabus}/update', 'SyllabusController@update')->name('admin.syllabus.update');
        Route::get('{syllabus}/delete', 'SyllabusController@destroy')->name('admin.syllabus.delete');
    });
     //------------------------Attendace-------------------------------------------
    Route::group(['prefix' => 'attendance'], function() {
        Route::group(['prefix' => 'student'], function() {
            Route::get('/', 'StudentAttendanceController@index')->name('admin.attendance.student.form');
            Route::post('search', 'StudentAttendanceController@search')->name('admin.attendance.student.search');
            Route::post('add', 'StudentAttendanceController@store')->name('admin.attendance.student.save');
            Route::get('{attendance}/edit', 'StudentAttendanceController@edit')->name('admin.attendance.student.edit');
            Route::post('{attendance}update', 'StudentAttendanceController@update')->name('admin.attendance.student.update');
            Route::get('{attendance}/delete', 'StudentAttendanceController@destroy')->name('admin.attendance.student.delete');
        });
    });
    
     Route::group(['prefix' => 'news'], function() {
        // Route::get('new', 'NewsController@index')->name('admin.news.n');
        Route::get('list', 'NewsController@index')->name('admin.news.list');        
        Route::post('new', 'NewsController@store')->name('admin.news.post');        
        Route::get('edit/{news}', 'NewsController@edit')->name('admin.news.edit');
        Route::put('update/{news}', 'NewsController@update')->name('admin.news.update');
        Route::delete('delete/{news}', 'NewsController@destroy')->name('admin.news.delete');
      }); 
           Route::group(['prefix' => 'notice'], function() {
        // Route::get('new', 'NewsController@index')->name('admin.news.n');
        Route::get('notic', 'NoticeController@index')->name('admin.notice.list');        
        Route::post('notics', 'NoticeController@store')->name('admin.notice.post');        
        Route::get('edit/{notice}', 'NoticeController@edit')->name('admin.notice.edit');
        Route::put('update/{notice}', 'NoticeController@update')->name('admin.notice.update');
        Route::delete('delete/{notice}', 'NoticeController@destroy')->name('admin.notice.delete');
      }); 

     //------------------------Birthday sms-------------------------------------------
    Route::group(['prefix' => 'birthday'], function() {
        Route::group(['prefix' => 'student'], function() {
            Route::get('list', 'DashboardController@birthday')->name('admin.birthday.list');
        });
    });
         //------------------------contact-------------------------------------------
    Route::group(['prefix' => 'contact'], function() {
        
            Route::get('list', 'ContactController@index')->name('admin.contact.list');
            Route::get('delete/{contact}', 'ContactController@destroy')->name('admin.contact.delete');

       
    });
          //------------------------contact-------------------------------------------
    Route::group(['prefix' => 'enquiry'], function() {
        
            Route::get('list', 'ContactController@enquiry')->name('admin.enquiry.list');
            Route::get('delete/{enquiry}', 'ContactController@enquirydestroy')->name('admin.enquiry.delete');

       
    });
      //------------------------ Sms-------------------------------------------
     Route::group(['prefix' => 'sms'], function() {
         Route::group(['prefix' => 'homework'], function() {
             Route::get('/', 'SmsController@homeworkForm')->name('admin.sms.homework.form');
             Route::post('/', 'SmsController@homeworkSend')->name('admin.sms.homework.post');
             Route::get('homeworksms', 'SmsController@homeworksms')->name('admin.homework.sms');

         });
          Route::group(['prefix' => 'customized'], function() {
            Route::get('/', 'SmsController@customizedForm')->name('admin.sms.customized.form');       

            Route::post('search', 'SmsController@search')->name('admin.sms.student.search');             
            Route::post('/', 'SmsController@customizedsms')->name('admin.sms.customized.post');

         });
           Route::group(['prefix' => 'classsms'], function() {
            Route::get('/', 'SmsController@classsmsForm')->name('admin.sms.classsms.form');
            Route::post('/', 'SmsController@classsms')->name('admin.sms.classsms.post');

         });
            Route::group(['prefix' => 'allsms'], function() {
            Route::get('/', 'SmsController@allsmsForm')->name('admin.sms.allsms.form');               
            Route::post('/', 'SmsController@allsms')->name('admin.sms.allsms.post');   
         });
         Route::group(['prefix' => 'sms'], function() {
            Route::get('/', 'SmsController@smsForm')->name('admin.sms.form');               
            Route::post('/', 'SmsController@smsSend')->name('admin.sms.post');   
         });
          Route::group(['prefix' => 'onlyclass'], function() {
            Route::get('/', 'SmsController@onlyclassForm')->name('admin.onlyclass.form');               
            Route::post('/', 'SmsController@onlyclass')->name('admin.onlyclass.post');   
         });

     });
      //------------------------ Gallery-------------------------------------------
     Route::group(['prefix' => 'gallery'], function() {         
         Route::get('/', 'GalleryController@index')->name('admin.gallery.list');
         Route::post('upload', 'GalleryController@store')->name('admin.gallery.post');
         Route::get('delete/{gallery}', 'GalleryController@destroy')->name('admin.gallery.delete');
        
     });
        //------------------------ Slider-------------------------------------------
     Route::group(['prefix' => 'slider'], function() {         
         Route::get('/', 'SliderController@index')->name('admin.slider.list');
         Route::post('upload', 'SliderController@store')->name('admin.slider.post');
         Route::get('delete/{slider}', 'SliderController@destroy')->name('admin.slider.delete');
        
     });
      //------------------------ Gallery-------------------------------------------
     Route::group(['prefix' => 'gallery-category'], function() {         
         Route::get('/', 'GalleryCategoryController@index')->name('admin.gallery-category.list');
         Route::post('store', 'GalleryCategoryController@store')->name('admin.gallery-category.post');
         Route::get('edit/{galleryCategory}', 'GalleryCategoryController@edit')->name('admin.gallery-category.edit');                  
         Route::post('update', 'GalleryCategoryController@update')->name('admin.gallery-category.update');
         Route::get('delete/{galleryCategory}', 'GalleryCategoryController@destroy')->name('admin.gallery-category.delete');
        
     });
        //------------------------ Circular-------------------------------------------
     Route::group(['prefix' => 'circular'], function() {         
         Route::get('list', 'CircularController@index')->name('admin.circular.list');
         Route::get('from', 'CircularController@show')->name('admin.circular.form');         
         Route::post('/', 'CircularController@store')->name('admin.curcular.post');
         Route::get('edit/{circular}', 'CircularController@edit')->name('admin.circular.edit');                  
         Route::post('update/{circular}', 'CircularController@update')->name('admin.circular.update');
         Route::get('delete/{circular}', 'CircularController@destroy')->name('admin.circular.delete');
                
        
     });
        //------------------------ Promote-------------------------------------------
     Route::group(['prefix' => 'promote'], function() {         
         Route::get('form', 'PromoteController@index')->name('admin.promote.form');
         Route::get('list', 'PromoteController@slist')->name('admin.promote.list');
         Route::get('classBy', 'PromoteController@classBy')->name('admin.promote.classBy');
         Route::post('store', 'PromoteController@store')->name('admin.promote.store');
         Route::post('student-list', 'PromoteController@studentList')->name('admin.promote.student');
         Route::post('promote-list', 'PromoteController@promoteList')->name('admin.promote.student.list');
         Route::post('student-list2', 'PromoteController@studentList2')->name('admin.promote.student2');
         Route::get('search', 'PromoteController@search')->name('admin.promote.search'); 
     });
           //------------------------ Transfer-------------------------------------------
     Route::group(['prefix' => 'transfer'], function() {         
         Route::get('form', 'TransferController@index')->name('admin.transfer.form');
         Route::post('store', 'TransferController@store')->name('admin.transfer.store');
         Route::post('student-list', 'TransferController@studentList')->name('admin.transfer.student');
         Route::get('search', 'TransferController@search')->name('admin.transfer.search'); 
     });
          //------------------------ remark-------------------------------------------
         Route::get('remarks', 'RemarksController@index')->name('admin.remarks.list');
         Route::get('reply/{remark}', 'RemarksController@show')->name('admin.replyRemark.show');
         Route::get('view/{remark}', 'RemarksController@view')->name('admin.replyRemark.view');
         Route::post('store/{remark}', 'RemarksController@store')->name('admin.replyRemark.post');
     
});
