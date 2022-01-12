<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    public function category(){
    	return $this->hasMany(CategoryProduct::class,'option_id','id');
    }
    public function option_type(){
        	return $this->belongsTo(OptionType::class,'type_id','id');	
    }
}
