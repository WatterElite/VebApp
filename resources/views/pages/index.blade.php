@extends('layouts.layout')
@section('content')
<title>VebApp</title>
<style>
    .header__wrapper {
        box-shadow: 0px 8px 26px #454545;
    }

    html {
        background: #f6f6f6;
    }

    .header__wrapper .btn {
        display: block;
    }

    .header__wrapper>div:last-child {
        display: grid;
    }
</style>
<div class="how">
    <h1 class="how__h1">Garand System ®️</h1>
    <h2>Инструмент дохода в проектах Telegram</h2>
    <!-- <ul>
        <li>

            <p class="m_open" href="#consultation_modal">consultation_modal</p>
        </li>
        <li>

            <p class="m_open" href="#consultation_phone_modal">consultation_phone_modal</p>
        </li>
        <li>

            <p class="m_open" href="#consultation_thanks_modal">consultation_thanks_modal</p>
        </li>
    </ul> -->
    <ul>
        <li>
            <div>100%</div>
            <p>Расширения клиентской базы</p>
        </li>
        <li>
            <div>100%</div>
            <p>Повышения лояльности действующих клиентов</p>
        </li>
        <li>
            <div>100%</div>
            <p>Увеличения дохода</p>
        </li>
    </ul>
</div>

<div class="video">
    <!-- <iframe src="https://www.youtube.com/embed/1fTuqbR8UIc" title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe> -->
    <!-- poster="video/duel.jpg" -->
    <video controls="controls" poster="/temple/img/poster.jpg">
        <source src="/temple/video/GarandSystem4.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
        Тег video не поддерживается вашим браузером.
        <a href="/temple/video/GarandSystem4.mp4">Скачайте видео</a>.
    </video> 
</div>

<div class="pros">
    <h3>Что полезного</h3>
    <div class="pros__items">
        <div>
            <svg>
                <use xlink:href="/temple/img/sprite_proc.svg#proc_1"></use>
            </svg>
            <p>Администрирование чатов, каналов и ботов</p>
        </div>

        <div>
            <svg>
                <use xlink:href="/temple/img/sprite_proc.svg#proc_2"></use>
            </svg>
            <p>Таргет, закупка трафика</p>
        </div>

        <div>
            <svg>
                <use xlink:href="/temple/img/sprite_proc.svg#proc_3"></use>
            </svg>
            <p>Фото-видео дизайн Эмодзи и стикеры</p>
        </div>

        <div>
            <svg>
                <use xlink:href="/temple/img/sprite_proc.svg#proc_4"></use>
            </svg>
            <p>Проекты под ключ Автоматические боты</p>
        </div>

        <div>
            <svg>
                <use xlink:href="/temple/img/sprite_proc.svg#proc_5"></use>
            </svg>
            <p>Лидогенерация, рассылка, парсинг, инвайтинг</p>
        </div>

        <div>
            <svg>
                <use xlink:href="/temple/img/sprite_proc.svg#proc_6"></use>
            </svg>
            <p>WEB APP приложения</p>
        </div>

        <div>
            <svg>
                <use xlink:href="/temple/img/sprite_proc.svg#proc_7"></use>
            </svg>
            <p>Групповое ведение</p>
        </div>

        <div>
            <svg>
                <use xlink:href="/temple/img/sprite_proc.svg#proc_8"></use>
            </svg>
            <p>CRM система</p>
        </div>

        <div>
            <svg>
                <use xlink:href="/temple/img/sprite_proc.svg#proc_9"></use>
            </svg>
            <p>Онлайн коммерция</p>
        </div>

        <div>
            <svg>
                <use xlink:href="/temple/img/sprite_proc.svg#proc_10"></use>
            </svg>
            <p>Системы лояльности для ваших подписчиков</p>
        </div>

    </div>
</div>

<div class="products">
    <h3>Топ товаров</h3>
    <div class="products__itms">
        @foreach($products as $p)
        @if($p['categoryId'] == 2)
        <div class="products__itm">
            <div>
            <img src="{{$p['imgUrl']}}" alt="" data-href="/product_dynamics/{{$p['_id']}}" onclick="dynamics(this);">
            <p>от {{number_format( $p['variants'][0]['price'], 0, ',', ' ' )}} ₽<span>{{number_format( ($p['variants'][0]['price'] * $addPercente), 0, ',', ' ' )}} ₽</span></p>
            <h6>{{$p["name"]}}</h6>
            </div>
            <div class="products__btn_wrapper">
                @if($p["_id"] == "637d8c0e87e85cd4faa8a139" || $p["_id"] == "637d8bb587e85cd4faa89c88")
                <div onclick="add_basket(this);" data-id="{{$p['_id']}}" class="basket_wrapper">
                    <svg width="19px" height="17px">
                        <use xlink:href="/temple/img/sprite.svg#basket"></use>
                    </svg>
                </div>
                @endif
                <div class="btn" data-href="/product_dynamics/{{$p['_id']}}" onclick="dynamics(this);">
                    Подробнее
                </div>
                <!-- <svg width="22" height="22" data-id="{{$p['_id']}}">
                    <use xlink:href="/temple/img/sprite.svg#phone"></use>
                </svg> -->
            </div>
        </div>
        @endif
        @endforeach

        
    </div>
    <div class="btn" data-href="/catalog_dynamics" onclick="dynamics(this);">Весь каталог</div>
