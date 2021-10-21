<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

Route::get('payment', function (){return view('pages/stripe_payment');});
Route::post('/stripe-payment', [\App\Http\Controllers\ListingsController::class, 'payWithStripe'])->name('stripe.payment');

Route::get('/', function () {return view('home');});
Route::get('reset-password-mail', function () {return view('layouts/reset-password-mail');});
Route::post('validate-password-token',[App\Http\Controllers\Auth\ForgotPasswordController::class, 'validateToken'])->name('validateToken');
Route::get('resources', function () {return view('pages/resources');})->name('resources');
Route::get('dna-machine', function () {return view('pages/dna-machine');})->name('dnaMachine');
Route::get('/social-media-share', [App\Http\Controllers\HomeController::class,'ShareWidget']);

Route::get('single-puppy', function () {return view('pages/single-listing');})->name('puppy');

Route::get('stud_listings',[App\Http\Controllers\ListingsController::class, 'showStuds'])->name('showStuds');
Route::get('puppy_listing',[App\Http\Controllers\ListingsController::class, 'showPuppies'])->name('showPuppies');
Route::get('puppy-listing/{slug}',[App\Http\Controllers\ListingsController::class, 'showSinglePuppy'])->name('showPuppy');
Route::post('find-listings',[App\Http\Controllers\ListingsController::class, 'findListings'])->name('findListings');
Route::post('filter-listings', [App\Http\Controllers\ListingsController::class, 'filterPuppies'])->name('filterPuppies');
Route::post('filter-by-zip',[App\Http\Controllers\ListingsController::class, 'filterByZip'])->name('filterByZip');
Route::post('filter-by-dna',[App\Http\Controllers\ListingsController::class, 'filterByDNA'])->name('filterByDNA');
Route::post('filter-by-radius',[App\Http\Controllers\ListingsController::class, 'filterByRadius'])->name('filterByRadius');
Route::post('search-coats',[App\Http\Controllers\ListingsController::class, 'searchDNACoat'])->name('searchDNACoat');

Route::post('add-or-remove-to-favourite',[App\Http\Controllers\SavedItemsController::class, 'addOrRemoveToFavourite'])->name('addOrRemoveToFavourite');
Route::post('add-to-favourite-with-user-register',[App\Http\Controllers\SavedItemsController::class, 'addToFavouriteWithUserRegister'])->name('addToFavouriteWithUserRegister');
Route::post('add-to-favourite-with-user-login',[App\Http\Controllers\SavedItemsController::class, 'addToFavouriteWithUserLogin'])->name('addToFavouriteWithUserLogin');
Route::get('litter-listings', [App\Http\Controllers\LittersController::class, 'showLitters'])->name('showLitters');
Route::get('/show-litter/{slug}',[App\Http\Controllers\LittersController::class, 'showSingleLitter'])->name('showLitter');
Route::get('show-kennel/{id}',[App\Http\Controllers\BreederController::class, 'singleKennel'])->name('singleKennel');

Route::get('selecttype', function () {return view('auth/user_type');})->name('selecttype');

Route::get('registerbreeder', function () {
    return view('auth/register_breeder');
})->name('registerbreeder');

Route::get('registercustomer', function () {
    return view('auth/register_customer');
})->name('registercustomer');


Route::get('get-address-from-ip',[App\Http\Controllers\GeoLocationController::class, 'index'])->name('getAddress');
Route::get('find-kennels',[App\Http\Controllers\GeoLocationController::class, 'findKennels'])->name('findKennels');


//Mail Routes

Route::post('/contactBreeder', [App\Http\Controllers\Mail\MailController::class, 'sendMailCustomerContactBreeder'])->name('contactBreederMail');
Route::post('/contactUs', [App\Http\Controllers\Mail\MailController::class, 'sendContactUsMail'])->name('contactUsMail');

//Auth Routes
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::post('/createCustomer', [App\Http\Controllers\Auth\RegisterController::class, 'createCustomer'])->name('createCustomer');
Route::post('/createBreeder', [App\Http\Controllers\Auth\RegisterController::class, 'createBreeder'])->name('createBreeder');

Route::post('/check-for-existing-user', [App\Http\Controllers\Auth\RegisterController::class, 'checkForExistingUser'])->name('checkForExistingUser');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('customer', \App\Http\Controllers\CustomerController::class);

