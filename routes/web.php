<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\KosController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HelpController;

Route::get('testimonials', [LandingController::class, 'testomonials'])->name('landing.testimonials');
Route::get('/search', [LandingController::class, 'search'])->name('landing.search');

Route::resource('/', LandingController::class);
Route::get('/kos/{id}', [KosController::class, 'show'])->name('kos.show');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.show');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.show');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Footer content routes
Route::view('/press-kit', 'footercontent.company.presskit')->name('press.kit');
Route::view('/contact', 'footercontent.company.contact')->name('contact');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
});

    Route::post('/profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar.update');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/settings', [ProfileController::class, 'settings'])->name('profile.settings');
    Route::post('/profile/settings/update', [ProfileController::class, 'updateSettings'])->name('profile.settings.update');
});
Route::get('/help-center', [HelpController::class, 'index'])->name('help.center');
Route::get('/help-center/search', [HelpController::class, 'search'])->name('help.search');

Route::get('/safety-guide', function () {
    return view('footercontent.support.safety');
})->name('safety.guide');

Route::get('/privacy-policy', function () {
    return view('footercontent.support.privasi');
})->name('privacy.policy');

Route::get('/about', function () {
    return view('footercontent.company.about');
})->name('about');

Route::get('/terms', function () {
    return view('footercontent.support.terms');
})->name('terms');

Route::get('/careers', function () {
    return view('footercontent.company.careers');
})->name('careers');

