<?php namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;

class adminAddBookRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{

        if(Auth::User()){
            $user = Auth::User();
            if ($user->type == 'captain'){
                return true;
            } else {
                return false;
            }
        }
		return false;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'pprice' => 'required',
            'isbn' => 'required|min:13',
            'description' => 'required',
            'category' => 'required',
            'class' => 'required',
            'onHand' => 'required'
        ];
	}

}
