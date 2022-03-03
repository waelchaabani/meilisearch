<?php



use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SearchController;
use App\Http\Controllers\Controller;


use App\Http\Controllers\PostController;





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



Route::get('/search', SearchController::class);
Route::get('test/{term}', [Controller::class, 'test']);



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    return view('dashboard');

})->name('dashboard');

Route::get('delete/post/{id}', SearchController::class,'DeletePost');


Route::get('/delete/{id}', [SearchController::class, 'DeletePost'])->name('posts.delete');
Route::get('/add', [PostController::class, 'PostAdd'])->name('posts.add');
Route::post('/post/add', [SearchController::class, 'PostAdd'])->name('posts.store');

Route::get('/store', [PostController::class, 'PostView'])->name('post.view');
//Route::get('/contact', Post::class);






Route::get('/edit/{id}', [SearchController::class, 'PostEdit'])->name('posts.edit');

Route::post('/update/{id}', [SearchController::class, 'PostUpdate'])->name('posts.update');




Route::get('/view/{id}', [SearchController::class, 'PostView'])->name('posts.view');
