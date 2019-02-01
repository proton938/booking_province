jQuery(function($) {

	//Preloader
	var preloader = $('.preloader');
	$(window).load(function(){
		preloader.remove();
	});

	//#main-slider
	var slideHeight = $(window).height();
	$('#home-slider .item').css('height',slideHeight);

	$(window).resize(function(){'use strict',
		$('#home-slider .item').css('height',slideHeight);
	});
	
	//Scroll Menu
	$(window).on('scroll', function(){
		if( $(window).scrollTop()>slideHeight ){
			$('.main-nav').addClass('navbar-fixed-top');
		} else {
			$('.main-nav').removeClass('navbar-fixed-top');
		}
	});
	
	// Navigation Scroll
	$(window).scroll(function(event) {
		Scroll();
	});

	$('.navbar-collapse ul li a').on('click', function() {  
		$('html, body').animate({scrollTop: $(this.hash).offset().top - 5}, 1000);
		return false;
	});

	// User define function
	function Scroll() {
		var contentTop      =   [];
		var contentBottom   =   [];
		var winTop      =   $(window).scrollTop();
		var rangeTop    =   200;
		var rangeBottom =   500;
		$('.navbar-collapse').find('.scroll a').each(function(){
			contentTop.push( $( $(this).attr('href') ).offset().top);
			contentBottom.push( $( $(this).attr('href') ).offset().top + $( $(this).attr('href') ).height() );
		})
		$.each( contentTop, function(i){
			if ( winTop > contentTop[i] - rangeTop ){
				$('.navbar-collapse li.scroll')
				.removeClass('active')
				.eq(i).addClass('active');			
			}
		})
	};

	$('#tohash').on('click', function(){
		$('html, body').animate({scrollTop: $(this.hash).offset().top - 5}, 1000);
		return false;
	});
	
	//Initiat WOW JS
	new WOW().init();
	//smoothScroll
	smoothScroll.init();
	
	// Progress Bar
	$('#about-us').bind('inview', function(event, visible, visiblePartX, visiblePartY) {
		if (visible) {
			$.each($('div.progress-bar'),function(){
				$(this).css('width', $(this).attr('aria-valuetransitiongoal')+'%');
			});
			$(this).unbind('inview');
		}
	});

	//Countdown
	$('#features').bind('inview', function(event, visible, visiblePartX, visiblePartY) {
		if (visible) {
			$(this).find('.timer').each(function () {
				var $this = $(this);
				$({ Counter: 0 }).animate({ Counter: $this.text() }, {
					duration: 2000,
					easing: 'swing',
					step: function () {
						$this.text(Math.ceil(this.Counter));
					}
				});
			});
			$(this).unbind('inview');
		}
	});
	
	
	

	// Portfolio Single View
	$('#portfolio').on('click','.folio-read-more',function(event){
		event.preventDefault();
		var link = $(this).data('single_url');
		var full_url = '#portfolio-single-wrap',
		parts = full_url.split("#"),
		trgt = parts[1],
		target_top = $("#"+trgt).offset().top;

		$('html, body').animate({scrollTop:target_top}, 600);
		$('#portfolio-single').slideUp(500, function(){
			$(this).load(link,function(){
				$(this).slideDown(500);
			});
		});
	});

	// Close Portfolio Single View
	$('#portfolio-single-wrap').on('click', '.close-folio-item',function(event) {
		event.preventDefault();
		var full_url = '#portfolio',
		parts = full_url.split("#"),
		trgt = parts[1],
		target_offset = $("#"+trgt).offset(),
		target_top = target_offset.top;
		$('html, body').animate({scrollTop:target_top}, 600);
		$("#portfolio-single").slideUp(500);
	});
	
	
	
	
	// House_price Single View
	$('#house_price').on('click','.folio-read-more',function(event){
		event.preventDefault();
		var link = $(this).data('single_url');
		var full_url = '#house_price-single-wrap',
		parts = full_url.split("#"),
		trgt = parts[1],
		target_top = $("#"+trgt).offset().top;

		$('html, body').animate({scrollTop:target_top}, 600);
		$('#house_price-single').slideUp(500, function(){
			$(this).load(link,function(){
				$(this).slideDown(500);
			});
		});
	});

	// Close House_price Single View
	$('#house_price-single-wrap').on('click', '.close-folio-item',function(event) {
		event.preventDefault();
		var full_url = '#house_price',
		parts = full_url.split("#"),
		trgt = parts[1],
		target_offset = $("#"+trgt).offset(),
		target_top = target_offset.top;
		$('html, body').animate({scrollTop:target_top}, 600);
		$("#house_price-single").slideUp(500);
	});
	
	
	
	
	
	
	// restorans Single View
	$('#restorans').on('click','.folio-read-more',function(event){
		event.preventDefault();
		var link = $(this).data('single_url');
		var full_url = '#restorans-single-wrap',
		parts = full_url.split("#"),
		trgt = parts[1],
		target_top = $("#"+trgt).offset().top;

		$('html, body').animate({scrollTop:target_top}, 600);
		$('#restorans-single').slideUp(500, function(){
			$(this).load(link,function(){
				$(this).slideDown(500);
			});
		});
	});

	// Close restorans Single View
	$('#restorans-single-wrap').on('click', '.close-folio-item',function(event) {
		event.preventDefault();
		var full_url = '#restorans',
		parts = full_url.split("#"),
		trgt = parts[1],
		target_offset = $("#"+trgt).offset(),
		target_top = target_offset.top;
		$('html, body').animate({scrollTop:target_top}, 600);
		$("#restorans-single").slideUp(500);
	});
	
	
	
	
	
	
	// services Single View
	$('#services').on('click','.folio-read-more',function(event){
		event.preventDefault();
		var link = $(this).data('single_url');
		var full_url = '#services-single-wrap',
		parts = full_url.split("#"),
		trgt = parts[1],
		target_top = $("#"+trgt).offset().top;

		$('html, body').animate({scrollTop:target_top}, 600);
		$('#services-single').slideUp(500, function(){
			$(this).load(link,function(){
				$(this).slideDown(500);
			});
		});
	});

	// Close services Single View
	$('#services-single-wrap').on('click', '.close-folio-item',function(event) {
		event.preventDefault();
		var full_url = '#services',
		parts = full_url.split("#"),
		trgt = parts[1],
		target_offset = $("#"+trgt).offset(),
		target_top = target_offset.top;
		$('html, body').animate({scrollTop:target_top}, 600);
		$("#services-single").slideUp(500);
	});
	
	
	
	
	
	

	// Contact form
	var form = $('#main-contact-form');
	form.submit(function(event){
		event.preventDefault();
		var form_status = $('<div class="form_status"></div>');
		$.ajax({
			url: $(this).attr('action'),
			beforeSend: function(){
				form.prepend( form_status.html('<p><i class="fa fa-spinner fa-spin"></i> Email is sending...</p>').fadeIn() );
			}
		}).done(function(data){
			form_status.html('<p class="text-success">Thank you for contact us. As early as possible  we will contact you</p>').delay(3000).fadeOut();
		});
	});

	//Google Map
	var latitude = $('#google-map').data('latitude')
	var longitude = $('#google-map').data('longitude')
	function initialize_map() {
		var myLatlng = new google.maps.LatLng(latitude,longitude);
		var mapOptions = {
			zoom: 14,
			scrollwheel: false,
			center: myLatlng
		};
		var map = new google.maps.Map(document.getElementById('google-map'), mapOptions);
		var contentString = '';
		var infowindow = new google.maps.InfoWindow({
			content: '<div class="map-content"><ul class="address">' + $('.address').html() + '</ul></div>'
		});
		var marker = new google.maps.Marker({
			position: myLatlng,
			map: map
		});
		google.maps.event.addListener(marker, 'click', function() {
			infowindow.open(map,marker);
		});
	}
	google.maps.event.addDomListener(window, 'load', initialize_map);
	
});





 



