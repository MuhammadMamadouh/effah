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

    // Route::group(['middleware' => 'completed_profile'], function () {

    Route::get('categories', 'API\CategoriesController@index');
    Route::get('notifications', 'API\AuthController@notifications');
    Route::post('notifications/{id}', 'API\AuthController@read_notification');
    Route::get('my-points', 'API\PointsController@myPoints');
    Route::post('get-points', 'API\PointsController@getPoints');
    Route::get('categories/{id}/questions', 'API\CategoriesController@questions');
    Route::get('questions/{id}/answers', 'API\CategoriesController@answers');
    Route::post('questions/answer', 'API\CategoriesController@answerQuestion');
    Route::get('/profile', 'API\AuthController@showProfile');
    Route::post('/upload-photos', 'API\AuthController@uploadPhotos');
    Route::post('/update-bio', 'API\AuthController@updateBio');
    Route::post('/users/confirm-identity', 'API\AuthController@confirmIdentity');
// });

    Route::group(['middleware' => 'approved'], function () {
        Route::get('users', 'API\UsersController@index')->name('users.index');
        Route::get('users/{id}', 'API\UsersController@show')->name('user.profile');
        Route::post('users/{id}/sendLove', 'API\RelationshipController@sendLove');
        Route::post('users/{id}/viewRequest', 'API\RelationshipController@viewRequestLove');
        Route::post('users/{id}/acceptLove', 'API\RelationshipController@acceptLove');
        Route::post('users/{id}/refuseLove', 'API\RelationshipController@refuseLove');
        Route::post('users/{id}/showParentInfo', 'API\RelationshipController@showParentInfo')->name('users.showParentInfo');

        Route::post('reports/{id}', 'API\ReportController@store');
        Route::get('reports', 'API\ReportController@index');
    });

});
