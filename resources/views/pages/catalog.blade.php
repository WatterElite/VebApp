@extends('layouts.layout')
@section('content')
<link rel="stylesheet" href="/temple/css/catalog.css?v={{time()}}">
<title>Каталог</title>

<h3 class="header__h3">Каталог</h3>

<div class="catalog_wrapper">
    @foreach($products as $p)
    @if($p['categoryId'] == 2)
    <div class="catalog_item">
        <div class="catalog_img" data-href="/product_dynamics/{{$p['_id']}}" onclick="dynamics(this);">
            <img src="{{$p['imgUrl']}}" alt="">
        </div>

        <div class="catalog_info">
            <h6>{{$p["name"]}}</h6>
            <div class="catalog_wrapper_description">{!! nl2br($p['description']) !!}</div>
            <p></p>
            <span>{{number_format( $p['variants'][0]['price'], 0, ',', ' ' )}} ₽ <a>{{number_format( ($p['variants'][0]['price'] * $addPercente), 0, ',', ' ' )}} ₽</a></span>
            <div class="wrapper_catalog_btn">
                <div class="btn catalog_btn_info" data-href="/product_dynamics/{{$p['_id']}}" onclick="dynamics(this);">Подробнее</div>
                @if($p["_id"] == "637d8c0e87e85cd4faa8a139" || $p["_id"] == "637d8bb587e85cd4faa89c88")
                <div class="btn catalog_btn_basket" onclick="add_basket(this);" data-id="{{$p['_id']}}">В Корзину</div>
                @else
                <div class="btn catalog_btn_basket consultation_btn_m_open m_open" href="#consultation_modal" data-text="Здравствуйте, меня заинтересовал товар '{{$p['name']}}'! Можете рассказать о нём больше?" data-id="{{$p['_id']}}">Проконсультироваться</div>
                @endif

            </div>
        </div>
    </div>
    @endif
    @endforeach


</div>

<script>
    $('.consultation_btn_m_open.m_open').on('click', function() {
        $('#consultation_modal textarea[name="text"]').val($(this).data("text"));
    });
</script>
@endsection