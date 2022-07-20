@extends('admin.master')

@section('title', 'Edit Blog ')
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
                        <h3 class="m-0">Edit Blog <span class="text-danger">{{ $blog->name }}</span></h3>
                        <a href={{ route('admin.blogs.index') }} class="btn btn-warning px-4">All Bogs</a>
                    </div>

                </div>
                <div class="card-body">
                    @include('admin.errors')




                    <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name"
                                value="{{ $blog->name }}">
                        </div>

                        <div class="mb-3">
                            <label for="">Content</label>
                            <textarea id="my_content" name="content" rows="3" class="form-control" placeholder="Content">{{ $blog->content }}</textarea>
                        </div>


                        <div class="mb-3">
                            <label for="">Image</label>
                            <input type="file" class="form-control" name="image">
                            <img width="120" src="{{ asset('uploads/blogimage/'.$blog->image) }}" alt="">

                        </div>

                        <div class="mb-3">
                            <label for="">category</label>
                            <select name="category_id" class="form-control">
                                <option value="">--Select--</option>
                                @foreach ($categories as $item)
                                    <option {{ $blog->category_id == $item->id ? 'selected' : '' }}
                                        value="{{ $item->id }}"> {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button class="btn btn-info px-5">update</button>

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
