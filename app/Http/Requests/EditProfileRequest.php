<?php namespace ImagesManager\Http\Requests;

use ImagesManager\Http\Requests\Request;

use ImagesManager\Photo;
use ImagesManager\Album;
use ImagesManager\User;

use Auth;

class EditProfileRequest extends Request {

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
		return 
		[
		'name' => 'required',
		'password' => 'min:6|confirmed',
		'question' => 'required_with:answers',
		'answer' => 'required_with:question'
		];
	}

}
