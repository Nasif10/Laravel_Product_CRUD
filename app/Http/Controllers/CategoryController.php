<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    private $category, $categories;
    
    public function addCategory()
    {
        return view('Category.add-category');
    }

    public function createCategory(Request $req)
    {
        $this->category = new Category();
        $this->category->name = $req->name;
        $this->category->save();
        return redirect()->back()->with('msg', 'Category added');
    }

    public function manageCategory()
    {
        $this->categories = Category::orderBy('id')->get();
        return view('Category.manage-category', ['categories' => $this->categories]);
    }

    public function deleteCategory($id)
    {    
        $this->category = Category::find($id);
        $this->category->delete();
        Product::where('cid', $id)->delete();
        return redirect()->back()->with('msg', 'Category deleted');
    }
    
}
