@extends('admin.master')

@section('title', 'All Blogs')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card mt-5">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="m-0">All Blogs</h3>
                        <a href={{ route('admin.blogs.create') }} class="btn btn-dark px-4" data-toggle="modal"
                            data-target="#exampleModal">Add New Blog</a>
        {{-- modal to add blog --}}
                        <div class="modal fade" id="exampleModal" tabindex="" aria-labelledby="exampleModalLabel"
                            aria-hidden="">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Change Role</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="" method="POST" enctype="multipart/form-data" id="comment_form">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <input type="text" placeholder="Your name" name="name" id="name"
                                                    class="form-control @error('name') is-invalid @enderror">

                                                @error('name')
                                                    <small class="invalid-feedback">{{ $message }}</small>
                                                @enderror
                                            </div>


                                            <div class="mb-3">
                                                <textarea placeholder="Your content" name="content" id="content"
                                                    class="form-control @error('content') is-invalid @enderror"></textarea>
                                                @error('content')
                                                    <small class="invalid-feedback">{{ $message }}</small>
                                                @enderror


                                            </div>

                                            <div class="mb-3">
                                                <label for="">Image</label>
                                                <input type="file" name="image" id="image"
                                                    class="form-control @error('category_id') is-invalid @enderror">
                                                @error('image')
                                                    <small class="invalid-feedback">{{ $message }}</small>
                                                @enderror
                                            </div>


                                            <div class="mb-3">
                                                <label for="">category</label>
                                                <select name="category_id" id='category_id'
                                                    class="form-control @error('category_id') is-invalid @enderror">
                                                    <option value="">--Select--</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->name }}

                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('category_id')
                                                    <small class="invalid-feedback">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" id="add_blog" class=" btn btn-primary">Save
                                                    changes</button>
                                            </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        {{-- End model to add blog --}}

                    </div>
                </div>
                <div class="card-body">
                    @include('admin.blogs.table', ['blogs' => $blogs])

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
    <script>
        $('body').on('click', '#add_blog', function(e) {
            e.preventDefault();

            // var Name = $('#comment_form input["name"]').val();
            // var Content = $('#comment_form input["content"]').val();
            // var Image = $('#comment_form input["image"]').val();
            // var Category = $('#comment_form input["category_id"]').val();
            var Name = $('#name').val();
            var Content = $('#content').val();
            var Image = $('#image').val();
            var Category = $('#category_id').val();
            $.ajax({
                type: 'post',
                enctype: "multipart/form-data",
                url: '{{ route('admin.blogs.store') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    name: Name,
                    content: Content,
                    image: Image,
                    category_id: Category,
                },
                success: function(res) {
                    $('.card-body').html(res);
                    $('#exampleModal').modal('hide')
                    $().alert(4)

                },

            });



        });
    </script>




@endsection
