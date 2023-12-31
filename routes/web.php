<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController; 
/*使用するものはUSE宣言*/
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

Route::get('/', [PostController::class, 'index']);
/*ブラウザ上で/
/のリクエストをした場合PostControllerのindexを実行する。*/

Route::get('/posts/create', [PostController::class, 'create']);
/*ブラウザ上で'/posts/create'にgetリクエストが来たら、
　PostControllerのcreateメソッドを実行する*/

Route::get('/posts/{post}', [PostController::class ,'show']);
/*ブラウザ上で'/posts/{対象データのID}'にGetリクエストが来たら、
　PostControllerのshowメソッドを実行する*/

Route::post('/posts', [PostController::class, 'store']);
/*ブラウザ上で'/posts'にpostリクエストが来たら、
　PostControllerのstoreメソッドを実行する*/
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
/*ブラウザ上で'/posts/{ $post->id }/edit'に
getリクエストが来たら、PostControllerのeditメソッドを実行する
{{ $post->id }}には投稿のIDがくる*/

Route::put('/posts/{post}', [PostController::class, 'update']);
/*ブラウザ上で'/posts/{post}'にputリクエストが来たら、
　PostControllerのupdateメソッドを実行する*/
Route::delete('/posts/{post}', [PostController::class,'delete']);
/*ブラウザ上で'/posts/{post}'にdeleteリクエストが来たら、
　PostControllerのdeleteメソッドを実行する*/