</div>

<div class="reviews">
    <h3>Отзывы</h3>

    <div class="reviews__itms">
        <div class="reviews__itm m_open" href="#product_video_modal" data-href="/temple/reviews/video/1.mp4">
        <div class="video_modal_wrapper">
            <video>
                <source src="/temple/reviews/video/1.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                Тег video не поддерживается вашим браузером.
                <a href="/temple/reviews/video/1.mp4">Скачайте видео</a>.
            </video></div>
            <h6>Евгений Быстров</h6>
            <div class="reviews__star_wrapper">
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
            </div>

            <p>Всем привет. Меня зовут Евгений хочу записать свой отзыв о сервисе гарантистам. Дело в том, что у меня есть довольно крупный telegram-канал, которому нужен администратор и стал искать, кто этим занимается и наткнулся на гарантистом. Выбрала. Я их потому что условно намного лучше, чем у конкурентов. Вот они мне предложили администратора за адекватную, стоимость, которой, а следит за моим каналом, который выкладывает контент, пока я занимаюсь своими делами. Так что если вам что-то нужно, по части телеграм-каналов, можете смело обращаться к ним гарантистом. Спасибо</p>
        </div>

        <!-- <div class="reviews__itm m_open" href="#product_phote_modal" data-href="/temple/img/reviews/AVATAR.png">
            <img src="/temple/img/reviews/AVATAR.png" alt="">
            <h6>Брэд Питович</h6>
            <div class="reviews__star_wrapper">
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
            </div>

            <p>Очень быстрая обработка заказа, внимательные продавцы (позвонили
                срsssssssssssssssssssssssssssssssssssssssssssssазу же после заказа), И -
                вишенка на торте комплимент от продавца за заказ, пasdasdasdasdодвеска. Казалось бы, мелочь,
                ..ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss.</p>
        </div> -->

        <div class="reviews__itm m_open" href="#product_video_modal" data-href="/temple/reviews/video/2.mp4">
        <div class="video_modal_wrapper">
        <video>
                <source src="/temple/reviews/video/2.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                Тег video не поддерживается вашим браузером.
                <a href="/temple/reviews/video/2.mp4">Скачайте видео</a>.
            </video></div>
            <h6>Анастасия Амонасян</h6>
            <div class="reviews__star_wrapper">
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
            </div>

            <p>Всем здравствуйте. Меня зовут Анастасия и я хочу поблагодарить специалистов из компании гарантистым. Эти люди помогут вам автоматизировать свой проект и telegram-канал на все 100%. Мне буквально недавно нужно было развивать телеграм-канал по моему менторству и онлайн-курсах и гарантистым. Мне в этом очень сильно помогли и помогает по сей день. Все процессы делаются под ключ и набор подписчиков и всякие конкурсы и составления контент-плана и общение с аудиторией очень сильно разгружают меня в моей работе. В общем я всем их рекомендую.</p>
        </div>

        <div class="reviews__itm m_open" href="#product_video_modal" data-href="/temple/reviews/video/3.mp4">
        <div class="video_modal_wrapper">
        <video>
                <source src="/temple/reviews/video/3.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                Тег video не поддерживается вашим браузером.
                <a href="/temple/reviews/video/3.mp4">Скачайте видео</a>.
            </video></div>
            <h6>Петр Кирюшин</h6>
            <div class="reviews__star_wrapper">
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
            </div>

            <p></p>
        </div>

        <div class="reviews__itm m_open" href="#product_video_modal" data-href="/temple/reviews/video/4.mp4">
            <div class="video_modal_wrapper">
            <video>
                <source src="/temple/reviews/video/4.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                Тег video не поддерживается вашим браузером.
                <a href="/temple/reviews/video/4.mp4">Скачайте видео</a>.
            </video>
            </div>
        
            <h6>Ирина Мыскина</h6>
            <div class="reviews__star_wrapper">
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
            </div>

            <p>Всем доброго дня недавно Instagram заблокировали. И мне пришлось что-то придумывать переходить на новую площадку. И тут коллега по бизнесу посоветовала мне ребят из гарантистым. Ну мы Обсудили с ними условия заключили договор. И когда пришла оплата. Они приступили к своей работе. Они проводили различные розыгрыши. И большинство активной аудитории сразу же переходила уже на наш telegram-канал. Также я смогла отслеживать статистику по CRM системе, что тоже очень удобно, в общем, а Коран систем показали наилучший результаты в развитии нашего telegram-канала. За что им Огромное спасибо</p>
        </div>

        <div class="reviews__itm m_open" href="#product_video_modal" data-href="/temple/reviews/video/5.mp4">
            <div class="video_modal_wrapper">
            <video>
                <source src="/temple/reviews/video/5.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                Тег video не поддерживается вашим браузером.
                <a href="/temple/reviews/video/5.mp4">Скачайте видео</a>.
            </video>
            </div>
        
            <h6>Оксана Макеева</h6>
            <div class="reviews__star_wrapper">
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
            </div>

            <p>Всем здравствуйте! Меня зовут Мария и я хочу записать свой отзыв о компании ГарАнд сИтем. В двух словах это для всех, кто хочет автоматизировать свой проект, и в то же время не заниматься поиском различных специалистов.
            <br><br>
