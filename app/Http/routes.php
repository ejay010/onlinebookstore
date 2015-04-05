<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// General routes
use App\bookrequest;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;


Route::get('/','PagesController@index');
Route::get('about', 'PagesController@about');
Route::get('logout', 'LoginController@logout');

//Student routes
Route::post('registerStudent', 'Auth\AuthController@postRegisterStudent');
Route::post('login', 'Auth\AuthController@postlogin');
Route::get('/login', 'Auth\AuthController@getStudentlogin');
Route::get('/register', 'Auth\AuthController@getStudentRegister');
Route::get('/viewCart', 'PagesController@viewCart');
Route::get('books/{id}', 'BooksController@show');
Route::post('books/{id}', 'BooksController@createComment');
Route::post('/addToCart', 'ShoppingCartController@addToCart');



//Admin routes
Route::get('captainsChair', 'Auth\AuthController@getAdminLogin');
Route::post('captainsChair', 'Auth\AuthController@postAdminLogin');
Route::get('captainsRoom', 'PagesController@CaptainsRoom');
Route::get('captainsRoom/addBook', 'BooksController@create');
Route::post('captainsRoom/addBook', 'BooksController@store');
Route::get('captainsRoom/bookRequests', 'BooksController@captainsOrders');
Route::post('captainsRoom/bookRequests', function(Requests\ApproveBookRequest $request){
    $theBookRequest = bookrequest::find($request['id']);
    $theBookRequest->approved = $request['approved'];
    $theBookRequest->save();
    return redirect('captainsRoom/bookRequests')->with('done', 'http://www.todayifoundout.com/wp-content/uploads/2010/04/ok.gif');
});

//Professor routes
Route::get('professorRegister', 'Auth\AuthController@getProfessorRegister');
Route::post('registerProfessor', 'Auth\AuthController@postRegisterProfessor');
Route::get('professorLogin', 'Auth\AuthController@getProfessorLogin');
Route::post('professorLogin', 'Auth\AuthController@postProfessorLogin');
Route::get('professorPage', 'PagesController@ProfessorsRoom');
Route::get('professorPage/requestBook', 'BooksController@request');
Route::post('professorPage/requestBook', 'BooksController@saveRequest');
Route::get('professorPage/allbookRequests', 'BooksController@showAllRequests');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
