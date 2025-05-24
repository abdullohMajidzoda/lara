<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{

    public function profile(): BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    protected $guarded = [];
    
}
