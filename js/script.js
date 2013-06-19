$(function(){
	$(".page-scroller").click(function (){
		$('html, body').animate({
			scrollTop: $("html, body").offset().top
		}, 1000);
	});
});
