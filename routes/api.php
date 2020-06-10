<?php

use App\Http\Controllers\AddFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//endpoint to add page
Route::post('/add_page', 'AddPageController')->name('add');
//endpoint to list pages
Route::get('/list_pages', 'ListPagesController')->name('list');
//endpoint to retrieve a page html
Route::get('/retrieve_page', 'RetrieveHTMLController')->name('page');

