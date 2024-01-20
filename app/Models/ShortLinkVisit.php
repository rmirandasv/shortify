<?php

namespace App\Models;

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
}
