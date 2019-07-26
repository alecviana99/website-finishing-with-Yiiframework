<div class="jumbotron">

<?php
/* @var $this ReponseRepController */
/* @var $model ReponseRep */


$this->menu=array(
	array('label'=>'List ReponseRep', 'url'=>array('index')),
	array('label'=>'Create ReponseRep', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#reponse-rep-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestion des réponses</h1>

<p><?php echo '<a class="btn enext" href="../user/administration">Panneau d\'administration</a>';?></p>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reponse-rep-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'rep_id',
		'qst_id',
		'qst_redirID',
		'rep_texte',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

</div> <!-- jumborton --!>