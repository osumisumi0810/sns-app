<x-app-layout>
    <div class="max-w-xl mx-auto mt-10">

        <h1 class="text-2xl font-bold mb-4">{{ $user->name }} のプロフィール</h1>

        {{-- アイコン（まだ設定前なので仮） --}}
        <div class="mb-4">
            <div class="w-24 h-24 bg-gray-300 rounded-full mx-auto"></div>
        </div>

        {{-- 自己紹介（まだ未実装） --}}
        <p class="text-gray-700 text-center mb-6">
            自己紹介はまだ設定されていません。
        </p>

        {{-- 自分の投稿一覧へのリンク（Myページ） --}}
        <div class="text-center">
            <a href="{{ route('users.posts', $user) }}"
               class="text-blue-500 hover:text-blue-700 font-semibold">
                このユーザーの投稿を見る
            </a>
        </div>

    </div>
</x-app-layout>
