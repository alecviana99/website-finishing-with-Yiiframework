<?php
/* @var $this SuggestionSugController */
/* @var $model SuggestionSug */

$this->breadcrumbs=array(
	'Suggestion Sugs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SuggestionSug', 'url'=>array('index')),
	array('label'=>'Manage SuggestionSug', 'url'=>array('admin')),
);
?>

<h1>Create SuggestionSug</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>