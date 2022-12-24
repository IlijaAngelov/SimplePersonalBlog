@include('layouts.header')

@include('layouts.nav')

<body>
    <h1>This is the = <b>{{ $article->title }}</b> Article </h1>
    <article>
        <ul class="h-56 grid grid-rows-3 gap-4 justify-items-start content-start p-5">
            <li>Id: {{ $article->id }}</li>
            <li>Title: {{ $article->title }}</li>
            <li>Text: {{ $article->text }}</li>
            <li>Image: {{ $article->image_path }}</li>
            <li><a href="{{ route('article.edit', $article) }}" class="button">Edit</a></li>
            <form action="POST" action={{ route('article.destroy', $article) }}>
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure?')" class="h-10 px-6 font-semibold rounded-md bg-black text-white">Delete</button>
            </form>
        </ul>
    </article>
    
</body>

@include('layouts.footer')
