@props(['post'])
<div>
    <a href="#">
        <div>
            <img class="w-full rounded-xl" src="{{ $post->getThumbnailImage() }}">
        </div>
    </a>
    <div class="mt-3">
        <div class="flex items-center mb-2 gap-2">
            @if ($type = $post->types()->first())
                <a wire:navigate href="{{ route('posts.index', ['type' => $type->title]) }}"
                    class="bg-red-600
        text-white
        rounded-xl px-3 py-1 text-base">
                    {{ $type->title }}</a>
            @endif
            <p class="text-white-500 dark:text-[#DFD3C3] text-sm">{{ $post->published_at }}</p>
        </div>
        <a class="text-xl font-bold tex-gray-900 dark:text-[#DFD3C3]">{{ $post->title }}</a>
    </div>
</div>
