@include('layouts.header')
    
@include('layouts.nav')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="grid grid-cols-3 m-2 p-5 items-center h-56 text-center">
    @foreach ($articles as $article)
        <div class="flex justify-center w-auto m-2 border rounded-lg p-2">
            <ul class="">
                <li class="text-2xl font-black leading-5 hover:underline p-2"><a href="{{ route('article.show', $article) }}"><h1>{{ $article->title }}</h1></a></li>
                <li class="text-lg p-2">{{ $article->text }}</li>
                <li><img src="{{ asset('images/'.$article->image) }}" alt="{{ ($article->image) }}" title="article image" height="250px" width="250px"></li>
            </ul>
        </div>
    @endforeach
</div>

@include('layouts.footer')