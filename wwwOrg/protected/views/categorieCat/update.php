<?php
/* @var $this CategorieCatController */
/* @var $model CategorieCat */

/* $this->breadcrumbs=array(
	'Categorie Cats'=>array('index'),
	$model->cat_id=>array('view','id'=>$model->cat_id),
	'Update',
); */

$this->menu=array(
	array('label'=>'List CategorieCat', 'url'=>array('index')),
	array('label'=>'Create CategorieCat', 'url'=>array('create')),
	array('label'=>'View CategorieCat', 'url'=>array('view', 'id'=>$model->cat_id)),
	array('label'=>'Manage CategorieCat', 'url'=>array('admin')),
);
?>

<h1>Modifier la catégorie "<?php echo $model->cat_libelle; ?>"</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>