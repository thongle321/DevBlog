<x-app-layout title="Trang chủ">
    @section('welcome')
        <div class="w-full text-center py-32">
            <h1 class="text-2xl md:text-3xl font-bold text-center lg:text-5xl text-gray-700 dark:text-[#D7D3BF]">
                Chào mừng tới <span class="text-yellow-500">&lt;Levisa&gt;</span> <span
                    class="text-gray-900 dark:text-[#D7D3BF]">
                    Blog</span>
            </h1>
            <a class="px-3 py-2 text-lg text-white dark:text-[#D7D3BF] bg-gray-800 dark:bg-[#4A4947] rounded mt-5 inline-block"
                href="http://127.0.0.1:8000/blog">Bắt đầu đọc
            </a>
        </div>
    @endsection
    <div class="mb-10 mx-40 w-full">
        <div class="mb-16">
            <h2 class="mt-16 mb-5 text-2xl text-gray-900 dark:text-yellow-500 font-bold">Bài viết nổi bật</h2>
            <div class="w-full">
                <div class="grid grid-cols-2 gap-10 w-full">
                    @foreach ($featuredPosts as $post)
                        <div class="md:col-span-1 col-span-3">
                            <x-posts.post-card :post="$post" />
                        </div>
                    @endforeach
                </div>
            </div>
            <a class="mt-10 block text-center text-lg text-gray-900 dark:text-yellow-500 font-semibold"
                href="http://127.0.0.1:8000/blog">Xem
                thêm</a>
        </div>
        <hr>

        <h2 class="mt-16 mb-5 text-2xl text-gray-900 dark:text-yellow-500 font-bold">Bài viết mới</h2>
        <div class="w-full mb-5">
            <div class="grid grid-cols-2 gap-10 w-full">
                @foreach ($latestPosts as $post)
                    <div class="md:col-span-1 col-span-3">
                        <x-posts.post-card :post="$post" />
                    </div>
                @endforeach
            </div>
        </div>
        <a class="mt-10 block text-center text-lg text-gray-900 dark:text-yellow-500 font-semibold"
            href="http://127.0.0.1:8000/blog">Xem
            thêm</a>
    </div>
</x-app-layout>
