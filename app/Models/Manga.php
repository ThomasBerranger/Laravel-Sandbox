<?php

namespace App\Models;

use App\Traits\SlugTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Manga extends Model
{
    use HasFactory, SlugTrait;

    protected $fillable = ['name', 'category_id'];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function characters(): HasMany
    {
        return $this->hasMany(Character::class);
    }

    public function relatedCharactersNumber(): int
    {
        return $this->hasMany(Character::class)->count();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
