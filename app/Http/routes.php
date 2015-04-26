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
Route::get('/about', 'PagesController@about');
Route::get('/logout', 'loginController@logout');
Route::get('/search', 'PagesController@searchResults');
Route::get('/searchCategory', 'PagesController@searchCategory');

//Student routes
Route::post('registerStudent', 'Auth\AuthController@postRegisterStudent');
Route::post('login', 'Auth\AuthController@postlogin');
Route::get('/login', 'Auth\AuthController@getlogin');
Route::get('/register', 'Auth\AuthController@getStudentRegister');
Route::get('/viewCart', 'PagesController@viewCart');
Route::get('books/{id}', 'BooksController@show');

Route::post('/removeFromCart', 'ShoppingCartController@removeDirectly');
Route::post('books/{id}', 'BooksController@createComment');
Route::post('/addToCart', 'ShoppingCartController@addToCart');

Route::get('/checkOut', 'PagesController@checkOutCart');
Route::post('/checkOut', 'CheckOutController@checkOut');

Route::post('/shipping', 'CheckOutController@saveShipping');
Route::get('/shipping', 'CheckOutController@getShipping');



//Admin routes
Route::get('captainsChair', 'PagesController@getCaptainsLogin');
Route::post('captainsChair', 'PagesController@postCaptainsLogin');
Route::get('captainsRoom', 'PagesController@CaptainsRoom');
Route::get('captainsRoom/addBook', 'BooksController@create');
Route::post('captainsRoom/addBook', 'BooksController@store');
Route::post('captainsRoom/delete/{id}', 'BooksController@destroy');
Route::get('captainsRoom/bookRequests', 'BooksController@captainsOrders');
Route::post('captainsRoom/bookRequests', function(Requests\ApproveBookRequest $request){
    $theBookRequest = bookrequest::find($request['id']);
    $theBookRequest->approved = $request['approved'];
    $theBookRequest->save();
    return redirect('captainsRoom/addBook')->withInput($theBookRequest->toArray());
});
Route::get('captainsRoom/records', function(){
    $transactions = \Illuminate\Support\Facades\DB::table('transactions')->get();
    return view('captainsRoom.transactions', compact('transactions'));
});

Route::get('captainsRoom/allBooks', function(){
    $books = \App\book::all();
    return view('captainsRoom.allBooks', compact('books'));
});


//Professor routes
Route::get('professorRegister', 'PagesController@getProfessorRegister');
Route::post('registerProfessor', 'loginController@postProfessorRegister');
Route::get('professorLogin', 'PagesController@getProfessorLogin');
Route::post('professorLogin', 'PagesController@postProfessorsLogin');
Route::get('professorPage', 'PagesController@ProfessorsRoom');
Route::get('professorPage/requestBook', 'BooksController@request');
Route::post('professorPage/requestBook', 'BooksController@saveRequest');
Route::get('professorPage/allbookRequests', 'BooksController@showAllRequests');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
