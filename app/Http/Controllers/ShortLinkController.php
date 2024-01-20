<?php

namespace App\Http\Controllers;

use hisorange\BrowserDetect\Facade as Browser;
use App\Models\ShortLink;
use App\Models\ShortLinkVisit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ShortLinkController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $code)
    {
        $shortLink = Cache::rememberForever("short_link_{$code}", function () use ($code) {
            return ShortLink::where('code', $code)->firstOrFail();
        });

        ShortLinkVisit::create([
            'short_link_id' => $shortLink->id,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'browser' => Browser::browserFamily(),
            'platform' => Browser::platformFamily(),
            'device_family' => Browser::deviceFamily(),
            'device' => Browser::deviceModel(),
            'device_type' => Browser::deviceType(),
        ]);

        return redirect($shortLink->url);
    }
}
