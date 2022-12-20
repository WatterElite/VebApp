var inproccess = false;
$('body').delegate('.m_open', 'click', function (e) {
    e.preventDefault();
    if (!inproccess) {

        $('.modal').fadeOut(200);
        inproccess = true;
        $('#full_container').addClass('blurred');
        t_id = $(this).attr('href');

        target = $(t_id.replace('/', ''));

        if($(this).data("href") != undefined){
            target.find(".phote_modal").attr("src", $(this).data("href"));
            target.find("video").attr("src", $(this).data("href"));
        }

        target.css('opacity', 0);
        target.fadeIn(0);
        

        setTimeout(function () {
            secondStep(target);
        }, 450);

        
        setTimeout(function () {
            inproccess = false;
        }, 550);

    }
});

function secondStep(target){
    // console.log(target.height());
    
    target.css({
        'margin-left': target.outerWidth() / 2 * -1,
        'margin-top': target.height() / 2 * -1,
        'position': 'fixed',
        'opacity': 1
    });
    /*if ($(window).scrollTop() < 100) { 
        target.css('top', 100+$(window).height()/2);
    } else {
        target.css('top', $(window).scrollTop()+$(window).height()/2);
    }            */

    $('#overlay').fadeIn(300);
    target.fadeIn(300);
}

setTimeout('secondStep()',5000);

$('body').delegate('#overlay, .close', 'click', function (e) {
    if (!inproccess) {
        $('#overlay').fadeOut(400);
        $('.modal').fadeOut(200);
        inproccess = false;
        $(".modal_wrapper video")[0].pause()
    }
});

window.onload = function () {
    $(".modal_list_block").on('click', function (e) {
        var modal_list = $(this).closest(".modal_list_wrapper").find(".modal_list");


        modal_list.queue(function(nextFunction) {
            if(modal_list.css("display") == "none"){
                $(this).closest(".modal_list_wrapper").find(".modal_list_block svg").css("transform", "rotate(0deg)");
            } else {
                $(this).closest(".modal_list_wrapper").find(".modal_list_block svg").css("transform", "rotate(180deg)");
            }


            nextFunction();
        }).slideToggle();

    });
};