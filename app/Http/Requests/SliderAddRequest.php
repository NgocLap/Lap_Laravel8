<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderAddRequest extends FormRequest
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
            'name' => 'bail|required|unique:sliders',
            'description' => 'required',
            'image_path' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'name.required'=>'Tên Slider không được phép để trống',
            'name.unique'=>'Tên Slider đã tồn tại, vui lòng nhập một tên khác',
            'description.required'=>'Mô tả không được phép để trống',
            'image_path.required'=>'Ảnh không được phép để trống',
        ];
    }
}
