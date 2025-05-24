<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    public function client(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

  
    public function position(): HasMany
    {
        return $this->hasMany(Position::class);
    }

   protected $guarded = [];
}
