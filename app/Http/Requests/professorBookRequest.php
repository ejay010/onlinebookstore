<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class professorBookRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
        if(Auth::User()){
            $user = Auth::User();
            if ($user->type == 'professor'){
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
			//
            'publisher' => 'required',
            'title' => 'required',
            'author' => 'required',
            'class' => 'required',
            'edition' => 'required|min:1',
            'professor' => 'required'
		];
	}

}
