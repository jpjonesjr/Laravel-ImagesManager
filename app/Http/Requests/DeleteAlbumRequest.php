<?php namespace ImagesManager\Http\Requests;

use ImagesManager\Http\Requests\Request;

use Auth;
use ImagesManager\Album;

class DeleteAlbumRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		$user = Auth::user();
		$id = $this->get('id');
		$album = $user->albums()->find($id);

		if ($album)
		{
			return true;
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
		return 
		[
			'id' => 'required|exists:albums,id'
		];
	}

}
