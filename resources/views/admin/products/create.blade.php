@extends('admin.master')

@section('title', 'Add New Product ')

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card mt-5">
                <div class="card-header ">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="m-0">Add New Product</h3>
                        <a href={{ route('admin.products.index') }} class="btn btn-warning px-4">All Product</a>
                    </div>

                </div>
                <div class="card-body">
                    @include('admin.errors')




                    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="mb-3 col-md-12">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Name">
                            </div>

                            <div class="mb-3 col-md-12">
                                <label for="">Content</label>
                                <textarea id="mytextarea" name="content" rows="3" class="form-control" placeholder="Content"></textarea>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="">Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="">Album</label>
                                <input type="file" multiple class="form-control" name="album[ ]">
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="">Price</label>
                                <input type="number" step="any" name="price" class="form-control"
                                    placeholder="Price">
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="">Quantity</label>
                                <input type="number" name="quantity" class="form-control" placeholder="Quantity">
                            </div>


                            <div class="mb-3 col-md-6">
                                <label for="">Discount</label>
                                <input type="number" name="discount" placeholder="discount" class="form-control">
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="">Parent</label>
                                <select name="category_id" class="form-control">
                                    <option value="">--Select--</option>
                                    @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        <div class="col-md-12">
                            <div class="card">
                                    <div class="card-header bg-dark">
                                      <h4 class="m-0">Features</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="text-right mb-2">
                                            <button class="add_row btn btn-sm btn-dark">Add Row</button>
                                        </div>
                                        <div class="row_data">
                                            <div class="row mb-3">
                                                <div class="col-md-11">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <input type="text" name="fname[]" class="form-control"
                                                                placeholder="name" required>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <input type="text" name="fvalue[]" class="form-control"
                                                                placeholder="value" required>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="text" name="ftype[]" class="form-control"
                                                                placeholder="type" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-1">
                                                    <button class="btn btn-danger w-100 remove_row"><i class="fas fa-times"></i></button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-success px-5">Add</button>
                        </form>
                </div>
            </div>

        </div>
    </div>


@stop

@section('scripts')
    {{-- <script src="https://cdn.tiny.colud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}
    <script src="https://cdnjs.coludflare.com/ajax/libs/tinymce/5.10.2/tinymce.min.js"
        integrity="sha512-MbhLUiUv8Qel+cWFyUG0fMC8/g9r+GULWRZ0axljv3hJhU6/0B3NoL6xvnJPTYZzNqCQU3+TzRVxhkE531CLKg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script>
            tinymce.init({
                selector: '#mytextarea'
            });
        </script>
     <script>
        tinymce.init({
            selector: '#mytextarea'
        });
    </script>

<script>

        $('.add_row').click(function(e) {
            e.preventDefault();
            const row = `<div class="row mb-3">
                        <div class="col-md-11">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" name="fname[]" class="form-control" placeholder="name" required>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="fvalue[]" class="form-control" placeholder="value" required>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" name="ftype[]" class="form-control" placeholder="type" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <button class="btn btn-danger w-100 remove_row"><i class="fas fa-times"></i></button>
                        </div>
                    </div>`;
            $('.row_data').append(row);
        })
        $('body').on('click', '.remove_row', function(e) {
            e.preventDefault();
            $(this).parent().parent().remove();
        })
    </script>
@endsection
