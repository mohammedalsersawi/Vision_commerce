@extends('admin.master')

@section('title', 'All Categories')

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card mt-5">
                <div class="card-header ">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="m-0">All Categories</h3>
                        <a href={{ route('admin.categories.create') }} class="btn btn-dark px-4" data-toggle="modal"
                            data-target="#exampleModal">Add New Category</a>
                    </div>

                    {{-- modal to add blog --}}
                    {{-- <div class="modal fade" id="exampleModal" tabindex="" aria-labelledby="exampleModalLabel"
                        aria-hidden="">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Change Role</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="" method="POST" enctype="multipart/form-data" id="add_employee_form">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <input type="text" placeholder="Your name" name="name" id="name"
                                                class="form-control  @error('name') is-invalid @enderror">
                                            @error('name')
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
                                            <label for="">Parent</label>
                                            <select name="category_id" id='category_id'
                                                class="form-control @error('category_id') is-invalid @enderror">
                                                <option value="">--Select--</option>
                                                @foreach ($AddParent as $category)
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
                                            <button type="submit" id="add_employee_btn" class=" btn btn-primary">Save
                                                changes</button>
                                        </div>
                                </form>
                            </div>
                        </div>

                    </div> --}}

                    @include('admin.Categories.model')
                    {{-- End model to add blog --}}


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


                <div class="card-body">
                    @include('admin.Categories.table')

                </div>

            </div>
        </div>

    </div>
    </div>


@stop


@section('scripts')

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $("#form_add_category").submit(function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            $("#add_category").text('Adding....');
            $('.text-danger').text('');

            $.ajax({
                url: '{{ route('admin.categories.store') }}',
                method: 'post',
                data: fd,
                contentType: false,
                processData: false,
                success: function(res) {
                        swal.fire(
                            'Added',
                            'Employee Added success',
                            'success'
                        )
                    $("#add_category").text('Add Employee');
                    $("#form_add_category")[0].reset();
                    $("#exampleModal").modal('hide');
                    $('.card-body').html(res);

                },
                error: function(reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    });


                }
            });
        });
    </script>


@endsection
