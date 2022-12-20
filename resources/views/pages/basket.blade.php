@extends('layouts.layout')
@section('content')

<?php
$count = 0;
$sum = 0;
?>
<link rel="stylesheet" href="/temple/css/basket.css?v={{time()}}">
<title>Корзина</title>

<h3 class="header__h3">ВАША КОРЗИНА</h3>

<div class="basket">
    @if(count($basketList) != 0)
    @foreach($basketList as $basketItem)
    @foreach($products as $product)
    @if($product['_id'] == $basketItem->product_id)
    <?php
    $count += $basketItem->col;
    $sum += $product['variants'][0]['price'];
    ?>
    <div class="basket_item">
        <div style="display: flex;" data-href="/product_dynamics/{{$product['_id']}}" onclick="dynamics(this);">
            <img src="{{$product['imgUrl']}}" alt="продукт">
            <label>{{$product['name']}}</label>
        </div>
        <div class="basket_item_price">
            <b>{{number_format( $product['variants'][0]['price'], 0, ',', ' ' )}} ₽</b>
            <div class="basket_item_col" data-sum="{{$product['variants'][0]['price']}}" data-id="{{$basketItem->id}}">
                <div data-plus="1">+</div>
                <input type="text" name="col" value="{{$basketItem->col}}">
                <div data-plus="0">-</div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
    @endforeach
    @else
    <p class="basket_error">Ваша корзина пуста!</p>
    @endif
</div>

<div class="scoreboard">
    <div class="scoreboard_text">
        <p>Количество товаров</p>
        <p id="scoreboard_count">{{$count}}</p>
    </div>
    <div class="scoreboard_text">
        <p>Итого</p>
        <p class="scoreboard_sum">{{$sum}} ₽</p>
    </div>
    <div class="btn">Оплатить <span class="scoreboard_sum">{{$sum}} ₽</span></div>
</div>


<script>
    $(".basket_item_col div").on('click', function() {
        var c = $(this),
            kol_item = $(this).parent().find("input"),
            kol_number = Number(kol_item.val());
        if (c.data("plus")) {
            kol_item.val(kol_number + 1);
        } else {
            kol_item.val(kol_number - 1);
            kol(kol_item, kol_number);
        }

        if (kol_item.val() >= 0) {
            scoreboard_info();
        }

    });

    $('.basket_item_col input').keyup(function() {
        var value = $(this).val();

        kol($(this), Number($(this).val()));
        scoreboard_info();
    });

    function kol(kol_item, kol) {
        if (kol_item.val() != "") {
            if (kol_item.val() == "0" || kol <= 0) {
                dellBasketItem(kol_item);
            }
        }
    }

    function dellBasketItem(input) {
        var id = input.closest(".basket_item_col").data("id");
        $.ajax({
            url: '/delete-item-basket/'+id,
            type: "POST",
            success: function(data) {
                input.closest(".basket_item").fadeOut(500);
            },
            error: function(msg) {

            }
        });
    }


    $('.basket_item input[name="col"]').keyup(function() {
        if (this.value.match(/[^0-9]/g)) {
            this.value = this.value.replace(/[^0-9]/g, '');
        }
    })

    function scoreboard_info() {
        var scoreboard_count = $("#scoreboard_count"),
            scoreboard_sum = $(".scoreboard_sum");

        var basket_items = $(".basket_item_col");

        var sum = 0,
            count = 0;

        basket_items.each(function(i, elem) {
            sum += $(elem).data("sum") * $(elem).find("input").val();
            count += Number($(elem).find("input").val());
        });


        scoreboard_sum.text(sum + " ₽");
        scoreboard_count.text(count);
    }
</script>
@endsection