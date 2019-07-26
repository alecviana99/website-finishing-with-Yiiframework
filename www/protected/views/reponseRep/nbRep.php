<div class="jumbotron">
<?php $_SESSION['noRep']=0; ?>
<h1>Nombre de réponses</h1><br/>

	<form id='form' method='post' action='../../create/id/<?php echo $model->rep_id;?>'>		
		<table class="table-condensed table table-striped table-responsive">
			<tr><td><label for="nbRep">Nombre de réponses pour cette question : </label>	
			</td><td><input type="text" name="nbRep"></input><br/>		
			</td></tr></table><input type='submit' value='Valider'>		
		
	</form>

</div> <!-- jumborton --!>