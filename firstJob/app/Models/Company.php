<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

  
    public function position(): HasMany
    {
        return $this->hasMany(Position::class);
    }

   protected $guarded = [];
}
