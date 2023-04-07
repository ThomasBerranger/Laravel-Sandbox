<?php

namespace App\Models;

use App\Traits\SlugTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Character extends Model
{
    use HasFactory, SlugTrait;

    protected $fillable = ['name', 'super_power', 'manga_id', 'picture'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function manga(): BelongsTo
    {
        return $this->belongsTo(Manga::class);
    }

    public function scopeSearch(Builder $query, string $terms = null)
    {
        collect(str_getcsv($terms, ' '))->each(function ($term) use ($query) {
            $term .= '%';

            $query->where(function ($query) use ($term) {
                $query->where('name', 'like', $term)
                    ->orWhereIn('manga_id', Manga::query()->where('name', 'like', $term)->pluck('id'));
            });
        });
    }
}
