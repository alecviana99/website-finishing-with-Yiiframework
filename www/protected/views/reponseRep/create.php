<div class="jumbotron">

<?php
/* @var $this ReponseRepController */
/* @var $model ReponseRep */

/* $this->breadcrumbs=array(
	'Reponse Reps'=>array('index'),
	'Create',
); */

$this->menu=array(
	array('label'=>'List ReponseRep', 'url'=>array('index')),
	array('label'=>'Manage ReponseRep', 'url'=>array('admin')),
);
?>

<h1>Créer nouvelle réponse</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

</div> <!-- jumborton --!>