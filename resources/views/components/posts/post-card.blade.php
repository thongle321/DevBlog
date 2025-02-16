@props(['post'])
<div>
    <a href="{{ route('posts.show', $post->slug) }}">
        <div>
            <img class="w-full rounded-xl" src="{{ $post->getThumbnailImage() }}">
        </div>
    </a>
    <div class="mt-3">
        <div class="flex items-center mb-2 gap-2">
            @if ($type = $post->types()->first())
                <x-posts.type-badge :type="$type" />
            @endif
            <p class="text-white-500 dark:text-[#DFD3C3] text-sm">{{ $post->published_at }}</p>
        </div>
        <a href="{{ route('posts.show', $post->slug) }}"
            class="text-xl font-bold tex-gray-900 dark:text-[#DFD3C3]">{{ $post->title }}</a>
    </div>
</div>
