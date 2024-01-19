<?php

namespace App\Actions;

use App\Models\ShortLink;

class CreateShortLink
{
    public function execute(string $url, ?int $userId = null): ShortLink
    {
        $shortLink = ShortLink::create([
            'url' => $url,
            'user_id' => $userId,
            'code' => ShortLink::generateUniqueCode(),
        ]);

        return $shortLink;
    }
}
