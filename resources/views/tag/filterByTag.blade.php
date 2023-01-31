@include('layouts.header')

@include('layouts.nav')
<div class="grid m-2 p-5 items-center h-56 text-center">
    @foreach ($articles as $article)
        <div class="flex justify-center h-56 min-h-full w-auto m-2 border rounded-lg p-2">
            <ul class="">
                <li class="text-2xl font-black leading-5 hover:underline p-2"><a href="{{ route('article.show', $article) }}"><h1>{{ $article->title }}</h1></a></li>
                <li class="text-2xl font-black leading-5 hover:underline p-2"><a href="#"><h1>By Author: {{ $article->author->name }}</h1></a></li>
                @foreach($article->tags as $tag)
                    <p class="inline-flex text font-black p-2 bg-blue-500 hover:bg-blue-300 border rounded-md"><a href="{{ route('tags', $tag->name) }}">{{ $tag->name }}</a></p>
                @endforeach
                <li class="text-lg font-black leading-5 hover:underline p-2"><a href="{{ route('categories', $article->category->name) }}">{{ $article->category->name }}</a></li>
                <li class="text-lg p-2">{{ $article->body }}</li>
                <li><img src="{{ asset('images/'.$article->image) }}" alt="{{ ($article->image) }}" title="article image" height="250px" width="250px"></li>
            </ul>
        </div>
    @endforeach
</div>

@include('layouts.footer')
