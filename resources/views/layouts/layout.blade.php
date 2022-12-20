@if($_dynamics == null)
<!doctype html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="{{ asset('/temple/css/style.css') }}?v={{time()}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/temple/css/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/temple/css/modal.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/temple/css/burger.css') }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- <link rel="icon" type="image/png" href="/temple/imgs/favicon.png"> -->

    <script type="text/javascript" src="{{ asset('/temple/js/jquery.js') }}?v={{time()}}"></script>
    <script type="text/javascript" src="{{ asset('/temple/js/slick.min.js') }}"></script>

    <script src="https://telegram.org/js/telegram-web-app.js"></script>
</head>

<body>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <div id="overlay"></div>

    <div class="modal" id="product_video_modal">
        <div class="close modal_close"></div>
        <div class="modal_wrapper">
            <div>
                <!-- <h1>Starter<span>Status</span></h1> -->
            </div>
            <div>
                <video controls="controls">
                    <source src="/temple/video/test.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                    Тег video не поддерживается вашим браузером.
                    <a href="/temple/video/test.mp4">Скачайте видео</a>.
                </video>



            </div>
        </div>
    </div>

    <div class="modal" id="product_phote_modal">
        <div class="close modal_close"></div>
        <div class="modal_wrapper">
            <div>
                <!-- <h1>Starter<span>Status</span></h1> -->
            </div>
            <div class="phote_modal_wrapper">
                <img src="" alt="" class="phote_modal">



            </div>
        </div>
    </div>


    <div class="modal consultation_modal" id="consultation_modal">
        <div class="close modal_close"></div>
        <div class="modal_wrapper">

            <h3>Поддержка клиентов по вопросам сотрудничества и продуктов</h3>

            <!-- <h1>Напишите свой вопрос</h1> -->

            <div class="consultation_modal_wrapper">
                <textarea name="text" placeholder="Задайте свой вопрос!"></textarea>

                <div class="consultation_modal_btn">
                    <div class="doc_btn"></div>
                    <input type="file" name="img[]" accept="image/*" multiple style="display: none">
                    <div class="btn">Отправить</div>
                </div>
            </div>

            <div class="btn consultation_modal_call_btn m_open" href="#consultation_phone_modal">Заказать обратный звонок</div>
        </div>
    </div>

    <div class="modal consultation_modal consultation_phone_modal" id="consultation_phone_modal">
        <div class="close modal_close"></div>
        <div class="modal_wrapper">

            <h3>Пожалуйста, оставьте Ваш контакный номер</h3>

            <div class="consultation_modal_wrapper">
                <input type="text" value="" name="phone" placeholder="+7 (___) ___-__-__">
            </div>
            <div class="consultation_modal_btn">
                <div class="btn">Отправить</div>
            </div>
        </div>
    </div>

    <div class="modal" id="consultation_thanks_modal">
        <div href="#consultation_thanks_modal" class="m_open" style="display: none;"></div>
        <div class="close modal_close"></div>
        <div class="modal_wrapper">
            <img class="consultation_thanks_modal_img" src="/temple/img/successfully.png" alt="">
            <h1><span>Ваша заявка принята</span>, менеджер свяжется с вами в ближайшее время!</h1>

        </div>
    </div>

    <!-- <div class="sidebar">
        <div class="sidebar__head">
            <a class="sidebar__logo" >
                <img class="sidebar__pic sidebar__pic_light" src="/temple/img/burger/logo.svg" alt="">
                <img class="sidebar__pic sidebar__pic_dark" src="/temple/img/burger/logo-white.svg" alt="">
            </a>
            <div class="header__group sidebar__header_group">

                <div class="header__item header__item_lang">
                    <button class="header__head">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="19" viewBox="0 0 18 19" fill="none">
                            <path d="M1 3H8M6 1V3C6 7.418 3.761 11 1 11" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            <path d="M2 7C1.997 9.144 4.952 10.908 8.7 11M9 18L13 9L17 18M16.1 16H9.9" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>
                    <div class="header__body">
                        <div class="header__lang">
                            <div class="header__cell"><a class="header__link active" href="#"><span class="header__flag" style="background: url(/temple/img/burger/flag/🇺🇸.svg);"></span>
                                    English</a><a class="header__link" href="#"><span class="header__flag" style="background: url(/temple/img/burger/flag/🇨🇳.svg);"></span> 中文</a><a class="header__link" href="#"><span class="header__flag" style="background: url(/temple/img/burger/flag/🇪🇸.svg);"></span>
                                    Española</a><a class="header__link" href="#"><span class="header__flag" style="background: url(/temple/img/burger/flag/🇫🇷.svg);"></span>
                                    Français</a><a class="header__link" href="#"><span class="header__flag" style="background: url(/temple/img/burger/flag/🇻🇳.svg);"></span> Tiếng
                                    Việt</a></div>
                            <div class="header__cell"><a class="header__link active" href="#">USD</a><a class="header__link" href="#">EUR</a><a class="header__link" href="#">JPY</a><a class="header__link" href="#">BTC</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header__item header__item_download"><button class="header__head"><svg class="icon icon-arrow-down-square">
                            <use xlink:href="/temple/img/burger/sprite.svg#icon-arrow-down-square"></use>
                        </svg></button>
                    <div class="header__body">
                        <div class="header__row header__row_date">Available October 16th
                        </div>
                        <div class="header__row">
                            <div class="header__col">
                                <div class="header__category">Downloads</div>
                                <div class="header__downloads"><a class="header__download" href="#"><img src="/temple/img/burger/app-store.svg" alt=""></a><a class="header__download" href="#"><img src="/temple/img/burger/google-play.svg" alt=""></a>
                                </div>
                            </div>
                            <div class="header__col">
                                <div class="header__category">Scan Code</div>
                                <div class="header__code"><img src="/temple/img/burger/qr-code.png" alt=""></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header__item header__item_notifications">
                    <button class="header__head active"><svg class="icon icon-notification">
                            <use xlink:href="/temple/img/burger/sprite.svg#icon-notification"></use>
                        </svg></button>
                    <div class="header__body">
                        <div class="header__notifications">
                            <div class="header__notification">
                                <div class="header__icon"><img src="/temple/img/burger/paper.svg" alt=""></div>
                                <div class="header__details">
                                    <div class="header__info">Wrapped Bitcoin is now listed on Unity Exchange</div>
                                    <div class="header__line">
                                        <div class="header__time">24m ago</div>
                                        <div class="header__status"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="header__notification">
                                <div class="header__icon"><img src="/temple/img/burger/paper.svg" alt=""></div>
                                <div class="header__details">
                                    <div class="header__info">Wrapped Bitcoin is now listed on Unity Exchange</div>
                                    <div class="header__line">
                                        <div class="header__time">24m ago</div>
                                        <div class="header__status"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="header__notification">
                                <div class="header__icon"><img src="/temple/img/burger/paper.svg" alt=""></div>
                                <div class="header__details">
                                    <div class="header__info">Wrapped Bitcoin is now listed on Unity Exchange</div>
                                    <div class="header__line">
                                        <div class="header__time">24m ago</div>
                                        <div class="header__status"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="header__notification">
                                <div class="header__icon"><img src="/temple/img/burger/paper.svg" alt=""></div>
                                <div class="header__details">
                                    <div class="header__info">Wrapped Bitcoin is now listed on Unity Exchange</div>
                                    <div class="header__line">
                                        <div class="header__time">24m ago</div>
                                        <div class="header__status"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="header__notification">
                                <div class="header__icon"><img src="/temple/img/burger/paper.svg" alt=""></div>
                                <div class="header__details">
                                    <div class="header__info">Wrapped Bitcoin is now listed on Unity Exchange</div>
                                    <div class="header__line">
                                        <div class="header__time">24m ago</div>
                                        <div class="header__status"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>

                <button class="sidebar__close"><svg class="icon icon-close">
                        <use xlink:href="/temple/img/burger/sprite.svg#icon-close"></use>
                    </svg></button>
            </div>
            <button class="sidebar__toggle"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M22 12H3" stroke="#11142d"></path>
                    <g stroke="#808191">
                        <path d="M22 4H13"></path>
                        <path opacity=".301" d="M22 20H13"></path>
                    </g>
                    <path d="M7 7l-5 5 5 5" stroke="#11142d"></path>
                </svg></button>
            <button class="sidebar__close sidebar__close_copy"><svg class="icon icon-close">
                    <use xlink:href="/temple/img/burger/sprite.svg#icon-close"></use>
                </svg></button>
        </div>
        <div class="sidebar__body">
            <nav class="sidebar__nav"><a class="sidebar__item active" href="index.html">
                    <div class="sidebar__icon"><svg class="icon icon-home">
                            <use xlink:href="/temple/img/burger/sprite.svg#icon-home"></use>
                        </svg></div>
                    <div class="sidebar__text">Home</div>
                </a><a class="sidebar__item" href="exchange.html">
                    <div class="sidebar__icon"><svg class="icon icon-chart">
                            <use xlink:href="/temple/img/burger/sprite.svg#icon-chart"></use>
                        </svg></div>
                    <div class="sidebar__text">Exchange</div>
                </a><a class="sidebar__item" href="prices.html">
                    <div class="sidebar__icon"><svg class="icon icon-document">
                            <use xlink:href="/temple/img/burger/sprite.svg#icon-document"></use>
                        </svg></div>
                    <div class="sidebar__text">Prices</div>
                </a><a class="sidebar__item" href="wallets.html">
                    <div class="sidebar__icon"><svg class="icon icon-wallet">
                            <use xlink:href="/temple/img/burger/sprite.svg#icon-wallet"></use>
                        </svg></div>
                    <div class="sidebar__text">Wallets</div>
                </a><a class="sidebar__item" href="promotions.html">
                    <div class="sidebar__icon"><svg class="icon icon-discount">
                            <use xlink:href="/temple/img/burger/sprite.svg#icon-discount"></use>
                        </svg></div>
                    <div class="sidebar__text">Promotions</div>
                </a><a class="sidebar__item" href="activities.html">
                    <div class="sidebar__icon"><svg class="icon icon-activity">
                            <use xlink:href="/temple/img/burger/sprite.svg#icon-activity"></use>
                        </svg></div>
                    <div class="sidebar__text">Activities</div>
                </a><a class="sidebar__item" href="notifications.html">
                    <div class="sidebar__icon"><svg class="icon icon-notification">
                            <use xlink:href="/temple/img/burger/sprite.svg#icon-notification"></use>
                        </svg></div>
                    <div class="sidebar__text">Notifications</div>
                </a>
                <a class="sidebar__item js-popup-open" href="#popup-settings" data-effect="mfp-zoom-in">
                    <div class="sidebar__icon"><svg class="icon icon-settings">
                            <use xlink:href="/temple/img/burger/sprite.svg#icon-settings"></use>
                        </svg></div>
                    <div class="sidebar__text">Settings</div>
                </a>
                <a class="sidebar__item" href="#">
                    <div class="sidebar__icon">
                        <svg class="icon" width="20" height="20" viewBox="0 0 20 20" fill="" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_1_3222)">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.36657 12.5012C8.82616 12.4767 9.21859 12.8294 9.24309 13.289C9.27653 13.9162 9.31743 14.413 9.35837 14.8012C9.41335 15.3226 9.7336 15.6393 10.1942 15.692C10.8556 15.7676 11.8565 15.8333 13.3334 15.8333C14.8102 15.8333 15.8111 15.7676 16.4725 15.692C16.9339 15.6393 17.2532 15.3233 17.3082 14.8027C17.4044 13.891 17.5 12.384 17.5 10C17.5 7.61604 17.4044 6.109 17.3082 5.1973C17.2532 4.6767 16.9339 4.3607 16.4725 4.308C15.8111 4.2324 14.8102 4.1667 13.3334 4.1667C11.8565 4.1667 10.8556 4.2324 10.1942 4.308C9.7336 4.3606 9.41335 4.6774 9.35837 5.1988C9.31743 5.587 9.27653 6.0838 9.24309 6.711C9.21859 7.1706 8.82616 7.52332 8.36657 7.4988C7.90698 7.4743 7.55428 7.0819 7.57878 6.6223C7.61356 5.9699 7.65657 5.4442 7.70089 5.024C7.83135 3.787 8.70893 2.8003 10.0049 2.6521C10.7436 2.5677 11.8096 2.5 13.3334 2.5C14.8571 2.5 15.9231 2.5677 16.6618 2.6521C17.957 2.8002 18.835 3.7846 18.9657 5.0224C19.0696 6.0067 19.1667 7.57435 19.1667 10C19.1667 12.4256 19.0696 13.9933 18.9657 14.9776C18.835 16.2154 17.957 17.1998 16.6618 17.3479C15.9231 17.4323 14.8571 17.5 13.3334 17.5C11.8096 17.5 10.7436 17.4323 10.0049 17.3479C8.70893 17.1997 7.83135 16.213 7.70089 14.976C7.65657 14.5558 7.61356 14.0301 7.57878 13.3777C7.55428 12.9181 7.90698 12.5257 8.36657 12.5012Z">
                                </path>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.17226 12.3271C5.49768 12.6525 5.49768 13.1801 5.17226 13.5056C4.84682 13.831 4.31918 13.831 3.99374 13.5056L1.07708 10.5889C0.751649 10.2635 0.751649 9.73584 1.07708 9.4104L3.99374 6.49374C4.31918 6.1683 4.84682 6.1683 5.17226 6.49374C5.49768 6.81917 5.49768 7.34681 5.17226 7.67225L3.67818 9.16633L11.6663 9.16633C12.1266 9.16633 12.4997 9.53942 12.4997 9.99966C12.4997 10.4599 12.1266 10.833 11.6663 10.833L3.67818 10.833L5.17226 12.3271Z">
                                </path>
                            </g>
                            <defs>
                                <clipPath id="clip0_1_3222">
                                    <rect width="20" height="20" fill="white" transform="translate(0 20) rotate(-90)">
                                    </rect>
                                </clipPath>
                            </defs>
                        </svg>
                    </div>
                    <div class="sidebar__text">Log out</div>
                </a>
            </nav>

            <div class="sidebar__auth_wrapper">
                <a href="#">123</a>
                <a href="#">123</a>
            </div>
        </div>
    </div> -->

    <header class="header__wrapper">
        <div>
            <svg class="back_svg" id="back_svg" onclick="dynamics(this);">
                <use xlink:href="/temple/img/sprite.svg#back"></use>
            </svg>

            <div class="header__logo_wrapper" data-href="/home_dynamics" onclick="dynamics(this);">
                <svg class="logo_svg">
                    <use xlink:href="/temple/img/sprite.svg?v=2#logo"></use>
                </svg>
                <p>GARAND<span>system</span></p>
            </div>

            <!-- <div class="burger_svg_wrapper">
                <svg class="burger_svg">
                    <use xlink:href="/temple/img/sprite.svg#burger"></use>
                </svg>
            </div> -->

            <svg class="close_svg" width="18px" height="18px">
                <use xlink:href="/temple/img/sprite.svg#close"></use>
            </svg>
        </div>
        <div>
            <h3 class="header__h3"></h3>
            @auth
            <img src="{{$u->userProfilePhoto}}" alt="" class="header__avatar" data-href="/profile_dynamics" onclick="dynamics(this);">
            <div class="header__balanse">
                <div class="header__close_svg_wrapper"><svg>
                        <use xlink:href="/temple/img/sprite.svg#wallet"></use>
                    </svg></div><span>{{number_format( $u->apiInfoUserTo[0]->ammout, 0, ',', ' ' )}}</span>₽
            </div>

            <div class="btn" data-href="/profile_dynamics" onclick="dynamics(this);">Личный кабинет</div>

            @endauth
        </div>
    </header>
    <div id="debag" style=" color: black;     display: none;">
        asdasdasd
    </div>
    <div class="content">
        @endif
        @yield('content')
        @if($_dynamics == null)
    </div>

    <footer class="footer">
        <ul class="footer__menu">
            <a data-href="/home_dynamics" onclick="dynamics(this);">
                <svg width="22px" height="19px">
                    <use xlink:href="/temple/img/sprite.svg#home"></use>
                </svg>
                <label>Главная</label>
            </a>
            <a data-href="/catalog_dynamics" onclick="dynamics(this);">
                <svg width="19px" height="18px">
                    <use xlink:href="/temple/img/sprite.svg#book"></use>
                </svg>
                <label>Каталог</label>
            </a>
            <a href="#consultation_modal" class="consultation_btn_m_open m_open" href="#consultation_modal" data-text="">
                <svg width="21px" height="20px">
                    <use xlink:href="/temple/img/sprite.svg#consultation"></use>
                </svg>
                <label>Консультация</label>
            </a>
            <a data-href="/basket_dynamics" onclick="dynamics(this);">
                <svg width="22px" height="20px">
                    <use xlink:href="/temple/img/sprite.svg#basket-footer"></use>
                </svg>
                <label>Корзина</label>
            </a>
        </ul>

        <script>
            $(".wrapper_copy_btn").on('click', function() {
                $(this).parent().find("input").select();
                document.execCommand("copy");
            });
        </script>

        <script type="text/javascript" src="{{ asset('/temple/js/burger.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/temple/js/_modal.js') }}?v={{time()}}"></script>
        <script type="text/javascript" src="{{ asset('/temple/js/_dynamics.js') }}?v={{time()}}"></script>
        <script type="text/javascript" src="{{ asset('/temple/js/jquery.maskedinput.min.js') }}"></script>

        <script>
            var tg = window.Telegram.WebApp;

            var user_tg = window.Telegram.WebApp.initDataUnsafe;

            $("#debag").text(JSON.stringify(user_tg));

            $(".header__wrapper .close_svg").on('click', function() {
                tg.close();
                window.close();
            });

            @guest
            // $("#debag").text(user_tg.user);
            $.ajax({
                url: '/login',
                type: "POST",
                data: user_tg.user,
                success: function(data) {
                    location.reload();
                },
                error: function(msg) {
                    tg.close();
                }
            });

            @endguest
        </script>


        <script>

                $('#consultation_modal .doc_btn').on('click', function() {
                    $('#consultation_modal input[name="img[]"]').click();
                });

                $("#consultation_modal .consultation_modal_btn .btn").on('click', function() {
                    var formData = new FormData();
                    $.each($('#consultation_modal input[name="img[]"]')[0].files, function(key, input) {
                        formData.append('img[]', input);
                    });
                    formData.append('text', $('#consultation_modal textarea[name="text"]').val());

                    $("#consultation_modal .doc_btn, #consultation_modal input, #consultation_modal textarea").removeClass("error");

                    $.ajax({
                        url: '/consultation',
                        type: "POST",
                        cache: false,
                        contentType: false,
                        processData: false,
                        // dataType: 'json',
                        data: formData,
                        success: function(data) {
                            $('div[href="#consultation_thanks_modal"]').click();
                        },
                        error: function(msg) {
                            var errors = msg.responseJSON;
                            errors = errors["errors"];
                            console.log(errors);

                            for (var key in errors) {
                                $('#consultation_modal input[name="img[]"]').val("");
                                if (key.indexOf('img') != -1) {

                                    $("#consultation_modal .doc_btn").addClass("error");
                                }
                                $('#consultation_modal input[name="' + key + '"], #consultation_modal textarea[name="' + key + '"]').addClass('error');

                            }
                        }
                    });
                });

            
        </script>

        <script>
            window.onload = function() {
                $('.consultation_btn_m_open.m_open').on('click', function() {
                    $('#consultation_modal textarea[name="text"]').val($(this).data("text"));
                });
            };
        </script>

        <script>
            $.fn.setCursorPosition = function(pos) {
                if ($(this).get(0).setSelectionRange) {
                    $(this).get(0).setSelectionRange(pos, pos);
                } else if ($(this).get(0).createTextRange) {
                    var range = $(this).get(0).createTextRange();
                    range.collapse(true);
                    range.moveEnd('character', pos);
                    range.moveStart('character', pos);
                    range.select();
                }
            };

            $.mask['~'] = '[+-]';
            $.mask['h'] = '[0-9]';

            $(function() {
                $('.consultation_phone_modal input').click(function() {
                    $(this).setCursorPosition(3);
                }).mask("?+7(999) 999-99-99");
            });

            $('#consultation_phone_modal .btn').on('click', function() {
                $("#consultation_phone_modal input, #consultation_phone_modal textarea").removeClass("error");

                $.ajax({
                    url: '/consultation-phone',
                    type: "POST",
                    data: {
                        'phone': $('#consultation_phone_modal input[name="phone"]').val()
                    },
                    success: function(data) {
                        $('div[href="#consultation_thanks_modal"]').click();
                    },
                    error: function(msg) {
                        var errors = msg.responseJSON;
                        errors = errors["errors"];
                        console.log(errors);

                        for (var key in errors) {
                            $('#consultation_phone_modal input[name="' + key + '"], #consultation_phone_modal textarea[name="' + key + '"]').addClass('error');

                        }
                    }
                });
            });
        </script>
        <script>
            function add_basket(e) {
                var product_id = $(e).data("id");

                $.ajax({
                    url: '/add-item-basket',
                    type: "POST",
                    data: {
                        'product_id': product_id
                    },
                    success: function(data) {
                        $('*[data-href="/basket_dynamics"]').click();
                    },
                    error: function(msg) {
                        $('*[data-href="/basket_dynamics"]').click();
                    }
                });
            }
        </script>
    </footer>
</body>

</html>

@endif