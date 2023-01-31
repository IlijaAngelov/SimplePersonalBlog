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
<form action="{{ route('tag.update', $tag) }}" method="POST" enctype="multipart/form-data" class="flex flex-col justify-center items-center pt-5">
    @csrf
    @method('PATCH')
    <div class="md:flex md:items-center mb-6">
        <div class="md:w-1/3">
            <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="name">
                Tag Name
            </label>
        </div>
        <div class="md:w-2/3">
            <input
                class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                id="name" type="text" name="name" value="{{ $tag->name }}">
        </div>
    </div>

    <div class="md:flex md:items-center pt-3">
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
</body>

@include('layouts.footer')
