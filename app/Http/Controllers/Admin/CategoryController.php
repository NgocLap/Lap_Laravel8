<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Components\Recusive;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category ;
    }

    public function show()
    {
        $categories = $this->category->paginate(15);
        return view ('admin.category.show', compact('categories'));
    }


    public function create()
    {
        $htmlOption = $this->getCategory($parentId = '');
        return view ('admin.category.add',compact('htmlOption'));
    }

    public function store(Request $request)
    {
        $this->category->create([
            'name' => $request -> name,
            'parent_id' => $request -> parent_id,
            'slug' => str::slug($request -> name)
        ]);
        return redirect()->route('show_category');
    }

    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive -> categoryRecusive($parentId);
        return $htmlOption;
    }

    public function edit($id)
    {
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);

        return view('admin.category.edit',compact('category','htmlOption'));
    }

    public function update($id, Request $request)
    {
        $this->category->find($id)->update([
            'name' => $request -> name,
            'parent_id' => $request -> parent_id,
            'slug' => str::slug($request -> name)
        ]);
        return redirect()->route('show_category');

    }

    public function delete($id)
    {
        $this->category->find($id)->delete();
        return redirect()->route('show_category');
    }

}
