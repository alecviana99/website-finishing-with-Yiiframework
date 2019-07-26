<?php
/* @var $this CoursCouController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cours Cous',
);

$this->menu=array(
	array('label'=>'Create CoursCou', 'url'=>array('create')),
	array('label'=>'Manage CoursCou', 'url'=>array('admin')),
);
?>

<h1>Cours Cous</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
