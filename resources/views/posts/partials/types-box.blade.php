<div>
    <h3 class="text-lg font-semibold text-gray-900 mb-3 dark:text-yellow-500">Recommended Topics</h3>
    <div class="topics flex flex-wrap justify-start gap-2">
        @foreach ($types as $type)
            @php
                $isActive = request('type') == $type->title;
            @endphp
            <a wire:navigate href="{{ route('posts.index', ['type' => $type->title]) }}"
                class="{{ $isActive
                    ? 'bg-[#D4EBF8] text-black'
                    : 'bg-neutral-300
                        text-black' }}
        rounded-xl px-3 py-1 text-base">
                {{ $type->title }}</a>
        @endforeach
    </div>
</div>
