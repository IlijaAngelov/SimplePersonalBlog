@include('layouts.header')

@include('layouts.nav')

@if($errors->any())
<div class="bg-red-500">
    Something went wrong...
</div>
<ul>
    @foreach ($errors->all() as $error)
    <li>
        {{ $error }}
    </li>
    @endforeach
</ul>
@endif

<form action="{{ route('article.update', $article) }}" method="POST" enctype="multipart/form-data"
    class="w-full max-w-sm">
    @csrf
    @method('PATCH')
    <div class="md:flex md:items-center mb-6">
        <div class="md:w-1/3">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                Article Title
            </label>
        </div>
        <div class="md:w-2/3">
            <input
                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                id="title" type="text" name="title" value="{{ $article->title }}">
        </div>
    </div>


    <div class="flex justify-center">
        <div class="mb-3 xl:w-96">
            <label for="text" class="form-label inline-block mb-2 text-gray-700">Article
                textarea</label>
            <textarea class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded
              transition ease-in-out m-0 focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none"
                id="text" name="text" rows="3">
              {{ $article->text }}
            </textarea>
        </div>
    </div>

    @if ($article->image != null)
        <img src="{{ asset('images/' . $article->image) }}" alt="article_image" height="200px" width="200px">
    @else
        <p>There is no image for this article. Please insert one.</p>
    @endif

    <label class="block mb-2 pt-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Change the Image</label>
    <input
        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
        id="image" name="image" type="file">

    <div class="md:flex md:items-center">
        <div class="md:w-1/3"></div>
        <div class="md:w-2/3">
            <button
                class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-black font-bold py-2 px-4 rounded"
                type="submit">
                Submit
            </button>
        </div>
    </div>
</form>

@include('layouts.footer')
