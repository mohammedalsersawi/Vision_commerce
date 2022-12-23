@extends('admin.master')

@section('title', 'All Blogs')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card mt-5">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="m-0">All Blogs</h3>
                        <a href="{{ route('admin.blogs.create') }}" class="btn btn-dark px-4">Add New Blog</a>
                    </div>
                </div>
                <div class="card-body">

                    @if (session('msg'))
                        <div class="alert alert-{{ session('type') }}">
                            {{ session('msg') }}
                        </div>
                    @endif

                    <form action="{{ route('admin.blogs.index') }}" method="get">
                        <div class="row">
                            <div class="col-10">
                                <input type="text" placeholder="Search.." name="search" class="form-control" value="{{ request()->search }}">
                            </div>
                            <div class="col-2">
                                <button class="btn btn-info btn-block">Search</button>
                            </div>
                        </div>
                    </form>

                    <table class="table table-bordered table-striped table-hover my-4">
                        <tr class="bg-dark">
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                        @if ($blogs->count() > 0)
                            @foreach ($blogs as $blog)
                                <tr>
                                    <th>{{ $blog->id }}</th>
                                    <th>{{ $blog->name }}</th>
                                    <th>{{ $blog->category->{'name_'.app()->currentLocale()} }}</th>
                                    <th>
                                        <a href="{{ route('admin.blogs.edit', $blog->id) }}"
                                            class="btn btn-primary btn-sm"><i class="fas fa-edit"></i></a>

                                        {{-- <a href="{{ route('admin.blogs.destroy', $blog->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a> --}}

                                        <form class="d-inline"
                                            action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button onclick="return confirm('Are you sure?!')"
                                                class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                        </form>

                                    </th>
                                </tr>
                            @endforeach
                        @else
                        <tr>
                            <td colspan="4" align="center">No Blogs Found</td>
                        </tr>
                        @endif

                    </table>

                    <div class="d-flex justify-content-center">
                        {{ $blogs->links() }}
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

@stop
