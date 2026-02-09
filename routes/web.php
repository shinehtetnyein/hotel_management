<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ForgetPassword;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Admin;

Route::get('/', function () {
    return redirect()->route('home');
});

// User

Route::get('/hotel',[UserController::class,'home'])->name('home');
Route::get('/hotel/bedroom',[UserController::class,'bedRoom'])->name('bedRoom');
Route::get('/hotel/livingRoom',[UserController::class,'livingRoom'])->name('livingRoom');
Route::get('/hotel/dinningRoom',[UserController::class,'dinningRoom'])->name('dinningRoom');
Route::get('/hotel/gallery',[UserController::class,'gallery'])->name('gallery');
Route::get('/hotel/login',[UserController::class,'login'])->name('login');
Route::post('/hotel/login',[UserController::class,'loginPost'])->name('loginPost');
Route::get('/hotel/index',[UserController::class,'loginPost'])->name('loginPost');
Route::get('/hotel/register',[UserController::class,'Register'])->name('register');
Route::post('/hotel/register',[UserController::class,'registerPost'])->name('registerPost');
Route::get('/hotel/contactUs',[UserController::class,'contactUs'])->name('contactUs');
Route::post('/hotel/contactUs',[UserController::class,'saveMessage'])->name('saveMessage');
Route::post('/hotel/review',[UserController::class,'reviewMessage'])->name('reviewMessage');
Route::get('/hotel/aboutUs',[UserController::class,'aboutUs'])->name('aboutUs');
Route::get('/hotel/search',[UserController::class,'search'])->name('search');
Route::get('/hotel/detail/{id}',[UserController::class,'detail'])->name('detail');
Route::get('/hotel/profile',[UserController::class,'profile'])->name('profile');
Route::post('/hotel/profile/{id}',[UserController::class,'updateProfile'])->name('updateProfile');
// Route::get('/hotel/profile/{id}',[UserController::class,'updateProfile'])->name('updateProfile');
Route::get('/hotel/faq',[UserController::class,'faq'])->name('faq');
Route::get('/hotel/review',[UserController::class,'review'])->name('review');
Route::get('/hotel/booking',[UserController::class,'booking'])->name('booking');
// Route::get('/hotel/payment',[UserController::class,'payment'])->name('payment');
Route::get('/hotel/index',[UserController::class,'logout'])->name('logout');

//Booking
Route::post('/hotel/detailsBooking/{id}/{price}/{user_id}',[BookingController::class,'addBooking'])->name('addBooking');
Route::post('/hotel/bookingHistory/',[BookingController::class,'bookingHistory'])->name('bookingHistory');
//forgetPassword
Route::get('/hotel/forgetPassword',[ForgetPassword::class,'forgetPassword'])->name('forgetPassword');
Route::post('/hotel/forgetPassword',[ForgetPassword::class,'forgetPasswordPost'])->name('forgetPasswordPost');
Route::get('/hotel/resetPassword/{token}',[ForgetPassword::class,'resetPassword'])->name('resetPassword');
Route::post('/hotel/resetPassword',[ForgetPassword::class,'resetPasswordPost'])->name('resetPasswordPost');

Route::post('stripe/{id}/{price}/{user_id}',[StripeController::class, 'stripe'])->name('stripe');
Route::get('success',[StripeController::class, 'success'])->name('success');
Route::get('cancel',[StripeController::class, 'cancel'])->name('cancel');

// ----------------------------------
// --------Start Admin Section-------
// ----------------------------------
//Admin Login
Route::get('/admin', [AdminController::class, 'index'])->name('index');
// Route::match(['get','post'],'/admin/dashboard', [AdminController::class, 'AdminLoginPost'])->name('adminLoginPost');
Route::post('/admin/dashboard', [AdminController::class, 'AdminLoginPost'])->name('adminLoginPost');
Route::get('/admin/account', [AdminController::class, 'account'])->name('account');

// Admin Middleware
Route::middleware([AdminMiddleware::class])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/booking', [AdminController::class, 'orderBooking'])->name('orderBooking');
    Route::get('/admin/roomList', [AdminController::class, 'roomList'])->name('roomList');
    Route::get('/admin/addRoom', [AdminController::class, 'addRoom'])->name('addRoom');
    Route::get('/admin/customer', [AdminController::class, 'customer'])->name('customer');
    Route::get('/admin/bookingList', [AdminController::class, 'bookingList'])->name('bookingList');
    Route::get('/admin/bookingReject', [AdminController::class, 'bookingReject'])->name('bookingReject');
    Route::get('/admin/adminReview', [AdminController::class, 'adminReview'])->name('adminReview');
    Route::get('/admin/message', [AdminController::class, 'message'])->name('message');
    // Route::get('/admin/account', [AdminController::class, 'account'])->name('account');
    Route::get('/admin/accountSetting', [AdminController::class, 'accountSetting'])->name('accountSetting');
    Route::get('/admin/searchRoom', [AdminController::class, 'searchRoom'])->name('searchRoom');
    Route::get('/admin/adminLogout', [AdminController::class, 'adminLogout'])->name('adminLogout');

    Route::get('/admin/booking/{id}', [AdminController::class, 'approve'])->name('approve');
    Route::get('/admin/booking1/{id}', [AdminController::class, 'reject'])->name('reject');
    Route::get('/admin/customer/{user_id}', [AdminController::class, 'userDelete'])->name('userDelete');
    Route::get('/admin/bookingList/{booked_id}', [AdminController::class, 'bookedDelete'])->name('bookedDelete');
    Route::get('/admin/bookingList/{reject_id}', [AdminController::class, 'rejectDelete'])->name('rejectDelete');
    Route::get('/admin/message/{id}', [AdminController::class, 'messageDelete'])->name('messageDelete');
    Route::get('/admin/roomList/{room_id}', [AdminController::class, 'roomDelete'])->name('roomDelete');
    Route::post('/admin/addRoom1', [AdminController::class, 'addNewRoom'])->name('addNewRoom');
    Route::post('/admin/accountSetting/{id}', [AdminController::class, 'updateAccount'])->name('updateAccount');
    // Route::match(['get','post'],'/admin/accountSetting/{id}', [AdminController::class, 'updateAccount'])->name('updateAccount');
    Route::post('/admin/account', [AdminController::class, 'addAdmin'])->name('addAdmin');
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('edit');
    Route::post('/admin1/edit/{id}', [AdminController::class, 'editPost'])->name('editPost');
    Route::post('/admin/accountSetting1', [AdminController::class, 'deleteAccount'])->name('deleteAccount');
    Route::get('/admin/changePassword/{id}', [AdminController::class, 'changePassword'])->name('changePassword');
    Route::post('/admin/updatePassword/{id}', [AdminController::class, 'updatePassword'])->name('updatePassword');
    Route::get('/admin/payment',[AdminController::class,'payment'])->name('payment');


});








