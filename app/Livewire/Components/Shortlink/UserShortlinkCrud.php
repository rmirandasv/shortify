<?php

namespace App\Livewire\Components\Shortlink;

use App\Actions\CreateShortLink;
use App\Models\ShortLink;
use Livewire\Component;

class UserShortlinkCrud extends Component
{
    public bool $showForm = false;
    public $url;

    public function save()
    {
        $this->validate([
            'url' => 'required|url'
        ]);

        $createShortLink = new CreateShortLink();
        $createShortLink->execute($this->url, auth()->user()->id);
        $this->url = null;
        $this->showForm = false;
    }

    public function render()
    {
        $shortlinks = ShortLink::ofUser(auth()->user())
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('livewire.components.shortlink.user-shortlink-crud', compact('shortlinks'));
    }
}
