<x-app-layout>
    <div class="max-w-xl mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-4">新規投稿</h1>

        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label class="block mb-1 font-semibold">本文</label>
                <textarea name="body" class="w-full border rounded p-2" rows="4"></textarea>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">画像（任意）</label>
                <input type="file" name="image">
            </div>

            <button type="submit"class="bg-gray-800 hover:bg-gray-900 text-white font-semibold px-5 py-2 rounded shadow">
                投稿
            </button>


        </form>
    </div>
</x-app-layout>
