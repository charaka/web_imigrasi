

$(document).ready(function ($) {

	$('.to-the-top').click(function(event) {
        event.preventDefault();
        $('html, body').animate({scrollTop: 0}, 600);
        return false;
    })


	if($('#shareNative').length > 0){
		$("#shareNative").jsSocials({
			shares: ["twitter", "facebook", "googleplus", "email"]

		});

	}
});

