<?php

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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

// Authentication Routes for Users...
Route::get('login', [
    'as' => 'login',
    'uses' => 'Auth\LoginController@showLoginForm',
]);
Route::post('login', [
    'as' => '',
    'uses' => 'Auth\LoginController@login',
]);
Route::post('logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout',
]);

// Password Reset Routes...
Route::post('password/email', [
    'as' => 'password.email',
    'uses' => 'Auth\ForgotPasswordController@sendResetLinkEmail',
]);
Route::get('password/reset', [
    'as' => 'password.request',
    'uses' => 'Auth\ForgotPasswordController@showLinkRequestForm',
]);
Route::post('password/reset', [
    'as' => 'password.update',
    'uses' => 'Auth\ResetPasswordController@reset',
]);
Route::get('password/reset/{token}', [
    'as' => 'password.reset',
    'uses' => 'Auth\ResetPasswordController@showResetForm',
]);

// Registration Routes...
Route::get('register', [
    'as' => 'register',
    'uses' => 'Auth\RegisterController@showRegistrationForm',
]);
Route::post('register', [
    'as' => '',
    'uses' => 'Auth\RegisterController@registerUser',
]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

// Authentication Routes for Admin...
Route::prefix('admin')->group(function () {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/register', 'Auth\AdminLoginController@showRegisterForm')->name('admin.register');
    Route::post('/register', 'Auth\AdminLoginController@registerAdmin')->name('admin.register.submit');
    Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
    //always put at last '/'
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    // Password Reset Routes...
    Route::post('password/email', [
        'as' => 'admin.password.email',
        'uses' => 'Auth\AdminForgotPasswordController@sendResetLinkEmail',
    ]);
    Route::get('password/reset', [
        'as' => 'admin.password.request',
        'uses' => 'Auth\AdminForgotPasswordController@showLinkRequestForm',
    ]);
    Route::post('password/reset', [
        'as' => 'admin.password.update',
        'uses' => 'Auth\AdminResetPasswordController@reset',
    ]);
    Route::get('password/reset/{token}', [
        'as' => 'admin.password.reset',
        'uses' => 'Auth\AdminResetPasswordController@showResetForm',
    ]);

    Route::post('/cosmetics/create', 'CosmeticController@store')->name('admin.cosmetics.create');
    Route::post('/ingredients/create', 'IngredientController@store')->name('admin.ingredients.create');
    Route::post('/formulas/create', 'FormulaController@store')->name('admin.formulas.create');
    Route::post('/methods/create', 'MethodController@store')->name('admin.methods.create');
    Route::post('/cosmetics-ingredients/create', 'CosmeticController@relationship')->name('admin.cosmetic_ingredient.create');

    Route::get('/cosmetics/create', 'CosmeticController@create')->name('admin.cosmetics.create');
    Route::get('/formulas/create', 'FormulaController@create')->name('admin.formulas.formula');
    Route::get('/ingredients/create', 'IngredientController@create')->name('admin.ingredients.ingredient');
    Route::get('/methods/create', 'MethodController@create')->name('admin.methods.method');
    Route::get('/cosmetics/manage', 'CosmeticController@index')->name('admin.cosmetics.manage');
    Route::get('/cosmetics/phase', 'PhaseController@index')->name('admin.cosmetics.phase');
    Route::get('/ingredients/edit/{ingredient}', 'IngredientController@edit')->name('admin.ingredients.edit');
    Route::get('/formulas/edit/{formula}', 'FormulaController@edit')->name('admin.formulas.edit');
    // Route::get('/methods/edit/{method}', 'MethodController@edit')->name('admin.methods.edit');
    Route::put('/formulas/edit/{formula}', 'FormulaController@update')->name('admin.formulas.update');
    Route::get('/phase/edit/{ingredient}', 'PhaseController@edit')->name('admin.phase.edit');
    Route::put('/phase/edit/{cosmetic}/ingredient/{ingredient}', 'PhaseController@updateIngredient')->name('admin.phase.updateIngredient');
    Route::put('/phase/edit/{cosmetic}/formula/{formula}', 'PhaseController@updateFormula')->name('admin.phase.updateFormula');
    Route::put('/ingredients/{ingredient}', 'IngredientController@update')->name('admin.ingredients.update');
    Route::delete('/ingredients/{ingredient}', 'IngredientController@destroy')->name('admin.ingredients.delete');
    Route::delete('/formulas/{formula}', 'FormulaController@destroy')->name('admin.formulas.delete');
    
    Route::delete('/methods/{method}', 'MethodController@destroy')->name('admin.methods.delete');

    Route::delete('/cosmetics/{cosmetic}', 'CosmeticController@destroy')->name('admin.cosmetics.delete');
    Route::get('/json-formulas', 'CosmeticController@formulas');
    Route::get('/json-getIngredients', 'CosmeticController@getIngredients');

    // Route::get('/cosmetics/create', function () {
    //     return view('admin.cosmetics.create');
    // })->name('admin.cosmetics.create');
    // Route::get('/cosmetics/manage', function () {
    //     return view('admin.cosmetics.manage');
    // })->name('admin.cosmetics.manage');
    // Route::get('/ingredients/create', function () {
    //     return view('admin.ingredients.ingredient');
    // })->name('admin.ingredients.ingredient');
    // Route::get('/formulas/create', function () {
    //     return view('admin.formulas.formula');
    // })->name('admin.formulas.formula');
    // Route::get('/methods/method', function () {
    //     return view('admin.methods.method');
    // })->name('admin.methods.method');

});



// USERS ROUTES
Route::get('/items/item', 'UserCosmeticController@showItems')->name('users.items.item');
// Route::get('/ingredients/create', 'UserCosmeticController@showIngredients')->name('users.ingredients.ingredient');
Route::get('/formulas/create', 'UserCosmeticController@index')->name('users.formulas.create');
Route::post('/cosmetics/create', 'UserCosmeticController@store')->name('cosmetics.create');
Route::get('/profile/profile', 'UserCosmeticController@showProfile')->name('users.profile.profile');
Route::get('/formulas/select', 'UserCosmeticController@show')->name('users.formulas.select');
Route::get('/formulas/list', 'UserCosmeticController@showFormulaList')->name('users.formulas.list');
Route::get('/formulas/method', 'UserCosmeticController@showMethods')->name('users.formulas.method');
Route::delete('/cosmetics/{cosmetic}', 'UserCosmeticController@destroy')->name('users.cosmetics.delete');

Route::get('/about', function () {
    return view('about');
});
// Route::get('/formulas/select', function () {
//     return view('users.formulas.select');
// })->name('users.formulas.select');
// Route::get('/formulas/list', function () {
//     return view('users.formulas.list');
// })->name('users.formulas.list');

// Route::get('/ingredients/ingredient', function () {
//     return view('users.ingredients.ingredient');
// })->name('users.ingredients.ingredient');

// Route::get('/items/item', function () {
//     return view('users.items.item');
// })->name('users.items.item');

// Route::get('/profile/profile', function () {
//     return view('users.profile.profile');
// })->name('users.profile.profile');

Route::get('/methods/method', function () {
    return view('users.methods.method');
})->name('users.methods.method');
