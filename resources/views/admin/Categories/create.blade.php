@extends('admin.mast er')

@section('title', 'Add New Category ')

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card mt-5">
                <div class="card-header ">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="m-0">Add New Category</h3>
                        <a href={{ route('admin.categories.index') }} class="btn btn-warning px-4">All Categories</a>
                    </div>

                </div>
                <div class="card-body">
                    @include('admin.errors')


                    <form action="{{ route('admin.categories.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>

                        <div class="mb-3">
                            <label for="">Parent</label>
                            <select name="parent_id" class="form-control">
                                <option value="">--Select--</option>
                                @foreach ($AddParent as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button class="btn btn-success px-5">ADD</button>

                    </form>

                </div>
            </div>

        </div>
    </div>


@stop
