<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class ShortLink extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'url',
        'user_id',
        'code',
        'valid_until',
    ];

    public static function generateUniqueCode(): string
    {
        do {
            $code = Str::random(6);
        } while (static::where('code', $code)->exists());

        return $code;
    }

    public function visits(): HasMany
    {
        return $this->hasMany(ShortLinkVisit::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeOfUser(Builder $query, User $user): Builder
    {
        return $query->where('user_id', $user->id);
    }

    public function shortLink(): Attribute
    {
        return Attribute::make(
            get: fn () => route('shortlink.redirect', ['code' => $this->code])
        );
    }
}
