@props(['post'])
            
<article class="mb-8 bg-white shadow-lg rounded-lg overflow-hidden">
    @if ($post->image)    
       <img class="w-full h-72 object-cover object-center" src="{{ $post->image->url }}" alt="">
    @else
        <img class="w-full h-72 object-cover object-center" src="https://cdn.pixabay.com/photo/2021/09/22/08/35/architecture-6646154_960_720.jpg" alt="">
    @endif

    <div class="px-6 py-4">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{ route('posts.show', $post) }}">
                {{ $post->name }}
            </a>
        </h1>

        <div class="text-gray-700 text-base">
            {!! $post->extract !!}
        </div>

        <div class="px-6 p-4 pb-2">
            @foreach ($post->tags as $tag)
                <a class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm text-gray-700 mr-2" href="{{ route('posts.tag', $tag) }}">
                    {{ $tag->name }}
                </a>
            @endforeach
        </div>
    </div>
</article>