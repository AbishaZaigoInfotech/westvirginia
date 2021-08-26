<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use LaraSnap\LaravelAdmin\Models\Category;
use App\Models\StationCategory;

class Station extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $date = ['deleted_at'];
    public function stationCategory(){
        return $this->hasMany(StationCategory::class);
    } 
    public function category(){
        return $this->belongsTo(Category::class, 'format', 'id');
    } 
}
