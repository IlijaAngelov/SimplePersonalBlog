@include('layouts.header')

@include('layouts.nav')

<div class="flex justify-center items-center pt-5">
    <table class="table-auto border border-collapse border-spacing-2 border-slate-500">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody class="">
        @foreach ($tags as $tag)
            <tr>
                <td>{{ $tag->id }}</td>
                <td>{{ $tag->name }}</td>
                <td><a href="{{ route('tag.edit', $tag) }}"
                       class="px-6 py-3 font-semibold text-white no-underline bg-blue-500 rounded hover:bg-blue-600 hover:underline ">Edit</a>
                </td>
                <td>
                    <form method="POST" action={{ route('tag.destroy', $tag) }}>
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')"
                                class="h-10 px-6 font-semibold rounded bg-black text-white hover:bg-slate-800 hover:underline">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@include('layouts.footer')
