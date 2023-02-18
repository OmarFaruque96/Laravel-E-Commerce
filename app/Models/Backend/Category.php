<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory; 

    public function brand(){
    	return $this->belongsTo(Brand::class);
    }

    public function product(){
    	return $this->hasMany(Product::class);
    }

    // to identify the parent id using this Method
    public function parent(){
    	return $this->belongsTo(Category::class, 'is_parent');
    }

}
