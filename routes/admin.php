<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ProjectController,NewsletterController};
use App\Http\Controllers\admin\{SendEmailController,CategoryController,BlogController};

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin',  'middleware' => ['auth','Admin'] ], function () { 
    Route::get('mail'             , [SendEmailController::class , 'home'])      ->name('mail');
    Route::post('sendMail'        , [SendEmailController::class , 'sendMails']) ->name('sends.mails');
    Route::delete('sendMail/{id}' , [SendEmailController::class , 'destroy'])   ->name('mails.destroy');
    Route::get('project'          , [ProjectController::class   ,'getByHome'])  ->name('project.home');
    Route::get('project/{id}/edit', [ProjectController::class   ,'edit'])       ->name('project.edit');
    Route::delete('project/{id}'  , [ProjectController::class   ,'destroy'])    ->name('project.destroy');
    Route::get('project/create'   , [ProjectController::class   ,'create'])     ->name('project.create');
    Route::put('project/{id}'     , [ProjectController::class   ,'update'])     ->name('project.update');
    Route::post('project'         , [ProjectController::class   ,'store'])      ->name('project.store');
    Route::resource('categories'  , CategoryController::class);
});