<?php namespace App\Http\Controllers;

use App\Http\Requests;


use App\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Request;

use App\Http\Requests\RegisterStudentRequest;

class loginController extends Controller {

	//

    public function register(RegisterStudentRequest $request)
    {
        $input = Request::all();
        $user = new User();
        $user->username = $input['username'];
        $user->email = $input['email'];
        $user->password = Hash::make($input['password']);
        if ($user->save())
        {
            return view('profile.student', compact('user'));
        } else {
            return 'error';
        }

    }

    public function login(){
        $input = Request::all();

        $attempt = Auth::attempt([
            'email' => $input['email'],
            'password' => $input['password']
        ]);

        if ($attempt){
            $user = Auth::user();
            return view('profile.student', compact('user'));
        } else {
            return 'fail';
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
