<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Cms\TestController;

use App\Http\Controllers\Cms\DashboardController;
use App\Http\Controllers\Cms\ThemeController;
use App\Http\Controllers\Cms\FrontendController;

use App\Http\Controllers\Ums\QrCodeController;
use App\Http\Controllers\Ums\ProfileController;
use App\Http\Controllers\Ums\SocialLinkController;

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

Route::get('/apps/all-clear', function() {
    Artisan::call('optimize:clear');
});

/*Route::middleware(['guest'])->get('/', function () {
    return view('frontend-pages.index');
});*/

Route::middleware(['guest'])->get('/register', function () {
    abort(403);
})->name('register');

Route::get('/', [FrontendController::class, 'frontend_index'])->name('frontend.index');
Route::get('/{link}', [FrontendController::class, 'frontend_profile'])->name('frontend.profile');
Route::get('/pages/faq', [FrontendController::class, 'frontend_faq'])->name('frontend.faq');
Route::get('/pages/about-us', [FrontendController::class, 'frontend_about'])->name('frontend.about');

// Route::get('/test', [TestController::class, 'test'])->name('test');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
	Route::get('/backend/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
	Route::post('/save-theme', [ThemeController::class, 'select_theme'])->name('select.theme');

	Route::group(['prefix' => 'qr-code', 'as' => 'qrcode.'], function(){
		Route::get('/generate', [QrCodeController::class, 'generate_qrcode'])->name('generate');
		Route::post('/store', [QrCodeController::class, 'store_qrcode'])->name('store');
		Route::post('/upload-qrcode-file', [QrCodeController::class, 'upload_qrcode_file'])->name('upload.files');
		Route::get('/unused', [QrCodeController::class, 'unused_qrcode'])->name('unused');
		Route::get('/used', [QrCodeController::class, 'used_qrcode'])->name('used');
		Route::get('/manage/{link}', [QrCodeController::class, 'manage_qrcode'])->name('manage');
	});

	Route::group(['prefix' => 'social-link', 'as' => 'social.'], function(){
		Route::get('/index', [SocialLinkController::class, 'index'])->name('index');
		Route::get('/create', [SocialLinkController::class, 'create'])->name('create');
		Route::post('/store', [SocialLinkController::class, 'store'])->name('store');
		Route::get('/edit/{id}', [SocialLinkController::class, 'edit'])->name('edit');
		Route::post('/update/{id}', [SocialLinkController::class, 'update'])->name('update');
		Route::get('/delete/{id}', [SocialLinkController::class, 'destroy'])->name('destroy');
	});

	Route::get('/users/all-profiles', [SocialLinkController::class, 'all_users'])->name('all.users.profile');

	Route::group(['middleware' => ['role:User']], function () {
	    Route::get('/user/edit-profile', [ProfileController::class, 'edit_profile'])->name('edit.profile');
	    Route::post('/user/update-profile', [ProfileController::class, 'update_profile'])->name('update.profile');
	    Route::get('/user/social-media', [ProfileController::class, 'social_media'])->name('social.media.links');
	    Route::post('/user/save/social-media', [ProfileController::class, 'save_social_media'])->name('save.social.media.links');
	    Route::get('/user/delete/social-media/{key}', [ProfileController::class, 'delete_social_media'])->name('user.delete.social');

	    Route::post('/user/save/basic-info', [ProfileController::class, 'save_basic_info'])->name('save.basic.info');
	    Route::post('/user/save/change-password', [ProfileController::class, 'change_auth_password'])->name('change.auth.password');

	    Route::get('/user/profile-mode', [ProfileController::class, 'profile_mode'])->name('profile.mode');
	    Route::post('/user/public-theme', [ProfileController::class, 'public_theme'])->name('public.theme');
	});

});
