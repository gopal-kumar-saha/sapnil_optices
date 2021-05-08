<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{
    public function category()
    {
        return view('dashboard.category');
    }

    public function add_category(Request $request){

        $request->validate([
            'category_name' => 'required|max:10|min:3|unique:categories,category_name',
            'subcategory_name' => 'required|max:10|min:3|unique:categories,subcategory_name',
            'subcategory_image' => 'required'
        ]);

        $category_name = $request->category_name;
        $subcategory_name = $request->subcategory_name;
        $subcategory_image = $request->subcategory_image;
        
        if($category_name){
            if($subcategory_name){
                if($subcategory_image){
                    Category::insert([
                        'category_name' => $category_name,
                        'subcategory_name' => $subcategory_name,
                        'subcategory_image' => $subcategory_image,
                        'created_at' => Carbon::now()
                    ]);
                    return back()->with('category_success_msg','Category Added Successfully...');
                }
                else{
                    return back()->with('category_image_error','SubCategory image is requird !');
                }
            }
            else{
                return back()->with('subcategory_error','SubCategory Name is requird !');
                }
        }
        else{
            return back()->with('category_error','Category Name is requird !');
            }
    }
}
