



<table class="table table-bordered table-striped table-hover my-4">
    <tr class="bg-dark">
        <th>ID</th>
        <th>Name</th>
        <th>Parent</th>
        <th>Actions</th>
    </tr>
    @if ($categories->count() > 0)

        @foreach ($categories as $category)
            <tr>
                <th>{{ $category->id }}</th>
                <th>{{ $category->name }}</th>
                <th>{{ $category->parent->name }}</th>
                <th>
                     {{-- @if (Auth::user()->hasAbility('edit_category')) --}}
                    <a href="{{ route('admin.categories.edit', $category->id) }}"
                        class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                    {{-- @endif --}}

                    {{-- @if (Auth::user()->hasAbility('delete_category')) --}}

                    <form action="{{ route('admin.categories.destroy', $category->id) }}"
                        method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <button onclick="return confirm('Are You sure?!')"
                            class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i </button>
                    </form>
                    {{-- @endif --}}

                </th>
        @endforeach
    @else
        <tr>
            <td colspan="4" align="center">No Categories Found </td>
        </tr>

    @endif

</table>
<div class="d-flex justify-content-center">

    {{ $categories->links() }}

</div>






