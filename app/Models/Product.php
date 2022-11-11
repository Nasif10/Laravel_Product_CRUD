<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    private static $product;
    private static $image;
    private static $directory;
    private static $imageName;
    private static $url;


    public static function getImageUrl($req)
    {
        self::$image = $req->file('image');
        self::$imageName = self::$image->getClientOriginalName();
        self::$directory = 'savedImage/';
        self::$image->move(self::$directory, self::$imageName);
        self::$url = self::$directory.self::$imageName;
        return self::$url;
    }
    
    public static function newProduct($req)
    {   
        self::$product = new Product();
        self::$product->cid = $req->cid;
        self::$product->name = $req->name;
        self::$product->image = self::getImageUrl($req);
        self::$product->description = $req->description;
        self::$product->price = $req->price;
        self::$product->save(); 
    }

    public static function newUpdate($req, $id)
    {
        self::$product = Product::find($id);
        
        if($req->file('image')){
            if(file_exists(self::$product->image)){
                unlink(self::$product->image);    
            }
            self::$url = self::getImageUrl($req);
        }
        else{
            self::$url = self::$product->image;
        }
  
        self::$product->cid = $req->cid;
        self::$product->name = $req->name;
        self::$product->image = self::$url;
        self::$product->description = $req->description;
        self::$product->price = $req->price;
        self::$product->save(); 
    }
}
