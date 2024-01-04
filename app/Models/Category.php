<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'categories';
    protected $primaryKey = 'id'; 
    protected $guarded = [];

    // public function subCategories(){
    //     return $this->hasMany(Subcategory::class, 'category_id');
    // }

    public function parent(){
        return $this->belongsTo(Category::class,'parent_id');
    }
    public function child(){
        return $this->hasMany(Category::class,'parent_id');
    }    

    public function stores()
    {
        return $this->belongsToMany(Store::class);
    }
}
