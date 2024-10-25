<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\HomeBanner;
use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Admin\DoctorsController;
use App\Http\Controllers\Admin\TestimonialsController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\BlogsController;
use App\Http\Controllers\Admin\ScheduleController;
use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ContactController;

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

Route::get('/', [FrontendController::class,'index'])->name('index');
Route::get('/services', [FrontendController::class,'serviceslist'])->name('services.list');
Route::get('/services-details/{id}', [FrontendController::class,'servicesdetails'])->name('services.details');
Route::get('/doctors', [FrontendController::class,'doctorslist'])->name('doctors.list');
Route::get('/doctors-details/{id}', [FrontendController::class,'doctorsdetails'])->name('doctors.details');
Route::get('portfolio', [FrontendController::class, 'portfolioslist'])->name('portfolios.list');
Route::get('portfolios-by-service/{serviceId}', [FrontendController::class, 'getPortfoliosByService'])->name('portfolios.byService');
Route::post('appointment/submit', [FrontendController::class, 'storeappointment'])->name('appointment.store');

Route::get('/blogs', [FrontendController::class,'blogslist'])->name('blogs.list');
Route::get('/blogs-details/{id}', [FrontendController::class,'blogdetails'])->name('blogs.details');
Route::get('/appointment', [FrontendController::class,'appointment'])->name('appointment');
Route::get('/contact', [FrontendController::class,'contact'])->name('contact');
Route::get('/about', [FrontendController::class,'about'])->name('about');
Route::post('contact/submit', [FrontendController::class,'contactsubmit'])->name('contact.submit');


Route::middleware(['web', 'auth', 'isAdmin'])->prefix('admin')->group( function(){
  Route::get('/dashboard', [AdminDashboardController::class,'admindashboard'])->name('admin.dashboard');
  Route::get('hero/banner', [HomeBanner::class,'index'])->name('admin.hero.banner');
  Route::post('hero/banner/update', [HomeBanner::class,'updateherohome'])->name('admin.hero.banner.update');

  Route::get('services', [ServicesController::class,'index'])->name('admin.services');
  Route::get('services/create', [ServicesController::class,'create'])->name('admin.services.create');
  Route::post('services/store', [ServicesController::class,'store'])->name('admin.services.store');
  Route::get('services/edit/{id}', [ServicesController::class,'edit'])->name('admin.services.edit');
  Route::put('services/update/{id}', [ServicesController::class,'update'])->name('admin.services.update');
  Route::get('services/delete/{id}', [ServicesController::class,'delete'])->name('admin.services.delete');


  Route::get('doctors', [DoctorsController::class,'index'])->name('admin.doctors');
  Route::get('doctors/create', [DoctorsController::class,'create'])->name('admin.doctors.create');
  Route::post('doctors/store', [DoctorsController::class,'store'])->name('admin.doctors.store');
  Route::get('doctors/edit/{id}', [DoctorsController::class,'edit'])->name('admin.doctors.edit');
  Route::put('doctors/update/{id}', [DoctorsController::class,'update'])->name('admin.doctors.update');
  Route::get('doctors/delete/{id}', [DoctorsController::class,'delete'])->name('admin.doctors.delete');


  Route::get('testimonials', [TestimonialsController::class,'index'])->name('admin.testimonials');

  Route::get('testimonials/create', [TestimonialsController::class,'create'])->name('admin.testimonials.create');
  Route::post('testimonials/store', [TestimonialsController::class,'store'])->name('admin.testimonials.store');
  Route::get('testimonials/edit/{id}', [TestimonialsController::class,'edit'])->name('admin.testimonials.edit');
  Route::put('testimonials/update/{id}', [TestimonialsController::class,'update'])->name('admin.testimonials.update');
  Route::get('testimonials/delete/{id}', [TestimonialsController::class,'delete'])->name('admin.testimonials.delete');


  Route::get('portfolio', [PortfolioController::class,'index'])->name('admin.portfolio');
  Route::get('portfolio/create', [PortfolioController::class,'create'])->name('admin.portfolio.create');
  Route::post('portfolio/store', [PortfolioController::class,'store'])->name('admin.portfolio.store');
  Route::get('portfolio/edit/{id}', [PortfolioController::class,'edit'])->name('admin.portfolio.edit');
  Route::put('portfolio/update/{id}', [PortfolioController::class,'update'])->name('admin.portfolio.update');
  Route::get('portfolio/delete/{id}', [PortfolioController::class,'delete'])->name('admin.portfolio.delete');

  Route::get('portfolio/images/{id}', [PortfolioController::class,'viewimages'])->name('admin.portfolio.images');
  Route::get('portfolio/create/images/{id}', [PortfolioController::class,'createimages'])->name('admin.portfolio.create.images');
  Route::post('portfolio/store/images/{id}', [PortfolioController::class,'storeimages'])->name('admin.portfolio.store.images');
  Route::get('portfolio/delete/{id}/images/{imageid}', [PortfolioController::class,'deleteimages'])->name('admin.portfolio.delete.images');

  Route::get('blogs', [BlogsController::class,'index'])->name('admin.blogs');
  Route::get('blogs/create', [BlogsController::class,'create'])->name('admin.blogs.create');
  Route::post('blogs/store', [BlogsController::class,'store'])->name('admin.blogs.store');
  Route::get('blogs/edit/{id}', [BlogsController::class,'edit'])->name('admin.blogs.edit');
  Route::put('blogs/update/{id}', [BlogsController::class,'update'])->name('admin.blogs.update');
  Route::get('blogs/delete/{id}', [BlogsController::class,'delete'])->name('admin.blogs.delete');


  Route::get('schedule', [ScheduleController::class,'index'])->name('admin.schedule');
  Route::get('schedule/create', [ScheduleController::class,'create'])->name('admin.schedule.create');
  Route::post('schedule/store', [ScheduleController::class,'store'])->name('admin.schedule.store');
  Route::get('schedule/edit/{id}', [ScheduleController::class,'edit'])->name('admin.schedule.edit');
  Route::put('schedule/edit/{id}', [ScheduleController::class,'update'])->name('admin.schedule.update');
  Route::get('schedule/delete/{id}', [ScheduleController::class,'delete'])->name('admin.schedule.delete');

  Route::get('appointment', [AppointmentController::class,'index'])->name('admin.users.appointment');


  Route::get('about', [AboutController::class,'index'])->name('admin.about');
  Route::post('about/update', [AboutController::class,'updateabout'])->name('admin.about.update');
  Route::get('contact', [ContactController::class,'index'])->name('admin.contact');
});


Route::middleware(['web','auth','isDoctor'])->prefix('doctor')->group( function(){

});

Route::middleware(['web','auth','isUser'])->group( function(){

});


Route::get('register',[LoginRegisterController::class,'registerpage']);
Route::get('login',[LoginRegisterController::class,'loginpage']);
Route::post('register',[LoginRegisterController::class,'register'])->name('register');
Route::post('login',[LoginRegisterController::class,'login'])->name('login');

Route::get('forgot-password', [LoginRegisterController::class, 'forgetpasswordpage'])->name('forgot.password');
Route::post('forgot-password', [LoginRegisterController::class, 'forgotPassword'])->name('forgot.password.post');

Route::get('reset-password', [LoginRegisterController::class, 'changepasswordpage'])->name('password.reset');
Route::post('reset-password', [LoginRegisterController::class, 'resetPassword'])->name('reset.password.post');

Route::get('verify-email/{token}', [VerificationController::class , 'verifyEmail'])->name('verify.email');
Route::post('logout',[LoginRegisterController::class,'logout'])->middleware('auth:sanctum')->name('logout');

