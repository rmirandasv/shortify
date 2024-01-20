<?php

namespace App\Livewire\Components\Shortlink;

use App\Models\ShortLink;
use App\Models\ShortLinkVisit;
use Livewire\Component;
use Livewire\WithPagination;

class ShortlinkStats extends Component
{
    use WithPagination;

    public ShortLink $shortLink;

    public function mount(ShortLink $shortLink)
    {
        if ($shortLink->user_id != auth()->id()) {
            abort(403);
        }
        $this->shortLink = $shortLink;
    }

    public function render()
    {
        $visits = ShortLinkVisit::ofShortlink($this->shortLink)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('livewire.components.shortlink.shortlink-stats', compact('visits'));
    }
}
