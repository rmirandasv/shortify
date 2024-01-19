<?php

namespace App\Livewire\Components;

use App\Actions\CreateShortLink;
use App\Models\ShortLink;
use Livewire\Component;

class CreateShortlinkPublicForm extends Component
{
    public $url;
    public ?ShortLink $shortLink = null;

    public function submit()
    {
        $this->validate([
            'url' => 'required|url'
        ]);

        $createShortLinkAction = new CreateShortLink();
        $this->shortLink = $createShortLinkAction->execute($this->url);
    }

    public function resetForm()
    {
        $this->url = null;
        $this->shortLink = null;
    }

    public function render()
    {
        return view('livewire.components.create-shortlink-public-form');
    }
}
