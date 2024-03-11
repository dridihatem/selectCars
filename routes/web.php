<?php

use Illuminate\Support\Facades\Route;
//Controller Front
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\CategorieController;
use App\Http\Controllers\Front\VoitureController;
use App\Http\Controllers\Front\ModelVoitureController;
use App\Http\Controllers\Front\MarqueController;
use App\Http\Controllers\Front\LieuController;
use App\Http\Controllers\Front\DemandeVisiteController;
use App\Http\Controllers\Front\BannerController;
use App\Http\Controllers\Admin\AdminController;


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

/*Route::get('/', function () {
    return view('welcome');
});
*/
// Route for menu nav



    Route::get('/', [HomeController::class, 'index']);
    Route::get('/financement-voiture-occasion-france', [FaqController::class, 'index'])->name('faq');
    Route::get('/contact-voiture-occasion-france', [ContactController::class, 'index'])->name('contact');

    //Route for contact POST
    Route::post('/contact-voiture-occasion-france',[ContactController::class,'store'])->name('contact.us.store');

    //Route contact visite
    Route::post('/demandevisite',[DemandeVisiteController::class,'store'])->name('visite.us.store');
    //Ajax search bar
    Route::get('/getModels/{id}',[HomeController::class,'getModels'])->name('getModels');


    //Route Search action
    //Search 

    Route::get('search',[HomeController::class,'search'])->name('search');
    //Route Categorie 
    Route::get('/categories',[CategorieController::class,'index'])->name('categories');
    Route::get('/categorie/{slug}',[CategorieController::class,'show']);

    //Route Marque

    Route::get('/marques',[MarqueController::class,'index'])->name('marques');
    Route::get('/marques/{slug}',[MarqueController::class,'show']);


    //Route Voiture

    Route::get('/voitures',[VoitureController::class,'index'])->name('voitures');
    Route::get('/voitures/{reference}',[VoitureController::class,'detail']);

    /*Admin Route*/
    Route::get('/admin',[AdminController::class,'login_form'])->name('login.form');
    Route::post('/admin/login-functionality',[AdminController::class,'login_functionality'])->name('login.functionality');
    Route::middleware(['admin', 'revalidate'])->group(function(){

    Auth::routes();

    Route::get('logoutSession',[AdminController::class,'logoutadmin'])->name('logoutSession');
    Route::get('admin/dashboard',[AdminController::class,'dashboard'])->name('dashboard');
    Route::get('admin/calendar',[AdminController::class,'calendar'])->name('admin.calendar');

    Route::get('admin/list_voitures',[VoitureController::class,'adminlist_voiture'])->name('admin.list_voitures');
    Route::get('admin/list_voitures/add',[VoitureController::class,'create'])->name('admin.list_voitures.add');
    Route::post('admin/list_voitures/add',[VoitureController::class,'store'])->name('admin.list_voitures.store');
    Route::get('admin/list_voitures/{id}/detail',[VoitureController::class,'show'])->name('admin.list_voitures.detail');
    Route::post('admin/list_voitures/{id}/update',[VoitureController::class,'update'])->name('admin.list_voitures.update');
    Route::get('admin/list_voitures/{id}/edit',[VoitureController::class,'edit'])->name('admin.list_voitures.edit');
    Route::post('admin/checkreference',[VoitureController::class,'checkReference'])->name('admin.checkreference');
    Route::get('admin/list_voitures/{id}/delete',[VoitureController::class,'destroy'])->name('admin.list_voitures.delete');
    Route::get('admin/list_voitures/{id}/deleteimage1',[VoitureController::class,'deleteimage1'])->name('admin.voiture.deleteimage1');
    Route::get('admin/list_voitures/{id}/deleteimage2',[VoitureController::class,'deleteimage2'])->name('admin.voiture.deleteimage2');
    Route::get('admin/list_voitures/{id}/deleteimage3',[VoitureController::class,'deleteimage3'])->name('admin.voiture.deleteimage3');
    Route::get('admin/list_voitures/{id}/deleteimage4',[VoitureController::class,'deleteimage4'])->name('admin.voiture.deleteimage4');
    Route::get('admin/list_voitures/{id}/deleteimage5',[VoitureController::class,'deleteimage5'])->name('admin.voiture.deleteimage5');


    Route::get('admin/list_categories',[CategorieController::class,'adminlist_categorie'])->name('admin.list_categories');
    Route::get('admin/list_categories/add',[CategorieController::class,'create'])->name('admin.list_categories.add');
    Route::post('admin/list_categories/add',[CategorieController::class,'store'])->name('admin.list_categories.store');
    Route::get('admin/list_categories/{id}/detail',[CategorieController::class,'afficher'])->name('admin.list_categories.detail');
    Route::post('admin/list_categories/{id}/update',[CategorieController::class,'update'])->name('admin.list_categories.update');
    Route::get('admin/list_categories/{id}/edit',[CategorieController::class,'edit'])->name('admin.list_categories.edit');
    Route::get('admin/list_categories/{id}/delete',[CategorieController::class,'destroy'])->name('admin.list_categories.delete');
    
    Route::get('admin/list_categories/{id}/deleteimage',[CategorieController::class,'deleteimage'])->name('admin.categories.deleteimage');



    Route::get('admin/list_marques',[MarqueController::class,'adminlist_marque'])->name('admin.list_marques');
    Route::get('admin/list_marques/add',[MarqueController::class,'create'])->name('admin.list_marques.add');
    Route::post('admin/list_marques/add',[MarqueController::class,'store'])->name('admin.list_marques.store');
    Route::get('admin/list_marques/{id}/detail',[MarqueController::class,'show'])->name('admin.list_marques.detail');
    Route::get('admin/list_marques/{id}/edit',[MarqueController::class,'edit'])->name('admin.list_marques.edit');
    Route::post('admin/list_marques/{id}/update',[MarqueController::class,'update'])->name('admin.list_marques.update');
    Route::get('admin/list_marques/{id}/delete',[MarqueController::class,'destroy'])->name('admin.list_marques.delete');
    Route::get('admin/list_marques/{id}/deleteimage',[MarqueController::class,'deleteimage'])->name('admin.marques.deleteimage');




    Route::get('admin/list_modeles',[ModelVoitureController::class,'adminlist_modele'])->name('admin.list_modeles');
    Route::get('admin/list_modeles/add',[ModelVoitureController::class,'create'])->name('admin.list_modeles.add');
    Route::post('admin/list_modeles/add',[ModelVoitureController::class,'store'])->name('admin.list_modeles.store');
    
    Route::get('admin/list_modeles/{id}/edit',[ModelVoitureController::class,'edit'])->name('admin.list_modeles.edit');
    Route::get('admin/list_modeles/{id}/detail',[ModelVoitureController::class,'show'])->name('admin.list_modeles.detail');
    Route::post('admin/list_modeles/{id}/update',[ModelVoitureController::class,'update'])->name('admin.list_modeles.update');
    Route::get('admin/list_modeles/{id}/delete',[ModelVoitureController::class,'destroy'])->name('admin.list_modeles.delete');



    Route::get('admin/list_lieux',[LieuController::class,'adminlist_lieu'])->name('admin.list_lieux');
    Route::get('admin/list_lieux/add',[LieuController::class,'create'])->name('admin.list_lieux.add');
    Route::post('admin/list_lieux/add',[LieuController::class,'store'])->name('admin.list_lieux.store');
    Route::get('admin/list_lieux/{id}/edit',[LieuController::class,'edit'])->name('admin.list_lieux.edit');
    Route::get('admin/list_lieux/{id}/detail',[LieuController::class,'show'])->name('admin.list_lieux.detail');
    Route::post('admin/list_lieux/{id}/update',[LieuController::class,'update'])->name('admin.list_lieux.update');
    Route::get('admin/list_lieux/{id}/delete',[LieuController::class,'destroy'])->name('admin.list_lieux.delete');



    Route::get('admin/list_vendues',[VoitureController::class,'adminlist_voiture_vendues'])->name('admin.list_voiture_vendues');

    Route::get('admin/list_disponibles',[VoitureController::class,'adminlist_voiture_disponibles'])->name('admin.list_voiture_disponibles');

    Route::get('admin/demande_visites',[DemandeVisiteController::class,'adminlist_demande_visite'])->name('admin.list_demande_visite');
    Route::get('admin/demande_visites/{id}/detail',[DemandeVisiteController::class,'show'])->name('admin.list_demande_visite.show');
    Route::get('admin/demande_visites/{id}/delete',[DemandeVisiteController::class,'destroy'])->name('admin.list_demande_visite.delete');


    Route::get('admin/list_faq',[FaqController::class,'adminlist_faq'])->name('admin.list_faq');
    Route::get('admin/list_faq/add',[FaqController::class,'create'])->name('admin.list_faq.add');
    Route::post('admin/list_faq/add',[FaqController::class,'store'])->name('admin.list_faq.store');
    Route::get('admin/list_faq/{id}/edit',[FaqController::class,'edit'])->name('admin.list_faq.edit');
    Route::post('admin/list_faq/{id}/update',[FaqController::class,'update'])->name('admin.list_faq.update');
    Route::get('admin/list_faq/{id}/delete',[FaqController::class,'destroy'])->name('admin.list_faq.delete');


    Route::get('admin/list_banners',[BannerController::class,'adminlist_banner'])->name('admin.list_banners');
    Route::get('admin/list_banners/add',[BannerController::class,'create'])->name('admin.list_banners.add');
    Route::post('admin/list_banners/add',[BannerController::class,'store'])->name('admin.list_banners.store');
    Route::get('admin/list_banners/{id}/edit',[BannerController::class,'edit'])->name('admin.list_banners.edit');
    Route::post('admin/list_banners/{id}/update',[BannerController::class,'update'])->name('admin.list_banners.update');
    Route::get('admin/list_banners/{id}/deleteimage',[BannerController::class,'deleteimage'])->name('admin.banners.deleteimage');
    Route::get('admin/list_banners/{id}/delete',[BannerController::class,'destroy'])->name('admin.banners.delete');

    Route::get('admin/settings',[AdminController::class,'settings'])->name('admin.settings');
    Route::post('admin/settings/{id}',[AdminController::class,'update'])->name('admin.settings.update');



});







Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');