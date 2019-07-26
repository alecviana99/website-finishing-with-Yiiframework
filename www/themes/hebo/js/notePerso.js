$("document").ready(function(){
		$("#form").submit(function(e){
			$.post("/ciid/protected/controllers/QuestionQstController.php", function(data));
			e.preventDefault();
		});
});

function sendNote(){
	return false;
}