Route::middleware(['auth'])->group(function () {
    Route::post('/user-settings-update', function (Request $request) {
        app(App\Http\Controllers\Auth\RegisterController::class)->updateRegisteredUser($request);
        if (Auth::user()->role->getValue() == 'breeder'){
            return redirect()->route('breederProfile');
        }else{
            return redirect()->route('customerProfile');
        }
    })->name('updateRegisteredUser');
//    Route::post('/updateUser',[App\Http\Controllers\Auth\RegisterController::class, 'updateRegisteredUser'])->name('updateRegisteredUser');

    // DASHBOARD
    Route::get('breader-dashboard', function () {return view('pages/dashboard/breader_dashboard'); })->name('dashboard');

    // LISTINGS [STUDS / PUPPIES]
    Route::prefix('dashboard')->group(function () {

        // STUDS LISTINGS
        Route::get('/studs/{page}',[App\Http\Controllers\ListingsController::class, 'showStudsInDashboard'])->name('showAllStuds');
        Route::get('/stud/{slug}',[App\Http\Controllers\ListingsController::class, 'showSingleStud'])->name('showSingleStud');
        Route::get('/add-stud', function () {return view('pages/dashboard/listings/studs/add-studs');})->name('addStud');
        // Route::post('/stud/create', [App\Http\Controllers\ListingsController::class, 'createListings'])->name('createListing');
        Route::get('/edit-stud/{slug}', [App\Http\Controllers\ListingsController::class, 'editStud'])->name('editStud');
        // Route::patch('/stud/update', [App\Http\Controllers\ListingsController::class, 'updateListings'])->name('updateListing');
        // Route::delete('/stud/delete/{id}', [App\Http\Controllers\ListingsController::class, 'deleteListings'])->name('deleteListing');
        // Route::get('/stud/trash/{id}', [App\Http\Controllers\ListingsController::class, 'trashListings'])->name('trashListing');
        Route::get('/trashed-studs/trash/{page}', [App\Http\Controllers\ListingsController::class, 'showTrashedStuds'])->name('showTrashedStuds');
        // Route::get('/stud/recycle/{id}', [App\Http\Controllers\ListingsController::class, 'recycleTrashedListings'])->name('recyclePuppies');
        // Route::delete('/stud/delete/{id}', [App\Http\Controllers\ListingsController::class, 'deleteListings'])->name('deletePuppies');
        // Route::get('/studs/deleteAll', [App\Http\Controllers\ListingsController::class, 'deleteAllListings'])->name('deleteAllPuppies');

        // PUPPIES LISTINGS
        Route::get('/puppies/{page}',[App\Http\Controllers\ListingsController::class, 'showPuppiesInDashboard'])->name('showAllPuppies');
        Route::get('/puppy/{slug}',[App\Http\Controllers\ListingsController::class, 'showSinglePuppy'])->name('showSinglePuppy');
        Route::get('/add-puppy', function () {return view('pages/dashboard/listings/puppies/add-puppies');})->name('addPuppy');
        Route::post('/create', [App\Http\Controllers\ListingsController::class, 'createListings'])->name('createListing');
        Route::get('/edit-puppy/{slug}', [App\Http\Controllers\ListingsController::class, 'editPuppy'])->name('editPuppy');
        Route::patch('/update', [App\Http\Controllers\ListingsController::class, 'updateListings'])->name('updateListing');
        Route::delete('/delete-listing/{id}', [App\Http\Controllers\ListingsController::class, 'deleteListings'])->name('deleteListing');
        Route::get('/puppy/trash/{id}', [App\Http\Controllers\ListingsController::class, 'trashListings'])->name('trashListing');
        Route::get('/trashed-puppies/{page}', [App\Http\Controllers\ListingsController::class, 'showTrashedPuppies'])->name('showTrashedPuppies');
        Route::get('/puppies/recycle/{id}', [App\Http\Controllers\ListingsController::class, 'recycleTrashedListings'])->name('recyclePuppies');
        Route::delete('/puppies/delete/{id}', [App\Http\Controllers\ListingsController::class, 'deleteListings'])->name('deletePuppies');
        Route::get('/puppies/delete/All', [App\Http\Controllers\ListingsController::class, 'deleteAllListings'])->name('deleteAllPuppies');

        Route::get('/litters/{page}',[App\Http\Controllers\LittersController::class, 'showLittersInDashboard'])->name('showAllLitters');
        Route::get('/litter/{slug}',[App\Http\Controllers\LittersController::class, 'showSingleLitter'])->name('showSingleLitter');
        Route::get('/add-litter', function () {return view('pages/dashboard/listings/litters/add-litters');})->name('addLitter');
        Route::post('/create-litter', [App\Http\Controllers\LittersController::class, 'createLitter'])->name('createLitter');
        Route::get('/edit-litter/{slug}', [App\Http\Controllers\LittersController::class, 'editLitter'])->name('editLitter');
        Route::patch('/update-litter', [App\Http\Controllers\LittersController::class, 'updateLitter'])->name('updateLitter');
        Route::get('/litter/trash/{id}', [App\Http\Controllers\LittersController::class, 'trashLitter'])->name('trashLitter');
        Route::get('/trashed-litters/trash/{page}', [App\Http\Controllers\LittersController::class, 'showTrashedLitters'])->name('showTrashedLitters');
        Route::get('/litter/recycle/{id}', [App\Http\Controllers\LittersController::class, 'recycleLitters'])->name('recycleLitters');
        Route::delete('/litter/delete/{id}', [App\Http\Controllers\LittersController::class, 'deleteLitter'])->name('deleteLitter');
        Route::get('/litters/delete/All', [App\Http\Controllers\LittersController::class, 'deleteAllLitters'])->name('deleteAllLitters');

        // BREEDER SUPPLIES
        Route::get('/resources/breeder-supplies/{page}',[App\Http\Controllers\BreederSuppliesController::class, 'showAllBreederSupplies'])->name('showAllBreederSupplies');
        Route::get('/resources/single-breeder-supplies/{slug}',[App\Http\Controllers\BreederSuppliesController::class, 'showSingleBreederSupplies'])->name('showSingleBreederSupplies');
        Route::get('/resources/add-breeder-supplies', function () {return view('pages/dashboard/resources/breeder_supplies/create-or-update-breeder_supplies');})->name('addBreederSupplies');
        Route::post('/resources/breeder-supplies/create', [App\Http\Controllers\BreederSuppliesController::class, 'createBreederSupplies'])->name('createBreederSupplies');
        Route::get('/resources/edit-breeder-supplies/{slug}', [App\Http\Controllers\BreederSuppliesController::class, 'editBreederSupplies'])->name('editBreederSupplies');
        Route::patch('/resources/breeder-supplies/update', [App\Http\Controllers\BreederSuppliesController::class, 'updateBreederSupplies'])->name('updateBreederSupplies');
        Route::get('/resources/trash-breeder-supplies/{id}', [App\Http\Controllers\BreederSuppliesController::class, 'trashBreederSupplies'])->name('trashBreederSupplies');
        Route::get('/resources/trashed-breeder-supplies/{page}',[App\Http\Controllers\BreederSuppliesController::class, 'showTrashedSupplies'])->name('showTrashedSupplies');
        Route::get('/resources/recycle-breeder-supplies/{id}', [App\Http\Controllers\BreederSuppliesController::class, 'recycleBreederSupplies'])->name('recycleBreederSupplies');
        Route::delete('/resources/delete-breeder-supplies/{id}', [App\Http\Controllers\BreederSuppliesController::class, 'deleteBreederSupplies'])->name('deleteBreederSupplies');
        Route::get('/resources/delete-all-breeder-supplies',[App\Http\Controllers\BreederSuppliesController::class, 'deleteAllBreederSupplies'])->name('deleteAllBreederSupplies');

        // CANINE GENETICS
        Route::get('/resources/canine-genetics/{page}',[App\Http\Controllers\CanineGeneticsController::class, 'showAllListings'])->name('showAllCanineGenetics');
        Route::get('/resources/single-canine-genetics/{slug}',[App\Http\Controllers\CanineGeneticsController::class, 'showSingleListings'])->name('showSingleCanineGenetics');
        Route::get('/resources/add-canine-genetics', function () {return view('pages/dashboard/resources/canine_genetics/create-or-update-canine_genetics');})->name('addCanineGenetics');
        Route::post('/resources/canine-genetics/create', [App\Http\Controllers\CanineGeneticsController::class, 'createListings'])->name('createCanineGenetics');
        Route::get('/resources/edit-canine-genetics/{slug}', [App\Http\Controllers\CanineGeneticsController::class, 'editListings'])->name('editCanineGenetics');
        Route::patch('/resources/canine-genetics/update', [App\Http\Controllers\CanineGeneticsController::class, 'updateListings'])->name('updateCanineGenetics');
        Route::get('/resources/trash-canine-genetics/{id}', [App\Http\Controllers\CanineGeneticsController::class, 'trashListings'])->name('trashCanineGenetics');
        Route::get('/resources/trashed-canine-genetics/{page}',[App\Http\Controllers\CanineGeneticsController::class, 'showTrashedListings'])->name('showTrashedCanineGenetics');
        Route::get('/resources/recycle-canine-genetics/{id}', [App\Http\Controllers\CanineGeneticsController::class, 'recycleListings'])->name('recycleCanineGenetics');
        Route::delete('/resources/delete-canine-genetics/{id}', [App\Http\Controllers\CanineGeneticsController::class, 'deleteListings'])->name('deleteCanineGenetics');
        Route::get('/resources/delete-all-canine-genetics',[App\Http\Controllers\CanineGeneticsController::class, 'deleteAllListings'])->name('deleteAllCanineGenetics');

        // CANINE NUTRITION
        Route::get('/resources/canine-nutrition/{page}',[App\Http\Controllers\CanineNutritionController::class, 'showAllListings'])->name('showAllCanineNutrition');
        Route::get('/resources/single-canine-nutrition/{slug}',[App\Http\Controllers\CanineNutritionController::class, 'showSingleListings'])->name('showSingleCanineNutrition');
        Route::get('/resources/add-canine-nutrition', function () {return view('pages/dashboard/resources/canine_nutrition/create-or-update-canine_nutrition');})->name('addCanineNutrition');
        Route::post('/resources/canine-nutrition/create', [App\Http\Controllers\CanineNutritionController::class, 'createListings'])->name('createCanineNutrition');
        Route::get('/resources/edit-canine-nutrition/{slug}', [App\Http\Controllers\CanineNutritionController::class, 'editListings'])->name('editCanineNutrition');
        Route::patch('/resources/canine-nutrition/update', [App\Http\Controllers\CanineNutritionController::class, 'updateListings'])->name('updateCanineNutrition');
        Route::get('/resources/trash-canine-nutrition/{id}', [App\Http\Controllers\CanineNutritionController::class, 'trashListings'])->name('trashCanineNutrition');
        Route::get('/resources/trashed-canine-nutrition/{page}',[App\Http\Controllers\CanineNutritionController::class, 'showTrashedListings'])->name('showTrashedCanineNutrition');
        Route::get('/resources/recycle-canine-nutrition/{id}', [App\Http\Controllers\CanineNutritionController::class, 'recycleListings'])->name('recycleCanineNutrition');
        Route::delete('/resources/delete-canine-nutrition/{id}', [App\Http\Controllers\CanineNutritionController::class, 'deleteListings'])->name('deleteCanineNutrition');
        Route::get('/resources/delete-all-canine-nutrition',[App\Http\Controllers\CanineNutritionController::class, 'deleteAllListings'])->name('deleteAllCanineNutrition');

        Route::get('saved-items',[App\Http\Controllers\SavedItemsController::class, 'savedItems'])->name('savedItems');
    });

//    Route::post('/settings', [App\Http\Controllers\Auth\RegisterController::class, 'updateRegisteredUser'])->name('user.update');

    // PROFILE
    Route::get('/profile/', function () {return view('pages/dashboard/breeder_profile');})->name('breederProfile');
    Route::get('/user/profile/', function () {return view('pages/dashboard/customer_profile');})->name('customerProfile');
    Route::get('breedersetting', function () {return view('pages/dashboard/breeder-account-setting');})->name('breedersetting');



    Route::get('customersetting', function () {return view('pages/dashboard/customer_account_setting');})->name('customersetting');
    Route::get('email', function () {return view('layouts/reset-password-mail');})->name('email');

});



