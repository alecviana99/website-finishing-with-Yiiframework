<div class="jumbotron">

<?php
/* @var $this ThemeThmController */
/* @var $model ThemeThm */

/* $this->breadcrumbs=array(
	'Theme Thms'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ThemeThm', 'url'=>array('index')),
	array('label'=>'Create ThemeThm', 'url'=>array('create')),
); */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#theme-thm-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestion des thèmes</h1>

<?php

	echo '<p><a class="btn enext" href="../user/administration">Panneau d\'administration</a></p>';
	//echo '<p><a class="btn enext" href="../../../themeThm/create">Créer un thème</a></p>';

?>
<?php echo CHtml::link('Recherche avancée','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'theme-thm-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'thm_nom',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>

</div> <!-- jumborton --!>