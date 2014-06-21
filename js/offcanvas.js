$(document).ready(function () {

	$('[data-toggle=open-nav]').click(function (e) {
		e.preventDefault();
		$('body').toggleClass('open-nav');
	});

	/* Resize event */
	$(window).resize(function() {
		if(this.resizeTO) clearTimeout(this.resizeTO);
		this.resizeTO = setTimeout(function() {
			$(this).trigger('resizeEnd');
			console.log('resizeEnd');
		}, 500);
	});

	/**
	* Controls the navigation
	*/
	var navigation = new function() {

		var currentSection = window.location.hash;
		var navbar = $('#navbar');
		var main = $('body');
		var section_dir = [];


		$(document).on('scroll', function (e){
			scrolling()
		});

		$('.nav-up').click(function(e){ e.preventDefault(); nav_up() });
		$('.nav-down').click(function(e){ e.preventDefault(); nav_down() });


		$('.navbar a').click(function(e){
			e.preventDefault();
			e.stopImmediatePropagation();
			
			scrollTo($('' + $(this).attr('href')));
			// setTimeout(function() {

			// 	$('[data-toggle=open-nav]').click();
			// }, 550);

	});

		// main.bind('scrollstop', function(e){
		// 	console.log('stop');
		// });

$(document).on( "scrollstop", function( event ) { 
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


var setupSections = function(){
	$('.section').each(function () {
		var newSection = new Section($(this), $(this).offset().top, $(this).height().y )
		var id = '#' + $(this).attr('id');

		section_dir[id] = newSection;

	});
}

$(window).on('resizeEnd', function() {
	updateSections();
});

var updateSections = function(){
	$.each(section_dir, function(key, value) {
		var section = value.section;
		value.height = section.height();
		value.offset = section.offset().top;
	});

}

/**
 * Scroll to a specific section
 */
 var scrollTo = function (section) {

 	var distance = section.offset().top;

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

				section_dir['#' + $(this).attr('id')] = $(this);

				// if (section != currentSection && $(this).visible( true )) {
				// 	updateSection($(this));
				// 	refreshNavbar(section);			
				// 	return false;
				// }
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
			var prev = $(currentSection).prev('section');

			if(prev.size() != 0)
				scrollTo(prev);
		}

		/**
		* Navigate down page
		*/
		var nav_down = function(){

			var next = $(currentSection).next('section');

			if(next.size() != 0)
				scrollTo(next);

		}

		var updateSection = function (section) {
			currentSection = '#' + section.attr('id');
			history.replaceState(null, null, currentSection);
		}

		

		/* 
		* Section Object 
		*/
		function Section(obj, offset, height) {
			this.obj = obj;
			this.offset = offset;
			this.height = height;
		}

		setupSections();
		updateSection($('.section:first'));
		refreshNavbar(currentSection);


	};


});










