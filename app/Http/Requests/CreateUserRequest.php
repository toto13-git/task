<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
      //
      'name' => 'required|string|max:10',
      'sell_by_year' => 'integer|digits:4|nullable',
      'sell_by_month' => 'integer|digits_between:1,2|nullable|lte:12',
      'sell_by_day' => 'integer|digits_between:1,2|nullable|lte:31',
      'stock' => 'integer|digits_between:1,3|nullable',
      'category' => 'nullable',
      'memo' => 'string|max:200|nullable',
      'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048|nullable',
    ];
  }
}
