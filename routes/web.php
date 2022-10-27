<?php

use App\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Auth::routes(['register' => false]);

Route::get('/', 'PagesController@home')->name('index');
Route::get('/empresa', 'PagesController@empresa')->name('empresa');
Route::get('categorias', 'PagesController@categorias')->name('categorias');
Route::get('categoria/{id}', 'PagesController@categoria')->name('categoria');
Route::get('/producto/{id}', 'PagesController@producto')->name('producto');
Route::get('/productos', 'PagesController@productos')->name('productos');
Route::get('/novedades', 'PagesController@novedades')->name('novedades');
Route::get('/novedad/{new}', 'PagesController@novedad')->name('novedad');
Route::get('/lista-de-precios', 'PagesController@listaDePrecios')->name('lista-de-precios');
Route::get('/solicitud-de-presupuesto', 'PagesController@solicitudDePresupuesto')->name('solicitud-de-presupuesto');
Route::get('/contacto', 'PagesController@contacto')->name('contacto');

Route::post('enviar-cotizacion', 'MailController@quote')->name('send-quote');
Route::post('enviar-contacto', 'MailController@contact')->name('send-contact');
Route::post('newsletter', 'NewsLetterController@storeNewsletter')->name('newsletter.store');
Route::get('/ficha-tecnica/{id}', 'PagesController@fichaTecnica')->name('ficha-tecnica');
Route::delete('/ficha-tecnica/{id}', 'PagesController@borrarFichaTecnica')->name('borrar-ficha-tecnica');
Route::get('/descargar-archivo/{id}/{column}', 'ContentController@descargarArchivo')->name('descargar-archivo');

Route::post('vp', 'VPController@addVP')->name('vp.store');
Route::get('vp', 'VPController@getSession')->name('vp');
Route::delete('vp/{id}', 'VPController@destroy')->name('vp.destroy');

