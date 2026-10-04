<x-app-layout>
    <div class="max-w-xl mx-auto mt-10">

        <h1 class="text-2xl font-bold mb-4">{{ $user->name }} のプロフィール</h1>

        {{-- アイコン（まだ設定前なので仮） --}}
        <div class="mb-4 text-center">
            @if ($user->profile_image)
                <img src="{{ asset('storage/' . $user->profile_image) }}"
                    class="w-24 h-24 rounded-full object-cover mx-auto">
            @else
                <div class="w-24 h-24 bg-gray-300 rounded-full mx-auto"></div>
            @endif
        </div>


        <form action="{{ route('users.update_image', $user) }}" method="POST" enctype="multipart/form-data" class="mt-6">
        @csrf
        <input type="file" name="profile_image" class="mb-4">

        <button class="bg-blue-500 text-white px-4 py-2 rounded">
            アイコンを更新
        </button>
        </form>

        <a href="{{ route('users.edit', $user) }}"
        class="bg-gray-200 text-gray-700 px-4 py-2 rounded hover:bg-gray-300 mt-4 inline-block">
            プロフィールを編集
        </a>



        {{-- 自己紹介 --}}
        @if ($user->bio)
            <p class="text-gray-700 mt-4 whitespace-pre-line">{{ $user->bio }}</p>
        @endif


        {{-- 自分の投稿一覧へのリンク（Myページ） --}}
        <div class="text-center">
            <a href="{{ route('users.posts', $user) }}"
               class="text-blue-500 hover:text-blue-700 font-semibold">
                このユーザーの投稿を見る
            </a>
        </div>

    </div>
</x-app-layout>
