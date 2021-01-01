(($) => {
    const ua = navigator.userAgent

    // Detect by user agent if Android or Apple device
    function isAndroid() { // eslint-disable-line no-unused-vars
        return ua.match('Android')
    }

    function isIOS() {
        return ua.match('iPad') ||
            ua.match('iPhone') ||
            ua.match('iPod')
    }

    // Detect by width of viewport if we are on mobile
    function mobileMedia() {
        if ('matchMedia' in window && window.matchMedia(`(max-width:${breakpoint}px)`).matches) {
            return true
        }
        return false
    }

    // Detect touch device if we can create touch event
    function touchDevice() {
        try {
            document.createEvent('TouchEvent')
            return true
        } catch (e) {
            return false
        }
    }
})(jQuery)
