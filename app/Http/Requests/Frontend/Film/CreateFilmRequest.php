<?php
namespace App\Http\Requests\Frontend\Film;
/**
 * Created by PhpStorm.
 * User: naeem
 * Date: 11/19/17
 * Time: 11:28 PM
 */

use App\Http\Requests\Request;

/**
 * Class CreateFilmRequest
 * @package App\Http\Requests\Frontend\Film
 */
class CreateFilmRequest extends Request
{
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
            'name' => 'required',
            'description' => 'required',
            'release_date' => 'required',
            'rating' => 'required|numeric',
            'ticket_price' => 'required|numeric',
            'genres' => 'required',
            'country' => 'required',
            'photo' => 'required|mimes:jpeg,jpg,png,gif|max:10240'
        ];
    }
}