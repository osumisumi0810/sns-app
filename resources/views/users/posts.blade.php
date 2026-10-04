<x-app-layout>
    <div class="max-w-xl mx-auto mt-10">

        <h1 class="text-2xl font-bold mb-4">{{ $user->name }} の投稿一覧</h1>

        @foreach ($posts as $post)
            <div class="mb-4 p-4 bg-white rounded shadow">
                <p>{{ $post->body }}</p>
                <p class="text-sm text-gray-500 mt-2">
                    {{ $post->created_at->format('Y/m/d H:i') }}
                </p>
            </div>
        @endforeach

    </div>
</x-app-layout>
