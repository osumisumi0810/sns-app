<x-app-layout>
    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">

            @foreach ($posts as $post)
                <div class="bg-white rounded-lg shadow-md p-4 mb-6">
                    {{-- ユーザー名 --}}
                    <div class="text-sm text-gray-600 font-semibold mb-2">
                        {{ $post->user->name }}
                    </div>

                    {{-- 本文 --}}
                    <div class="text-gray-800 mb-3 whitespace-pre-line">
                        {{ $post->body }}
                    </div>

                    {{-- 画像 --}}
                    @if ($post->image_path)
                    <div class="mb-3 text-center">
                        <img src="{{ asset('storage/' . str_replace('\\', '/', $post->image_path)) }}"
                        alt="投稿画像"
                        class="rounded-lg max-w-md h-auto object-cover border border-gray-200 inline-block">
                    </div>
                    @endif

                    {{-- 投稿日 --}}
                    <div class="text-xs text-gray-500 text-right">
                        投稿日：{{ $post->created_at->format('Y/m/d H:i') }}
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</x-app-layout>
