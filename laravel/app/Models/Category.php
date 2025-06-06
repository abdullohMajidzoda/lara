<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Category extends Model
{
    protected $guarded = [];

    public function animal(): HasMany
    {
        return $this->hasMany(Animal::class);
    }
}
