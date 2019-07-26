<?php
/* @var $this SuggestionSugController */
/* @var $model SuggestionSug */

$this->breadcrumbs=array(
	'Suggestion Sugs'=>array('index'),
	$model->sug_id,
);

$this->menu=array(
	array('label'=>'List SuggestionSug', 'url'=>array('index')),
	array('label'=>'Create SuggestionSug', 'url'=>array('create')),
	array('label'=>'Update SuggestionSug', 'url'=>array('update', 'id'=>$model->sug_id)),
	array('label'=>'Delete SuggestionSug', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->sug_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SuggestionSug', 'url'=>array('admin')),
);
?>

<h1>Suggestion n°<?php echo $model->sug_id; ?></h1>

<?php 

$question = QuestionQst::model()->find('qst_id=:qst_id',
			array(
				':qst_id'=>$model->qst_id,
			));

echo "Question: ".$question->qst_question;			
			
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'sug_id',
		'qst_id',
		'uti_id',
		'liv_id',
		'sug_texte',
		'sug_date',
	),
)); ?>
