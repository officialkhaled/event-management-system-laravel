<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AttendeeController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'role:1'])->group(function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/dashboard', 'adminDashboard')->name('admin-dashboard');
        });

        Route::group(['prefix' => 'events', 'as' => 'events.'], function () {
            Route::controller(EventController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{event}/edit', 'edit')->name('edit');
                Route::patch('/{event}/', 'update')->name('update');
            });
        });

        Route::group(['prefix' => 'attendees', 'as' => 'attendees.'], function () {
            Route::controller(AttendeeController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
                Route::get('/{event}/edit', 'edit')->name('edit');
                Route::patch('/{event}/', 'update')->name('update');
                Route::delete('/{event}/', 'destroy')->name('destroy');
            });
        });

        Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
            Route::controller(ProfileController::class)->group(function () {
                Route::get('/{admin}/edit', 'edit')->name('edit');
                Route::patch('/{admin}', 'update')->name('update');
            });
        });
    });
});

Route::middleware(['auth', 'role:2'])->group(function () {
    Route::group(['prefix' => 'attendee', 'as' => 'attendee.'], function () {
        Route::controller(DashboardController::class)->group(function () {
            Route::get('/dashboard', 'attendeeDashboard')->name('attendee-dashboard');
        });

        Route::group(['prefix' => 'events', 'as' => 'events.'], function () {
            Route::controller(EventController::class)->group(function () {
                Route::get('/', 'index')->name('index');
                Route::get('{event}/view', 'view')->name('view');
            });
        });

        Route::group(['prefix' => 'profile', 'as' => 'profile.'], function () {
            Route::controller(ProfileController::class)->group(function () {
                Route::get('/{attendee}/edit', 'edit')->name('edit');
                Route::patch('/{attendee}', 'update')->name('update');
            });
        });
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
