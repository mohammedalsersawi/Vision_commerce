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

                      @include('admin.blogs.model')

                    </div>
                </div>

                <div class="card-body">
                    <div class="alert alert-danger" style="display:none"></div>

                 @include('admin.blogs.table')

                </div>
            </div>
        </div>
    </div>
    </div>
@stop

@section('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        jQuery(document).ready(function(){
            jQuery(document).on('submit' , '#form' , function(e){
            e.preventDefault();
             const form = this;
                $('.text-danger').text('');

             jQuery.ajax({
                type: 'post',
                url: '{{ route('admin.blogs.store') }}',
                data:new FormData(form),
                    processData:false,
                    contentType:false,
                    success: function(res) {
                        $('.card-body').html(res);
                        $('#exampleModal').modal('hide');
                        $("#form")[0].reset();
                },
                error: function(reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    });
                }
            });
        });
        });
    </script>






@endsection
