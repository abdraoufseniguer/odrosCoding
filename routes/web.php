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
// admin login
Route::post('/admin/store','adminController@admin_store')->name('admin_store');
Route::get('/admin/login','adminController@admin_login')->name('admin_login');

// the index page
Route::get('/','indexController@index')->name('index');
Route::get('/viewCourseDetaills/{course}','indexController@viewCourseDetaills')->name('viewCourseDetaills');
//admin routes
    
    //admin courses adminstration
    Route::get('/admin','adminController@administration')->name('courses_administration');
    // admin categroy management
    Route::get('/admin/categories_management','adminController@categories_management')->name('categories_management');
    Route::post('/admin/category_update/{id}','adminController@category_update')->name('category_update');
    Route::delete('/admin/category_delete/{id}','adminController@category_delete')->name('category_delete');
    Route::put('/admin/category_create','adminController@category_create')->name('category_create');
    Route::get('/admin/demandeConfirmation/{id}','adminController@demandeConfirmation')->name('demande_confirmation');
    // admin instructor management
    Route::get('/admin/instructor_managements','adminController@instructors_management')->name('instructor_management');
    Route::get('/admin/instructor_managements/profile/{id}','adminController@instructors_profile')->name('instructor_profile');
    Route::delete('/admin/instructor_managements/destroy/{id}','adminController@instructors_destroy')->name('instructor_destroy');
    // admin student management
    Route::get('/admin/students_management','adminController@students_management')->name('students_management');
    Route::delete('/admin/students_management/destroy/{id}','adminController@student_destroy')->name('student_destroy');

//admin routes

//student routes
Route::PUT('/student/profile/image/{student}','StudentController@ProfileImage')->name('student.profile.image');
Route::get('/student','StudentController@Dash')->name('dash')->middleware('auth');
Route::get('/student/profile/{id}','StudentController@Profile')->name('student.profile')->middleware('auth');
Route::post('/student/profile/update/{student}','StudentController@ProfileUpdate')->name('student.profile.update');
Route::get('/student/notifications/{student}','StudentController@studentNotifications')->name('student.notifications');
Route::get('/student/additionalVideosAnswer/{student}','StudentController@studentVideosAnswer')->name('student.VideosAnswer');
Route::get('/student/myCourses/{student}','StudentController@studentCourses')->name('student.Courses');
Route::get('/student/{course}/viewCourse','StudentController@viewCourse')->name('student.viewCourse');
Route::get('/student/cartView/{student}','StudentController@cartView')->name('student.cartView');
Route::get('/student/checkout/{student}/{total}','StudentController@checkout')->name('student.checkout');
Route::get('/student/addToCart/{student}/{course}','StudentController@checkout')->name('student.addToCart');
Route::get('/student/viewCourseDetaills/{course}','StudentController@viewCourseDetaills')->name('student.viewCourseDetaills');
Route::get('/student/logout','StudentController@logout')->name('student.logout');
Route::get('/student/courseSearch','StudentController@courseSearch')->name('student.courseSearch');
Route::get('/student/loadAssignment/{id}','StudentController@loadingAssignment')->name('loadingAssignment');
Route::post('/student/loadAssignmentAnswer/{courseId}/{instructorId}','StudentController@loadingAssignmentAnswer')->name('loadingAssignmentAnswer');
Route::get('/student/aditional_video_loader/{reply}','StudentController@aditional_video_loader')->name('aditional_video_loader');
Route::get('/student/courseGallery','StudentController@courseGallery')->name('student.courseGallery'); 
// instructor routes
Route::get('/instructor','instructorController@instructorDash')->name('instructorDash')->middleware('auth');
// courset creation
Route::get('/instructor/courseCreation','instructorController@courseCreation')->name('instructor.create_course')->middleware('auth');
Route::post('/instructor/courseTitleStore','instructorController@courseTitleStore')->name('instructor.course_title')->middleware('auth');
Route::get('/instructor/courseCategory/{courseName}','instructorController@courseCategory')->name('instructor.course_category')->middleware('auth');
Route::get('/instructor/courseDelete/{course}','instructorController@CourseDelete')->name('instructo.courses_delete')->middleware('auth');
Route::post('/instructor/courseCategoryStore/{courseName}','instructorController@courseCategoryStore')->name('instructor.course_Category_store')->middleware('auth');
Route::post('/instructor/courseDescriptionStore/{course}','instructorController@courseDescriptionStore')->name('instructor.course_description_store')->middleware('auth');
Route::post('/instructor/courseRequirementStore/{course}','instructorController@courseRequiremnetStore')->name('instructor.course_requirement_store')->middleware('auth');
Route::post('/instructor/courseAttachementStore/{course}','instructorController@courseAttachementStore')->name('instructor.course_attachement_store')->middleware('auth');
Route::get('/instructor/courseMoreInfo/{course}','instructorController@courseMoreInfo')->name('instructor.course_more_info')->middleware('auth');
Route::get('/instructor/courseEdite/{course}','instructorController@CourseEdit')->name('instructo.courses_edit')->middleware('auth');
Route::post('/sectionNameChange/{course}/{coursesection}','instructorController@sectionNameChange')->name('instructor.sectionNameChange')->middleware('auth');
Route::post('/instructor/courseEdite/addingLecture/{coursesection}','instructorController@addingLecture')->name('instructor.addingLecture')->middleware('auth');
// about instructor
Route::get('/instructor/aboutInstructor','instructorController@aboutInstructor')->name('instructor.about.dash')->middleware('auth');
Route::post('/instructor/aboutInstructor/addingExperience','instructorController@InstructorExp')->name('instructor.exp')->middleware('auth');
Route::post('/instructor/aboutInstructor/addingCertification','instructorController@InstructorCtr')->name('instructor.crt')->middleware('auth');
// instructot communication 
Route::get('/instructor/instructorCommunication','instructorController@instructorCommunication')->name('instructor.communication.dash')->middleware('auth');
Route::post('/instructor/instructorCommunication/assAnswerMark/{id}','instructorController@assAnswerMark')->name('instructor.assAnswerMark')->middleware('auth');
Route::post('/instructor/instructorCommunication/addAssinment','instructorController@addAssinment')->name('instructor.addAssinment')->middleware('auth');
Route::post('/instructor/instructorCommunication/addAnnouncement','instructorController@addAnnouncement')->name('instructor.addAnnouncement')->middleware('auth');
Route::post('/instructor/instructorCommunication/refuseAddVideo/{request}','instructorController@refuseAddVideo')->name('instructor.refuseAddVideo')->middleware('auth');
Route::post('/instructor/instructorCommunication/sendVidRep/{id}/{id1}','instructorController@sendVidRep')->name('instructor.sendVidRep')->middleware('auth');
// instructor performance
Route::get('/instructor/instructorPerformance','instructorController@instructorPerformance')->name('instructor.performance.dash')->middleware('auth');
// auth routes 
Auth::routes();

