<?php
/* @var $this SuggestionSugController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Suggestion Sugs',
);

$this->menu=array(
	array('label'=>'Create SuggestionSug', 'url'=>array('create')),
	array('label'=>'Manage SuggestionSug', 'url'=>array('admin')),
);
?>

<h1>Suggestion Sugs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
