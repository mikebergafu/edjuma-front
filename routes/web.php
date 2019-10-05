<?php
header('Cache-Control: no-cache, must-revalidate');
header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');


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

Route::get('/', 'WelcomeController@index')->name('welcome');
Route::post('/search', 'WelcomeController@search')->name('search');


Auth::routes();

Route::get('home/', 'HomeController@index')->name('home');
Route::get('edjuma/logout','HomeController@logout')->name('elogout');
//User
Route::post('users/register','UserController@store')->name('users.register');


//Corporate
Route::get('/corporate/code/form', 'CorporateController@create')->name('corporate.code.form');
Route::post('/corporate/get/code', 'CorporateController@store')->name('corporate.code.get');

//Jobs
Route::get('jobs/list', 'JobController@index')->name('jobs.list');
Route::get('jobs/form', 'JobController@create')->name('jobs.add.form');
Route::post('jobs/store', 'JobController@store')->name('jobs.store');
Route::delete('jobs/delete/{id}', 'JobController@destroy')->name('jobs.delete');
Route::get('jobs/category/list', 'JobCategoryController@index')->name('jobs.category.list');
Route::get('jobs/category/list/auth/{category}/{uuid}', 'JobController@getJobsByCategory')->name('jobs.by.category');
Route::get('jobs/category/list/{category}/{uuid}', 'FreeViewController@getJobsByCategory')->name('free.jobs.by.category');

//Poster Controller
Route::get('jobs/posters/{uuid}/jobs', 'PosterController@index')->name('my.job.postings');
Route::get('jobs/posters/{uuid}/applicants', 'PosterController@getMyApplicants')->name('my.jobs.applicants');
Route::get('jobs/posters/job/applicants/{job_id}', 'PosterController@getThisJobsApplicants')->name('this.jobs.applicants');
Route::get('jobs/posters/delete/{job_id}', 'PosterController@destroy')->name('delete.jobs');

Route::get('jobs/applicant/job/pro/status/{id}', 'ProController@showProDetails')->name('this.pro.status');


//Apply Jobs
Route::get('apply/jobs/list', 'ApplyJobController@index')->name('apply.jobs.list');
Route::get('apply/jobs/{job}', 'ApplyJobController@store')->name('jobs.apply.form');
//Route::post('apply/jobs/store', 'ApplyJobController@store')->name('jobs.store');
Route::delete('apply/jobs/delete/{id}', 'ApplyJobController@destroy')->name('jobs.delete');
Route::get('jobs/{user}/applied/jobs/{uuid}', 'JobController@getMyJobs')->name('my.jobs.applied');

//Route::get('jobs/applied/jobs/{uuid}/{job}', 'JobController@getThisJobsApplicants')->name('this.jobs.applicants');

//Resume
Route::get('jobs/{user}/resumes/{uuid}', 'ResumeController@index')->name('resumes.index');
Route::get('jobs/resume/page/{uuid}', 'ResumeController@create')->name('resume.form');
Route::post('jobs/add/resume/{uuid}', 'ResumeController@store')->name('resume.store');
Route::post('jobs/edit/resume/{resume}/{uuid}', 'ResumeController@edit')->name('resume.edit');

//Get Resume by applicant id
Route::get('jobs/applicant/{user_id}/resumes/{uuid}', 'PosterController@getApplicantResume')->name('applicant.resumes');
//Shortlists an applicant
Route::get('jobs/applicant/checkshortlist/{job_id}/{applicant_id}', 'PosterController@setShortlist')->name('applicant.set.shortlist');
Route::get('jobs/applicant/shortlist/{job_id}/{applicant_id}', 'PosterController@setShortlist')->name('applicant.set.shortlist');
Route::get('jobs/applicant/get/shortlist/{job_id}', 'PosterController@getShortlist')->name('applicant.get.shortlist');
Route::get('jobs/applicant/set/hired/{job_id}/{applicant_id}', 'PosterController@setHired')->name('applicant.set.hired');
Route::get('jobs/applicant/get/hired/{job_id}', 'PosterController@getHired')->name('applicant.get.hired');

//Edjuma Pro
Route::get('jobs/pro/applicant/docs/upload/{uuid}', 'ProController@index')->name('pro.docs.upload');
Route::post('jobs/pro/applicant/docs/upload/{uuid}/new', 'ProController@store')->name('pro.docs.store');

//Contacts
Route::get('edjuma/contacts/{id}/index/{uuid}', 'ContactController@index')->name('contacts.add.form');
Route::post('edjuma/contacts/{id}/index/{uuid}/add', 'ContactController@store')->name('contacts.add.add');

Route::get('home/jobs/{uuid}', 'FreeViewController@index')->name('home.jobs');

//Payment Test
Route::get('edjuma/payment/test', 'PaymentControler@index')->name('pay.test');
Route::get('edjuma/payment/makepayment', 'PaymentControler@makePayment')->name('pay.makepayment');
Route::get('edjuma/payment/checkpayment', 'PaymentControler@checkPaymentStatus')->name('pay.checkpayment');
Route::get('edjuma/image/test', 'ProController@showImage')->name('image.test');


