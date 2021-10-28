<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

trait DeleteModelTrait
{
    public function deleteModelTrait($id, $model)
    {
        try{
            $model->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'Xóa Thành Công'
            ],  200);
        }catch(\Exception $exception){
            Log::error('Lỗi : ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'Xóa thất bại'
            ],  500);
        }
    }
}
