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
            <li><a href="{{ route('article.edit', $article) }}" class="px-6 py-3 font-semibold text-white no-underline bg-blue-500 rounded hover:bg-blue-600 hover:underline ">Edit</a></li>
            <form method="POST" action={{ route('article.destroy', $article) }}>
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure?')" class="h-10 px-6 font-semibold rounded bg-black text-white hover:bg-slate-800 hover:underline">Delete</button>
            </form>
        </ul>
    </article>
    
</body>

@include('layouts.footer')
