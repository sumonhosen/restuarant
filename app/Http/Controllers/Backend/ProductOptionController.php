<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\OptionType;
use App\Model\ProductOption;
use App\Model\CategoryProduct;
use Intervention\Image\Facades\Image;

class ProductOptionController extends Controller
{
    public function showType(){
        $option_types = OptionType::all();
    	return view('backend.product_option.type',compact('option_types'));
    }

    public function add_type(Request $request){
    	$this->validate($request, [
           'option_type' => 'required|unique:option_types',
       ]);
    
    	$type = new OptionType;
    	$type->option_type = $request->option_type;
    	$type->save();
        notify()->success("Option type added","Success");
        return redirect()->route('admin.view.type');
    }
    public function showOption(){
        $option_types = OptionType::all();
        $product_options = ProductOption::with('option_type')->get();
        // dd($product_options);
        return view('backend.product_option.option',compact('option_types','product_options'));
    }

    public function add_option(Request $request){
        $this->validate($request, [
           'option_title' => 'required|unique:product_options',
           'type_id'   => 'required',
       ]);

        $option = new ProductOption;
        $option->option_title = $request->option_title;
        $option->type_id = $request->type_id;
        $option->save();
        notify()->success("Product Option added","Success");
        return redirect()->route('admin.view.option');
    }
    public function show_single_product_option($id){
        $single_option_data = ProductOption::findOrFail($id); 
        $category_products = CategoryProduct::with('product_option')->where('option_id',$id)->get();
        // dd($single_option_data);
        return view('backend.product_option.single_product_option',compact('single_option_data','category_products'));
    }
    public function edit_single_product_option(Request $request,$id){
        $this->validate($request, [
            'option_title' => 'required',
        ]);

        $single_option_edit = ProductOption::findOrFail($id); 
        $single_option_edit->option_title = $request->option_title;
        $single_option_edit->save();
        notify()->success("Product Option update","Success");
        return back();
    }
    public function add_category_product(Request $request){
        $this->validate($request, [
            'product_option_name' => 'required',
            'product_image'       => 'image|mimes:jpeg,jpg,png,gif|max:5048',
            'option_id'           => 'required',
            'type_id'             => 'required',
        ]);
        // dd($request->all());
        $category_product                      = new CategoryProduct;
        $category_product->product_option_name = $request->product_option_name;
        $category_product->price               = $request->product_price;
        $image                                 = $request->file('product_image');

        if($image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fill_name = $image_name . '.' . $ext;
            $upload_path = 'public/backend/upload/category_product/';
            $image_url = $upload_path . $image_fill_name;
            Image::make($image)->resize(400, 400)->save($image_url);
            $category_product->product_image = $image_url;
        }
        $category_product->option_id = $request->option_id;
        $category_product->type_id = $request->type_id;
        $category_product->save();
        notify()->success("Category Product Added","Success");
        return back();
    }
    public function show_category_product(Request $request){
        $category_product = CategoryProduct::findOrFail($request->category_id);
        return view('backend.product_option.ajax.ajax_category_product',compact('category_product'));
    }
}
