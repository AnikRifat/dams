<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DurationController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\SpeacialistController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/mail', function () {
});

Route::get('/', [PublicController::class, 'index'])->name('index');
Route::get('/Complete-Profile-202', [PublicController::class, 'cp'])->name('cp');
Route::get('/not-allowed', [PublicController::class, 'na'])->name('na');

Route::get('/complete-profile', [PublicController::class, 'completeprofile'])->name('profile.complete');
Route::get('/blog/{blogId}', [PublicController::class, 'blogDetails'])->name('blog.details');
Route::get('/blogs', [PublicController::class, 'blogs'])->name('blogs.all');
Route::get('/appointments/all', [PublicController::class, 'appointments'])->name('appointment.all');
Route::get('/appointment/details/{appointment}', [PublicController::class, 'appointmentdetails'])->name('appointment.details');
Route::get('/products/all', [PublicController::class, 'products'])->name('product.all');
Route::get('/product/details/{product}', [PublicController::class, 'productdetails'])->name('product.details');
Route::get('/doctors/all', [PublicController::class, 'doctors'])->name('doctor.all');
Route::get('/doctor/appointments/{doctor}', [PublicController::class, 'doctordetails'])->name('doctor.details');
Route::get('/speacialists/all', [PublicController::class, 'speacialists'])->name('speacialist.all');
Route::get('/speacialist/appointments/{speacialist}', [PublicController::class, 'speacialistdetails'])->name('speacialist.details');

Route::post('/filter', [SearchController::class, 'filter'])->name('filter');
Route::post('/search', [SearchController::class, 'search'])->name('search'); //  search
Route::get('/search/view', [SearchController::class, 'result'])->name('result'); // show search

Route::middleware('auth')->group(function () {
    Route::post('/comment', [CommentsController::class, 'store'])->name('comment.store');

    Route::post('store/patient-info', [PatientController::class, 'store'])->name('patient.store');
    Route::post('store/doctor-info', [DoctorController::class, 'store'])->name('doctor.store');
});

