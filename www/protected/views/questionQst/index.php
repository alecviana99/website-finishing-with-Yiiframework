<?php
/* @var $this QuestionQstController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Question Qsts',
);

$this->menu=array(
	array('label'=>'Create QuestionQst', 'url'=>array('create')),
	array('label'=>'Manage QuestionQst', 'url'=>array('admin')),
);
?>

<h1>Question Qsts</h1>

<?php /*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); */

$qsts = QuestionQst::model()->findAll();
foreach ($qsts as $qst){
	echo "<a href='../ThemeThm/viewWithCours?id=".$qst->cou->thm->thm_id."'>";
	echo $qst->cou->thm->thm_nom;
	echo "</a>";
}



/* $qst = QuestionQst::model()->findAll(); 

echo "<table>";
foreach ($qst as $key => $value) {
	echo "<tr>
	<td>".$value->qst_id."</td>
	<td>".$value->qst_question."</td>		
	</tr>";
}
echo "</table>"; */



//$this->renderPartial('create', array('model'=>$model));
?>
