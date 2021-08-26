<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Filter;
use App\Models\StationCategory;

class Category extends Model
{
    use HasFactory;

    use Filter;

    public function parentCategory(){
        return $this->belongsTo('App\Models\Category', 'parent_category_id'); 
    }
    
    public function childCategory(){
        return $this->hasMany('App\Models\Category', 'parent_category_id'); 
    }

    public function station(){ 
        return $this->hasMany(StationCategory::class);
    }
}
