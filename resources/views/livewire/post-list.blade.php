<div class=" px-3 lg:px-7 py-6">
    <div class="flex justify-between items-center border-b border-gray-100 dark:border-gray-100/5">
        <div class="text-gray-500 dark:text[#D7D3BF]">
            @if ($this->activeType || $search)
                <button class="text-gray-400 mr-3" wire:click="clearFilters()">X</button>
            @endif
            @if ($this->activeType)
                @php
                    $isActive = request('type') == $this->activeType->slug;
                @endphp
                <a wire:navigate href="{{ route('posts.index', ['type' => $this->activeType->slug]) }}"
                    class="{{ $isActive
                        ? 'bg-[#D4EBF8] text-black'
                        : 'bg-neutral-300
                         text-black' }}
    rounded-xl px-3 py-1 text-base">
                {{ $this->activeType->title }}</a>
            @endif
            @if ($search)
                Tìm kiếm {{ $search }}
            @endif
        </div>
        <div class="flex items-center space-x-4 font-light ">
            <button
                class="{{ $sort === 'desc' ? 'text-gray-900 dark:text-[#F0F0D7] border-b border-gray-700 dark:border-gray-400' : 'text-gray-500 dark:text-gray-400' }} py-4"
                wire:click="setSort('desc')">Mới nhất</button>
            <button
                class="{{ $sort === 'asc' ? 'text-gray-900 dark:text-[#F0F0D7] border-b border-gray-700 dark:border-gray-400' : 'text-gray-500 dark:text-gray-400' }} py-4 "
                wire:click="setSort('asc')">Cũ nhất</button>
        </div>
    </div>
    <div class="py-4">
        @foreach ($this->posts as $post)
            <x-posts.post-item wire:key="{{ $post->id }}" :post="$post" />
        @endforeach
    </div>
    <div class="my-3">
        {{ $this->posts->onEachSide(1)->links() }}
    </div>
</div>
