function isScrollbarVisible(element) {
	return element.scrollHeight > window.innerHeight
}
function isTouchDevice() {
	return 'ontouchstart' in window || navigator.maxTouchPoints // navigator.maxTouchPoints works on IE10/11 and Surface
}

function handlerResize() {
	jQuery('html').removeClass('no-js').removeClass('scrollbar').removeClass('no-touch').removeClass('touch')
	if (isScrollbarVisible(document.body)) {
		jQuery('html').addClass('scrollbar')
	}
	if (isTouchDevice()) {
		jQuery('html').addClass('touch')
	} else {
		jQuery('html').addClass('no-touch')
	}
}

jQuery(($) => {
	$(window).on('resize.skazy', () => {
		handlerResize()
	}).trigger('resize.skazy')

	$('.js-counter').counter({duration: 4000})

	// button to show menu
	$('.js-show-menu').on('click.skazy', function (e) {
		e.preventDefault()
		$(this).toggleClass('open')
		$('.js-menu').toggleClass('open')
		$('body').toggleClass('menu-open')
	})

	// Show or hide sub item on menu on click
	$('.js-menu-sublist').hide(0)
	$('.js-menu-parent').on('click.skazy', function (e) {
		e.preventDefault()
		$(this).find('.js-menu-sublist').slideToggle()
		$(this).toggleClass('open')
	})

	// Init slider on banner for homepage
	$('.js-slider').slider({controls: false})

	// Dropdown for mod_aircalmap
	$('.js-dropdown').on('click.skazy', 'a', function (e) {
		e.preventDefault()
		$(this).parents('.js-dropdown').find('.js-dropdown-value').text($(this).text())
		$(this).parents('.js-dropdown').find('.js-dropdown-value').data('value', $(this).data('value'))
		$(this).parents('.js-dropdown').trigger('change')
	})
})
