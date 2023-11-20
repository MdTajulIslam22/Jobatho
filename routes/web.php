<?php

use App\Models\listings;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;
use App\Http\Controllers\listingsController;
use App\Http\Controllers\usersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


#routing for index page
// Route::get('/', function () {
//     return view('listings', [
//         'heading'=> 'heading of listing',
//         'listings' => listings::all()
//     ]);
// });


#single posting using model function
// Route::get('/post/{id}', function($id){
//     return view('posting',[
//         'postings' => listings::find($id)
//     ]);
// });

#route model binging
// Route::get('/post/{listings}', function (listings $listings) {
//     return view('posting',[
//         'postings' => $listings
//     ]);
// });





// --------------------------------------------------------------------
#user section routings
// --------------------------------------------------------------------
#show registration form
Route::get('/register', [usersController::class, 'create'])->middleware('guest');

#create new user/registration
Route::post('/user', [usersController::class, 'store']);

#user log out
Route::post('/logout', [usersController::class, 'logout'])->middleware('auth');

#show log-in form
Route::get('/enter', [usersController::class, 'enter'])->name('login')->middleware('guest');

#user log-in
Route::post('/user/login', [usersController::class, 'login']);







// --------------------------------------------------------------------
#listings routings
// --------------------------------------------------------------------

#routing with controller
Route::get('/', [listingsController::class, 'index']);

#routing for create job post
Route::get('/listings/create', [listingsController::class, 'create'])->middleware('auth');

#store listings data
Route::post('/listings', [listingsController::class, 'store'])->middleware('auth');

#show edit form
Route::get('/listings/{listings}/edit',  [listingsController::class, 'edit'])->middleware('auth');

#update listings
Route::put('/listings/{listings}', [listingsController::class, 'update'])->middleware('auth');

#delete listings
Route::delete('/listings/{listings}', [listingsController::class, 'delete'])->middleware('auth');

#manage litings
Route::get('listings/manage', [listingsController::class, 'manage'])->middleware('auth');



#routing single listing/post with controller
Route::get('/post/{listings}', [listingsController::class, 'show']);


Route::get('/config-cache', function () {

    $exitCode = Artisan::call('cache:clear');

    return 'Config cache cleared';
});
