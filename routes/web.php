<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\{
    LocaleController,
    LeaveController,
    HomeController,
    UserController,
    MeetingsController,
    LearningController,
    Auth\ResetPasswordController,
    RotasController,
    LicenceController,
    AddressBookController,
    AddressContactController,
    ContractController,
    CompanyController,
    CompanyContactController,
    DepartmentController,
    JobController
};

// Guest routes
Route::get('/', function () {
    return Auth::check() ? redirect('/home') : view('welcome');
});
Auth::routes();
Route::post('/locale', LocaleController::class)->name('locale.change');

// Authenticated routes
Route::middleware(['auth'])->group(function () {

    // API routes
    Route::prefix('api')->group(function () {
        Route::get('/holidays', [LeaveController::class, 'getHolidays']);
        Route::get('/leaves', [LeaveController::class, 'getLeaves']);
        Route::get('/meetings', [MeetingsController::class, 'getMeetings'])->name('meetings.get');
        Route::get('/rotas', [RotasController::class, 'getRotas'])->name('rotas.get');
    });

    // Home routes
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/super-admin-home', [HomeController::class, 'superAdminHome'])->name('super-admin-home');
    Route::get('/admin-home', [HomeController::class, 'adminHome'])->name('admin-home');

    // User routes
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('/{user}', [UserController::class, 'delete'])->name('delete');
        Route::get('/{id}/profile', [UserController::class, 'show'])->name('show');
        Route::post('/{user}/profile-picture', [UserController::class, 'uploadProfilePicture'])->name('uploadProfilePicture');
        Route::post('/{user}/cv', [UserController::class, 'uploadCv'])->name('uploadCv');
        Route::post('/{user}/cover-letter', [UserController::class, 'uploadCoverLetter'])->name('uploadCoverLetter');
    });
    Route::get('/show/{id}', [UserController::class, 'show'])->name('profile');
    Route::get('/get-dark-mode-preference', [UserController::class, 'getDarkModePreference'])->name('get-dark-mode-preference');
    Route::post('/toggle-dark-mode', [UserController::class, 'toggleDarkMode'])->name('toggle-dark-mode');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

    // Leave routes
    Route::prefix('leaves')->name('leave.')->group(function () {
        Route::get('/create', [LeaveController::class, 'create'])->name('create');
        Route::post('/', [LeaveController::class, 'store'])->name('store');
        Route::get('/{leave}', [LeaveController::class, 'show'])->name('show');
        Route::get('/{leave}/edit', [LeaveController::class, 'edit'])->name('edit');
        Route::put('/{leave}', [LeaveController::class, 'update'])->name('update');
        Route::delete('/{leave}', [LeaveController::class, 'delete'])->name('delete');
        Route::post('/{leave}/approve', [LeaveController::class, 'approve'])->name('approve');
        Route::post('/{leave}/deny', [LeaveController::class, 'deny'])->name('deny');
        Route::get('/outstanding', [LeaveController::class, 'outstandingRequests'])->name('outstanding');
    });
    Route::get('/calendar', [LeaveController::class, 'index'])->name('calendar');

    // Rotas routes
    Route::prefix('rotas')->name('rotas.')->group(function () {
        Route::get('/', [RotasController::class, 'index'])->name('index');
        Route::get('/create', [RotasController::class, 'create'])->name('create');
        Route::post('/', [RotasController::class, 'store'])->name('store');
        Route::get('/{rotas}', [RotasController::class, 'show'])->name('show');
        Route::get('/{rotas}/edit', [RotasController::class, 'edit'])->name('edit');
        Route::put('/{rotas}', [RotasController::class, 'update'])->name('update');
        Route::delete('/{rotas}', [RotasController::class, 'delete'])->name('delete');
    });

    // Licence routes
    Route::resource('licence', LicenceController::class)->except('destroy');
    Route::delete('/licence/{licence}', [LicenceController::class, 'delete'])->name('licence.delete');

    // Address Book routes
    Route::resource('address-book', AddressBookController::class);
    Route::resource('address-contact', AddressContactController::class);

    // Contracts routes
    Route::resource('contract', ContractController::class);

    // Companies routes
    Route::resource('company', CompanyController::class);
    Route::resource('company-contact', CompanyContactController::class, ['parameters' => ['company-contact' => 'companyContact']]);

    // Departments routes
    Route::resource('department', DepartmentController::class);

    // Job routes
    Route::resource('job', JobController::class);

    // Knowledge Base and Reports routes
    Route::view('/knowledge/index', 'knowledge/index')->name('knowledge');
    Route::view('/reports/index', 'reports/index')->name('reports');

    // Learning & Development routes
    Route::prefix('learning')->group(function () {
        Route::get('/assign/{id}', [LearningController::class, 'assignLearning'])->name('assignLearning');
        Route::get('/finish/{id}', [LearningController::class, 'finishLearning'])->name('finishLearning');
    });

});
