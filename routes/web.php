<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

// GuestController
use App\Http\Controllers\Guest\HomeController as GuestHomeController;
use App\Http\Controllers\Guest\ProfileController as GuestProfileConttroller;
use App\Http\Controllers\Guest\DepartmentController as GuestDepartmentController;
use App\Http\Controllers\Guest\BeritaController as GuestBeritaController;

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
use App\Http\Controllers\Admin\DepartmentController as AdminDepartmentController;

// Models
use App\Models\Department;
use App\Models\Article;
use App\Models\HasTag;

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

$condition = env('APP_DEBUG')
    // && ( env('APP_STAGE') != 'local' )
;

$routesAttributes = [];

if ($condition) {

    // Temporary deactivated to testing in local
    // $routesAttributes = [
    //     'prefix' => 't',
    //     'middleware' => [
    //         'redirectRouteDebug'
    //     ]
    // ];

    // Route::view('/', 'under_const');
}

Route::group($routesAttributes, function () {
    // Guest
    Route::as('guest.')
        ->group(function () {
            // Landing Page
            Route::get('/', [GuestHomeController::class, 'index'])->name('landing.home');

            // Profile
            Route::resource('/profile', GuestProfileConttroller::class);

            // Department
            Route::resource('/department', GuestDepartmentController::class);

            // Berita
            // Route::get('/berita', [GuestBeritaController::class, 'berita-1'])->name('berita.berita-1');
            Route::resource('/berita', GuestBeritaController::class);

            // Product
            Route::redirect('/products', '/under-construction')->name('products');

            // Product test
            Route::view('/bank-materi', 'bank_materi.index');

            // Open Recruitment
            Route::redirect('/open-recruitmen', '/under-construction')->name('open-recruitmen');

            // Under Construction
            Route::view('/under-construction', 'under_const');
        });

    // Admin Panel
    Route::get('/home', function () {
        if (session('status')) {
            return redirect()->route('admin.home')->with('status', session('status'));
        }

        return redirect()->route('admin.home');
    });

    // Failsafe Auth
    Auth::routes(['register' => false]);

    // Profile
    Route::prefix('profile-admin')
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

            // Article is disabled due maintenance
            // Route::get('articles', function () {
            //     return response()->json([
            //         'message' => 'this feature is under maintenance'
            //     ]);
            // })->name('articles.index');
            Route::delete('articles/destroy', [AdminArticleController::class, 'massDestroy'])->name('articles.massDestroy');
            Route::post('articles/media', [AdminArticleController::class, 'storeMedia'])->name('articles.storeMedia');
            Route::post('articles/ckmedia', [AdminArticleController::class, 'storeCKEditorImage'])->name('articles.storeCKEditorImages');
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

            // Department
            Route::delete('departments/destroy', [AdminDepartmentController::class, 'massDestroy'])->name('departments.massDestroy');
            Route::post('departments/media', [AdminDepartmentController::class, 'storeMedia'])->name('departments.storeMedia');
            Route::post('departments/ckmedia', [AdminDepartmentController::class, 'storeCKEditorImages'])->name('departments.storeCKEditorImages');
            Route::resource('departments', AdminDepartmentController::class);
        });
});

// Testing for development experimental
// Route::view('experimental-department', 'department/experimental_department_template');
// Route::view('template-departemen', 'department_template');
// Route::get('testing-model-department', function () {
//     $var = Department::find(1);
//     // $var->createMedia();
//     return response()->json([
//         'var' => $var->getArrayOnlyPath(),
//     ]);
// });

// Route::get('testing-model-article', function () {
//     $var = Article::find(6);
//     return response()->json([
//         'var' => $var->getArrayOnlyPath(),
//     ]);
// });


// Testing with pagination
// Route::get("testing-pagination-article", function () {
//     $articles = Article::paginate(6);
//     $hasTag = HasTag::where('tag_id', 1)
//         ->paginate(6);
//     return response()->json([
//         // 'articles' => $articles,
//         'hasTag' => $hasTag,
//         'link' => $hasTag->links(),
//         'articleFromHasTag' => $hasTag[0],
//         'callback' => function () {
            
//         },
//         // // Nomor satu
//         // 'nomorSatu' => $articles[0]->getMediaPath(),
//         // 'hasTag' => $articles[0]->hasTag,
//         // 'hasTagSatu' => $articles[0]->hasTag[0]->tag
//     ]);
// });
