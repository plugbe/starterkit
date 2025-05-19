$(() => {
	initBase();
})


const initBase = () => {
	if (!$.cookie('noShowPrivacy')){
		cookie();
	}

	if($('#hiddenmodal').length) {
		if(!$.cookie('hideModal')) {
			popup();
		}
	}
}

const cookie = () => {
	$('#privacypolicy').addClass("active");
	setTimeout(function(){ 
		$('#privacypolicy').removeClass("active"); 
		$.cookie('noShowPrivacy', true, {expires: 31});
	}, 5000);

	$('#privacypolicy .privacy-btn').click(function(e){
		//console.log("click");
		e.preventDefault();
		$('#privacypolicy').removeClass("active");
	});
}

const popup = () => {
	const popup = Fancybox.show([{
		src: "#hiddenmodal",
		type: "inline",
		touch: false,
	}]);


	popup.on('shouldClose', () => {
		$.cookie('hideModal', true, {expires: 1});
	})
}