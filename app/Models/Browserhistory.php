<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Browserhistory extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'browserhistories';
    protected $primaryKey = 'id'; 
    protected $guarded = [];

    public function user(){
        $this->belongsTo(Frontuser::class);
    }


}
