<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorsController;
use App\Http\Controllers\PublishersController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('books/get/{id}', [BooksController::class, 'readBook']);
Route::post('books/create', [BooksController::class, 'createBook']);
Route::post('books/update/{id}', [BooksController::class, 'updateBook']);
Route::delete('books/delete/{id}', [BooksController::class, 'deleteBook']);

Route::post('register', [UserController::class, 'registerUser']);
Route::post('login', [UserController::class, 'loginUser']);
Route::post('logout', [UserController::class, 'logoutUser']);
Route::get('user/get/{id}', [UserController::class, 'getUser']);
Route::post('user/update/{id}', [UserController::class, 'updateUser']);
Route::delete('user/delete/{id}', [UserController::class, 'deleteUser']);

Route::get('authors/get/{id}', [AuthorsController::class, 'getAuthor']);
Route::post('authors/create', [AuthorsController::class, 'createAuthor']);
Route::post('authors/update/{id}', [AuthorsController::class, 'updateAuthor']);
Route::delete('authors/delete/{id}', [AuthorsController::class, 'deleteAuthor']);

Route::get('publishers/get/{id}', [PublishersController::class, 'readPublisher']);
Route::post('publishers/create', [PublishersController::class, 'createPublisher']);
Route::post('publishers/update/{id}', [PublishersController::class, 'updatePublisher']);
Route::delete('publishers/delete/{id}', [PublishersController::class, 'deletePublisher']);

Route::get('borrow/get/{id}', [BorrowController::class, 'getBorrow']);
Route::post('borrow/create', [BorrowController::class, 'createBorrow']);
Route::post('borrow/update/{id}', [BorrowController::class, 'updateBorrow']);
Route::delete('borrow/delete/{id}', [BorrowController::class, 'deleteBorrow']);
