@extends('admin.master')

@section('title', 'All Categories')

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card mt-5">
                <div class="card-header ">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="m-0">All Categories</h3>
                        <a href={{ route('admin.categories.create') }} class="btn btn-dark px-4">Add New Category</a>
                    </div>

                </div>
                <div class="card-body">
                    @if (session('msg'))
                        <div class="alert alert-{{ session('type') }}">
                            {{ session('msg') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.categories.index') }}" method="GET">

                        <div class="row">
                            <div class="col-10">
                                <input class="form-control btn-block" type="text" placeholder="Search.." name="search"
                                    value="{{ request()->search }}">
                            </div>
                            <div class="col-2">
                                <button class="btn btn-info">Search</button>
                            </div>
                        </div>
                    </form>


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
                                        @if (Auth::user()->hasAbility('edit_category'))
                                        <a href="{{ route('admin.categories.edit', $category->id) }}"
                                            class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                                        @endif

                                        {{-- <a href="#" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> --}}
                                        @if (Auth::user()->hasAbility('delete_category'))

                                        <form action="{{ route('admin.categories.destroy', $category->id) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Are You sure?!')"
                                                class="btn btn-danger btn-sm">
                                                <i class="fas fa-trash"></i </button>
                                        </form>
                                        @endif

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
                </div>
            </div>

        </div>
    </div>


@stop


@section('scripts')
    <script>
        $(".alert").fadeTo(2000, 500).slideUp(500, function() {
            $(".alert").slideUp(500);
        });
    </script>

@endsection
