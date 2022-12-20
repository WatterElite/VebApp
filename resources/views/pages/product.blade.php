@extends('layouts.layout')
@section('content')
        <link rel="stylesheet" href="/temple/css/product.css?v={{time()}}">
        <title>{{$product['name']}}</title>

        <h3 class="header__h3">{{$product['name']}}</h3>

        <div class="product_wrapper">
            <div class="product_item">
                <img src="{{$product['imgUrl']}}" alt="" class="m_open" href="#product_phote_modal" data-href="{{$product['imgUrl']}}">
            </div>
            <div class="product_item">
                <img src="{{$product['imgUrl']}}" alt="" class="m_open" href="#product_phote_modal" data-href="{{$product['imgUrl']}}">
            </div>
            <!-- <div class="product_item">
                <img src="/temple/img/products/start.png" alt=""  class="m_open" href="#product_phote_modal" data-href="/temple/img/products/start.png">
            </div>
            <div class="product_item">
                <img src="/temple/img/products/1.png" alt="" class="m_open" href="#product_phote_modal" data-href="/temple/img/products/1.png">
            </div>
            <div class="product_item">
                <img src="/temple/img/products/start.png" alt="" class="m_open" href="#product_phote_modal" data-href="/temple/img/products/start.png">
            </div>
            <div class="product_item">
                <img src="/temple/img/products/start.png" alt="" class="m_open" href="#product_phote_modal" data-href="/temple/img/products/start.png">
            </div> -->
        </div>

        <!-- <div class="btn product_btn_video m_open" href="#product_video_modal">Видео</div> -->

        <div class="product_text">
            <p>{!! nl2br($product['description']) !!}</p>
            <a>Показать полностью</a>
        </div>

        

        @if($product["_id"] == "637d8c0e87e85cd4faa8a139" || $product["_id"] == "637d8bb587e85cd4faa89c88")
        <div class="wrapper_catalog_btn">
            <!-- <div class="btn catalog_btn_info">Подробнее</div> -->
            <div class="btn catalog_btn_basket" onclick="add_basket(this);" data-id="{{$product['_id']}}">В Корзину</div>
        </div>
        @else
        <div class="wrapper_catalog_btn">
            <!-- <div class="btn catalog_btn_info">Подробнее</div> -->
            <div class="btn catalog_btn_basket consultation_btn_m_open m_open" href="#consultation_modal" data-text="Здравствуйте, меня заинтересовал товар '{{$product['name']}}'! Можете рассказать о нём больше?">Проконсультироваться</div>
        </div>
        @endif
        <script>
            $('.consultation_btn_m_open.m_open').on('click', function () {
                $('#consultation_modal textarea[name="text"]').val($(this).data("text"));
            });
        </script>
        <script>
            $(".product_text a").on('click', function () {
                $(".product_text p").animate({
                    height: "100%",
                },0, function () {
                    
                });
                $(".product_text a").fadeOut(0);
            });
        </script>

        <script>
            $(document).ready(function () {
                $('.product_wrapper').slick({
                    autoplay: true,
                    autoplaySpeed: 2000,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    dots: true,
                    infinite: true,
                    //   centerMode: true,
                    //   focusOnSelect: true
                });
            });
        </script>
@endsection