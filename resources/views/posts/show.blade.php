<x-app-layout>
    <article class="col-span-4 md:col-span-3 mt-10 mx-auto py-5 w-full" style="max-width:700px">
        <img class="w-full my-2 rounded-lg" src="{{ $post->getThumbnailImage() }}" alt="">
        <h1 class="text-4xl font-bold text-left text-gray-800 dark:text-[#b1b1ba]">
            {{ $post->title }}
        </h1>
        <div class="mt-2 flex-col justify-between items-center">
            <div class="flex py-5 text-base items-center">
                <x-posts.author :author="$post->author" />
            </div>
            <div class="flex items-center">
                <x-lucide-calendar-days class="text-gray-500 dark:text-[#909092] w-4 h-4 inline-block align-middle" />
                <span class="text-gray-500 dark:text-[#909092] text-sm mr-2 inline-block align-middle ml-1">
                    {{ \Carbon\Carbon::parse($post->published_at)->format('d-m-Y') }}</span>
                <x-lucide-pencil-line class="text-gray-500 dark:text-[#909092] w-4 h-4 inline-block align-middle" />
                <span class="text-gray-500 dark:text-[#909092] text-sm mr-3 inline-block align-middle ml-1">Khoảng
                    {{ $post->getWordCount() }} từ</span>
                <x-lucide-clock class="text-gray-500 w-4 h-4 dark:text-[#909092] inline-block align-middle" />
                <span class="text-gray-500 dark:text-[#909092] text-sm mr-3 inline-block align-middle ml-1">
                    {{ $post->getReadingTime() }} phút đọc</span>
            </div>
        </div>

        <div
            class="article-actions-bar my-6 flex text-sm items-center justify-between border-t border-gray-100 py-4 px-2">
        </div>

        <div class="article-content py-3 prose text-gray-800 dark:text-[#b1b1ba] text-lg text-justify">
            {!! $post->body !!}
        </div>

        <div class="flex items-center space-x-4 mt-10">
            @foreach ($post->types as $type)
                <x-posts.type-badge :type="$type" />
            @endforeach
        </div>
        <div>
            <script src="https://giscus.app/client.js"
            data-repo="thongle321/DevBlog"
            data-repo-id="R_kgDONwvcgw"
            data-category-id="DIC_kwDONwvcg84CnAyj"
            data-mapping="title"
            data-strict="0"
            data-reactions-enabled="1"
            data-emit-metadata="0"
            data-input-position="bottom"
            data-theme="dark"
            data-lang="vi"
            crossorigin="anonymous"
            async>
    </script>
        </div>
    </article>

</x-app-layout>
