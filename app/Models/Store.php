<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Store extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'stores';
    protected $primaryKey = 'id'; 
    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    // public function favorite(){
    //     return $this->belongsTo(Favoritestore::class, 'id','store_id');
    // }


    public function favorites()
    {
        return $this->belongsToMany(Favoritestore::class);
    }

    public function users()
    {
         return $this->belongsToMany(Frontuser::class, 'favorites');
    }

}
