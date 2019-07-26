<?php
/* @var $this CategorieCatController */
/* @var $model CategorieCat */
/* 
$this->breadcrumbs=array(
	'Categorie Cats'=>array('index'),
	'Manage',
); */

$this->menu=array(
	array('label'=>'List CategorieCat', 'url'=>array('index')),
	array('label'=>'Create CategorieCat', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#categorie-cat-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gestion des catégories</h1>



</div><!-- search-form -->

<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'categorie-cat-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'cat_id',
		'cat_libelle',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); 

?>
