<x-app-layout>
    <div class="max-w-xl mx-auto mt-10">
        <h1 class="text-2xl font-bold mb-4">投稿を編集</h1>

        <form action="{{ route('posts.update', $post) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 font-semibold">本文</label>
                <textarea name="body" class="w-full border rounded p-2" rows="4">{{ old('body', $post->body) }}</textarea>

                @error('body')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold">画像（任意）</label>
                <input type="file" name="image">
            </div>

            <button class="bg-gray-800 hover:bg-gray-900 text-white font-semibold px-5 py-2 rounded shadow">
                更新
            </button>
        </form>
    </div>
</x-app-layout>
