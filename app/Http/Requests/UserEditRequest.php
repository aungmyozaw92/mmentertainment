<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use Session;

class UserEditRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		if(Request::input('active_tab') == "profile"){

			return [
			'name'		=>	'required',
			'username'  =>  'required|unique:users,username,'.Request::input('id'),
			'role_id'	=>	'required',
			'email'     =>  'required|email|unique:users,email,'.Request::input('id') 
			];
		}else{
			return [
			'password' => 'required',
			'passconf' => 'required|same:password'
			];

		}
	}

	
}
