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


		// main.bind('scrollstop', function(e){
		// 	console.log('stop');
		// });

main.on( "scrollstop", function( event ) { 
	console.log('stop');
} );

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
					//currentSection = section;
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
			return ((distance < lim && distance > -1 * lim || bottom < lim && bottom > -1 * lim) && currentSection != section);
		}

		/**
		* Navigate up page
		*/
		var nav_up = function(){
			var prev = navbar.find('a.active').prev();
			if(prev.size() != 0){
				prev[0].click();
			}
		}

		/**
		* Navigate down page
		*/
		var nav_down = function(){

			var next = $(currentSection).next();
			var height = 0;

			$('.section').each(function(){
				
				if($(this).index() == next.index())
					return false;

				height = height + $(this).height();
				
			});

			if(next.size() != 0){
				main.animate({
					scrollTop: height
				}, 500);
				updateSection(next);			}


			}

			var updateSection = function (section) {
				currentSection = '#' + section.attr('id');
				history.replaceState(null, null, currentSection);
			}

			updateSection($('.section:first'));
			refreshNavbar(currentSection);


		};


	});










