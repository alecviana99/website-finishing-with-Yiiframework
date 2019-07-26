<div class="jumbotron">
<?php		
	if(is_Numeric($_POST["creditEmp"]) && $_POST["creditEmp"] != NULL)
	{	
		$criteria = new CDbCriteria;
				$criteria->select = 't.*';
				$criteria->join ='JOIN employeCat_empCat c ON c.uti_id = t.id';
				$criteria->condition = 'c.cat_id = :cat_id AND t.idcreateur=:idcreateur';
				$criteria->params = array(
										':idcreateur'=>Yii::app()->user->id,
										':cat_id'=>$_POST["DisParCat"],
										);
				
				$emps = TblUsers::model()->findAll(/* 'idcreateur=:idcreateur AND cat_id=:cat_id ',
						array(
							':idcreateur'=>Yii::app()->user->id,
							':cat_id'=>$_POST["DisParCat"],
												 
						) */$criteria);
		
				
		//$emps = null;
		$nbEmp = count($emps);
		
		
		if($nbEmp != null)
		{
			$creditMan = CreditCre::model()->find('cre_iduser=:cre_iduser',
						array(
							':cre_iduser'=>Yii::app()->user->id,
						));
			$creditManOk = $creditMan->cre_credit -  $_POST["creditEmp"];
			
			if($creditManOk > 0)
			{
				$creditManMod = $_POST["creditEmp"] - ($_POST["creditEmp"] % $nbEmp);
				
				if($creditManMod > 0)
				{
					Yii::app()->session['TraitementCreditsCat'] = "Traitement ok";
					Yii::app()->session['creditEmp'] = $_POST["creditEmp"];
					Yii::app()->session['DisParCat']  = $_POST["DisParCat"];
					$creditDis = $creditManMod / $nbEmp;
					echo "Voulez-vous confirmer la répartition de crédits de temps ? <br/> Vos crédits de temps sont de : ".$creditMan->cre_credit . "<br/> Pour ".$nbEmp." employé(s), répartir : ".$creditDis ." Crédits par employé pour un total de : ".$creditManMod;
					echo "<p><a class='enext' href='../manager/traitementDistributionCredits'>";
					echo "Oui";
					echo "</a>";
					echo "<a class='enext' href='../manager'>";
					echo "Non";
					echo "</a></p>";
				}
				else
				{
					echo "Répartition de crédits de temps impossible, vous n'avez pas assez de crédits de temps par employé!";
					echo "<p><a class='enext' href='../manager'>";
					echo "Gérer ses employés";
					echo "</a></p>";
				}
				
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
			echo "Action impossible, vous n'avez pas d'employé dans cette catégorie!";
			echo "<p><a class='enext' href='../manager'>";
			echo "Gérer ses employés";
			echo "</a></p>";
		}
	}
	else
	{
		echo "Répartition de crédits de temps déjà traitée ou impossible !";
		echo "<p><a class='enext' href='../manager'>";
		echo "Gérer ses employés";
		echo "</a></p>";	
	}
?>
</div>