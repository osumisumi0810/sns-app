<x-app-layout>
    <a href="{{ route('posts.create') }}"
    class="fixed bottom-6 right-6 bg-blue-500 text-white w-14 h-14 rounded-full flex items-center justify-center shadow-lg text-3xl hover:bg-blue-600">
    ＋
    </a>

    <div class="py-6">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">

            {{-- 成功メッセージ（削除後に表示） --}}
            @if (session('success'))
                <div class="bg-green-500 text-white text-sm font-semibold px-4 py-2 rounded mb-4 shadow-md">
                    {{ session('success') }}
                </div>
            @endif

            @foreach ($posts as $post)
                <a href="{{ route('users.show', $post->user) }}" class="font-semibold text-gray-700 hover:text-gray-900">
                    {{ $post->user->name }}
                </a>
                
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

                    {{-- 編集ボタン（自分の投稿だけ表示） --}}
                    @if ($post->user_id === auth()->id())
                        <div class="text-right mt-2">
                            <a href="{{ route('posts.edit', $post) }}" class="text-blue-500 text-sm hover:text-blue-700">
                                編集
                            </a>
                        </div>
                    @endif


                    {{-- 削除ボタン（自分の投稿だけ表示） --}}
                    @if ($post->user_id === auth()->id())
                        <form action="{{ route('posts.destroy', $post) }}" method="POST" class="text-right mt-2">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-500 text-sm hover:text-red-700">
                                削除
                            </button>
                        </form>
                    @endif

                </div>
            @endforeach

        </div>
    </div>
</x-app-layout>