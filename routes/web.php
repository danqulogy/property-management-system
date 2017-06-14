<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/



Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/register/owner', 'ApplicationController@getRegisterOwner');
Route::post('/register/owner', 'ApplicationController@postRegisterOwner');
Route::get('/register/property', 'ApplicationController@getRegisterProperty');
Route::post('/property/register', 'ApplicationController@postRegisterProperty');
Route::get('/owner/{owner_id}/property/{property_id}', 'ApplicationController@ViewOwnerProperty');

Route::get('/listings/owners', 'ApplicationController@getOwnersListing');
Route::get('/owner/{owner_id}/profile', 'ApplicationController@getOwnerProfile');
Route::post('/owner/{owner_id}/update', 'ApplicationController@updateOwnerProfile');
Route::get('/listings/properties', 'ApplicationController@getPropertiesListing');

Route::post('/make-payment/owner/{owner_id}/property/{property_id}', 'ApplicationController@makePayment');
Route::post('/owner/{owner_id}/delete', 'ApplicationController@deleteOwner');
Route::get('/delete/property/{property_id}', 'ApplicationController@deleteProperty');

Route::get('/', function () {
    if(\Illuminate\Support\Facades\Auth::guest()){
        return redirect('/login');
    }else{
        return redirect()->intended('/listings/owners');
    }
});


/*
 * ==================================================
 * **************  ADMIN ROUTES ********************
 * ==================================================
 */

Route::get('/admin', 'AdminController@getHomeView');

Route::get('/test', function (){

   $model = \App\Property::find(1);
   $model->updateState();
   return $model;

});
