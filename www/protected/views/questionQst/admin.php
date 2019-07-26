<div class="jumbotron">

<?php
/* @var $this QuestionQstController */
/* @var $model QuestionQst */

/* $this->breadcrumbs=array(
	'Question Qsts'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List QuestionQst', 'url'=>array('index')),
	array('label'=>'Create QuestionQst', 'url'=>array('create')),
); */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#question-qst-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestion des questions</h1>

<p><?php echo '<a class="btn enext" href="../user/administration">Panneau d\'administration</a>';?></p>

<?php /* echo CHtml::link('Recherche avancée','#',array('class'=>'search-button')); */ ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); 

?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'question-qst-grid',
	'dataProvider'=>$model->search(),
	'enablePagination'=>true,
	'filter'=>$model,
	
	'columns'=>array(
		'cou_id'=>array(
            'name' => 'cou_id',
			'header'=>'Cours',
			'value' => '$data->cou->Cou Nom',
			'filter'=> CHtml::listData(CoursCou::model()->findAll("cou_id <> -1"), 'cou_id', 'cou_nom','thm.thm_nom')
            ),
		'qst_question',
		'qst_id',
		array(
			'class'=>'CButtonColumn',
			'viewButtonUrl'=>'Yii::app()->createUrl(\'questionQst/viewQstSuit?id=\'. $data->qst_id)',
		),
	),
));

//var_dump($questions->qst_id);
/* var_dump $data */  ?>


</div> <!-- jumborton --!>