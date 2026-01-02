<?php

namespace App\Models;

use App\Livewire\Modals\Traits\Archivable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Column extends Model implements Sortable
{
    use Archivable;

    /** @use HasFactory<\Database\Factories\ColumnFactory> */
    use HasFactory;
    use SortableTrait;

    protected $guarded = ['id'];

    public function buildSortQuery(): Builder
    {
        return static::query()->where('board_id', $this->board_id);
    }

    protected $casts = [
        'archived_at' => 'datetime',
    ];

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    public function cards()
    {
        return $this->hasMany(Card::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
