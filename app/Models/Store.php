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


    public function favorite(){
        $cid = auth()->guard('front')->user()!=null ? auth()->guard('front')->user()->id : null; 
        return $this->belongsTo(Favoritestore::class, 'id','store_id')->where('frontuser_id',$cid);
    }

    public function like(){
        return $this->favorite()->selectRaw('store_id,count(*) as count')->groupBy('store_id');
    }

}
