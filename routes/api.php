<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
Route::post('/login', 'API\AuthController@login');
// Route::get('forget-password', [ForgetPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgetPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
// Route::get('rest-forgetten-password/{token}', [ForgetPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-forgetten-password', [ForgetPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
Route::post('register', 'API\AuthController@register');
Route::get('terms', 'API\TermsController@terms');
Route::post('verify-code', 'API\AuthController@verficationCode');

Route::group(['middleware' => 'auth:api'], function () {

    Route::prefix('general')->group(function () {

        Route::get('countries', 'API\Master\GeneralController@countries');
        Route::get('countries/{id}/cities', 'API\Master\GeneralController@cities');
        Route::get('governorate_districts', 'API\Master\GeneralController@governorateWithDistricts');

        Route::get('educational-degree', 'API\Master\GeneralController@educationalDegree');
        Route::get('university-type', 'API\Master\GeneralController@universityType');
        Route::get('marital-status', 'API\Master\GeneralController@maritalStatus');
        Route::get('relative-degree', 'API\Master\GeneralController@relativeDegree');
        Route::get('companies', 'API\Master\GeneralController@companies');
        Route::get('permissions', 'API\Master\GeneralController@permissions');
        Route::get('generate-password/{user_id}', 'API\Master\GeneralController@genPassword');
        Route::get('genders', 'API\Master\GeneralController@gender');
        Route::get('religions', 'API\Master\GeneralController@religion');

        Route::get('universities', 'API\Master\GeneralController@universities');
        Route::get('faculties', 'API\Master\GeneralController@faculties');

    });

    Route::get('categories', 'API\CategoriesController@index');
    Route::get('categories/{id}/questions', 'API\CategoriesController@questions');
    Route::get('questions/{id}/answers', 'API\CategoriesController@answers');

    Route::post('questions/answer', 'API\CategoriesController@answerQuestion');

    Route::get('users', 'API\UsersController@index');
    Route::get('users/{id}', 'API\UsersController@show');

    Route::get('/profile', 'API\AuthController@showProfile');

    Route::post('/upload-photos', 'API\AuthController@uploadPhotos');

    Route::post('/update-bio', 'API\AuthController@updateBio');

});
