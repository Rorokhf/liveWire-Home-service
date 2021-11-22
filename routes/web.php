<?php

use App\Http\Controllers\SearchController;
use App\Http\Livewire\Admin\AdminAddServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminAddServicesComponent;
use App\Http\Livewire\Admin\AdminAddSliderComponent;
use App\Http\Livewire\Admin\AdminContactComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminEditServicesComponent;
use App\Http\Livewire\Admin\AdminEditSliderComponent;
use App\Http\Livewire\Admin\AdminServiceCategoriesComponent;
use App\Http\Livewire\Admin\AdminServicesByCategoryComponent;
use App\Http\Livewire\Admin\AdminServicesComponent;
use App\Http\Livewire\Admin\AdminSliderComponent;
use App\Http\Livewire\ChangeLocationComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ServiceCategoriesComponent;
use App\Http\Livewire\ServicesByCategoryComponent;
use App\Http\Livewire\ServicesDetailsComponent;
use App\Http\Livewire\Sprovider\EditSproviderProfileComponent;
use App\Http\Livewire\Sprovider\SproviderDashboardComponent;
use App\Http\Livewire\Sprovider\SproviderProfileComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', HomeComponent::class)->name('home');
Route::get('/service-categories',ServiceCategoriesComponent::class)->name('home.service-categories');
Route::get('/{category_slug}/services',ServicesByCategoryComponent::class)->name('home.services-by-category');
Route::get('/service/{service_slug}',ServicesDetailsComponent::class)->name('home.service-details');

Route::get('/autocomplete',[SearchController::class,'autocomplete'])->name('autocomplete');
Route::post('/searchService',[SearchController::class,'searchService'])->name('searchService');

Route::get('/change-location',ChangeLocationComponent::class)->name('change-location');
Route::get('/contact',ContactComponent::class)->name('contact');
// for User/Custommer
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/user/dashboard', UserDashboardComponent::class)->name('user.dashboard');
});
// Service provider
Route::middleware(['auth:sanctum', 'verified', 'authSprovider'])->group(function () {
    Route::get('/service-provider/dashboard', SproviderDashboardComponent::class)->name('s.dashboard');
    Route::get('/service-provider/profile',SproviderProfileComponent::class)->name('s.profile');
    Route::get('/service-provider/profile/edit',EditSproviderProfileComponent::class)->name('s.edit-prpfile');
});
//Admin
Route::middleware(['auth:sanctum', 'verified', 'authAdmin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/service-category',AdminServiceCategoriesComponent::class)->name('admin.service-category');
    Route::get('/admin/add-service-category',AdminAddServiceCategoryComponent::class)->name('admin.add-service-category');
    Route::get('/admin/edit-survies-category/{sCategory_id}',AdminEditServiceCategoryComponent::class)->name('admin.edit-service-category');
    Route::get('/admin/Allservices',AdminServicesComponent::class)->name('admin.All-services');
    Route::get('/admin/{scategory_slug}/services',AdminServicesByCategoryComponent::class)->name('admin.service-by-category');
    Route::get('/admin/service/add',AdminAddServicesComponent::class)->name('admin.add-service');
    Route::get('/admin/edit-service/{service_slug}',AdminEditServicesComponent::class)->name('admin.edit-ervice');
    Route::get('/admin/slider',AdminSliderComponent::class)->name('admin.slider');
    Route::get('/admin/add-slider',AdminAddSliderComponent::class)->name('admin.add-slider');
    Route::get('/admin/edit-slider/{slider_id}',AdminEditSliderComponent::class)->name('admin.edit-slider');
    Route::get('/admin/contact',AdminContactComponent::class)->name('admin.contact');
});
