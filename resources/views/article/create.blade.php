@include('layouts.header')

@include('layouts.nav')

<body>
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
    <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col justify-center items-center pt-5">
        @csrf
        <div class="items-center mb-6 w-1/2">
            <div>
                <label class="form-label inline-block text-gray-500 font-bold text-right mb-1 pr-4" for="title">
                    Article Title
                </label>
            </div>
            <div>
                <input
                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                    id="title" type="text" name="title" placeholder="Your Title" value="{{ old('title') }}">
            </div>
        </div>


        <div class="justify-center items-center w-1/2">
            <div class="mb-3 w-auto">
                <label class="form-label inline-block text-gray-500 font-bold text-right mb-1 pr-4" for="text">
                    Article Body
                </label>
                <textarea class="form-control block w-full px-3 py-1.5 text-base font-normal text-gray-700 bg-white bg-clip-padding
                  border border-solid border-gray-300 rounded transition ease-in-out m-0
                  focus:text-gray-700 focus:bg-white focus:border-purple-500 focus:outline-none" 
                  id="text" name="text" rows="3" placeholder="Your message"
                    value="{{ old('text') }}"></textarea>
            </div>
        </div>

        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="image">Upload file</label>
        <input class="block text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="image" name="image" type="file">

        <div class="items-center pt-3">
            <div>
                <button
                    class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-black font-bold py-2 px-4 rounded"
                    type="submit">
                    Submit
                </button>
            </div>
        </div>
    </form>
</body>

@include('layouts.footer')
