<div class="jumbotron">
<?php
	$creditMan = CreditCre::model()->find('cre_iduser=:cre_iduser',
						array(
							':cre_iduser'=>Yii::app()->user->id,
						));	

	if(isset(Yii::app()->session['TraitementCredits']))
		unset(Yii::app()->session['TraitementCredits']);
	Yii::app()->session['TraitementCreditsCat'] = "Traitement ok";
	
	$heures=intval($creditMan->cre_credit / 3600);
	$minutes=intval(($creditMan->cre_credit % 3600) / 60);
	$secondes=intval((($creditMan->cre_credit % 3600) % 60));
	
	$categorie = CategorieCat::model()->findAll();
	echo "<h2>Distribution de crédits par catégorie d'employés</h2>";
	echo "<p>Cette page vous permet de distribuer un certain nombre de crédits de temps à chaque employés d'une même catégorie.</p>";
	echo "Votre crédit de temps est de : ". $creditMan->cre_credit. "<br/>";
	echo "Soit ". $heures. " heures : ". $minutes ." minutes : ". $secondes. " secondes<br/>";
	echo "<p>Veuillez sélectionner la catégorie d'employés à laquelle vous souhaitez distribuer des crédits";
	echo "<form  action=\"redistribuerCreditsCat2\" method=\"POST\">";
	echo "<div>";
	echo "<select name=\"DisParCat\">";
	foreach($categorie as $cat)
	{
		echo "<option value=\"".$cat->cat_id."\">".$cat->cat_libelle."</option>";
		
	}

	echo "</select></p>";
	echo "<p>Veuillez entrer le nombre de crédit à affecter à chaque employé de cette catégorie";
	echo "<br/><input type=text name='creditEmp' id='creditEmp'/>";
	echo "<br/><input type=\"submit\" value=\"Valider\" /></p> ";
	echo "</form>";
	echo "</div>";
	echo "<p><a class='enext' href='../manager'>";
	echo "Gérer ses employés";
	echo "</a></p>";
	

?>
</div>