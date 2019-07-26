<?php
/* @var $this CategorieCatController */
/* @var $model CategorieCat */

/* $this->breadcrumbs=array(
	'Categorie Cats'=>array('admin'),
	$model->cat_id,
);
 */
$this->menu=array(
	array('label'=>'List CategorieCat', 'url'=>array('index')),
	array('label'=>'Create CategorieCat', 'url'=>array('create')),
	array('label'=>'Update CategorieCat', 'url'=>array('update', 'id'=>$model->cat_id)),
	array('label'=>'Delete CategorieCat', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cat_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CategorieCat', 'url'=>array('admin')),
);
?>

<h1>Categorie "<?php echo $model->cat_libelle; ?>"</h1>

<p><?php echo '<a class="btn enext" href="../../../user/administration">Panneau d\'administration</a>';?></p>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cat_id',
		'cat_libelle',
	),
)); ?>
