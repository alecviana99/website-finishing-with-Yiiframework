<div class="jumbotron">

<?php		
	
	if(isset(Yii::app()->session['TraitementCredits']))
	{
		$emps = TblUsers::model()->findAll('idcreateur=:idcreateur',
				array(
					':idcreateur'=>Yii::app()->user->id,
				));
		$creditMan = CreditCre::model()->find('cre_iduser=:cre_iduser',
						array(
							':cre_iduser'=>Yii::app()->user->id,
						));
		$nbEmp = count($emps);
		$creditManMod = $creditMan->cre_credit - ($creditMan->cre_credit % $nbEmp);
		$creditDis = $creditManMod / $nbEmp;
		//var_dump($creditMan->cre_credit);

		foreach($emps as $emp)
		{
			$creditsEmp = CreditCre::model()->find('cre_iduser=:cre_iduser',
				array(
						':cre_iduser'=>$emp->id,
					));
			$newCreditsEmp = $creditsEmp->cre_credit + $creditDis;
			$creditsEmp->setAttribute("cre_credit", $newCreditsEmp);
			$creditsEmp->save();
			$creditMan->setAttribute("cre_credit", $creditMan->cre_credit - $creditDis);
			$creditMan->save();
			$creditEmpDis = HistoCreditsHcr::model()->find('uti_id=:uti_id',
							array(
								':uti_id'=>$emp->id,
							));
			$creditEmpDis->setAttribute("hcr_creditTotal", $creditEmpDis->hcr_creditTotal + $creditDis);
			$creditEmpDis->save();
			
		}	
		unset(Yii::app()->session['TraitementCredits']);
		echo "Répartition de crédits de temps reussie !";
		echo "<p><a class='enext' href='../manager'>";
		echo "Gérer ses employés";
		echo "</a></p>";
		
	}
	else if(isset(Yii::app()->session['TraitementCreditsCat']))
	{
		
			
				/*var_dump($_POST["DisParCat"]);
				var_dump($_POST["creditEmp"]);
				var_dump(Yii::app()->session['creditEmp']);
				var_dump(Yii::app()->session['DisParCat']);*/
				$DisParCat = Yii::app()->session['DisParCat'];
				$creditEmpIn = Yii::app()->session['creditEmp'];
				/*
				SELECT * FROM `tbl_users` tbl
				join employeCat_empCat ec on
				tbl.id = ec.uti_id
				WHERE idcreateur = 51 
				AND ec.cat_id = 1
				*/
				$criteria = new CDbCriteria;
				$criteria->select = 't.*';
				$criteria->join ='JOIN employeCat_empCat c ON c.uti_id = t.id';
				$criteria->condition = 'c.cat_id = :cat_id AND t.idcreateur=:idcreateur';
				$criteria->params = array(
										':idcreateur'=>Yii::app()->user->id,
										':cat_id'=>$DisParCat,
										);
				
				$emps = TblUsers::model()->findAll(/* 'idcreateur=:idcreateur AND cat_id=:cat_id ',
						array(
							':idcreateur'=>Yii::app()->user->id,
							':cat_id'=>$_POST["DisParCat"],
												 
						) */$criteria);
						
						
				$creditMan = CreditCre::model()->find('cre_iduser=:cre_iduser',
						array(
							':cre_iduser'=>Yii::app()->user->id,
						));		
						
				$nbEmp = count($emps);
				$creditManMod = $creditEmpIn - ($creditEmpIn % $nbEmp);
				$creditDis = $creditManMod / $nbEmp;		
				
				foreach($emps as $emp)
				{
					$creditsEmp = CreditCre::model()->find('cre_iduser=:cre_iduser',
						array(
								':cre_iduser'=>$emp->id,
							));
					$newCreditsEmp = $creditsEmp->cre_credit + $creditDis;
					$creditsEmp->setAttribute("cre_credit", $newCreditsEmp);
					$creditsEmp->save();
					$creditMan->setAttribute("cre_credit", $creditMan->cre_credit - $creditDis);
					$creditMan->save();
					$creditEmpDis = HistoCreditsHcr::model()->find('uti_id=:uti_id',
									array(
										':uti_id'=>$emp->id,
									));
					$creditEmpDis->setAttribute("hcr_creditTotal", $creditEmpDis->hcr_creditTotal + $creditDis);
					$creditEmpDis->save();
					
				}
						
				/*foreach($emps as $emp)
				{
					echo "<br/>";
					echo $emp->username;
				}*/
				//die();
				unset(Yii::app()->session['TraitementCreditsCat']);
				unset(Yii::app()->session['creditEmp']);
				unset(Yii::app()->session['DisParCat']);
				echo "Répartition de crédits de temps reussie !";
				echo "<p><a class='enext' href='../manager'>";
				echo "Gérer ses employés";
				echo "</a></p>";
						
			
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