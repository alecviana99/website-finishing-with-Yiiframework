<div class="jumbotron">

<?php
/* @var $this ReponseRepController */
/* @var $model ReponseRep */

/* $this->breadcrumbs=array(
	'Reponse Reps'=>array('index'),
	$model->rep_id=>array('view','id'=>$model->rep_id),
	'Update',
); */

$this->menu=array(
	array('label'=>'List ReponseRep', 'url'=>array('index')),
	array('label'=>'Create ReponseRep', 'url'=>array('create')),
	array('label'=>'View ReponseRep', 'url'=>array('view', 'id'=>$model->rep_id)),
	array('label'=>'Manage ReponseRep', 'url'=>array('admin')),
);
?>

<h1>Modifier la réponse <?php echo $model->rep_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

</div> <!-- jumborton --!>