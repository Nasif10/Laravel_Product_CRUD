<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    private $category, $categories, $product, $products;

    public function home()
    {
        if(isset($_GET['cid']) && $_GET['cid']!=null){
            $this->products = Product::where('cid', (int)$_GET['cid'])->get();
        }
        elseif(isset($_GET['cid']) && $_GET['cid']==null){
            return redirect()->route('home');
        }
        else{
            $this->products = Product::orderBy('id')->get();
        }

        $this->categories = Category::orderBy('id')->get();
        
        return view('Product.home', ['products' => $this->products, 'categories' => $this->categories]);
    }

    public function detailProduct($id)
    {
        $this->product = Product::find($id);
        $this->productsLike = Product::where('cid', $this->product->cid)->where('id', '!=', $id)->inRandomOrder()->take(4)->get();
        return view('Product.detail-product', ['product' => $this->product, 'similarProducts' => $this->productsLike]);
    }

    public function manageProduct()
    {
        $this->products = Product::orderBy('id')->get();
        return view('Product.manage-product', ['products' => $this->products]);
    }

    public function addProduct()
    {
        $this->categories = Category::orderBy('id')->get();
        return view('Product.add-product', ['categories' => $this->categories]);
    }

    public function createProduct(Request $req)
    {    
        Product::newProduct($req);
        return redirect()->back()->with('msg', 'Product added');
    }

    public function editProduct($id)
    {
        $this->categories = Category::orderBy('id')->get();
        $this->product = Product::find($id);
        return view('Product.edit-product', ['product' => $this->product, 'categories' => $this->categories]);
    }

    public function updateProduct(Request $req, $id)
    {    
        Product::newUpdate($req, $id);
        return redirect()->back()->with('msg', 'Product updated');
    }

    public function deleteProduct($id)
    {    
        $this->product = Product::find($id);
        if(file_exists($this->product->image)){
            unlink($this->product->image);
        }
        $this->product->delete();
        return redirect()->back()->with('msg', 'Product deleted');
    }
}
