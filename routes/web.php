<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\NewController;
use App\Http\Controllers\Admin\LinkController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\ImageController;
use App\Http\Controllers\Admin\UmrahController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CouncilController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\MuamtariController;
use App\Http\Controllers\Admin\GovernanceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
function set_active($route)
{
    if (is_array($route)) {
        return in_array(Request::path(), $route) ? 'mm-active' : '';
    }
    return Request::path() == $route ? 'mm-active' : '';
}
Route::get('/', [App\Http\Controllers\MainController::class, 'welcome'])->name('welcome');
Route::get('/contact_us', [App\Http\Controllers\MainController::class, 'contact_us'])->name('contact_us');
Route::get('/projects', [App\Http\Controllers\MainController::class, 'projects'])->name('projects');
Route::post('/umrah_request', [App\Http\Controllers\MainController::class, 'umrah_request'])->name('umrah_request');
Route::get('/events', [App\Http\Controllers\MainController::class, 'events'])->name('events');
Route::get('/governances', [App\Http\Controllers\MainController::class, 'governances'])->name('governances');

Route::get('/news', [App\Http\Controllers\MainController::class, 'news'])->name('news');
Route::get('/images', [App\Http\Controllers\MainController::class, 'images'])->name('images');
Route::get('/channel', [App\Http\Controllers\MainController::class, 'channel'])->name('channel');
Route::get('/about_us', [App\Http\Controllers\MainController::class, 'about_us'])->name('about_us');
Route::get('/project_details/{id}', [App\Http\Controllers\MainController::class, 'project_details'])->name('project_details');
Route::get('/download_go/{documention}', [MainController::class, 'download_go'])->name('download_go');
Route::get('/download_pro/{documention}', [MainController::class, 'download_pro'])->name('download_pro');

Auth::routes();
Route::group([
     'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => ['auth'],
], function () {
    Route::get('/statistics', [SettingController::class, 'statistics'])->name('statistics');
    Route::get('/profile', [SettingController::class, 'profile'])->name('profile');
    Route::any('/update_profile', [SettingController::class, 'update_profile'])->name('update_profile');

    Route::get('/muamtaris', [MuamtariController::class, 'muamtaris'])->name('muamtaris');
    Route::any('/accept/{id}', [MuamtariController::class, 'accept'])->name('accept');
    Route::any('/reject/{id}', [MuamtariController::class, 'reject'])->name('reject');


    Route::get('/statistics', [SettingController::class, 'statistics'])->name('statistics');
    Route::get('/charity_profile', [SettingController::class, 'charity_profile'])->name('charity_profile');
    Route::any('/update_charity_profile', [SettingController::class, 'update_charity_profile'])->name('update_charity_profile');


    Route::resource('partners', PartnerController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('news', NewController::class);
    Route::resource('councils', CouncilController::class);
    Route::resource('governances', GovernanceController::class);
    Route::resource('events', EventController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('employees', EmployeeController::class);
    Route::resource('contacts', EmployeeController::class);
    Route::resource('videos', VideoController::class);
    Route::resource('contacts', ContactController::class);
    Route::resource('sliders', SliderController::class);
    Route::resource('sections', SectionController::class);
    Route::resource('images', ImageController::class);
    Route::resource('umrahs', UmrahController::class);
    Route::resource('links', LinkController::class);

    Route::get('/download-document/{documention}', [GovernanceController::class, 'downloadDocument'])->name('download.document');
    Route::get('/download-document-PROJECT/{documention}', [ProjectController::class, 'downloadDocument'])->name('download.document.project');




});
Route::get('/clear', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('route:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('view:clear');
    ///Artisan::call('migrate:fresh', ['--seed' => true]);
    return 'All routes cache has just been removed';
});

Route::get('/home', [App\Http\Controllers\Admin\SettingController::class, 'statistics'])->name('home');
