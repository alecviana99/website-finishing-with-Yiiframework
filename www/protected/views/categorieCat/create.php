<div class="jumbotron">

<?php
/* @var $this CategorieCatController */
/* @var $model CategorieCat */

/* $this->breadcrumbs=array(
	'Categorie Cats'=>array('index'),
	'Create',
); */

$this->menu=array(
	array('label'=>'List CategorieCat', 'url'=>array('index')),
	array('label'=>'Manage CategorieCat', 'url'=>array('admin')),
);
?>

<h1>Ajouter une catégorie</h1><br/>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

</div>