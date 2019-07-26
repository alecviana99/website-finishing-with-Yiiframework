<div class="jumbotron">

<?php
/* @var $this ReponseRepController */
/* @var $model ReponseRep */

/* $this->breadcrumbs=array(
	'Reponse Reps'=>array('index'),
	$model->rep_id,
); */

$this->menu=array(
	array('label'=>'List ReponseRep', 'url'=>array('index')),
	array('label'=>'Create ReponseRep', 'url'=>array('create')),
	array('label'=>'Update ReponseRep', 'url'=>array('update', 'id'=>$model->rep_id)),
	array('label'=>'Delete ReponseRep', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->rep_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ReponseRep', 'url'=>array('admin')),
);
?>

<h1>Visualiser la réponse <?php echo $model->rep_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'rep_id',
		'qst_id',
		'qst_redirID',
		'rep_texte',
	),
)); ?>

</div> <!-- jumborton --!>