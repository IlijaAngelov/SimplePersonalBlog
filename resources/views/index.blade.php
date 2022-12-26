@include('layouts.header')
    
@include('layouts.nav')

@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<div class="">
    @foreach ($articles as $article)
    <article>
        <ul class="h-56 grid grid-rows-3 gap-4 justify-items-start content-start p-5">
            <li>Id: {{ $article->id }}</li>
            <li><b>Title:</b> <a href="{{ route('article.show', $article) }}"> {{ $article->title }}</a></li>
            <li>Text:{{ $article->text }}</li>
            <li><img src="{{ asset('images/'.$article->image) }}" alt="{{ ($article->image) }}" title="article image" height="200px" width="200px"></li>
        </ul>
    </article>
    @endforeach
</div>

@include('layouts.footer')