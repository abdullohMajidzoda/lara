<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Animal extends Model
{
    protected $guarded = [];
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
