$(() => {
    if(checkIE()) {
        $('.isie').removeClass('hidden');
    }

    $('.close-isie').on('click', () => {
		$('.isie').addClass('hidden');
	})
})

const checkIE = () => {
    /* Sample function that returns boolean in case the browser is Internet Explorer*/
    let ua = navigator.userAgent;
    /* MSIE used to detect old browsers and Trident used to newer ones*/
    let is_ie = ua.indexOf("MSIE ") > -1 || ua.indexOf("Trident/") > -1;
    
    return is_ie; 
}