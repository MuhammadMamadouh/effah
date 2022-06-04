<?php
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Config::set('auth.defines', 'admin');
    // Route::resource('home','AdminHomeController');

    Route::get('login', 'AdminAuth@login');
    Route::post('login', 'AdminAuth@dologin');
    Route::get('forgot/password', 'AdminAuth@forgot_password');
    Route::post('forgot/password', 'AdminAuth@forgot_password_post');
    Route::get('reset/password/{token}', 'AdminAuth@reset_password');
    Route::post('reset/password/{token}', 'AdminAuth@reset_password_final');
///////////

    /////admin actions//////
    Route::group(['middleware' => 'admin:admin'], function () {
        /*================Admin Profile control =========================*/
        Route::resource('profile','AdminProfileController');
        Route::resource('theme','ThemColor');

        Route::get('profile/password/{id}','AdminProfileController@update_pass_view')->name('profile.change.pass.view');
        Route::post('profile/password/change','AdminProfileController@update_pass')->name('profile.change.pass');

        /*================Admin Admin control =========================*/
        Route::resource('admins','AdminAdminController');
        Route::post('admins/delete','AdminAdminController@delete')->name('admins.delete');
        /*================Admin emailstype control =========================*/
        Route::resource('jewelleries','AdminJewelleriesController');
        Route::any('choseCountry','AdminChoseCountry@index')->name('choseCountry.index');
        Route::any('choseCountry/updatee','AdminChoseCountry@update')->name('choseCountry.updatee');
        Route::resource('jewelleriesOrders','AdminJewelleriesOrderController');
        Route::post('jewelleries/delete','AdminJewelleriesController@delete')->name('jewelleries.delete');
        /*================Admin emailstype control =========================*/

        Route::resource('emailsType','AdminEmailesController');
        Route::post('emailsType/delete','AdminEmailesController@delete')->name('emailsType.delete');
        /*================Admin question control =========================*/

        Route::resource('question','AdminQuestionController');
        Route::any('question/get_all_answers','AdminQuestionController@get_all_answers')->name('get_all_answers');
        Route::post('question/delete','AdminQuestionController@delete')->name('question.delete');
        Route::any('question/question/{id}','AdminQuestionController@order')->name('question.order');
        Route::any('question/active/{id}','AdminQuestionController@active')->name('question.active');
        /*================Admin universities control =========================*/

        Route::resource('universities','AdminUniversities');
        Route::post('universities/delete','AdminUniversities@delete')->name('universities.delete');
        /*================Admin answers control =========================*/

        Route::resource('answers','AdminAnswersController');
        Route::post('answers/delete','AdminAnswersController@delete')->name('answers.delete');
        /*================Admin colleges control =========================*/

        Route::resource('colleges','AdminCollegesController');
        Route::post('colleges/delete','AdminCollegesController@delete')->name('colleges.delete');
        /*================Admin school control =========================*/

        Route::resource('schools','AdminSchoolsController');
        Route::post('schools/delete','AdminSchoolsController@delete')->name('schools.delete');
        /*================Admin school control =========================*/

        Route::resource('nationality','adminNationalityController');
        Route::post('nationality/delete','adminNationalityController@delete')->name('nationality.delete');
        /*================Admin careers control =========================*/

        Route::resource('careers','AdminCareersController');
        Route::post('careers/delete','AdminCareersController@delete')->name('careers.delete');
        /*================Admin skills control =========================*/

        Route::resource('skills','AdminSkiles');
        Route::post('skills/delete','AdminSkiles@delete')->name('skills.delete');
        /*================Admin Slider control =========================*/
        //Slider
        Route::resource('sliders','AdminSliderController');
        Route::post('sliders/delete','AdminSliderController@delete')->name('sliders.delete');

        /*================Admin siteTexts control =========================*/

        Route::resource('siteTexts','AdminTextController');
        Route::post('siteTexts/delete','AdminTextController@delete')->name('siteTexts.delete');
        /*================Admin ads control =========================*/

        Route::resource('spacialAds','AdminSpecialController');
        Route::post('spacialAds/delete','AdminSpecialController@delete')->name('spacialAds.delete');

        /*================Admin companies control =========================*/
        /*================Admin ads control =========================*/

        Route::resource('ads','AdminAdsController');
        Route::post('ads/delete','AdminAdsController@delete')->name('ads.delete');

        /*================Admin companies control =========================*/
        /*================Admin ads control =========================*/

        Route::resource('auctions','AdminAdsController');
        Route::post('auctions/delete','AdminAdsController@delete')->name('auctions.delete');

        /*================Admin companies control =========================*/

        Route::resource('companies','AdminCompaniesController');
        Route::post('companies/delete','AdminCompaniesController@delete')->name('companies.delete');
        /*================Admin contctes control =========================*/

        //Contacts
        Route::resource('contacts','AdminContactController');
        Route::post('contacts/delete','AdminContactController@delete')->name('contacts.delete');
        Route::get('contacts/email/{id}','AdminContactController@email_view')->name('contacts.email');
        Route::post('contacts/email','AdminContactController@send_Email')->name('contacts.send');
        /*================providers Admin control =========================*/
        Route::resource('providers','AdminProvidores');
        Route::resource('representatives','AdimRepresentativesController');
        Route::resource('chat','AdminChat');
        Route::any('chat/send_message','AdminChat@send_message')->name('send_message');
        Route::post('providers/delete','AdminProvidores@delete')->name('providers.delete');
        Route::post('representatives/delete','AdimRepresentativesController@delete')->name('representatives.delete');
        /*================Admin Setting control =========================*/
        /*================AdminOrder control =========================*/
        Route::resource('allOrder','AdminOrder');
        Route::post('allOrder/delete','AdminOrder@delete')->name('allOrder.delete');
        Route::any('allOrder/sendNots/{id}','AdminOrder@sendNots')->name('allOrder.sendNots');
        /*================AdminOrder control =========================*/
        Route::resource('myOrder','ProvidersOrder');
        Route::resource('prmyOrder','AdminProvidorsPre');


        /*========================================================================*/
        Route::get('bank','BankController@getBanks')->name('bank.index');
        Route::get('bank/create','BankController@getAddBank')->name('bank.create');
        Route::post('bank/store','BankController@postAddBank')->name('bank.store');
        Route::any('bank/delete','BankController@delete')->name('bank.delete');
        Route::get('bank/{id}/edit','BankController@getUpdateBank');
        Route::any('bank/update/{id}','BankController@postUpdateBank')->name('bank.update');
        /*===================tasks=============*/



        /*================Admin Setting control =========================*/
        Route::resource('setting','AdminSettingController');//setting
        /*================Admin home control =========================*/
        Route::resource('home','HomeAdminController');
        /*================Admin roles control =========================*/
    });
    /*===========admin.logout=============================*/
    Route::any('logout', 'AdminAuth@logout')->name('admin.logout');
    /*====================================admin show users================*/
    Route::resource('users','AdminUsers');
    Route::get('users/active/{id}','AdminUsers@is_active')->name('users.active');
    Route::get('ads/active/{id}','AdminUsers@is_activeAd')->name('ads.active');

    Route::get('representatives/active/{id}','AdimRepresentativesController@is_active')->name('representatives.active');

    /*================Admin AdminTaskScaudling control =========================*/

    Route::resource('messages','AdminUserMessagesController');
    Route::get('messages/delete','AdminUserMessagesController@delete')->name('messages.delete');
    /*================Admin Suggestion control =========================*/

    Route::resource('suggestion','AdminAnswerSuggest');
    Route::get('suggestion/delete','AdminAnswerSuggest@delete')->name('suggestion.delete');
    /*================Admin AdminRates control =========================*/
    Route::resource('malls','AdminSubMallsController');
    Route::get('malls/active/{id}','AdminSubMallsController@is_active')->name('malls.active');
    Route::resource('adminRates','AdminRates');
    /*================Admin categories control =========================*/
    Route::resource('categories','AdminCategory');
    Route::post('categories/delete','AdminCategory@delete')->name('categories.delete');
    /*================Admin news control =========================*/

    Route::resource('news','AdimNewsController');
    Route::post('news/delete','AdimNewsController@delete')->name('news.delete');
    /*================Admin reports control =========================*/

    Route::resource('reports','AdminReportsController');
    Route::post('reports/delete','AdminReportsController@delete')->name('reports.delete');
    /*================Admin Slider control =========================*/
    /*================Admin categories control =========================*/
    Route::resource('subCategories','AdminSubCategories');
    Route::post('subCategories/delete','AdminSubCategories@delete')->name('subCategories.delete');
    /*    Route::resource('cities','AdminCitiesController');*/
    Route::post('sliders/delete-sliders', 'AdminSliderController@bulkDelete')->name('sliders.delete.account');
    /*================Admin Slider control =========================*/
    Route::resource('cities','AdminCitiesController');
    Route::post('cities/delete','AdminCitiesController@delete')->name('cities.delete');  /*================Admin Slider control =========================*/
    Route::resource('subcities','AdminSubCityContoller');
    Route::post('subcities/delete','AdminSubCityContoller@delete')->name('subcities.delete');

    /*================Admin colors control =========================*/
    Route::resource('sizes','AdminSizesController');
    Route::post('sizes/delete','AdminSizesController@delete')->name('sizes.delete');
    Route::resource('colors','AdminColorsController');
    Route::post('colors/delete','AdminColorsController@delete')->name('colors.delete');
    /*================Admin Slider control =========================*/
    /*================AdminOrder control =========================*/
    Route::resource('countries','AdminCountries');
    Route::post('countries/delete','AdminCountries@delete')->name('countries.delete');
    /*================cities control =========================*/
    /*================Admin brands control =========================*/
    Route::resource('brands','Adminbrands');
    Route::any('brands/up/{id}','Adminbrands@up')->name('up');
    Route::any('brands/down/{id}','Adminbrands@down')->name('down');
    Route::post('brands/delete','Adminbrands@delete')->name('brands.delete');
    /*================Admin Slider control =========================*/
    /*================Admin AdminProduct control =========================*/
    Route::resource('products','AdminProduct');
    Route::post('products/delete','AdminProduct@delete')->name('products.delete');
    Route::resource('ima','AdminProductImages');
    Route::post('ima/delete','AdminProductImages@delete')->name('ima.delete');
    /*========================================================================*/
    Route::get('bank','BankController@getBanks')->name('bank.index');
    Route::get('bank/create','BankController@getAddBank')->name('bank.create');
    Route::post('bank/store','BankController@postAddBank')->name('bank.store');
    Route::any('bank/delete','BankController@delete')->name('bank.delete');
    Route::get('bank/{id}/edit','BankController@getUpdateBank');
    Route::any('bank/update/{id}','BankController@postUpdateBank')->name('bank.update');
    Route::post('bank/delete-bank', 'BankController@bulkDelete')->name('bank.delete.account');
    /*================Admin payments =========================*/
    Route::resource('payments','AdminPaymentsController');
    Route::post('payments/delete','AdminPaymentsController@delete')->name('payments.delete');
    /*===================tasks=============*/
});
