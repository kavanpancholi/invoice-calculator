<?php
use App\Invoice;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect('/home');
});

Route::get('invoice', function(){
    return Invoice::generate(Auth::user()->id);
});

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('auth.register');
$this->post('register', 'Auth\RegisterController@register')->name('auth.register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('auth.password.email');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');


Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('roles', 'RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'UsersController');
    Route::post('users_mass_destroy', ['uses' => 'UsersController@massDestroy', 'as' => 'users.mass_destroy']);
    Route::resource('positions', 'PositionsController');
    Route::post('positions_mass_destroy', ['uses' => 'PositionsController@massDestroy', 'as' => 'positions.mass_destroy']);
    Route::resource('departments', 'DepartmentsController');
    Route::post('departments_mass_destroy', ['uses' => 'DepartmentsController@massDestroy', 'as' => 'departments.mass_destroy']);
    Route::resource('invoices', 'InvoicesController');
    Route::post('invoices_mass_destroy', ['uses' => 'InvoicesController@massDestroy', 'as' => 'invoices.mass_destroy']);
});
