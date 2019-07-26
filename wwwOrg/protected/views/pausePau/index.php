<div class="jumbotron">

<?php
/* @var $this PausePauController */
/* @var $dataProvider CActiveDataProvider */

$this->menu=array(
	array('label'=>'Create PausePau', 'url'=>array('create')),
	array('label'=>'Manage PausePau', 'url'=>array('admin')),
);
?>

<h1>Liste des pauses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

</div>