 <div class="jumbotron">
 
 <form action="" method="POST">
	Nombre de crédits:<br>
	<input type="text" name="credit" value="">
	<br>
	<input type="submit" value="Valider">
</form> 

<?php 

	if(isset($_POST["credit"]))
	{
		$creditMan = CreditCre::model()->find('cre_iduser=:cre_iduser',
					array(
						':cre_iduser'=>Yii::app()->user->id,
					));
		
		$creHca = new HistoCreditsAchetesHca;			
		$creHca->uti_id=Yii::app()->user->id;
		$creHca->credits_hca=$_POST["credit"];
		$creHca->date_hca = date('Y-m-d H:i:s');
		$creHca->save();
		$creditMan->setAttribute("cre_credit", $creditMan->cre_credit + $_POST["credit"]);
		$creditMan->save();
		echo "ok";
	}
		
	echo "<a class='enext' href='../profile'>";
	echo "Revenir sur le profil";
	echo "</a>";

?>

</div>