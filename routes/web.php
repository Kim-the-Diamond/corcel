<?php


use App\View\Components\WikiController;
use App\View\Components\PostController;
use App\View\Components\AcfController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/posts', function () {
//     return view(PostOverview::class,'''components.post-overview',['posts'=>Post::all()]);
// });

Route::get('/wiki', [WikiController::class, 'overview']);
Route::get('/wiki/{post:post_name}', [WikiController::class, 'wiki']);

Route::get('/', [PostController::class, 'overview']);
Route::get('/posts/{post:post_name}', [PostController::class, 'post']);


Route::get('/acf', [AcfController::class, 'overview']);

