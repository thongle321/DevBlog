<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Type;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    use WithPagination;

    #[Url]
    public $sort = 'desc';

    #[Url]
    public $search = '';

    #[Url]
    public $type = '';

    public function setSort($sort)
    {
        $this->sort = $sort === 'desc' ? 'desc' : 'asc';
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->search = '';
        $this->type = '';
        $this->resetPage();
    }

    #[On('search')]
    public function updatedSearch($search)
    {
        $this->search = $search;
        $this->resetPage();
    }

    #[Computed]
    public function posts()
    {
        return Post::published()
            ->with('author', 'types')
            ->orderBy('published_at', $this->sort)
            ->when($this->activeType, function ($query) {
                $query->withType($this->type);
            })
            ->where('title', 'like', "%{$this->search}%")
            ->paginate(3);
    }

    #[Computed]
    public function activeType()
    {
        if ($this->type === null || $this->type === '') {
            return null;
        }
        return Type::where('slug', $this->type)->first();
    }

    public function render()
    {
        return view('livewire.post-list');
    }
}
