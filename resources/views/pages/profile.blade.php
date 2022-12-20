@extends('layouts.layout')
@section('content')
<link rel="stylesheet" href="/temple/css/profile.css?v={{time()}}">
<style>
    .header__wrapper>div:last-child {
        display: grid;
    }
</style>
<title>Личный кабинет</title>
<script>
    $(".header__h3").text("Личный кабинет");
</script>
<div class="profile_user_info">
    <table>
        <tr>
            <td>Ваш ID:</td>
            <td><input type="text" value="{{$u->apiInfoUserTo[0]->api_id}}" readonly>
                <svg class="copy_btn wrapper_copy_btn" width="8px" height="10px">
                    <use xlink:href="/temple/img/sprite.svg#copy_btn"></use>
                </svg>
            </td>
        </tr>
        <tr>
            <td>Ваше имя:</td>
            <td>{{$u->first_name}} {{$u->last_name}}</td>
        </tr>
        <tr>
            <td>Дата регистрации:</td>
            <td>{{ Carbon\Carbon::parse($u->apiInfoUserTo[0]->creationDate)->format('d/m/Y')}}</td>
        </tr>
        <tr>
            <td>Вас пригласил(а):</td>
            <td>{{$u->apiInfoUserTo[0]->refferer}}</td>
        </tr>
        <tr>
            <td>Вы пригласили:</td>
            <td>{{count($listReferrals["referrals"])}} пользователей</td>
        </tr>
    </table>

    <div class="btn">Заказать выплату</div>
</div>

<div class="profile_user_ref_block">
    <h3>Рефферальная ссылка</h3>
    <p>Скопируйте и вставьте эту ссылку, чтобы
        отправить друзьям или использовать в своих
        статьях. Когда пользователи регистрируются
        по этой ссылке, на ваш счет будут начисляться
        реферальные бонусы.</p>
    <div class="profile_user_ref">
        <input type="text" value="https://t.me/GarandSystembot/?start=rc{{$u->apiInfoUserTo[0]->referralCode}}" readonly>
        <div class="wrapper_copy_btn">
            <svg class="copy_btn" width="8px" height="10px">
                <use xlink:href="/temple/img/sprite.svg#copy_btn"></use>
            </svg>
        </div>
    </div>
</div>

<div class="profile_user_tabel">
    <div class="btn_tabel">Ваши покупки
        <svg class="btn_tabel_back" width="12px" height="19px">
            <use xlink:href="/temple/img/sprite.svg#back"></use>
        </svg>
    </div>
    <div class="profile_user_table_wrapper">
        @if(count($listBuyUser["orders"]) != 0)
        <table>
            <tr>
                <th>Дата</th>
                <th>Название</th>
                <th>Количество</th>
                <th>Цена</th>
                <th>Статус</th>
            </tr>
            @foreach($listBuyUser["orders"] as $itemBuy)
            <tr>
                <td>{{ Carbon\Carbon::parse($itemBuy["creationDate"])->format('d.m.Y') }}</td>
                <td>?Пакет Старт</td>
                <td>?1</td>
                <td>{{number_format($itemBuy["amountToPay"], 0, ',', ' ' )}} ₽</td>
                <td>
                    @if($itemBuy["paymentType"] == "")
                    <p class="profile_user_table_status">В обработке</p>
                    @else
                    <p class="profile_user_table_status_activ">Оплачен</p> 
                    @endif
                    
                    
                </td>
            </tr>
            @endforeach
            
        </table>
        @else
        <div class="profile_table_error">
            Мы не нашли данных!
        </div>
        @endif
    </div>
</div>

<div class="profile_user_tabel">
    <div class="btn_tabel">Таблица приглашенных
        <svg class="btn_tabel_back" width="12px" height="19px">
            <use xlink:href="/temple/img/sprite.svg#back"></use>
        </svg>
    </div>
    <div class="profile_user_table_wrapper">
        @if(count($listReferrals["referrals"]) != 0)
        <table>
            <tr>
                <th>Имя</th>
                <th>Дата</th>
                <!-- <th>Доход</th> -->
            </tr>
            @foreach($listReferrals["referrals"] as $referal)

            <tr>
                <td>{{$referal["first_name"]}} {{$referal["last_name"]}}</td>
                <td>{{ Carbon\Carbon::parse($referal["creationDate"])->format('d.m.Y')}} </td>
                <!-- <td>?78 ₽</td> -->
            </tr>

            @endforeach

            

        </table>
        @else
        <div class="profile_table_error">
            Мы не нашли данных!
        </div>
        @endif
    </div>
</div>
<script>
    $(".btn_tabel").on('click', function() {
        var profile_user_tabel = $(this).closest(".profile_user_tabel"),
            table = profile_user_tabel.find(".profile_user_table_wrapper");

        if (profile_user_tabel.hasClass("activ")) {
            profile_user_tabel.removeClass("activ");
            table.slideUp(0);
        } else {
            profile_user_tabel.addClass("activ");
            table.slideDown(0);
        }
    });
</script>
<script>
    $(".wrapper_copy_btn").on('click', function() {
        $(this).parent().find("input").select();
        document.execCommand("copy");
    });
</script>
@endsection

