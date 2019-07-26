<div class="jumbotron">

<?php
/* @var $this QuestionQstController */
/* @var $model QuestionQst */


$this->menu=array(
	array('label'=>'List QuestionQst', 'url'=>array('index')),
	array('label'=>'Create QuestionQst', 'url'=>array('create')),
	array('label'=>'View QuestionQst', 'url'=>array('view', 'id'=>$model->qst_id)),
	array('label'=>'Manage QuestionQst', 'url'=>array('admin')),
);
?>

<h1>Modifier la question <?php echo $model->qst_id; ?></h1>

<p><?php echo '<a class="btn enext" href="../../../user/administration">Panneau d\'administration</a>';?></p>
<br/>
<?php 
echo CHtml::button('Première question du cours', array('submit' => array('questionQst/premiereQst','id'=>$model->qst_id)));
?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>

</div> <!-- jumborton --!>