<?php namespace App\Http\Controllers;

use App\book;
use App\Countries;
use App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;


class PagesController extends Controller {


	//
    public function index()
    {
        $booksController = new BooksController();
        $booksCategory = $booksController->getAllCatagories();
        $books = book::all();
        return view('index', compact('books', 'booksCategory'));
    }

    public function about()
    {
        return view('about');
    }

    public function loginForm()
    {
        return view('login');
    }

    public function searchResults(){
        $input = Input::all();
        $query = $input['q'];
        $books = book::where('title', 'LIKE', "%$query%")->get();
        return view('profile.search', compact('books', 'query'));
    }

    public function searchCategory(){
        $input = Input::all();
        $query = $input['c'];
        $books = book::where('category', 'LIKE', "%$query%")->get();
        return view('profile.search', compact('books', 'query'));
    }

    public function RegisterForm()
    {
        return view('register');
    }

    public function professorLoginCaptcha(){
        return view('professorLoginCaptcha');
    }

    public function CaptainsRoom(){
        if(Auth::User()){
            $user = Auth::User();
            if ($user->type == 'captain'){
                return view('profile.captainsRoom');
            }
            else {
                return 'You don\'t have the rights';
            }
        } else {
            return redirect('captainsChair');
        }

    }

    public function getProfessorLogin(){
        return view('professorLogin');
    }

    public function postProfessorsLogin(Requests\ProfessorLoginRequest $request){
        $email = $request['email'];
        $password = $request['password'];
        if(Auth::attempt(['email' => $email, 'password' => $password, 'type' => 'professor'])){
            return redirect('professorPage');
        };

        return redirect('professorLogin')->withInput($request->only('email'))->withErrors(['email' => 'These credentials don\'t match our records']);
    }

    public function getProfessorRegister(){
        return view('profregister');
    }

    public function getCaptainsLogin(){
        return view('captainsChair');
    }

    public function postCaptainsLogin(Requests\AdminLoginRequest $request){
        $email = $request['email'];
        $password = $request['password'];
        if(Auth::attempt(['email' => $email, 'password' => $password, 'type' => 'captain'])){
            return redirect('captainsRoom');
        };

        return redirect('captainsChair')->withInput($request->only('email'))->withErrors(['email' => 'These credentials don\'t match our records']);
    }

    public function getStudentLogin(){
        return view('login');
    }

    public function ProfessorsRoom(){
        if(Auth::User()){
            $user = Auth::User();
            if ($user->type == 'professor'){
                return view('profile.professorProfile', compact('user'));
            } else {
                return 'You don\'t have the right to be here';
            }
        } else {
            return redirect('professorLogin');
        }
    }

    public function studentLogin(){
        if(Auth::User()){
            $user = Auth::User();
            if ($user->type == 'student'){
                return view('profile.student', compact('user'));
            } else {
                return 'You don\' have the rights to be here';
            }
        } else {
            return redirect('/login');
        }
    }

    public function viewCart(){
        $shoppingCartController = new ShoppingCartController();
        $items = $shoppingCartController->index();
        $cartTotal = $shoppingCartController->getCartTotal();
        return view('profile.cartView', compact('items', 'cartTotal'));
    }

    public function checkOutCart(){
        $shoppingCartController = new ShoppingCartController();
        $items = $shoppingCartController->index();
        $cartTotal = $shoppingCartController->getCartTotal();
        return view('profile.checkout', compact('items', 'cartTotal'));
    }
}
