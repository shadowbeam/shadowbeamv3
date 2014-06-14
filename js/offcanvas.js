$(document).ready(function () {

	$('[data-toggle=open-nav]').click(function () {
		$('body').toggleClass('open-nav');
	});

	/**
	* Controls the navigation
	*/
	var navigation = new function() {

		var currentSection = window.location.hash;
		var navbar = $('#navbar');
		var main = $('#main');


		main.scroll(function () {	scrolling() });
		$('.nav-up').click(function(e){ e.preventDefault(); nav_up() });
		$('.nav-down').click(function(e){ e.preventDefault(); nav_down() });


		$('.navbar a').click(function(e){
			e.preventDefault();
			e.stopImmediatePropagation();
			
			scrollTo($('' + $(this).attr('href')));
			setTimeout(function() {

				$('[data-toggle=open-nav]').click();
			}, 550);

		});

		// main.bind('scrollstop', function(e){
		// 	console.log('stop');
		// });

main.on( "scrollstop", function( event ) { 
	console.log('stop');

} );


document.onkeydown = function(e) {

	e = e || window.event;

	if (e.keyCode == '38') {
		e.preventDefault();
		e.stopImmediatePropagation();
		nav_up();
	}
	else if (e.keyCode == '40') {
		e.preventDefault();
		e.stopImmediatePropagation();
		nav_down();
	}
}


var scrollTo = function (section) {
	var scrollTop     = main.scrollTop(),
	offset = section.offset().top,
	distance = (offset + scrollTop);

	console.log(distance);
	main.animate({
		scrollTop: distance
	}, 500);

	updateSection(section);
}

		/**
		* What happens when scrolling
		*/
		var scrolling = function(){



			$('.section').each(function () {
				var distance = $(this).offset().top;
				var height = $(this).height();
				var bottom = distance + height;
				var section = '#' + $(this).attr('id');


				if (sectionVisible(distance, bottom, section)) {
					updateSection($(this));
					refreshNavbar(section);			
					return false;
				}
			});
		}

		/**
		* Refresh the navbar
		*/
		var refreshNavbar = function(section){
			navbar.find('a.active').toggleClass('active');
			navbar.find('a[href='+section+']').addClass('active');
		}

		/**
		* Determine whether a section is visible
		*/
		var sectionVisible = function(distance, bottom, section){
			var lim =  10;
			return (lim == distance && currentSection != section);
		}

		/**
		* Navigate up page
		*/
		var nav_up = function(){
			var prev = $(currentSection).prev();

			if(prev.size() != 0)
				scrollTo(prev);
		}

		/**
		* Navigate down page
		*/
		var nav_down = function(){

			var next = $(currentSection).next();

			if(next.size() != 0)
				scrollTo(next);

		}

		var updateSection = function (section) {
			currentSection = '#' + section.attr('id');
			history.replaceState(null, null, currentSection);
		}

		updateSection($('.section:first'));
		refreshNavbar(currentSection);


	};


});










