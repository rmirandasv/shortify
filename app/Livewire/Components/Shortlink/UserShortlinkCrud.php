<?php

namespace App\Livewire\Components\Shortlink;

use App\Actions\CreateShortLink;
use App\Models\ShortLink;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class UserShortlinkCrud extends Component
{
    use WithPagination;

    public bool $showForm = false;
    public ?ShortLink $shortlink = null;
    public $url;

    #[Url(except: '')]
    public $search = '';

    public function save()
    {
        $this->validate([
            'url' => 'required|url'
        ]);

        if ($this->shortlink) {
            $this->shortlink->update([
                'url' => $this->url
            ]);
            $this->shortlink = null;
            $this->showForm = false;
            return;
        }

        $createShortLink = new CreateShortLink();
        $createShortLink->execute($this->url, auth()->user()->id);
        $this->url = null;
    }

    public function edit(ShortLink $shortlink)
    {
        $this->shortlink = $shortlink;
        $this->url = $shortlink->url;
        $this->showForm = true;
        Cache::forget("shortlink.{$shortlink->code}");
    }

    public function resetForm()
    {
        $this->shortlink = null;
        $this->url = null;
        $this->showForm = false;
    }

    public function delete(ShortLink $shortlink)
    {
        $shortlink->delete();
        Cache::forget("shortlink.{$shortlink->code}");
    }

    public function render()
    {
        $shortlinks = ShortLink::ofUser(auth()->user())
            ->withCount('visits')
            ->when($this->search, function ($query, $search) {
                return $query->where('url', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return view('livewire.components.shortlink.user-shortlink-crud', compact('shortlinks'));
    }
}
