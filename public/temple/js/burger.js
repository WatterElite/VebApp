

// toggle sidebar

(function () {
	var toggle = $('.sidebar__toggle'),
		page = $('body'),
		sidebar = $('.sidebar'),
		headerToggle = $('.burger_svg_wrapper'),
		logo = $('.header__logo'),
		close = $('.sidebar__close');
	toggle.on('click', function () {
		sidebar.toggleClass('active');
		if(localStorage.getItem('sidebar') === "active"){
			localStorage.removeItem("sidebar");
		} else {
			localStorage.setItem('sidebar', "active");
		}
		page.toggleClass('wide');
		setTimeout(function () {
			$('.owl-carousel').trigger('refresh.owl.carousel');
		}, 200);
	});

	headerToggle.on('click', function () {
		console.log(1);
		sidebar.addClass('active');
		localStorage.setItem('sidebar', "active");
		page.addClass('toggle');
		logo.addClass('hidden');
		$('body').addClass('no-scroll');
		$('html').addClass('no-scroll');
	});

	close.on('click', function () {
		sidebar.removeClass('active');
		localStorage.removeItem("sidebar");
		page.removeClass('toggle');
		logo.removeClass('hidden');
		$('body').removeClass('no-scroll');
		$('html').removeClass('no-scroll');
	});

	if (window.matchMedia("(max-width: 767px)").matches) {
		(localStorage.getItem('sidebar') === "active" ? headerToggle.click() : '')
		console.log(1);
	} else {
		(localStorage.getItem('sidebar') === "active" ? toggle.click() : '')
	}
})();


(function(){
    const header = $('.sidebar__header_group'),
		  items = header.find('.header__item');
	
	items.each(function(){
		let item = $(this),
			head = item.find('.header__head'),
			body = item.find('.header__body');
		head.on('click', function(e){
			e.stopPropagation();

			if(!item.hasClass('active')){
				items.removeClass('active');
				item.addClass('active');
			}else{
				items.removeClass('active');
			}
		});

		body.on('click', function(e){
			e.stopPropagation();
		});

		$('body').on('click', function(){
			items.removeClass('active');
		});
	});
}());