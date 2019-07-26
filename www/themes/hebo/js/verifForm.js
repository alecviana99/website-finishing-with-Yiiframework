var re = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})/;

$(document).ready(function(){
	
	//$(location).attr('href',"http://leekwars.com/");
	$('#mailExp').blur(function(){
			var mailExp = $('#mailExp').val();
		   if (re.test(mailExp)==true){
				$("#mailExp").css({"borderColor" : "green"});
		   }else{
				$("#mailExp").css({"borderColor" : "red"});
		   }
	});

	$('#nomExp').blur(function(){
		var nomExp = $('#nomExp').val();
			if ( nomExp.trim() == ""){
				$("#nomExp").css({"borderColor" : "red"});
			}else {
				$("#nomExp").css({"borderColor" : "green"});
		}

	});
	
	$('#messageExp').blur(function(){
		var messageExp = $('#messageExp').val();
			if ( messageExp.trim() == ""){
				$("#messageExp").css({"borderColor" : "red"});
			}else {
				$("#messageExp").css({"borderColor" : "green"});
		}

	});
	
	
	$('#form_con').submit(function(){
		var mailExp = $('#mailExp').val();
		var nomExp = $('#nomExp').val();
		var messageExp = $('#messageExp').val();

		if( nomExp.trim() == ""){
			alert("Champ nom non-rempli.");
		}
		if(messageExp.trim() == ""){
			alert("Champ message non-rempli.");
		}
	});
})