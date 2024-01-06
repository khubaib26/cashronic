<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Favoritestore extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['frontuser_id' , 'store_id'];
    protected $dates = ['deleted_at'];



    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function user()
    {
        return $this->belongsTo(Frontuser::class);
    }

    


}
