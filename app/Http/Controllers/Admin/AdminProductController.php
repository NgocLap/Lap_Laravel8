<?php

namespace App\Http\Controllers\Admin;

use App\Traits\StorageImageTrail;
use App\Components\Recusive;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use App\Traits\StorageImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    use StorageImageTrait;
    private $category;
    private $product;
    private $productImage;
    private $tag;
    private $productTag;
    public function __construct(Category $category, Product $product, ProductImage $productImage, Tag $tag, ProductTag $productTag)
    {
        $this->category = $category;
        $this->product = $product;
        $this->productImage = $productImage;
        $this->tag = $tag;
        $this->productTag = $productTag;
    }

    public function show()
    {
        return view('admin.product.show');
    }

    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.product.add', compact('htmlOption'));
    }

    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->categoryRecusive($parentId);
        return $htmlOption;
    }

    public function store(Request $request)
    {
        $dataProductCreate = [
            'name' => $request->name,
            'price' => $request->price,
            'content' => $request->content,
            'user_id' => Auth::id(),
            'category_id' => $request->category_id,
            'slug' => str::slug($request->name)
        ];
        $dataUploadFeatureImage = $this->storageTraitUpload($request, 'feature_image_path', 'product');
        if (!empty($dataUploadFeatureImage)) {
            $dataProductCreate['feature_image_name'] = $dataUploadFeatureImage['file_name'];
            $dataProductCreate['feature_image_path'] = $dataUploadFeatureImage['file_path'];
        }
        $product = $this->product->create($dataProductCreate);
        // return redirect()->route('show_product');

        //Insert data product_images
        if ($request->hasFile('image_path')) {
            foreach ($request->image_path as $fileItem) {
                $dataProductImageDetail = $this->storageTraitUploadMutiple($fileItem, 'product');
                $product->images()->create([
                    'image_path' => $dataProductImageDetail['file_path'],
                    'image_name' => $dataProductImageDetail['file_name']
                ]);
            }
        }

        //Insert tags product
        foreach ($request->tags as $tagItem) {
            $tagInstance = $this->tag->firstOrCreate(['name' => $tagItem]);
            // $this->productTag->create([
            //     'product_id' => $product->id,
            //     'tag_id' => $tagInstance->id
            // ]);
            $tagIds[] = $tagInstance->id;
        }
        $product->tags()->attach($tagIds);
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
