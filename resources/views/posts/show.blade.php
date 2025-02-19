<x-app-layout :title="$post->title">
    <article class="col-span-4 md:col-span-3 mt-2 mx-auto py-5 w-full" style="max-width:800px;">
        <img class="w-full my-2 rounded-lg" src="{{ $post->getThumbnailImage() }}" alt="">
        <div class="border-[1px] border-solid shadow-md dark:border-none dark:shadow-none dark:bg-[#4C585B] dark:bg-opacity-5 rounded-lg px-4">
            <h1 class="text-4xl font-bold text-left text-gray-800 dark:text-[#b1b1ba]">
                {{ $post->title }}
            </h1>
            <div class="mt-2 flex-col justify-between items-center ">
                <div class="flex py-5 text-base items-center">
                    <x-posts.author :author="$post->author" />
                </div>
                <div class="flex items-center">
                    <x-lucide-calendar-days
                        class="text-gray-500 dark:text-[#909092] w-4 h-4 inline-block align-middle" />
                    <span class="text-gray-500 dark:text-[#909092] text-sm mr-2 inline-block align-middle ml-1">
                        {{ $post->published_at->format('d-m-Y') }}</span>
                    <x-lucide-calendar-check
                        class="text-gray-500 dark:text-[#909092] w-4 h-4 inline-block align-middle" />
                    <span class="text-gray-500 dark:text-[#909092] text-sm mr-2 inline-block align-middle ml-1">
                        {{ $post->updated_at->format('d-m-Y') }}
                    </span>
                    <x-lucide-pencil-line class="text-gray-500 dark:text-[#909092] w-4 h-4 inline-block align-middle" />
                    <span class="text-gray-500 dark:text-[#909092] text-sm mr-3 inline-block align-middle ml-1">Khoảng
                        {{ $post->getWordCount() }} từ</span>
                    <x-lucide-clock class="text-gray-500 w-4 h-4 dark:text-[#909092] inline-block align-middle" />
                    <span class="text-gray-500 dark:text-[#909092] text-sm mr-3 inline-block align-middle ml-1">
                        {{ $post->getReadingTime() }} phút đọc</span>
                </div>
            </div>

            <div
                class="article-actions-bar my-5 flex text-sm items-center justify-between border-t border-gray-100 px-2">
            </div>

            <article
                class="article-content prose-lg prose-code:font-bold prose-code:text-red-500 dark:prose-lg prose-a:text-[#60a5fa] dark:text-[#b1b1ba] dark:prose-code:font-bold dark:prose-code:text-[#79858b] dark:prose-headings:font-semibold dark:prose-headings:text-[#b1b1ba] text-justify">

                <x-markdown>
                    {!! $post->body !!}
                    
                </x-markdown>
            </article>

            <div class="flex items-center space-x-4 mt-10 pb-4">
                @foreach ($post->types as $type)
                    <x-posts.type-badge :type="$type" />
                @endforeach
            </div>
        </div>
        <div class="py-2">
            <script src="https://giscus.app/client.js" data-repo="thongle321/DevBlog" data-repo-id="R_kgDONwvcgw"
                data-category="Comments" data-category-id="DIC_kwDONwvcg84CnEEi" data-mapping="title" data-strict="0"
                data-reactions-enabled="1" data-emit-metadata="0" data-input-position="bottom" data-theme="catppuccin_frappe"
                data-lang="vi" crossorigin="anonymous" async></script>
        </div>
    </article>

</x-app-layout>
z1
