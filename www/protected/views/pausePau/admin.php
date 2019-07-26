<div class="jumbotron">

<?php
/* @var $this PausePauController */
/* @var $model PausePau */

/* $this->breadcrumbs=array(
	'Pause Paus'=>array('index'),
	'Manage',
); */

$this->menu=array(
	array('label'=>'List PausePau', 'url'=>array('index')),
	array('label'=>'Create PausePau', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#pause-pau-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestion des pauses</h1>

<?php 

echo '<ul>';
	echo '<li><a href="../user/administration">Panneau d\'administration</a></li>';
	echo '<li><a href="../pausePau/create">Créer une pause</a></li>';
echo '</ul>';
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pause-pau-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'pau_phrase',
		array(
			'class'=>'CButtonColumn',
			'viewButtonUrl'=>'Yii::app()->createUrl(\'pausePau/viewPause/id/\'. $data->pau_id)'
		),
	),
)); ?>

</div>
