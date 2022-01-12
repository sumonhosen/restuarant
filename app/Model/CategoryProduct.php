<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    public function category(){
    	return $this->hasMany(ProductOption::class,'option_id','id');
    }
    public function product_option(){
    	return $this->belongsTo(ProductOption::class,'option_id','id');
    }
     public function option_type(){
    	return $this->belongsTo(OptionType::class,'type_id','id');
    }
    public static function cat_name($data){
    	$cats = CategoryProduct::whereIn('id',$data)->get();

        $cat_name = [];

    	foreach($cats as $cat){
    		 $cat_name[] = $cat->product_option_name;
    	}
    	return $category = implode(', ',$cat_name);
    }

    public static function cat_price($data){
    	$cats = CategoryProduct::whereIn('id',$data)->get();

        $price = [];

    	foreach($cats as $cat){
    		 $price[] = $cat->price;

    	}
    	return $price = array_sum($price);
    }
}
