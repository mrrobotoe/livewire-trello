<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Board extends Model
{
    /** @use HasFactory<\Database\Factories\BoardFactory> */
    use HasFactory;

    protected $guarded = [];

    public function columns()
    {
        return $this->hasMany(Column::class);
    }

    public function cards(): HasManyThrough
    {
        return $this->hasManyThrough(Card::class, Column::class);
    }
}
