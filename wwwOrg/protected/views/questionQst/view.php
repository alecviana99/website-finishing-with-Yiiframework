<?php
/* @var $this QuestionQstController */
/* @var $model QuestionQst */
	$creditEmp = CreditCre::model()->find('cre_iduser=:cre_iduser',
	array(
		':cre_iduser'=>Yii::app()->user->id,
		
	));

	if ($creditEmp->cre_credit>0)
	{
		$cours = CoursCou::model()->find('cou_id=:cou_id',
			array(
				':cou_id'=>$model->qst_id,
			));
		$themes = ThemeThm::model()->find('thm_id=:thm_id',
			array(
				':thm_id'=>$cours->thm_id,
			));
		$this->breadcrumbs=array(
			'Thèmes'=>array('themeThm/index'),
			$themes->thm_nom.''=>array('CoursCou/viewCours?id='.$cours->thm_id),
			$cours->cou_nom
		);
		$model->cou_id = $model->qst_id
/* $couleur = $themes->thm_id -1; */
/* echo "<div class='couleur".$couleur."'>";  */
/* echo "<div>";
echo "</div>";   */
?>
<?php
$couleur = $themes->thm_id -1; 
/* echo "<div class='couleur".$couleur."'>";  */ 

$listecours = CoursCou::model()->findAll('thm_id=:thm_id',
			array(
				':thm_id'=>$cours->thm_id,
			));

$i=0;
foreach($listecours as $num)
{
	$i++;
	if($num->cou_id==$cours->cou_id)
		Yii::app()->session['noCours']=$i;
}

?>


<h1>Cours : <?php echo $cours->cou_nom; ?></h1>

<?php
 
	/*var_dump($model->cou_id);
	echo "</br>";
	var_dump(Yii::app()->user->id);*/
		$histoQ = HistoQuestionHqs::model()->find('uti_id=:uti_id AND cou_id=:cou_id',
		array(
			':uti_id'=>Yii::app()->user->id,
			':cou_id'=>$model->cou_id,
		));

		if(isset(Yii::app()->session['time']))
			unset(Yii::app()->session['time']);
		
		//var_dump($histoQ);
		
		if($histoQ->cou_id == NULL)
			$this->redirect(array('viewFirstQDC?id='.$model->cou_id));
		else{
			echo "<table class='ereprise'>";
				echo "<tr>";
					echo "<td><a  class='ereprise2 couleur".$couleur." elearning' href='../QuestionQst/viewQstSuit?id=".$histoQ->qst_id."'>Reprendre votre progression</a></tr>";
					echo "<td><a  class='ereprise2 couleur".$couleur." elearning' href='../QuestionQst/viewFirstQDC?id=".$model->cou_id."'>Oublier la session sauvegardée et recommencer depuis le début</a></tr>";
				echo "</tr>";
			echo "</table>";
		}
	}
	else{
		$this->redirect(array('themeThm/viewBuyCredit'));
	}
/* echo "</div>"; */
?>
