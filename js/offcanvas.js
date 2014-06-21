$(document).ready(function () {


	/* http://documentcloud.github.io/underscore/#throttle */
	throttle = function(func, wait, options) {
		var context, args, result;
		var timeout = null;
		var previous = 0;
		options || (options = {});
		var later = function() {
			previous = new Date;
			timeout = null;
			result = func.apply(context, args);
		};
		return function() {
			var now = new Date;
			if (!previous && options.leading === false) previous = now;
			var remaining = wait - (now - previous);
			context = this;
			args = arguments;
			if (remaining <= 0) {
				clearTimeout(timeout);
				timeout = null;
				previous = now;
				result = func.apply(context, args);
			} else if (!timeout && options.trailing !== false) {
				timeout = setTimeout(later, remaining);
			}
			return result;
		};
	};

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

		$('[data-toggle=open-nav]').click(function (e) {
			e.preventDefault();
			$('body').toggleClass('open-nav');
			updateCurrentSections
		});

		var currentSection = window.location.hash;
		var navbar = $('#navbar');
		var main = $('body');
		var section_dir = new Array();

		var throttled = throttle(function(){scrolling()}, 100);
		$(document).scroll(throttled);


	// 	$(document).on('scroll', function (e){

	// 		console.log('scrolling');

	// 	//	scrolling()
	// });

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
	

//	scrolling();


} );

/**
* Is a Section object on screen
*/
var onScreen = function(section){
	var top = $(document).scrollTop();
	return(top >= section.offset && top <= section.offset + section.height)
}


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
		var id = '#' + $(this).attr('id');
		var newSection = new Section($(this), $(this).offset().top, $(this).height(), id )

		section_dir[id.toString()] = newSection;

	});
}

$(window).on('resizeEnd', function() {
	updateCurrentSections();
});

var updateCurrentSections = function(){
	for (var o in section_dir) {
		var value = section_dir[o];

		value.height = value.section.height();
		value.offset = value.section.offset().top;
	}

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

 	updateCurrentSection(section);
 }

		/**
		* What happens when scrolling
		*/
		var scrolling = function(){

			if(!onScreen(section_dir[currentSection])){

				for (var o in section_dir) {
					var value = section_dir[o];

					if(value.id != currentSection && onScreen(value)){
						updateCurrentSection(value.obj);
						return false;
					}
				}

			}
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

		/**
		* Update the current section
		*/
		var updateCurrentSection = function (section) {
			currentSection = '#' + section.attr('id');
			history.replaceState(null, null, currentSection);
			refreshNavbar(currentSection);
		}

		

		/* 
		* Section Object 
		*/
		function Section(obj, offset, height, id) {
			this.obj = obj;
			this.offset = offset;
			this.height = height;
			this.id = id;
		}

		setupSections();
		updateCurrentSection($('.section:first'));
		


	};


});










