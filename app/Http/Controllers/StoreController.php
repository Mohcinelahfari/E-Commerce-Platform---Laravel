<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(Request $request)
    {
        
        $productsQuery = Product::query()->with('category');
        $categories = Category::with('products')->has('products')->get()->all();
        //dd($categories);
        $name = $request->input('name');
        $categoriesIds = $request->input('categories');
        //dd($categoriesIds);
        $min = $request->input('min_price');
        $max = $request->input('max_price');

        

        if(!empty($name)){
            $productsQuery->where('name', 'like',"%{$name}%");
        }        

        if(!empty($categoriesIds)){
            $productsQuery->whereIn('category_id',$categoriesIds);
        }

        if(!empty($min)){
            $productsQuery->where('price','>=', $min);
        }

        if(!empty($max)){
            $productsQuery->where('price','<=',$max);
        }
        $products = $productsQuery->get();
        return view('store.index', compact('products','categories'));
    }
}
