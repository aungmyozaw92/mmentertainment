<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request {

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
		return [
		'name'		=>	'required',
		'username'	=>	'required|unique:users',
		'role_id'	=>	'required',
		'password'	=>	'min:6|required ',
		'passconf'	=>  'required|same:password' ,
		'email' 	=>  'required|unique:users|email'
		];
	}

}
