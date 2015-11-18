<?php namespace ImagesManager\Http\Requests;

use ImagesManager\Http\Requests\Request;

use Auth;

use ImagesManager\Album;
use ImagesManager\Photo;

class DeletePhotoRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		$id = $this->get('id');

		$photo = Photo::find($id);

		$album = Auth::user()->albums()->find($photo->album_id);

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
			'id' => 'required|exists:photos,id'
		];
	}

}
