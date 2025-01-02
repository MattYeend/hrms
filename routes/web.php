<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Artisan;
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
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\CacheController;
use App\Http\Controllers\NotesController;

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
    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/users', [UserController::class, 'store'])->name('user.store');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/users/{user}', [UserController::class, 'delete'])->name('user.delete');
    Route::get('/users/{id}/profile', [UserController::class, 'show'])->name('user.show');
    Route::get('/show/{id}', [UserController::class, 'show'])->name('profile');
    Route::get('/get-dark-mode-preference', [UserController::class, 'getDarkModePreference'])->name('get-dark-mode-preference');
    Route::post('/toggle-dark-mode', [UserController::class, 'toggleDarkMode'])->name('toggle-dark-mode');
    Route::post('/users/{user}/profile-picture', [UserController::class, 'uploadProfilePicture'])->name('user.uploadProfilePicture');
    Route::post('/users/{user}/cv', [UserController::class, 'uploadCv'])->name('user.uploadCv');
    Route::post('/users/{user}/cover-letter', [UserController::class, 'uploadCoverLetter'])->name('user.uploadCoverLetter');
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
    Route::get('/leaves/{leave}', [LeaveController::class, 'show'])->name('leave.show');
    Route::get('/leaves/{leave}/edit', [LeaveController::class, 'edit'])->name('leave.edit');
    Route::put('/leaves/{leave}', [LeaveController::class, 'update'])->name('leave.update');
    Route::delete('/leaves/{leave}', [LeaveController::class, 'delete'])->name('leave.delete');
    Route::post('/leaves/{leave}/approve', [LeaveController::class, 'approve'])->name('leave.approve');
    Route::post('/leaves/{leave}/deny', [LeaveController::class, 'deny'])->name('leave.deny');
    Route::get('/leaves/outstanding', [LeaveController::class, 'outstandingRequests'])->name('leave.outstanding');

    // Rotas routes
    Route::get('/rotas', [RotasController::class, 'index'])->name('rotas.index');
    Route::get('/rotas/create', [RotasController::class, 'create'])->name('rotas.create');
    Route::post('/rotas', [RotasController::class, 'store'])->name('rotas.store');
    Route::get('/rotas/{rotas}', [RotasController::class, 'show'])->name('rotas.show');
    Route::get('/rotas/{rotas}/edit', [RotasController::class, 'edit'])->name('rotas.edit');
    Route::put('/rotas/{rotas}', [RotasController::class, 'update'])->name('rotas.update');
    Route::delete('/rotas/{rotas}', [RotasController::class, 'delete'])->name('rotas.delete');

    // Licence routes
    Route::get('/licences', [LicenceController::class, 'index'])->name('licence.index');
    Route::get('/licences/create', [LicenceController::class, 'create'])->name('licence.create');
    Route::post('/licences', [LicenceController::class, 'store'])->name('licence.store');
    Route::get('/licences/{licence}', [LicenceController::class, 'show'])->name('licence.show');
    Route::get('/licences/{licence}/edit', [LicenceController::class, 'edit'])->name('licence.edit');
    Route::put('/licences/{licence}', [LicenceController::class, 'update'])->name('licence.update');
    Route::delete('/licences/{licence}', [LicenceController::class, 'delete'])->name('licence.delete');

    // Address Book routes
    Route::get('/address-books', [AddressBookController::class, 'index'])->name('addressBook.index');
    Route::get('/address-books/create', [AddressBookController::class, 'create'])->name('addressBook.create');
    Route::post('/address-books', [AddressBookController::class, 'store'])->name('addressBook.store');
    Route::get('/address-books/{addressBook}', [AddressBookController::class, 'show'])->name('addressBook.show');
    Route::get('/address-books/{addressBook}/edit', [AddressBookController::class, 'edit'])->name('addressBook.edit');
    Route::put('/address-books/{addressBook}', [AddressBookController::class, 'update'])->name('addressBook.update');
    Route::delete('/address-books/{addressBook}', [AddressBookController::class, 'delete'])->name('addressBook.delete');

    // Address Contact routes
    Route::get('/address-contacts', [AddressContactController::class, 'index'])->name('addressContact.index');
    Route::get('/address-contacts/create', [AddressContactController::class, 'create'])->name('addressContact.create');
    Route::post('/address-contacts', [AddressContactController::class, 'store'])->name('addressContact.store');
    Route::get('/address-contacts/{addressContact}', [AddressContactController::class, 'show'])->name('addressContact.show');
    Route::get('/address-contacts/{addressContact}/edit', [AddressContactController::class, 'edit'])->name('addressContact.edit');
    Route::put('/address-contacts/{addressContact}', [AddressContactController::class, 'update'])->name('addressContact.update');
    Route::delete('/address-contacts/{addressContact}', [AddressContactController::class, 'delete'])->name('addressContact.delete');

    // Contracts routes
    Route::get('/contracts', [ContractController::class, 'index'])->name('contract.index');
    Route::get('/contracts/create', [ContractController::class, 'create'])->name('contract.create');
    Route::post('/contracts', [ContractController::class, 'store'])->name('contract.store');
    Route::get('/contracts/{contract}', [ContractController::class, 'show'])->name('contract.show');
    Route::get('/contracts/{contract}/edit', [ContractController::class, 'edit'])->name('contract.edit');
    Route::put('/contracts/{contract}', [ContractController::class, 'update'])->name('contract.update');
    Route::delete('/contracts/{contract}', [ContractController::class, 'delete'])->name('contract.delete');

    // Companies routes
    Route::get('/companies', [CompanyController::class, 'index'])->name('company.index');
    Route::get('/companies/create', [CompanyController::class, 'create'])->name('company.create');
    Route::post('/companies', [CompanyController::class, 'store'])->name('company.store');
    Route::get('/companies/{company}', [CompanyController::class, 'show'])->name('company.show');
    Route::get('/companies/{company}/edit', [CompanyController::class, 'edit'])->name('company.edit');
    Route::put('/companies/{company}', [CompanyController::class, 'update'])->name('company.update');
    Route::delete('/companies/{company}', [CompanyController::class, 'delete'])->name('company.delete');

    // Company Contacts routes
    Route::get('/company-contacts', [CompanyContactController::class, 'index'])->name('companyContact.index');
    Route::get('/company-contacts/create', [CompanyContactController::class, 'create'])->name('companyContact.create');
    Route::post('/company-contacts', [CompanyContactController::class, 'store'])->name('companyContact.store');
    Route::get('/company-contacts/{companyContact}', [CompanyContactController::class, 'show'])->name('companyContact.show');
    Route::get('/company-contacts/{companyContact}/edit', [CompanyContactController::class, 'edit'])->name('companyContact.edit');
    Route::put('/company-contacts/{companyContact}', [CompanyContactController::class, 'update'])->name('companyContact.update');
    Route::delete('/company-contacts/{companyContact}', [CompanyContactController::class, 'delete'])->name('companyContact.delete');

    // Departments routes
    Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
    Route::get('/departments/create', [DepartmentController::class, 'create'])->name('departments.create');
    Route::post('/departments', [DepartmentController::class, 'store'])->name('departments.store');
    Route::get('/departments/{slug}', [DepartmentController::class, 'show'])->name('departments.show');
    Route::get('/departments/{slug}/edit', [DepartmentController::class, 'edit'])->name('departments.edit');
    Route::put('/departments/{slug}', [DepartmentController::class, 'update'])->name('departments.update');
    Route::delete('/departments/{slug}', [DepartmentController::class, 'delete'])->name('departments.delete');

    // Job routes
    Route::get('/jobs', [JobController::class, 'index'])->name('job.index');
    Route::get('/jobs/create', [JobController::class, 'create'])->name('job.create');
    Route::post('/jobs', [JobController::class, 'store'])->name('job.store');
    Route::get('/jobs/{slug}', [JobController::class, 'show'])->name('job.show');
    Route::get('/jobs/{slug}/edit', [JobController::class, 'edit'])->name('job.edit');
    Route::put('/jobs/{slug}', [JobController::class, 'update'])->name('job.update');
    Route::delete('/jobs/{slug}', [JobController::class, 'delete'])->name('job.delete');

    // Knowledge Base and Reports routes
    Route::view('/knowledge/index', 'knowledge/index')->name('knowledge');
    Route::view('/reports/index', 'reports/index')->name('reports');

    // L&D routes
    Route::get('/assign-learnings/{id}', [LearningController::class, 'assignLearning'])->name('assignLearning');
    Route::get('/finish-learnings/{id}', [LearningController::class, 'finishLearning'])->name('finishLearning');

    // Email Logs
    Route::get('/email-logs', [EmailLogsController::class, 'index'])->name('emailLogs.index');

    // Blog routes
    Route::get('/blogs', [BlogsController::class, 'index'])->name('blogs.index');
    Route::get('/blogs/create', [BlogsController::class, 'create'])->name('blogs.create');
    Route::post('/blogs', [BlogsController::class, 'store'])->name('blogs.store');
    Route::get('/blogs/{slug}', [BlogsController::class, 'show'])->name('blogs.show');
    Route::get('/blogs/{slug}/edit', [BlogsController::class, 'edit'])->name('blogs.edit');
    Route::put('/blogs/{slug}', [BlogsController::class, 'update'])->name('blogs.update');
    Route::delete('/blogs/{slug}', [BlogsController::class, 'delete'])->name('blogs.delete');
    Route::post('/blogs/{slug}/approve', [BlogsController::class, 'approve'])->name('blogs.approve');
    Route::post('/blogs/{slug}/deny', [BlogsController::class, 'deny'])->name('blogs.deny');
    Route::get('/blogs-list', [BlogsController::class, 'listView'])->name('blogs.list');

    // Cache routes
    Route::get('/cache', [CacheController::class, 'index'])->name('cache.index');
    Route::get('/clear', [CacheController::class, 'clear'])->name('cache.clear');

    // Notes routes
    Route::get('/notes', [NotesController::class, 'index'])->name('notes.index');
    Route::get('/notes/create', [NotesController::class, 'create'])->name('notes.create');
    Route::post('/notes', [NotesController::class, 'store'])->name('notes.store');
    Route::get('/notes/{notes}', [NotesController::class, 'show'])->name('notes.show');
    Route::get('/notes/{notes}/edit', [NotesController::class, 'edit'])->name('notes.edit');
    Route::put('/notes/{notes}', [NotesController::class, 'update'])->name('notes.update');
    Route::delete('/notes/{notes}', [NotesController::class, 'delete'])->name('notes.delete');
});