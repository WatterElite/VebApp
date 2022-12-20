// dynamics

var dataHref = "/home_dynamics";
function dynamics(e) {
    console.log($(e).data('href'));
    var _dynamics_href = $(e).data('href');
    var href = (_dynamics_href).replace("_dynamics", "").replace("home", "");
    $("#back_svg").data("href", dataHref);
    dataHref = _dynamics_href;
    
    $.ajax({
        url: _dynamics_href,
        type: 'GET',
        success: function(data) {
            window.history.pushState("", "", href);

            $('.content, header').fadeOut(200);

            // $('.header_menu a').removeClass();
            // $('.header_menu a[data-href="' + _dynamics_href + '"]').addClass("activ");

            $('#overlay').fadeOut(400);
            $('.modal').fadeOut(200);

            setTimeout(function() {
                console.log(data);
                $('.content').html(data);
                setTimeout(function() {
                    $('.content, header').fadeIn(200);
                    // ?? $('link[href="https://jetgamescdn.com/apps/crash/game/game/assets/ind.min.css?x=3051"], link[href="https://jetgamescdn.com/apps/chat/chatStyles.min.css?x=101"]').remove();
                }, 200);
            }, 200);

            
        },
        error: function(msg) {
            console.log(msg);
        }
    });
}