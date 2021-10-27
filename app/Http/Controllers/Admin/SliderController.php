<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderAddRequest;
use App\Models\Slider;
use App\Traits\StorageImageTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SliderController extends Controller
{
    use StorageImageTrait;
    private $slider;

    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }

    public function show()
    {
        $sliders = $this->slider->latest()->paginate(10);
        return view ('admin.slider.show', compact('sliders'));
    }

    public function create()
    {
        return view ('admin.slider.add');
    }
    public function store(SliderAddRequest $request)
    {
        try{
            $dataInsert = [
                'name' => $request->name,
                'description' => $request->description
            ];

            $dataImageSlider = $this->storageTraitUpload($request, 'image_path', 'slider');
                if (!empty($dataImageSlider)) {
                    $dataInsert['image_name'] = $dataImageSlider['file_name'];
                    $dataInsert['image_path'] = $dataImageSlider['file_path'];
                }
            $this->slider->create($dataInsert);
            return redirect()->route('show_slider');
        }catch(Exception $ex){
            Log::error('Lỗi : ' . $ex->getMessage() . '-----Line :' . $ex->getLine());
        }

    }

    public function edit($id, Request $request)
    {
        $sliderEdit = $this->slider->find($id);
        return view('admin.slider.edit', compact('sliderEdit'));
    }

    public function update($id, Request $request)
    {
        try{
            $dataUpdate = [
                'name' => $request->name,
                'description' => $request->description
            ];

            $dataImageSlider = $this->storageTraitUpload($request, 'image_path', 'slider');
                if (!empty($dataImageSlider)) {
                    $dataUpdate['image_name'] = $dataImageSlider['file_name'];
                    $dataUpdate['image_path'] = $dataImageSlider['file_path'];
                }
            $this->slider->find($id)->update($dataUpdate);
            return redirect()->route('show_slider');
        }catch(Exception $ex){
            Log::error('Lỗi : ' . $ex->getMessage() . '-----Line :' . $ex->getLine());
        }


    }
    public function delete($id)
    {
        try{
            $this->slider->find($id)->delete();
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
