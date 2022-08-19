<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BookingController;
use App\Http\Controllers\Backend\DoctorController;
use App\Http\Controllers\Backend\ExpertiseController;
use App\Http\Controllers\Frontend\DoctorsController as FrontendDoctorsController;
use App\Http\Controllers\Frontend\ExpertisesController as FrontendExpertisesController;
use App\Http\Controllers\Frontend\BookingsController as FrontendBookingsController;



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

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/doctors',[FrontendDoctorsController::class, 'index'])->name('doctors.home');
Route::post('/appointment',[FrontendBookingsController::class, 'addBooking'])->name('bookings.add');
Route::get('/expertises',[FrontendExpertisesController::class, 'index'])->name('expertises.home');
Route::get('/ajax/{expertise_id}',[FrontendBookingsController::class, 'getDoctors']);

Route::middleware('admin:admin')->group(function() {
    Route::get('admin/login', [AdminController::class,'loginForm']);
    Route::post('admin/login', [AdminController::class,'store'])->name('admin.login');
});

Route::middleware(['auth:admin'])->group(function(){

    Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('admin.dashboard')->middleware('auth:admin');

Route::resource('/admin/bookings',BookingController::class);
Route::resource('/admin/expertises',ExpertiseController::class);
Route::resource('/admin/doctors',DoctorController::class);
Route::get('/admin/bookings/ajax/{expertise_id}', [BookingController::class, 'GetDoctor']);

Route::get('/admin/logout',[AdminController::class, 'destroy'])->name('admin.logout');
Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');
Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/change_password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');
Route::post('/admin/update_password', [AdminProfileController::class, 'AdminUpdatePassword'])->name('admin.update.password');
});




Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
