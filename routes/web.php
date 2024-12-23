<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\admin\LoginController as AdminLoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ShowController;

// Public Pages
Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {  
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/comingsoon', function () {
    return view('comingsoon');
});

Route::get('/ourteam', function () {
    return view('team');
});

Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

// User Authentication & Dashboard Routes
Route::group(['prefix' => 'user'], function () {
    // Routes for Guests (Not Authenticated)
    Route::group(['middleware' => 'guest'], function () {
        Route::get('login', [LoginController::class, 'index'])->name('account.login'); // Login Page
        Route::get('signup', [LoginController::class, 'register'])->name('account.register'); // Register Page
        Route::post('process-register', [LoginController::class, 'processRegister'])->name('account.processRegister'); // Register Action
        Route::post('authenticate', [LoginController::class, 'authenticate'])->name('account.authenticate'); // Login Action
        Route::get('forgetPass', [ForgetPasswordController::class, 'index'])->name('account.forgetPass');
    });

    // Routes for Authenticated Users
    Route::group(['middleware' => 'auth'], function () {
        Route::get('logout', [LoginController::class, 'logout'])->name('account.logout'); // Logout
        Route::get('dashboard', [DashboardController::class, 'index'])->name('account.dashboard'); // User Dashboard
    });
});

// Ticketing Pages
Route::group(['prefix' => 'ticket', 'middleware' => 'auth'], function () {
    // Display Pages
    Route::get('timedate', [TicketController::class, 'timedate'])->name('ticket.timedate');
    Route::get('select-seat', [TicketController::class, 'selectSeat'])->name('ticket.select_seat');
    Route::get('checkout', [TicketController::class, 'checkout'])->name('ticket.checkout');
    Route::get('payment', [TicketController::class, 'payment'])->name('ticket.payment');
    Route::get('all-tickets', [TicketController::class, 'allTickets'])->name('all_tickets');

    // Action Routes
    Route::post('timedate/store', [TicketController::class, 'storeTimeDate'])->name('ticket.timedate.store');
    Route::post('select-seat/store', [TicketController::class, 'storeSelectedSeats'])->name('ticket.select_seat.store');
    Route::post('checkout/create', [TicketController::class, 'createBooking'])->name('ticket.checkout.create');
    Route::post('payment/process', [TicketController::class, 'processPayment'])->name('ticket.payment.process');
    Route::get('ticket/payment', [TicketController::class, 'payment'])->name('ticket.payment');
    Route::get('ticket/payment/cancel', [TicketController::class, 'cancelPayment'])->name('ticket.payment.cancel');
});


// Admin Authentication & Dashboard Routes
Route::group(['prefix' => 'admin'], function () {
    // Routes for Admin Guests (Not Authenticated)
    Route::group(['middleware' => 'admin.guest'], function () {
        Route::get('login', [AdminLoginController::class, 'index'])->name('admin.login'); // Admin Login Page
        Route::post('authenticate', [AdminLoginController::class, 'authenticate'])->name('admin.authenticate'); // Admin Login Action
    });

    // Routes for Authenticated Admins
    Route::group(['middleware' => 'admin.auth'], function () {
        // Admin Dashboard
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard'); // Admin Dashboard
        Route::get('logout', [AdminLoginController::class, 'logout'])->name('admin.logout'); // Admin Logout

        // Admin Contact Us Routes
        Route::get('get-contact-us', [AdminDashboardController::class, 'getContactUs'])->name('admin.getcontactus');
        Route::get('/contact', [ContactController::class, 'index'])->name('admin.contact.submissions');
        Route::delete('/contact/{id}', [ContactController::class, 'destroy'])->name('admin.contact.delete');

        // Admin Users Routes
        Route::group(['prefix' => 'users'], function () {
            Route::get('/', [UserController::class, 'index'])->name('admin.users.index'); // List users
            Route::get('/{id}', [UserController::class, 'show'])->name('admin.users.show'); // View user details
            Route::get('/{id}/edit', [UserController::class, 'edit'])->name('admin.users.edit'); // Edit user
            Route::put('/{id}', [UserController::class, 'update'])->name('admin.users.update'); // Update user
            Route::delete('/{id}', [UserController::class, 'destroy'])->name('admin.users.delete'); // Delete user
        });

        // Admin Shows Routes
        Route::group(['prefix' => 'shows'], function () {
            Route::get('/', [ShowController::class, 'index'])->name('admin.shows.index'); // List shows
            Route::get('/create', [ShowController::class, 'create'])->name('admin.shows.create'); // Create a show
            Route::post('/', [ShowController::class, 'store'])->name('admin.shows.store'); // Store a new show
            Route::get('/{id}/edit', [ShowController::class, 'edit'])->name('admin.shows.edit'); // Edit a show
            Route::put('/{id}', [ShowController::class, 'update'])->name('admin.shows.update'); // Update a show
            Route::delete('/{id}', [ShowController::class, 'destroy'])->name('admin.shows.destroy'); // Delete a show
        });

        // Admin Bookings Routes
        Route::group(['prefix' => 'bookings'], function () {
            Route::get('/', [BookingController::class, 'index'])->name('admin.bookings.index'); // List bookings
            Route::get('/{id}', [BookingController::class, 'show'])->name('admin.bookings.show'); // View booking details
            Route::put('/{id}', [BookingController::class, 'update'])->name('admin.bookings.update'); // Update booking
            Route::delete('/{id}', [BookingController::class, 'destroy'])->name('admin.bookings.destroy'); // Delete booking
        });
    });
});