Route::middleware('auth')->prefix('admin')->group(function () {
    /** Page Home */
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('home/content', 'HomeController@content')->name('home.content');
    Route::post('home/content/generic-section/store', 'HomeController@store')->name('home.content.store');
    Route::post('home/content/generic-section/update', 'HomeController@update')->name('home.content.update');
    Route::post('home/content/update', 'HomeController@updateSection')->name('home.content.update-section');
    Route::delete('home/content/{id}', 'HomeController@destroy')->name('home.content.destroy');
    Route::get('home/content/slider/get-list', 'HomeController@sliderGetList')->name('home.slider.get-list');
    /** Fin home*/
    /** Page Company */
    Route::get('company/content', 'CompanyController@content')->name('company.content');
    Route::post('company/content/store-slider', 'CompanyController@storeSlider')->name('company.content.storeSlider');
    Route::post('company/content/update-slider', 'CompanyController@updateSlider')->name('company.content.updateSlider');
    Route::post('company/create', 'CompanyController@createInfo')->name('company.content.createInfo');
    Route::post('company/content/update-info', 'CompanyController@updateInfo')->name('company.content.updateInfo');
    Route::post('company/content/generic-section/update', 'CompanyController@updateHomeGenericSection')->name('company.content.generic-section.update');
    Route::delete('company/content/{id}', 'CompanyController@destroySlider')->name('company.content.destroy');
    Route::get('company/content/slider/get-list', 'CompanyController@sliderGetList')->name('company.slider.get-list');
    Route::get('company/content/get-weather', 'CompanyController@getWeather');
    /** Fin company*/
    /** Page Category */
    Route::get('category/content', 'CategoryController@content')->name('category.content');
    Route::post('category/content/store', 'CategoryController@store')->name('category.content.store');
    Route::post('category/content', 'CategoryController@update')->name('category.content.update');
    Route::get('category/content/find/{id?}', 'CategoryController@find')->name('category.content.find');
    Route::delete('category/content/{id}', 'CategoryController@destroy')->name('category.content.destroy');
    Route::get('category/content/get-list', 'CategoryController@getList');
    Route::post('category/content/import', 'CategoryController@import')->name('category.import');
    /** Fin category*/

    /** Page Product */
    Route::get('product/content', 'ProductController@content')->name('product.content');
    Route::get('product/content/create', 'ProductController@create')->name('product.content.create');
    Route::post('product/content/store', 'ProductController@store')->name('product.content.store');
    Route::get('product/content/{id}/edit', 'ProductController@edit')->name('product.content.edit');
    Route::put('product/content', 'ProductController@update')->name('product.content.update');
    Route::delete('product/content/{id}', 'ProductController@destroy')->name('product.content.destroy');
    Route::get('product/content/get-list', 'ProductController@getList')->name('product.content.get-list');
    Route::get('product/content/find-product/{id?}', 'ProductController@find')->name('product.content.find');
    Route::delete('product/description-image/{id}/{field}', 'ProductController@destroyDescriptionImage')->name('product.destroy.descriptionImage');
    Route::post('product/content/import', 'ProductController@import')->name('product.import');
    /** Fin product*/

    /** Page Product variable */
    Route::post('variable-product/content/store', 'VariableProductController@store')->name('variable-product.content.store');
    Route::post('variable-product/content', 'VariableProductController@update')->name('variable-product.content.update');
    Route::delete('variable-product/content/{id}', 'VariableProductController@destroy')->name('variable-product.content.destroy');
    Route::post('variable-product/content/import', 'VariableProductController@import')->name('variable-product.import');
    /** Fin product variable*/
    
    /** Page Product Picture */
    Route::delete('product-picture/content/destroy/{id}', 'ProductPictureController@destroy')->name('product-picture.content.destroy');
    /** Fin product picture*/

    /** Page News */
    Route::get('news/content', 'NewsController@content')->name('news.content');
    Route::post('news/create', 'NewsController@createInfo')->name('news.content.createInfo');
    Route::post('news/content/update-info', 'NewsController@updateInfo')->name('news.content.updateInfo');
    Route::delete('news/content/{id}', 'NewsController@destroySlider')->name('news.content.destroy');
    Route::get('news/content/slider/get-list', 'NewsController@sliderGetList')->name('news.slider.get-list');
    /** Fin News*/

    /** Page News */
    Route::get('download-list/content', 'DownloadListController@content')->name('download-list.content');
    Route::post('download-list/create', 'DownloadListController@createInfo')->name('download-list.content.createInfo');
    Route::post('download-list/content/update-info', 'DownloadListController@updateInfo')->name('download-list.content.updateInfo');
    Route::delete('download-list/content/{id}', 'DownloadListController@destroySlider')->name('download-list.content.destroy');
    Route::get('download-list/content/slider/get-list', 'DownloadListController@sliderGetList')->name('download-list.slider.get-list');
    /** Fin News*/

    /** Page newsletter */
    Route::get('newsletter/content', 'NewsLetterController@content')->name('newsletter.content');
    Route::get('newsletter/content/get-list', 'NewsLetterController@getList')->name('newsletter.content.get-list');
    Route::delete('newsletter/content/{id}', 'NewsLetterController@destroy')->name('newsletter.content.destroy');
    /** Fin newsletter*/

    /** Page company */
    Route::get('data/content', 'DataController@content')->name('data.content');
    Route::put('data/content', 'DataController@update')->name('data.content.update');
    /** Fin company*/

    Route::get('page/content', 'AdminPageController@content')->name('page.content');
    Route::put('page/content', 'AdminPageController@update')->name('page.content.update');

    Route::get('content/', 'ContentController@content')->name('content');
    Route::get('content/{id}', 'ContentController@findContent');
    Route::post('content/hero-update', 'ContentController@heroUpdate')->name('content.hero-update');
    Route::delete('content/image/{id}/{reg}', 'ContentController@destroyImage')->name('content.destroy-image');
    Route::delete('content/{id}/ajax', 'ContentController@destroyContentAjax')->name('content.destroy.ajax');

    Route::get('user/get-list', 'UserController@getList')->name('user.get-list');
    Route::resource('user', 'UserController');
});
