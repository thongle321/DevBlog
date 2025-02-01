<div class=" px-3 lg:px-7 py-6">
    <div class="flex justify-between items-center border-b border-gray-100">
        <div class="text-gray-500 dark:text[#D7D3BF]">
            @if ($search)
                    Searching {{ $search }}
            @endif
        </div>
        <div class="flex items-center space-x-4 font-light ">
            <button class="{{ $sort === 'desc' ? 'text-gray-900 dark:text-[#DFD3C3] border-b border-gray-700' : 'text-gray-500 dark:text[#D7D3BF]' }} py-4"
                wire:click="setSort('desc')">Mới nhất</button>
            <button class="{{ $sort === 'asc' ? 'text-gray-900 dark:text-[#DFD3C3] border-b border-gray-700' : 'text-gray-500 dark:text[#D7D3BF]' }} py-4 "
                wire:click="setSort('asc')">Cũ nhất</button>
        </div>
    </div>
    <div class="py-4">
        @foreach ($this->posts as $post)
        <x-posts.post-item :post="$post"/>
        @endforeach
    </div>
    <div class="my-3">
        {{ $this->posts->onEachSide(1)->links() }}
    </div>
</div>