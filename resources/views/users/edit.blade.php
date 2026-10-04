<x-app-layout>
    <div class="max-w-xl mx-auto mt-10">

        <h1 class="text-2xl font-bold mb-6">プロフィール編集</h1>

        <form action="{{ route('users.update', $user) }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1">名前</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                    class="w-full border rounded p-2">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1">自己紹介</label>
                <textarea name="bio" class="w-full border rounded p-2" rows="4">{{ old('bio', $user->bio) }}</textarea>
            </div>

            <button class="bg-blue-500 text-white px-4 py-2 rounded">
                更新する
            </button>
        </form>

    </div>
</x-app-layout>
