<?php
/* @var $this CoursCouController */
/* @var $model CoursCou */

$themes = ThemeThm::model()->find('thm_id=:thm_id',
			array(
				':thm_id'=>$model->cou_id,
			));

$this->breadcrumbs=array(
	'Thèmes'=>array('themeThm/index'),
	$themes->thm_nom
	);
/*
$this->menu=array(
	array('label'=>'List CoursCou', 'url'=>array('index')),
	array('label'=>'Create CoursCou', 'url'=>array('create')),
	array('label'=>'Update CoursCou', 'url'=>array('update', 'id'=>$model->cou_id)),
	array('label'=>'Delete CoursCou', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cou_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CoursCou', 'url'=>array('admin')),
); */

$creditEmp = CreditCre::model()->find('cre_iduser=:cre_iduser',
			array(
				':cre_iduser'=>Yii::app()->user->id,
		));

if ($creditEmp->cre_credit>0)
	{
?>

		<h1>Thème : <?php echo $themes->thm_nom; ?></h1>
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
		
		//-----------------------FIN MISE A JOUR DU CREDIT DE TEMPS---------------------------------------

		$cous = CoursCou::model()->findAll();

		echo "<table style='width:100%'>";
		foreach ($cous as $cou){
			if($cou->cou_id!=-1&&$cou->thm_id==$model->cou_id){
				$theme = $cou->thm_id -1;
				$couleur = $theme;
				echo "<tr>";
					echo "<td>";
						//echo "<a class='elearning btn-success' href='../QuestionQst/viewFirstQDC?id=".$cou->cou_id."'>";
						echo "<a class='couleur".$couleur." elearning ' href='../QuestionQst/view?id=".$cou->cou_id."'>";
						echo $cou->cou_nom;
						echo "</a>";
					echo "</td>";
				echo "</tr>";
			}
		}
		echo "</table>";

		//tests--------------------------------------
		//echo 'tests : <br/>';
		$creditEmp = CreditCre::model()->find('cre_iduser=:cre_iduser',
			array(
				':cre_iduser'=>Yii::app()->user->id,
				
		));
		//var_dump($creditEmp->cre_credit);
		if ($creditEmp->cre_credit==0)
			echo "<script>alert(\"Vous manquez de credit\")</script>";
		
	}
	
else 
{
	$this->redirect(array('viewBuyCredit'));
} 

//tests--------------------------------------


?>