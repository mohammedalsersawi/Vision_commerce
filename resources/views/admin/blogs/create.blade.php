@extends('admin.master')

@section('title', 'Add New Blog ')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.css"
        integrity="sha512-vEia6TQGr3FqC6h55/NdU3QSM5XR6HSl5fW71QTKrgeER98LIMGwymBVM867C1XHIkYD9nMTfWK2A0xcodKHNA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

@stop

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card mt-5">
                <div class="card-header ">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="m-0">Add New Blog</h3>
                        <a href={{ route('admin.blogs.index') }} class="btn btn-warning px-4">All Blogs</a>
                    </div>

                </div>
                <div class="card-body">
                    @include('admin.errors')


                    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data" >
                        @csrf

                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>

                        <div class="mb-3">
                            <label for="">Content</label>
                            <textarea id="my_content" name="content" class="form-control" placeholder="content" rows="5"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="">Image</label>
                            <input type="file" name="image" class="form-control">
                        </div>


                        <div class="mb-3">
                            <label for="">category</label>
                            <select name="category_id" class="form-control">
                                <option value="">--Select--</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button  class="btn btn-success px-5">ADD</button>

                    </form>

                </div>
            </div>

        </div>
    </div>


@stop

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js"
        integrity="sha512-hkvXFLlESjeYENO4CNi69z3A1puvONQV5Uh+G4TUDayZxSLyic5Kba9hhuiNLbHqdnKNMk2PxXKm0v7KDnWkYA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $("#my_content").emojioneArea();
        });
    </script>


@endsection
