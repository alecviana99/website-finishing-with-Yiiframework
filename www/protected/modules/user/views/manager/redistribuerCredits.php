<div class="jumbotron">

<?php
	if(isset(Yii::app()->session['TraitementCreditsCat']))
		unset(Yii::app()->session['TraitementCreditsCat']);
	$emps = TblUsers::model()->findAll('idcreateur=:idcreateur',
			array(
				':idcreateur'=>Yii::app()->user->id,
			));
			
	//$emps = null;
	$nbEmp = count($emps);
	
	
	if($nbEmp != null)
	{
		$creditMan = CreditCre::model()->find('cre_iduser=:cre_iduser',
					array(
						':cre_iduser'=>Yii::app()->user->id,
					));
		
		$creditManMod = $creditMan->cre_credit - ($creditMan->cre_credit % $nbEmp);
		
		if($creditManMod > 0)
		{
			Yii::app()->session['TraitementCredits'] = "Traitement ok";
			$creditDis = $creditManMod / $nbEmp;
			
			$heures=intval($creditMan->cre_credit / 3600);
			$minutes=intval(($creditMan->cre_credit % 3600) / 60);
			$secondes=intval((($creditMan->cre_credit % 3600) % 60));
			
			$heuresDistrib=intval($creditDis / 3600);
			$minutesDistrib=intval(($creditDis % 3600) / 60);
			$secondesDistrib=intval((($creditDis % 3600) % 60));
			
			echo "Voulez-vous confirmer la répartition de crédits de temps ? <br/>";
			echo "Votre crédit de temps est de : ". $creditMan->cre_credit. "<br/>";
			echo "Soit ". $heures. " heures : ". $minutes ." minutes : ". $secondes. " secondes<br/>";
			echo "Pour ".$nbEmp." employé(s), répartir : ".$heuresDistrib." heures : ". $minutesDistrib ." minutes : ". $secondesDistrib. " secondes par employé";
			echo "<p><a class='enext' href='../manager/traitementDistributionCredits'>";
			echo "Oui";
			echo "</a>";
			echo "<a class='enext' href='../manager'>";
			echo "Non";
			echo "</a></p>";
		}
		else
		{
			echo "Répartition de crédits de temps impossible, vous n'avez pas assez de crédits de temps !";
			echo "<p><a class='enext' href='../manager'>";
			echo "Gérer ses employés";
			echo "</a></p>";
		}
		
	}
	else
	{
		echo "Action impossible, vous n'avez pas d'employé !";
		echo "<p><a class='enext' href='../manager'>";
		echo "Gérer ses employés";
		echo "</a></p>";
	}
?>
</div>