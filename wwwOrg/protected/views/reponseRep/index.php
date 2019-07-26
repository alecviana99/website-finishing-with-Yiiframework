<?php
/* @var $this ReponseRepController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Reponse Reps',
);

$this->menu=array(
	array('label'=>'Create ReponseRep', 'url'=>array('create')),
	array('label'=>'Manage ReponseRep', 'url'=>array('admin')),
);
?>

<h1>Reponse Reps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
