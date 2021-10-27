<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'bail|required|unique:products|max:255|min:5',
            'price' => 'required',
            'category_id' => 'required',
            'content' => 'required',
            'feature_image_path' => 'required',
        ];
    }

    public function messages()
    {
        return[
            'name.required'=>'Tên không được phép để trống',
            'name.unique'=>'Tên sản phẩm đã tồn tại, vui lòng nhập một tên khác',
            'name.max'=>'Tên sản phẩm tối đa 255 kí tự',
            'name.min'=>'Tên sản phẩm ít nhất 5 kí tự',
            'price.required'=>'Giá sản phẩm không được để trống',
            'category_id.required'=>'Danh mục sản phẩm không được để trống',
            'content.required'=>'Nội dung sản phẩm không được để trống',
            'feature_image_path.required'=>'Chưa nhập ảnh sản phẩm ',
        ];
    }
}
