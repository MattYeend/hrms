<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MeetingsController;
use App\Http\Controllers\LearningController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\RotasController;
use App\Http\Controllers\LicenceController;
use App\Http\Controllers\AddressBookController;
use App\Http\Controllers\AddressContactController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\CompanyContactController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\JobController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/home');
    }
    return view('welcome');
});

Auth::routes();

Route::post('/locale', LocaleController::class)->name('locale.change');

Route::middleware(['auth'])->group(function(){

    // API routes
    Route::get('/api/holidays', [LeaveController::class, 'getHolidays']);
    Route::get('/api/leaves', [LeaveController::class, 'getLeaves']);

    Route::get('/api/meetings', [MeetingsController::class, 'getMeetings'])->name('meetings.get');
    Route::get('/api/rotas', [RotasController::class, 'getRotas'])->name('rotas.get');

    // User routes
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{user}', [UserController::class, 'delete'])->name('user.delete');
    Route::get('/user/{id}/profile', [UserController::class, 'show'])->name('user.show');
    Route::get('/show/{id}', [UserController::class, 'show'])->name('profile');
    Route::get('/get-dark-mode-preference', [UserController::class, 'getDarkModePreference'])->name('get-dark-mode-preference');
    Route::post('/toggle-dark-mode', [UserController::class, 'toggleDarkMode'])->name('toggle-dark-mode');
    Route::post('/user/{user}/profile-picture', [UserController::class, 'uploadProfilePicture'])->name('user.uploadProfilePicture');
    Route::post('/user/{user}/cv', [UserController::class, 'uploadCv'])->name('user.uploadCv');
    Route::post('/user/{user}/cover-letter', [UserController::class, 'uploadCoverLetter'])->name('user.uploadCoverLetter');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

    // Home redirect routes
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/super-admin-home', [HomeController::class, 'superAdminHome'])->name('super-admin-home');
    Route::get('/admin-home', [HomeController::class, 'adminHome'])->name('admin-home');

    // Leave routes
    Route::get('/calendar', [LeaveController::class, 'index'])->name('calendar');
    Route::get('/leaves/create', [LeaveController::class, 'create'])->name('leave.create');
    Route::post('/leaves', [LeaveController::class, 'store'])->name('leave.store');
    Route::get('/leave/{leave}', [LeaveController::class, 'show'])->name('leave.show');
    Route::get('/leave/{leave}/edit', [LeaveController::class, 'edit'])->name('leave.edit');
    Route::put('/leave/{leave}', [LeaveController::class, 'update'])->name('leave.update');
    Route::delete('/leave/{leave}', [LeaveController::class, 'delete'])->name('leave.delete');
    Route::post('/leave/{leave}/approve', [LeaveController::class, 'approve'])->name('leave.approve');
    Route::post('/leave/{leave}/deny', [LeaveController::class, 'deny'])->name('leave.deny');
    Route::get('/leaves/outstanding', [LeaveController::class, 'outstandingRequests'])->name('leave.outstanding');

    // Rotas routes
    Route::get('/rotas', [RotasController::class, 'index'])->name('rotas.index');
    Route::get('/rotas/create', [RotasController::class, 'create'])->name('rotas.create');
    Route::post('/rotas', [RotasController::class, 'store'])->name('rotas.store');
    Route::get('/rota/{rotas}', [RotasController::class, 'show'])->name('rotas.show');
    Route::get('/rota/{rotas}/edit', [RotasController::class, 'edit'])->name('rotas.edit');
    Route::put('/rota/{rotas}', [RotasController::class, 'update'])->name('rotas.update');
    Route::delete('/rota/{rotas}', [RotasController::class, 'delete'])->name('rotas.delete');

    // Licence routes
    Route::get('/licence', [LicenceController::class, 'index'])->name('licence.index');
    Route::get('/licence/create', [LicenceController::class, 'create'])->name('licence.create');
    Route::post('/licence', [LicenceController::class, 'store'])->name('licence.store');
    Route::get('/licence/{licence}', [LicenceController::class, 'show'])->name('licence.show');
    Route::get('/licence/{licence}/edit', [LicenceController::class, 'edit'])->name('licence.edit');
    Route::put('/licence/{licence}', [LicenceController::class, 'update'])->name('licence.update');
    Route::delete('/licence/{licence}', [LicenceController::class, 'delete'])->name('licence.delete');

    // Address Book routes
    Route::get('/address-book', [AddressBookController::class, 'index'])->name('addressBook.index');
    Route::get('/address-book/create', [AddressBookController::class, 'create'])->name('addressBook.create');
    Route::post('/address-book', [AddressBookController::class, 'store'])->name('addressBook.store');
    Route::get('/address-book/{addressBook}', [AddressBookController::class, 'show'])->name('addressBook.show');
    Route::get('/address-book/{addressBook}/edit', [AddressBookController::class, 'edit'])->name('addressBook.edit');
    Route::put('/address-book/{addressBook}', [AddressBookController::class, 'update'])->name('addressBook.update');
    Route::delete('/address-book/{addressBook}', [AddressBookController::class, 'delete'])->name('addressBook.delete');

    // Address Contact routes
    Route::get('/address-contact', [AddressContactController::class, 'index'])->name('addressContact.index');
    Route::get('/address-contact/create', [AddressContactController::class, 'create'])->name('addressContact.create');
    Route::post('/address-contact', [AddressContactController::class, 'store'])->name('addressContact.store');
    Route::get('/address-contact/{addressContact}', [AddressContactController::class, 'show'])->name('addressContact.show');
    Route::get('/address-contact/{addressContact}/edit', [AddressContactController::class, 'edit'])->name('addressContact.edit');
    Route::put('/address-contact/{addressContact}', [AddressContactController::class, 'update'])->name('addressContact.update');
    Route::delete('/address-contact/{addressContact}', [AddressContactController::class, 'delete'])->name('addressContact.delete');

    // Contracts routes
    Route::get('/contract', [ContractController::class, 'index'])->name('contract.index');
    Route::get('/contract/create', [ContractController::class, 'create'])->name('contract.create');
    Route::post('/contract', [ContractController::class, 'store'])->name('contract.store');
    Route::get('/contract/{contract}', [ContractController::class, 'show'])->name('contract.show');
    Route::get('/contract/{contract}/edit', [ContractController::class, 'edit'])->name('contract.edit');
    Route::put('/contract/{contract}', [ContractController::class, 'update'])->name('contract.update');
    Route::delete('/contract/{contract}', [ContractController::class, 'delete'])->name('contract.delete');

    // Companies routes
    Route::get('/company', [CompanyController::class, 'index'])->name('company.index');
    Route::get('/company/create', [CompanyController::class, 'create'])->name('company.create');
    Route::post('/company', [CompanyController::class, 'store'])->name('company.store');
    Route::get('/company/{company}', [CompanyController::class, 'show'])->name('company.show');
    Route::get('/company/{company}/edit', [CompanyController::class, 'edit'])->name('company.edit');
    Route::put('/company/{company}', [CompanyController::class, 'update'])->name('company.update');
    Route::delete('/company/{company}', [CompanyController::class, 'delete'])->name('company.delete');

    // Company Contacts routes
    Route::get('/companyContacts', [CompanyContactController::class, 'index'])->name('companyContact.index');
    Route::get('/companyContacts/create', [CompanyContactController::class, 'create'])->name('companyContact.create');
    Route::post('/companyContact', [CompanyContactController::class, 'store'])->name('companyContact.store');
    Route::get('/companyContact/{companyContact}', [CompanyContactController::class, 'show'])->name('companyContact.show');
    Route::get('/companyContact/{companyContact}/edit', [CompanyContactController::class, 'edit'])->name('companyContact.edit');
    Route::put('/companyContact/{companyContact}', [CompanyContactController::class, 'update'])->name('companyContact.update');
    Route::delete('/companyContact/{companyContact}', [CompanyContactController::class, 'delete'])->name('companyContact.delete');

    // Departments routes
    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
    Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');
    Route::post('/department', [DepartmentController::class, 'store'])->name('departments.store');
    Route::get('/department/{department}', [DepartmentController::class, 'show'])->name('departments.show');
    Route::get('/department/{department}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
    Route::put('/department/{department}', [DepartmentController::class, 'update'])->name('departments.update');
    Route::delete('/department/{department}', [DepartmentController::class, 'delete'])->name('departments.delete');

    // Job routes
    Route::get('/jobs', [JobController::class, 'index'])->name('job.index');
    Route::get('/jobs/create', [JobController::class, 'create'])->name('job.create');
    Route::post('/job', [JobController::class, 'store'])->name('job.store');
    Route::get('/job/{job}', [JobController::class, 'show'])->name('job.show');
    Route::get('/job/{job}/edit', [JobController::class, 'edit'])->name('job.edit');
    Route::put('/job/{job}', [JobController::class, 'update'])->name('job.update');
    Route::delete('/job/{job}', [JobController::class, 'delete'])->name('job.delete');

    // Knowledge Base and Reports routes
    Route::view('/knowledge/index', 'knowledge/index')->name('knowledge');
    Route::view('/reports/index', 'reports/index')->name('reports');

    // L&D routes
    Route::get('/assign-learning/{id}', [LearningController::class, 'assignLearning'])->name('assignLearning');
    Route::get('/finish-learning/{id}', [LearningController::class, 'finishLearning'])->name('finishLearning');
});