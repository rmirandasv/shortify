<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortLinkVisit extends Model
{
    use HasFactory;

    public $fillable = [
        'short_link_id',
        'ip',
        'user_agent',
        'browser',
        'platform',
        'device_family',
        'device',
        'device_type',
        'country_code',
        'country_name',
    ];

    public function scopeOfShortLink(Builder $query, $shortLink): Builder
    {
        return $query->where('short_link_id', $shortLink->id);
    }

}
