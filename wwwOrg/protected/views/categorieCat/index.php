<?php
/* @var $this CategorieCatController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Categorie Cats',
);

$this->menu=array(
	array('label'=>'Create CategorieCat', 'url'=>array('create')),
	array('label'=>'Manage CategorieCat', 'url'=>array('admin')),
);
?>

<h1>Categorie Cats</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
