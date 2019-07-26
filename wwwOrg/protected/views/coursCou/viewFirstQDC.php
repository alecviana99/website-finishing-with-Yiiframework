<?php
/* @var $this QuestionQstController */
/* @var $model QuestionQst */

 $this->breadcrumbs=array(
	'Thèmes'=>array('themeThm/index'),
	'Cours'=>array('themeThm/viewDuTheme?id='.$model->thm_id),
	$model->cou_id
);

/*
$this->menu=array(
	array('label'=>'List QuestionQst', 'url'=>array('index')),
	array('label'=>'Create QuestionQst', 'url'=>array('create')),
	array('label'=>'Update QuestionQst', 'url'=>array('update', 'id'=>$model->qst_id)),
	array('label'=>'Delete QuestionQst', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->qst_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage QuestionQst', 'url'=>array('admin')),
); */
?>

<h1>Questions du cours <?php echo $model->cou_id; ?></h1>

<?php 

$qsts = QuestionQst::model()->findAll();
$reps = ReponseRep::model()->findAll();

echo "<table>";
$found = false;
foreach ($qsts as $qst){
	if (!$found){
		if($qst->qst_id!=-1&&$qst->cou_id==$model->cou_id){
			echo "<tr>";
			echo "<td>";
			echo $qst->qst_question;
			echo "</td>";
			echo "</tr>";
			echo "<tr>";
			foreach ($reps as $rep){
				if($rep->qst_id==$qst->qst_id){
					echo "<td>";
					echo "<a href='../QuestionQst/viewQstSuit?id=".$rep->qst_redirID."'>";
					if($rep->rep_texte == null || $rep->rep_texte == "")
					{
						echo "Suivante";
					}
					else
					{
						echo $rep->rep_texte;
					}
					echo "</a>";
					echo "</td>";
				}
			}
			echo "</tr>";
			
			echo "<tr>";
			echo "<td>";
				 Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/rebours.js'); 
			echo "</td>";
			echo "</tr>";
			
			$found = true;
		}
	}
}
echo "</table>";

?>