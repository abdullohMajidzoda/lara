<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Category;

class Post extends Model
{
    protected $guarded = [];

    public function category(): BelongsTo
    {
    return $this->belongsTo(Category::class, 'categry_id');
    }
}
