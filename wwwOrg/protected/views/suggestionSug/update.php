<?php
/* @var $this SuggestionSugController */
/* @var $model SuggestionSug */

$this->breadcrumbs=array(
	'Suggestion Sugs'=>array('index'),
	$model->sug_id=>array('view','id'=>$model->sug_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SuggestionSug', 'url'=>array('index')),
	array('label'=>'Create SuggestionSug', 'url'=>array('create')),
	array('label'=>'View SuggestionSug', 'url'=>array('view', 'id'=>$model->sug_id)),
	array('label'=>'Manage SuggestionSug', 'url'=>array('admin')),
);
?>

<h1>Update SuggestionSug <?php echo $model->sug_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>