<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ProjectController,NewsletterController,LanguageController};
use App\Http\livewire\{Projects};


/*
|--------------------------------------------------------------------------
| Home Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/'                      , [ProjectController::class,'home'])            ->name('home');
Route::get('project'                , [ProjectController::class,'index'])           ->name('project.index');
Route::get('project/{id}/{slug}'    , [ProjectController::class,'show'])            ->name('project.show');
Route::post('newsletters'           , [NewsletterController::class ,'newsletters']) ->name('newsletter.store');
Route::get('lang/{lang}'            , [LanguageController::class ,'switchLang'])    ->name('lang.switch');
Route::post('/search'               , [ProjectController::class,'search'])          ->name('search.froms');
Route::post('review'                , [ProjectController::class, 'store'])          ->name('review.store');
Route::fallback(function()          { return view('errors.404');});
Route::get('/403'                   , function(){ return view('errors.403');});
