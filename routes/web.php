<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

// Auth
use App\Http\Controllers\Auth\ChangePasswordController as AuthChangePasswordController;

// AdminController
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Admin\PermissionsController as AdminPermissionsControlelr;
use App\Http\Controllers\Admin\RolesController as AdminRolesController;
use App\Http\Controllers\Admin\UsersController as AdminUsersController;
use App\Http\Controllers\Admin\AnggotaController as AdminAnggotController;
use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\EventRegistrationController as AdminEventRegistrationController;
use App\Http\Controllers\Admin\EventFieldController as AdminEventFieldController;
use App\Http\Controllers\Admin\EventFieldResponseController as AdminEventFieldResponseController;
use App\Http\Controllers\Admin\UpcomingProkerController as AdminUpcomingProkerController;
use App\Http\Controllers\Admin\EventFieldChoiceController as AdminEventFieldChoiceController;

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

// Development Stage
Route::get('/', function () {
    return view('home');
})->name('landing.home');

Route::get('/department', function () {
    return view('department');
})->name('department.home');

Route::get('/profile', function () {
    return view('profile');
})->name('profile.home');

Route::get('/berita', function () {
    $berita = DB::table('berita_test')->paginate(6);
    return view('berita.index', ['berita' => $berita]);
})->name('berita.home');

Route::get('/berita/berita-1', function () {
    return view('berita.view');
})->name('berita.view');

Route::get('/under-construction', function () {
    return view('under_const');
})->name('under-const');

// Testing Admin Panel

Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

// Failsafe
Auth::routes(['register' => false]);
// Route::redirect('/login', '/');

// Profile
Route::prefix('profile')
    ->as('profile.')
    ->middleware('auth')
    ->group(function () {
        if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
            Route::get('password', [AuthChangePasswordController::class, 'edit'])->name('password.edit');
            Route::post('password', [AuthChangePasswordController::class, 'update'])->name('password.update');
            Route::post('profile', [AuthChangePasswordController::class, 'updateProfile'])->name('password.updateProfile');
            Route::post('profile/destroy', [AuthChangePasswordController::class, 'destroyProfile'])->name('password.destroyProfile');
        }
    });

// Admin
Route::prefix('admin')
    ->as('admin.')
    ->middleware('auth')
    ->group(function () {
        // Home
        Route::get('/', [AdminHomeController::class, 'index'])->name('home');


        // Permissions
        Route::delete('permissions/destroy', [AdminPermissionsControlelr::class, 'massDestroy'])->name('permissions.massDestroy');
        Route::resource('permissions', AdminPermissionsControlelr::class);

        // Roles
        Route::delete('roles/destroy', [AdminRolesController::class, 'massDestroy'])->name('roles.massDestroy');
        Route::resource('roles', AdminRolesController::class);

        // Users
        Route::delete('users/destroy', [AdminUsersController::class, 'massDestroy'])->name('users.massDestroy');
        Route::resource('users', AdminUsersController::class);

        // Anggota
        Route::delete('anggota/destroy', [AdminAnggotController::class, 'massDestroy'])->name('anggota.massDestroy');
        Route::post('anggota/media', [AdminAnggotController::class, 'storeMedia'])->name('anggota.storeMedia');
        Route::post('anggota/ckmedia', [AdminAnggotController::class, 'storeCKEditorImages'])->name('anggota.storeCKEditorImages');
        Route::resource('anggota', AdminAnggotController::class);

        // Article
        Route::delete('articles/destroy', [AdminArticleController::class, 'massDestroy'])->name('articles.massDestroy');
        Route::resource('articles', AdminArticleController::class);

        // Event
        Route::delete('events/destroy', [AdminEventFieldController::class, 'massDestroy'])->name('events.massDestroy');
        Route::resource('events', AdminEventController::class);

        // Event Registration
        Route::get('event-registrations/pemberkasan/{itemPath}', [AdminEventRegistrationController::class, 'downloadPemberkasan'])->name('event-registrations.downloadPemberkasan');
        Route::get('event-registrations/add-event-registration/{eventId}', [AdminEventRegistrationController::class, 'customCreate'])->name('event-registrations.customCreate');
        Route::post('event-registrations/add-event-registration', [AdminEventRegistrationController::class, 'customStore'])->name('event-registrations.customStore');
        Route::delete('event-registrations/destroy', [AdminEventRegistrationController::class, 'massDestroy'])->name('event-registrations.massDestroy');
        Route::resource('event-registrations', AdminEventRegistrationController::class);

        // Event Field
        Route::delete('event-fields/destroy', [AdminEventFieldController::class, 'massDestroy'])->name('event-fields.massDestroy');
        Route::resource('event-fields', AdminEventFieldController::class);

        // Event Field Response
        Route::delete('event-field-responses/destroy', [AdminEventFieldResponseController::class, 'massDestroy'])->name('event-field-responses.massDestroy');
        Route::resource('event-field-responses', AdminEventFieldResponseController::class);

        // Upcoming Proker
        Route::delete('upcoming-prokers/destroy', [AdminUpcomingProkerController::class, 'massDestroy'])->name('upcoming-prokers.massDestroy');
        Route::resource('upcoming-prokers', AdminUpcomingProkerController::class);

        // Event Field Choice
        Route::delete('event-field-choices/destroy', [AdminEventFieldChoiceController::class, 'massDestroy'])->name('event-field-choices.massDestroy');
        Route::resource('event-field-choices', AdminEventFieldChoiceController::class);
    });
