<?php

namespace App\Http\Controllers;

use App\Models\ShortLink;
use Illuminate\Http\Request;

class ShortLinkController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, string $code)
    {
        $shortLink = ShortLink::where('code', $code)->firstOrFail();

        return redirect($shortLink->url);
    }
}
