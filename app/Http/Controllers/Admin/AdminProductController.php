<?php

namespace App\Http\Controllers\Admin;

use App\Traits\StorageImageTrail;
use App\Components\Recusive;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    use StorageImageTrait;
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category ;
    }

    public function show()
    {
        return view ('admin.product.show');
    }

    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');
        return view ('admin.product.add', compact('htmlOption'));
    }

    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive -> categoryRecusive($parentId);
        return $htmlOption;
    }

    public function store(Request $request)
    {
        $dataUpload = $this->storageTraitUpload($request, 'feature_image_path','product');
        dd($dataUpload);
        // return redirect()->route('show_product');

    }

    // public function getCategory($parentId)
    // {
    //     $data = $this->category->all();
    //     $recusive = new Recusive($data);
    //     $htmlOption = $recusive -> categoryRecusive($parentId);
    //     return $htmlOption;
    // }

    // public function edit($id)
    // {
    //     $category = $this->category->find($id);
    //     $htmlOption = $this->getCategory($category->parent_id);

    //     return view('admin.category.edit',compact('category','htmlOption'));
    // }

    // public function update($id, Request $request)
    // {
    //     $this->category->find($id)->update([
    //         'name' => $request -> name,
    //         'parent_id' => $request -> parent_id,
    //         'slug' => str::slug($request -> name)
    //     ]);
    //     return redirect()->route('show_category');

    // }

    // public function delete($id)
    // {
    //     $this->category->find($id)->delete();
    //     return redirect()->route('show_category');
    // }

}
