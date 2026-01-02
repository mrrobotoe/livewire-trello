<?php

namespace App\Models;

use App\Livewire\Modals\Traits\Archivable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Card extends Model implements Sortable
{
    use Archivable;
    use SortableTrait;

    protected $guarded = [];

    public function buildSortQuery(): Builder
    {
        return static::query()->where('column_id', $this->column_id);
    }

    public $casts = [
        'archived_at' => 'datetime',
    ];

    public $sortable = [
        'order_column_name' => 'order',
        'sort_when_creating' => true,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function column(): BelongsTo
    {
        return $this->belongsTo(Column::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
