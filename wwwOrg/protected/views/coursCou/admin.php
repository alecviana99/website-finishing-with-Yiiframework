<div class="jumbotron">

<?php
/* @var $this CoursCouController */
/* @var $model CoursCou */

/* $this->breadcrumbs=array(
	'Cours Cous'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CoursCou', 'url'=>array('index')),
	array('label'=>'Create CoursCou', 'url'=>array('create')),
); */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cours-cou-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestion des cours</h1>

<?php 

	echo '<p><a class="btn enext" href="../user/administration">Panneau d\'administration</a></p>';
	//echo '<li><a href="../coursCou/create">Créer un cours</a></li>';
?>
<?php echo CHtml::link('Recherche avancée','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cours-cou-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'thm_id'=>array(
            'name' => 'thm_id',
			'header'=>'Thèmes',
			'value' => '$data->Thm->Thm Nom',
			'filter'=> CHtml::listData(ThemeThm::model()->findAll("thm_id <> -1"), 'thm_id', 'thm_nom'),
            ),
		'cou_nom',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div> <!-- jumborton --!>