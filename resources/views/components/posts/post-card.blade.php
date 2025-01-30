@props(['post'])
<div>
    <a href="#">
        <div>
            <img class="w-full rounded-xl" src="https://placehold.co/600x400/png">
        </div>
    </a>
    <div class="mt-3">
        <div class="flex items-center mb-2">
            <a href="#"
                class="bg-red-600
                text-gray-900 dark:text-[#DFD3C3]
                font-bold
                rounded-xl px-3 py-1 text-sm mr-3">
                Laravel
            </a>
            <p class="text-white-500 text-sm">{{ $post->pulished_at }}</p>
        </div>
        <a class="text-xl font-bold tex-gray-900 dark:text-[#DFD3C3]">{{ $post->title }}</a>
    </div>
</div>
