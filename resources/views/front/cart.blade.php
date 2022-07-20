@extends('front.master')
@section('title', 'cart | ' . env('APP_NAME'))
@section('styles')
    <style>
        .animate span {
        animation: rotate 0.5s infinite ease;
        display: inline-block;
    }

    @keyframes rotate{
        form: {
            transform: rotate(0deg);
        }
        to {
            transform: rotate(360deg);
        }
    }
    </style>
@stop
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('assets/img/breadcrumb.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.html">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">

     @include('front.parts.cart_items' )


    </section>
    <!-- Shoping Cart Section End -->

@stop

@section('script')

    <script>
        //$('.cart-update').click(function(e) {
        $('body').on('click' , '.cart-update' , function(e) {
            e.preventDefault();
            $(this).addClass('animate');


            // get all form data

            var items = [];
            $('.quantity-input').each(function(key, input) {
            var data = [input.value , input.dataset.product_id]
            items.push(data);
                //items.push(input.value);

            });



            $.ajax({
                type: 'POST',
                url: '{{ route('site.update_cart') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    items: items
                },
                success: function(res) {
                    $('.shoping-cart').html(res);

                }
            })



        })
    </script>

@endsection
