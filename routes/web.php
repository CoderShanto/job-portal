<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\admin\JobApplicationController;
use App\Http\Controllers\admin\JobController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\JobsController;


/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/jobs', [JobsController::class, 'index'])->name('jobs');
Route::get('/jobs/detail/{id}', [JobsController::class, 'detail'])->name('jobDetail');
Route::post('/apply-job', [JobsController::class, 'applyJob'])->name('applyJob');
Route::post('/save-job', [JobsController::class, 'saveJob'])->name('saveJob');
Route::get('/forgot-password', [AccountController::class, 'forgotPassword'])->name('account.forgotPassword');
Route::post('/process-forgot-password', [AccountController::class, 'processForgotPassword'])->name('account.processForgotPassword');
Route::get('/reset-password/{token}', [AccountController::class, 'resetPassword'])->name('account.resetPassword');
Route::post('/process-reset-password', [AccountController::class, 'processResetPassword'])->name('account.processResetPassword');

Route::middleware('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/users', [UserController::class, 'index'])->name('admin.users');
     Route::get('/users/{id}', [UserController::class, 'edit'])->name('admin.users.edit');
     Route::post('/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
     Route::delete('/users', [UserController::class, 'destroy'])->name('admin.users.destroy');
      Route::get('/admin/jobs', [JobController::class, 'index'])->name('admin.jobs');
      Route::get('/admin/jobs/edit/{id}', [JobController::class, 'edit'])->name('admin.jobs.edit');
      Route::post('/admin/jobs/{id}', [JobController::class, 'update'])->name('admin.jobs.update');
      Route::delete('/admin/jobs', [JobController::class, 'destroy'])->name('admin.jobs.destroy');
       Route::get('/admin/job-applications', [JobApplicationController::class, 'index'])->name('admin.jobApplication');
       Route::delete('/admin/job-applications', [JobApplicationController::class, 'destroy'])->name('admin.jobApplication.destroy');

     

});

Route::middleware('guest.to.profile')->group(function () {
    Route::get('/account/register', [AccountController::class, 'registration'])->name('account.registration');
    Route::post('/account/process-register', [AccountController::class, 'processRegistration'])->name('account.processRegistration');
    Route::get('/account/login', [AccountController::class, 'login'])->name('account.login');
    Route::post('/account/authenticate', [AccountController::class, 'authenticate'])->name('account.authenticate');
});

Route::middleware('custom.auth')->group(function () {
    Route::get('/account/profile', [AccountController::class, 'profile'])->name('account.profile');
    Route::post('/account/update-profile', [AccountController::class, 'updateProfile'])->name('account.updateProfile');

    Route::get('/account/logout', [AccountController::class, 'logout'])->name('account.logout');
     Route::post('/account/update-profile-pic', [AccountController::class, 'updateProfilePic'])->name('account.updateProfilePic');
     Route::get('/account/create-job', [AccountController::class, 'createJob'])->name('account.createJob');
    Route::post('/account/save-job', [AccountController::class, 'saveJob'])->name('account.saveJob');
    Route::get('/account/my-jobs', [AccountController::class, 'myJobs'])->name('account.myJobs');
    Route::get('/account/my-jobs/edit/{jobId}', [AccountController::class, 'editJob'])->name('account.editJob');
     Route::post('/account/update-job{jobId}', [AccountController::class, 'updateJob'])->name('account.updateJob');
     Route::post('/account/delete-job', [AccountController::class, 'deleteJob'])->name('account.deleteJob');
     Route::get('/account/my-job-applications', [AccountController::class, 'myJobApplications'])->name('account.myJobApplications');
      Route::post('/account/remove-job-application', [AccountController::class, 'removeJobs'])->name('account.removeJobs');
      Route::get('/account/saved-jobs', [AccountController::class, 'savedJobs'])->name('account.savedJobs');
       Route::post('/account/remove-saved-job', [AccountController::class, 'removeSavedJob'])->name('account.removeSavedJob');
       Route::post('/account/update-password', [AccountController::class, 'updatePassword'])->name('account.updatePassword');


});