Route::prefix('/user/dashboard')->middleware(['auth', 'checkProfile'])->group(function () {
    Route::get('/Profile', [PublicController::class, 'userdashboard'])->name('user.dashboard');
    Route::get('/attendance', [PublicController::class, 'attendance'])->name('attendance.index');
    Route::post('/attendance/store', [AttendanceController::class, 'store'])->name('attendance.store');

    Route::post('update/doctor/{user}', [UserController::class, 'doctor'])->name('doctor.update');
    Route::post('update/patient/{user}', [UserController::class, 'patient'])->name('patient.update');
    Route::post('update/user/{user}', [UserController::class, 'update'])->name('user.update');
});
Route::prefix('/user/dashboard')->middleware(['auth', 'checkProfile'])->group(function () {

    Route::get('checkout/{item}/{type}', [PublicController::class, 'checkout'])->name('checkout.store');
    Route::post('order/store', [OrderController::class, 'store'])->name('order.store');

    Route::get('/', [AppointmentController::class, 'index'])->name('user.appointments.index');
    Route::get('/my-appointments', [AppointmentController::class, 'appointments'])->name('user.appointments.patient');
    Route::get('/create-appointment', [PublicController::class, 'createappointment'])->name('user.appointment.create');

    Route::get('/update-appointment', [PublicController::class, 'updateappointment'])->name('user.appointment.update');
    Route::get('/sales', [PublicController::class, 'sales'])->name('user.sales');
    Route::get('/purchase', [PublicController::class, 'purchase'])->name('user.purchase');
});
Route::prefix('chat/inbox')->middleware(['auth', 'checkProfile'])->group(function () {

    Route::get('/doctor', [DoctorController::class, 'inbox'])->name('chat.inbox.doctor');
    Route::get('/patient', [PatientController::class, 'inbox'])->name('chat.inbox.patient');
    Route::get('doctor/appointment/{appointment}', [PatientController::class, 'chat'])->name('chat.show.patient');
    Route::get('patient/appointment/{appointment}', [DoctorController::class, 'chat'])->name('chat.show.doctor');


    Route::post('/', [ChatController::class, 'store'])->name('chat.save');
});

Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::get('admin/profile', [UserController::class, 'adminIndex'])->name('dashboard.profile.index');
    Route::put('admin/profile/update/{id}', [UserController::class, 'adminUpdate'])->name('dashboard.profile.update');

    Route::get('/sale/invoice/{transactionId}', [TransactionController::class, 'invoice'])->name('generate.invoice');
    Route::get('/sale/view/{transactionId}', [TransactionController::class, 'view'])->name('generate.view');


    Route::get('/', [PublicController::class, 'dashboard'])->name('dashboard.index');



    Route::prefix('appointments')->group(function () {
        // Hero-Routes
        Route::get('/', [AppointmentController::class, 'index'])->name('appointments.index');
        Route::get('/create', [AppointmentController::class, 'create'])->name('appointments.create');
        Route::post('/', [AppointmentController::class, 'store'])->name('appointments.store');
        Route::get('/appointment_list', [AppointmentController::class, 'show'])->name('appointments.show'); // appointment list
        Route::get('/appointment_list/add/{id}', [AppointmentController::class, 'add'])->name('appointments.add'); // add order
        Route::get('/appointment_list/order', [AppointmentController::class, 'order'])->name('appointments.order'); // show order
        Route::get('/{appointment}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');
        Route::get('/{appointment}/archive', [AppointmentController::class, 'archive'])->name('appointments.archive');
        Route::post('/{appointment}', [AppointmentController::class, 'update'])->name('appointments.update');
        Route::get('/{appointment}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
        Route::get('/active/{appointment}', [AppointmentController::class, 'active'])->name('appointments.active');
        Route::get('/inactive/{appointment}', [AppointmentController::class, 'inactive'])->name('appointments.inactive');
    });


    Route::prefix('categories')->group(function () {
        // Hero-Routes
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/{category}', [CategoryController::class, 'show'])->name('categories.show');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/{category}', [CategoryController::class, 'update'])->name('categories.update');
        Route::get('/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
        Route::get('/active/{category}', [CategoryController::class, 'active'])->name('categories.active');
        Route::get('/inactive/{category}', [CategoryController::class, 'inactive'])->name('categories.inactive');
    });

    Route::prefix('speacialists')->group(function () {
        // Hero-Routes
        Route::get('/', [SpeacialistController::class, 'index'])->name('speacialists.index');
        Route::get('/create', [SpeacialistController::class, 'create'])->name('speacialists.create');
        Route::post('/', [SpeacialistController::class, 'store'])->name('speacialists.store');
        Route::get('/{speacialist}', [SpeacialistController::class, 'show'])->name('speacialists.show');
        Route::get('/{speacialist}/edit', [SpeacialistController::class, 'edit'])->name('speacialists.edit');
        Route::put('/{speacialist}', [SpeacialistController::class, 'update'])->name('speacialists.update');
        Route::get('/{speacialist}', [SpeacialistController::class, 'destroy'])->name('speacialists.destroy');
        Route::get('/active/{speacialist}', [SpeacialistController::class, 'active'])->name('speacialists.active');
        Route::get('/inactive/{speacialist}', [SpeacialistController::class, 'inactive'])->name('speacialists.inactive');
    });


    Route::prefix('durations')->group(function () {
        // duration-Routes
        Route::get('/', [DurationController::class, 'index'])->name('durations.index');
        Route::post('/', [DurationController::class, 'store'])->name('durations.store');
        Route::get('/{duration}/edit', [DurationController::class, 'edit'])->name('durations.edit');
        Route::put('/{duration}', [DurationController::class, 'update'])->name('durations.update');
        Route::get('/{duration}', [DurationController::class, 'destroy'])->name('durations.destroy');
        Route::get('/active/{duration}', [DurationController::class, 'active'])->name('durations.active');
        Route::get('/inactive/{duration}', [DurationController::class, 'inactive'])->name('durations.inactive');
    });


    Route::prefix('blogs')->group(function () {
        // Blog-Routes
        Route::get('/', [BlogController::class, 'index'])->name('blogs.index');
        Route::get('/create', [BlogController::class, 'create'])->name('blogs.create');
        Route::post('/', [BlogController::class, 'store'])->name('blogs.store');
        Route::get('/{blog}', [BlogController::class, 'show'])->name('blogs.show');
        Route::get('/{blog}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
        Route::put('/{blog}', [BlogController::class, 'update'])->name('blogs.update');
        Route::get('/{blog}', [BlogController::class, 'destroy'])->name('blogs.destroy');
        Route::get('/active/{blog}', [BlogController::class, 'active'])->name('blogs.active');
        Route::get('/inactive/{blog}', [BlogController::class, 'inactive'])->name('blogs.inactive');
    });

    Route::prefix('attendances')->group(function () {
        // attendance-Routes
        Route::get('/', [AttendanceController::class, 'index'])->name('attendances.index');
        Route::get('/create', [AttendanceController::class, 'create'])->name('attendances.create');
        Route::post('/', [AttendanceController::class, 'store'])->name('attendances.store');
        Route::get('/{attendance}', [AttendanceController::class, 'show'])->name('attendances.show');
        Route::get('/{attendance}/edit', [AttendanceController::class, 'edit'])->name('attendances.edit');
        Route::put('/{attendance}', [AttendanceController::class, 'update'])->name('attendances.update');
        Route::get('/{attendance}', [AttendanceController::class, 'destroy'])->name('attendances.destroy');
        Route::get('/active/{attendance}', [AttendanceController::class, 'active'])->name('attendances.active');
        Route::get('/inactive/{attendance}', [AttendanceController::class, 'inactive'])->name('attendances.inactive');
    });


    Route::prefix('products')->group(function () {
        // product-Routes
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/', [ProductController::class, 'store'])->name('products.store');
        Route::get('/{product}', [ProductController::class, 'show'])->name('products.show');
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
        Route::get('/active/{product}', [ProductController::class, 'active'])->name('products.active');
        Route::get('/inactive/{product}', [ProductController::class, 'inactive'])->name('products.inactive');
    });

    Route::prefix('appointments')->group(function () {
        // appointments-Routes
        Route::get('/', [AppointmentController::class, 'appointment'])->name('appointments.all');
        // Route::get('/{appointments}', [AppointmentController::class, 'show'])->name('appointments.show');
        // Route::delete('/{appointments}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');
        Route::get('/pending/{appointment}', [AppointmentController::class, 'pending'])->name('appointments.pending');
        Route::get('/active/{appointment}', [AppointmentController::class, 'active'])->name('appointments.active');
        Route::get('/inactive/{appointment}', [AppointmentController::class, 'inactive'])->name('appointments.inactive');
    });

    Route::prefix('report')->group(function () {
        // orders-Routes
        Route::get('/Appointment', [TransactionController::class, 'appointment'])->name('profit.appointment.index');
        Route::get('/shop', [TransactionController::class, 'shop'])->name('profit.shop.index');
        Route::get('/sale', [TransactionController::class, 'sale'])->name('profit.sale.index');
        Route::get('/chart', [PublicController::class, 'chart'])->name('profit.chart.index');
    });


    Route::prefix('orders')->group(function () {
        // orders-Routes
        Route::get('/', [OrderController::class, 'index'])->name('orders.index');
        Route::get('/appointment', [OrderController::class, 'appointment'])->name('orders.appointment');
        Route::get('/product', [OrderController::class, 'product'])->name('orders.product');
        // Route::get('/{orders}', [ordersController::class, 'show'])->name('orders.show');
        Route::get('/{orders}', [OrderController::class, 'destroy'])->name('orders.destroy');
        Route::get('transaction/{transaction}', [TransactionController::class, 'destroy'])->name('transaction.destroy');
        Route::get('/pending/{order}', [OrderController::class, 'pending'])->name('orders.pending');
        Route::get('/active/{order}', [OrderController::class, 'active'])->name('orders.active');
        Route::get('/inactive/{order}', [OrderController::class, 'inactive'])->name('orders.inactive');
    });
    Route::prefix('chat')->group(function () {
        // users-Routes
        Route::get('/', [ChatController::class, 'index'])->name('admin.chat.index');
        Route::get('/{appointmentid}', [ChatController::class, 'chat'])->name('admin.chat.show');
    });
    Route::prefix('users')->group(function () {
        // users-Routes
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::get('/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::get('/confirm/{user}', [UserController::class, 'confirm'])->name('users.confirm');
        Route::get('/patient/list', [UserController::class, 'patientlist'])->name('users.patient');
        Route::get('/doctor/list', [UserController::class, 'doctorlist'])->name('users.doctor');
        Route::get('/patientconfirmation//list', [UserController::class, 'patientconfirmationlist'])->name('users.patient.confirmation');
        Route::get('/doctorconfirmation/list', [UserController::class, 'doctorconfirmationlist'])->name('users.doctor.confirmation');
    });
    Route::prefix('content')->group(function () {
        // Hero-Routes
        Route::get('/about/{content}/edit', [ContentController::class, 'editAbout'])->name('about.edit');
        Route::put('/about/{content}', [ContentController::class, 'updateAbout'])->name('about.update');

        Route::get('/general/{content}/edit', [ContentController::class, 'editGeneral'])->name('general.edit');
        Route::put('/general/{content}', [ContentController::class, 'updateGeneral'])->name('general.update');
        Route::get('/contact/{content}/edit', [ContentController::class, 'editContact'])->name('contact.edit');
        Route::put('/contact/{content}', [ContentController::class, 'updateContact'])->name('contact.update');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