Так-же я люблю работать по системе оплатил и забыл, а точнее оплатил и получил то , что нужно!
Дело в том, что я работала в отделе продаж много лет и знаю что такое закрытие клиентов. И в своем бизнесе я работаю через ЦРМ систему, ЦРМ - это любовь с первого взгляда, так вот моему восторгу не было предела когда я нашла эту систему в телеграме!
<br><br>
Система работает как часы, если у меня какие-то вопросы всегда могу обратиться к разработчикам и кстати, регулярные обновления всегда радуют Спасибо ГарАнд сИтем за то, что вы с нами!</p>
        </div>

        <div class="reviews__itm m_open" href="#product_video_modal" data-href="/temple/reviews/video/6.MOV">
            <div class="video_modal_wrapper">
            <video>
                <source src="/temple/reviews/video/6.MOV" type='video/MOV'>
                Тег video не поддерживается вашим браузером.
                <a href="/temple/reviews/video/6.MOV">Скачайте видео</a>.
            </video>
            </div>
        
            <h6>Андрей Плотников</h6>
            <div class="reviews__star_wrapper">
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
            </div>

            <p>Я не знала как можно продвигаться в телеграм. Для меня это всегда был мессенджер, при чем которым я не пользовалась. для общения чаще всего был в моем телефоне ватсап. Мне посоветовала компанию Гаранд систем моя подруга, она в сетевом бизнесе и сотрудничала уже к тому времени с ребятами несколько месяцев. Разбираться во всей системе телеграм у меня не было времени, подумала, раз уж сетевой там значит и у нас получится. Так и есть. а точнее у меня теперь есть свой бизнес в телеграм, который работает и приносит мне прибыль. Спасибо ребятам за полное сопровождение и работу под ключ.</p>
        </div>

        <div class="reviews__itm m_open" href="#product_video_modal" data-href="/temple/reviews/video/7.mp4">
            <div class="video_modal_wrapper">
            <video>
                <source src="/temple/reviews/video/7.mp4" type='video/mp4; codecs="avc1.42E01E, mp4a.40.2"'>
                Тег video не поддерживается вашим браузером.
                <a href="/temple/reviews/video/7.mp4">Скачайте видео</a>.
            </video>
            </div>
        
            <h6>Яна Богданова</h6>
            <div class="reviews__star_wrapper">
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star_activ"></use>
                </svg>
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star"></use>
                </svg>
                <svg width="12" height="11">
                    <use xlink:href="/temple/img/sprite_star.svg#star"></use>
                </svg>
            </div>

            <p>
            Всем привет. Хочу оставить свой отзыв о нашем сотрудничестве с Garand System. Мы работаем сравнительно недавно, около 3-х месяцев, но уже явно видны результаты, и мы очень довольны.
 После событий с Инстаграмом блокировкой у моей команды лидеров появилась паника, непонимание куда бежать и что делать…😩 как дальше работать, основной трафик клиентов у многих шел именно из этой социальной сети. А самое главное как сохранить свою аудиторию. Мы перепробовали многое, именно в этот момент и познакомились с командой Garand System. Мне очень понравилась идея с лотереей и мы решили пробовать. Аудитория из соц сетей очень хорошо переходила в наш новый чат, все любят подарки😄 и самое главное нам не нужно было отслеживать в ручную все ли соблюдали условия участия в лотерее, которые были невероятно простыми и доступными для каждого. На одном розыгрыше мы не остановились, теперь это регулярная неотъемлемая часть нашего клиентского чата, плюс добавили участникам возможность получать подарки🎁 и вне розыгрыша, за выполнения простых заданий и приглашения своих друзей, знакомых в наш чат. 
Что мы получили – сохранили и перевели свою аудиторию из соц сети в удобный чат, работаем над наполнением контентом совместно, а не по одиночке, участники чата активно участвуют в жизни чата и самостоятельно рекомендуют нас своим друзьям, а мы трафик. Ну и вишенка🍒 на торте – ЦРМ для работы с каждым клиентом индивидуально или объединяя группами это ооочень удобно. 
Спасибо Garand System от всей нашей команды, надеемся на длительное сотрудничество!
            </p>
        </div>
    </div>

    <div class="btn" onclick="window.location.href = 'https://t.me/GSotz';">Все отзывы</div>
</div>
<style>
    .back_svg{
        opacity: 0;
        pointer-events: none;
    }
</style>
 <script>
    $(document).ready(function() {
        $('.products__itms, .reviews__itms').slick({
            autoplay: true,
            autoplaySpeed: 2000,
            slidesToShow: 2,
            slidesToScroll: 1,
            arrows: false,
            //   dots: true,
            //   centerMode: true,
            //   focusOnSelect: true
        });
    });
</script> 

@endsection