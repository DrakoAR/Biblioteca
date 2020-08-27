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

// Route::get('/', function () {
//     return redirect()->to('lista');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    
    Route::get('/', 'User\BookController@listaTodos')->name('lista');
    Route::get('/libros', 'User\BookController@listaLibros')->name('listaLibros');
    Route::get('/revistas', 'User\BookController@listaRevistas')->name('listaRevistas');
    Route::get('/tesis', 'User\BookController@listaTesis')->name('listaTesis');
    Route::get('/actas', 'User\BookController@listaActas')->name('listaActas');
    Route::get('/busqueda', 'User\BookController@busqueda')->name('busqueda');
    Route::get('/busquedaAvanzada', 'User\BookController@busquedaAvanzada')->name('busquedaAvanzada');
    Route::get('/prestamos', 'User\PrestamoController@index')->name('prestamos');
    Route::delete('prestamos/borrar/{id}', 'User\PrestamoController@destroy')->name('prestamos.delete');
    Route::get('/prestamos/{book}', 'User\PrestamoController@create')->where('book', '[0-9]+')
    ->name('prestamos.create');
    Route::post('/prestamo/registro', 'User\PrestamoController@store')->name('prestamos.store');
    Route::get('/prestamo/registro', function(){
        return redirect()->to('/home');
    });
    
});

Route::group(['middleware' => ['auth','admin']], function () {
    Route::get('/admin/prestamos', 'Admin\PrestamoController@index')->name('admin.prestamos');
    Route::get('/admin/prestamos/top/titulos', 'Admin\PrestamoController@masPrestados')->name('admin.prestamos.topBooks');
    Route::get('/admin/prestamos/top/usuarios', 'Admin\PrestamoController@masActivos')->name('admin.prestamos.topUsers');
    Route::get('/admin/prestamos/vencidos', 'Admin\PrestamoController@vencidos')->name('admin.prestamos.vencidos');
    Route::get('/admin/libro/nuevo', 'Admin\BookController@create')->name('book.create');
    Route::post('/admin/registro', 'Admin\BookController@store')->name('book.store');
    Route::get('/admin/{id}/editar', 'Admin\BookController@edit')->name('book.edit');
    Route::put('/admin/{id}/editar', 'Admin\BookController@update')->name('book.update');
    Route::get('/admin/{id}/eliminar', 'Admin\BookController@destroy')->name('book.delete');
    Route::get('/admin/registro', function(){
        return redirect()->to('/home');
    });
});
