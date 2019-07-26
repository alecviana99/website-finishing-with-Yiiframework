<div class="jumbotron">

<?php

//------------------------MISE A JOUR DU CREDIT DE TEMPS----------------------------------------
		if(isset(Yii::app()->session['time']))
		{
			
			$creditEmp = CreditCre::model()->find('cre_iduser=:cre_iduser',
			array(
				':cre_iduser'=>Yii::app()->user->id,
			));
			
			$newCredit = $creditEmp->cre_credit - (time() - Yii::app()->session['time']);
			if($newCredit<0){
				$newCredit = 0;	 
			}
			
			$creditEmp->setAttribute("cre_credit", $newCredit);
			$creditEmp->save();
			unset(Yii::app()->session['time']);
		}
	
	//-----------------------FIN MISE A JOUR DU CREDIT DE TEMPS-------------------------------------

 /*@var $this LivreController 
 @var $model LIVRE */

/* 	$this->breadcrumbs=array(
		'Livres'=>array('index'),
		'Visualiser',
	); */
	echo "<h1>Livres :</h1>";
	echo "<a class='enext' href='../QuestionQst/viewQstSuit?id=".Yii::app()->session['qst']."'>";
	echo "Retouner à la dernière question";
	echo "</a>";

	
?>
<?php
	$creditEmp = CreditCre::model()->find('cre_iduser=:cre_iduser',	array(':cre_iduser'=>Yii::app()->user->id,	));		
	if ($creditEmp->cre_credit>0)	{
		
		$livres = LIVRE::model()->findAll();
		echo "<div style='margin-left:20%; margin-right:20%'>";
		foreach ($livres as $liv){

				
				//echo "<p><a href='".$liv->LIV_DEMO."'>";
				//echo "<a href='viewLivre?id=".$liv->ID_LIVRE."'>";
				echo "<a class='btn enext paneauadmin' href='viewLivre?id=".$liv->ID_LIVRE."'>" . $liv->LIV_TITRE."</a>";
				//echo "</a>";

		}
		echo "</div>";
	}
	else
	{
		echo "<h1>Cette page n'est accessible qu'aux membres possédant encore du crédit!</h1>";
	}
	
/* include_once "Tome1.html"; */
	
?>

</div>