window.onscroll = function()
	{
		var coord = window.pageYOffset;															/* определяем текущее положение скролла на странице */
		var screen_width = screen.width;   														// определяем текущую ширину окна браузера
		var screen_height = screen.height;   													// определяем высоту экрана	
		
			
							
		
		
		
		// анимации в блоке питание
			
		var usability = document.getElementById("usability");
		usability = usability.offsetTop;                                       /* определяем положение блока по вертикали */
		
		
		
		var usability_height = document.getElementById("usability");
		usability_height = usability_height.clientHeight;												// определяем высоту раздела	
			
			
			
			
												// анимация заголовка блока питание
								
		condition = coord + screen_height;				// отступ с учетом высоты экрана
		condition_top = coord - 400;							// отступ без учета высоты экрана
		
		if (usability <=  condition)
			{
				if (usability > condition_top)
					{
						document.getElementById("header_usability").style.letterSpacing = 1 + "px";
						document.getElementById("header_usability").style.opacity = 1;
					}
				else
					{
						document.getElementById("header_usability").style.letterSpacing = 50 + "px";
						document.getElementById("header_usability").style.opacity = 0;
					}
			}
		else
			{
				document.getElementById("header_usability").style.letterSpacing = 50 + "px";
				document.getElementById("header_usability").style.opacity = 0;
			}
			
			
			
									// анимация текста приглашения
								
		condition = coord + screen_height;				// отступ с учетом высоты экрана
		condition_top = coord - 400;							// отступ без учета высоты экрана
			
		
		if (usability <=  condition)
			{
				if (usability > condition_top)
					{
						document.getElementById("invitation").style.letterSpacing = 2 + "px";
						document.getElementById("invitation").style.opacity = 1;
					}
				else
					{
						document.getElementById("invitation").style.letterSpacing = 10 + "px";
						document.getElementById("invitation").style.opacity = 0;
					}
			}
		else
			{
				document.getElementById("invitation").style.letterSpacing = 10 + "px";
				document.getElementById("invitation").style.opacity = 0;
			}
			
								// анимация картинок
								
		var condition = coord + screen_height - 700;								// отступ с учетом высоты экрана
		var condition_top = coord - 600;											// отступ без учета высоты экрана
		
		if (usability <= condition)
			{
				if (usability > condition_top)
					{	
						document.getElementById("restoran_right_fon").style.opacity= 0.5;
						
						document.getElementById("logo_restoran").style.top= 34 + "%"; 
						document.getElementById("logo_restoran").style.opacity= 1; 
						
						document.getElementById("kril_bufaro").style.top= 12 + "%";
						document.getElementById("kril_bufaro").style.left= 42.5 + "%";
						document.getElementById("kril_bufaro").style.width= 15 + "%";
						document.getElementById("kril_bufaro").style.opacity= 1;
						
						document.getElementById("indeyka_ananas").style.top= 17 + "%";
						document.getElementById("indeyka_ananas").style.left= 27 + "%";
						document.getElementById("indeyka_ananas").style.width= 15 + "%";
						document.getElementById("indeyka_ananas").style.opacity= 1;
						
						document.getElementById("blue_more").style.top= 17 + "%";
						document.getElementById("blue_more").style.left= 58 + "%";
						document.getElementById("blue_more").style.width= 15 + "%";
						document.getElementById("blue_more").style.opacity= 1;
						
						document.getElementById("palitra_syr").style.top= 39 + "%";
						document.getElementById("palitra_syr").style.left= 65 + "%";
						document.getElementById("palitra_syr").style.width= 15 + "%";
						document.getElementById("palitra_syr").style.opacity= 1;
						
						document.getElementById("losos_ovosh").style.top= 39 + "%";
						document.getElementById("losos_ovosh").style.left= 20 + "%";
						document.getElementById("losos_ovosh").style.width= 15 + "%";
						document.getElementById("losos_ovosh").style.opacity= 1;
						
						document.getElementById("ruletiky_lavash").style.top= 62 + "%";
						document.getElementById("ruletiky_lavash").style.left= 27 + "%";
						document.getElementById("ruletiky_lavash").style.width= 15 + "%";
						document.getElementById("ruletiky_lavash").style.opacity= 1;
						
						document.getElementById("fish_assorty").style.top= 62 + "%";
						document.getElementById("fish_assorty").style.left= 58 + "%";
						document.getElementById("fish_assorty").style.width= 15 + "%";
						document.getElementById("fish_assorty").style.opacity= 1;
						
						document.getElementById("ruletiky_turnir").style.top= 63 + "%";
						document.getElementById("ruletiky_turnir").style.left= 42.5 + "%";
						document.getElementById("ruletiky_turnir").style.width= 15 + "%";
						document.getElementById("ruletiky_turnir").style.opacity= 1;
					}
				else
					{
						document.getElementById("restoran_right_fon").style.opacity= 0;
						
						document.getElementById("logo_restoran").style.top= 66 + "%"; 
						document.getElementById("logo_restoran").style.opacity= 0;
						
						document.getElementById("kril_bufaro").style.top= 62 + "%";
						document.getElementById("kril_bufaro").style.left= 49 + "%";
						document.getElementById("kril_bufaro").style.width= 1 + "%";
						document.getElementById("kril_bufaro").style.opacity= 0;
						
						document.getElementById("indeyka_ananas").style.top= 62 + "%";
						document.getElementById("indeyka_ananas").style.left= 49 + "%";
						document.getElementById("indeyka_ananas").style.width= 1 + "%";
						document.getElementById("indeyka_ananas").style.opacity= 0;
						
						document.getElementById("blue_more").style.top= 62 + "%";
						document.getElementById("blue_more").style.left= 49 + "%";
						document.getElementById("blue_more").style.width= 1 + "%";
						document.getElementById("blue_more").style.opacity= 0;
						
						document.getElementById("palitra_syr").style.top= 62 + "%";
						document.getElementById("palitra_syr").style.left= 49 + "%";
						document.getElementById("palitra_syr").style.width= 1 + "%";
						document.getElementById("palitra_syr").style.opacity= 0;
						
						document.getElementById("losos_ovosh").style.top= 62 + "%";
						document.getElementById("losos_ovosh").style.left= 49 + "%";
						document.getElementById("losos_ovosh").style.width= 1 + "%";
						document.getElementById("losos_ovosh").style.opacity= 0;
						
						document.getElementById("ruletiky_lavash").style.top= 62 + "%";
						document.getElementById("ruletiky_lavash").style.left= 49 + "%";
						document.getElementById("ruletiky_lavash").style.width= 1 + "%";
						document.getElementById("ruletiky_lavash").style.opacity= 0;
						
						document.getElementById("fish_assorty").style.top= 62 + "%";
						document.getElementById("fish_assorty").style.left= 49 + "%";
						document.getElementById("fish_assorty").style.width= 1 + "%";
						document.getElementById("fish_assorty").style.opacity= 0;
						
						document.getElementById("ruletiky_turnir").style.top= 62 + "%";
						document.getElementById("ruletiky_turnir").style.left= 49 + "%";
						document.getElementById("ruletiky_turnir").style.width= 1 + "%";
						document.getElementById("ruletiky_turnir").style.opacity= 0;
					}
			}
		else
			{
				document.getElementById("restoran_right_fon").style.opacity= 0;
				
				document.getElementById("logo_restoran").style.top= 12 + "%"; 
				document.getElementById("logo_restoran").style.opacity= 0; 
				
				document.getElementById("kril_bufaro").style.top= 15 + "%";
				document.getElementById("kril_bufaro").style.left= 49 + "%";
				document.getElementById("kril_bufaro").style.width= 1 + "%";
				document.getElementById("kril_bufaro").style.opacity= 0;
				
				document.getElementById("indeyka_ananas").style.top= 15 + "%";
				document.getElementById("indeyka_ananas").style.left= 49 + "%";
				document.getElementById("indeyka_ananas").style.width= 1 + "%";
				document.getElementById("indeyka_ananas").style.opacity= 0;
				
				document.getElementById("blue_more").style.top= 15 + "%";
				document.getElementById("blue_more").style.left= 49 + "%";
				document.getElementById("blue_more").style.width= 1 + "%";
				document.getElementById("blue_more").style.opacity= 0;
				
				document.getElementById("palitra_syr").style.top= 15 + "%";
				document.getElementById("palitra_syr").style.left= 49 + "%";
				document.getElementById("palitra_syr").style.width= 1 + "%";
				document.getElementById("palitra_syr").style.opacity= 0;
				
				document.getElementById("losos_ovosh").style.top= 15 + "%";
				document.getElementById("losos_ovosh").style.left= 49 + "%";
				document.getElementById("losos_ovosh").style.width= 1 + "%";
				document.getElementById("losos_ovosh").style.opacity= 0;
				
				document.getElementById("ruletiky_lavash").style.top= 15 + "%";
				document.getElementById("ruletiky_lavash").style.left= 49 + "%";
				document.getElementById("ruletiky_lavash").style.width= 1 + "%";
				document.getElementById("ruletiky_lavash").style.opacity= 0;
				
				document.getElementById("fish_assorty").style.top= 15 + "%";
				document.getElementById("fish_assorty").style.left= 49 + "%";
				document.getElementById("fish_assorty").style.width= 1 + "%";
				document.getElementById("fish_assorty").style.opacity= 0;
				
				document.getElementById("ruletiky_turnir").style.top= 15 + "%";
				document.getElementById("ruletiky_turnir").style.left= 49 + "%";
				document.getElementById("ruletiky_turnir").style.width= 1 + "%";
				document.getElementById("ruletiky_turnir").style.opacity= 0;
			}
						
	
	}


	
	
	
	
	
	
	
	
	
