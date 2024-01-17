<?php

namespace App\Livewire\Components;

use Livewire\Component;

class CreateShortlinkPublicForm extends Component
{
    public $url;

    public function submit()
    {
        $this->validate([
            'url' => 'required|url'
        ]);
    }

    public function render()
    {
        return view('livewire.components.create-shortlink-public-form');
    }
}
