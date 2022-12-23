@extends('admin.master')

@section('title', 'Edit Category')

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card mt-5">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="m-0">Edit category <span class="text-danger">{{ $category->name }}</span></h3>
                        <a href="{{ route('admin.categories.index') }}" class="btn btn-warning px-4">All Categories</a>
                    </div>
                </div>
                <div class="card-body">
                    @include('admin.errors')

                    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label>Name </label>
                            <input name="name" class="form-control" placeholder="Name English"
                                value="{{ $category->name }}" />
                        </div>



                        <div class="mb-3">
                            <label>Image</label>
                            <input name="image" type="file" class="form-control" placeholder="Name" />
                            <img width="120" src="{{ asset('uploads/images/' . $category->image) }}" alt="">
                        </div>

                        <div class="mb-3">
                            <label>Parent</label>
                            <select class="form-control" name="parent_id">
                                <option value="">--Select--</option>
                                @foreach ($categories as $item)
                                    <option {{ $category->parent_id == $item->id ? 'selected' : '' }}
                                        value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach

                            </select>
                        </div>

                        <button class="btn btn-info px-5">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@stop
