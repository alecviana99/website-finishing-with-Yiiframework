<div class="jumbotron">

<?php
/* @var $this QuestionQstController */
/* @var $model QuestionQst */

/* $this->breadcrumbs=array(
	'Question Qsts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List QuestionQst', 'url'=>array('index')),
	array('label'=>'Manage QuestionQst', 'url'=>array('admin')),
); */
?>

<h1>Créer une Question</h1>

<p><?php echo '<a class="btn enext" href="../user/administration">Panneau d\'administration</a>';?></p>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

</div> <!-- jumborton --!>