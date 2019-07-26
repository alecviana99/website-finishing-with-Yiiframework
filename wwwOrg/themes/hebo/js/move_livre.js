$(document).ready(function(){
	
	document.onselectstart = new Function("return false");
	
	$(".test").click(function(e){
		e.preventDefault();
		
		$('html,body').animate({
			scrollTop:$('.sommaire').offset().top
		}, 800);
		return false;
	})
	
})