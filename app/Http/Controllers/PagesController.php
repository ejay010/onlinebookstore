<?php namespace App\Http\Controllers;

use App\book;
use App\Http\Requests;

use Illuminate\Support\Facades\Auth;


class PagesController extends Controller {

	//
    public function index()
    {
        $books = book::all();
        return view('index', compact('books'));
    }

    public function about()
    {
        return view('about');
    }

    public function loginForm()
    {
        return view('login');
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
                return 'You dont have the right';
            }
        } else {
            return redirect('captainsChair');
        }

    }

    public function ProfessorsRoom(){
        if(Auth::User()){
            $user = Auth::User();
            if ($user->type == 'professor'){
                return view('profile.professorProfile', compact('user'));
            } else {
                return 'You dont have the right to be here';
            }
        } else {
            return redirect('professorLogin');
        }
    }

}
