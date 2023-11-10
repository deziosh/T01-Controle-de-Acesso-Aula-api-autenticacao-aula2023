<?php

use App\Http\Controllers\NoticiaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PapeisController;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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
Route::get('/auth/redirect/{provider}', function ($provider) {
    return Socialite::driver($provider)->redirect();
})->name('social.login');

Route::get('/auth/callback/{provider}', function ($provider) {
    $providerUser = Socialite::driver($provider)->user();
    //dd($providerUser);
    $user = User::firstOrCreate([
        "email" => $providerUser->email
    ],[
        "name" => $providerUser->name,
        "provider" => $provider,
        "provider_id" => $providerUser->getId(),
        "admin" => 0
    ]);
    //dd($user);
    Auth::login($user);
    return redirect('/dashboard');
})->name('social.callback');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Route::resource('/noticias', NoticiaController::class)->middleware(['auth']);
Route::resource('/noticias', NoticiaController::class);

Route::get('/papeis', 'App\Http\Controllers\PapeisController@index')->name('papeis.index');
Route::get('/papeis/create', 'App\Http\Controllers\PapeisController@create')->name('papeis.create');
Route::post('/papeis', 'App\Http\Controllers\PapeisController@store')->name('papeis.store');
Route::get('/papeis/{role}/edit', 'App\Http\Controllers\PapeisController@edit')->name('papeis.edit');
Route::put('/papeis/{role}', 'App\Http\Controllers\PapeisController@update')->name('papeis.update');
Route::delete('/papeis/{role}', 'App\Http\Controllers\PapeisController@destroy')->name('papeis.destroy');

Route::get('/permissoes/{role}', 'App\Http\Controllers\PermissoesController@index')->name('permissoes.index');
Route::post('/permissoes', 'App\Http\Controllers\PermissoesController@store')->name('permissoes.store');

Route::get('/usuarios', 'App\Http\Controllers\UsuariosController@index')->name('usuarios.index');

Route::get('/usuarios/{user}/edit', 'App\Http\Controllers\UsuariosController@edit')->name('usuarios.edit');
Route::put('/usuarios/{user}', 'App\Http\Controllers\UsuariosController@update')->name('usuarios.update');

Route::get('/usuarios/{user}', 'App\Http\Controllers\UsuariosController@userRoles')->name('usuarios.papeis');
Route::post('/usuarios/{user}', 'App\Http\Controllers\UsuariosController@store')->name('usuarios.store');


require __DIR__.'/auth.php';