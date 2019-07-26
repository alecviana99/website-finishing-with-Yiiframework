<div class="jumbotron">

<?php
/* @var $this LivreController */
/* @var $model LIVRE */

/* $this->breadcrumbs=array(
	'Livres'=>array('index'),
	'Visualiser',
);

$this->menu=array(
	array('label'=>'List LIVRE', 'url'=>array('index')),
	array('label'=>'Create LIVRE', 'url'=>array('create')),
	array('label'=>'Update LIVRE', 'url'=>array('update', 'id'=>$model->ID_LIVRE)),
	array('label'=>'Delete LIVRE', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_LIVRE),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LIVRE', 'url'=>array('admin')),
); */
?>

<h1>Tome <?php echo $model->ID_LIVRE; ?> : <?php echo $model->LIV_TITRE; ?></h1>

<?php 

echo '<ul>';
	echo '<li><a href="../../../user/administration">Panneau d\'administration</a></li>';
	echo '<li><a href="../../../livre/admin">Gestion des livres</a></li>';
	echo '<li><a href="../../../livre/create">Créer un livre</a></li>';
echo '</ul>';

$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID_LIVRE',
		'LIV_TITRE',
		'id_categorie',
		'liv_couv',
		'LIV_AUTEUR',
		'LIV_NBPAGE',
		'LIV_DEMO',
		'LIV_SERVEUR',
	),
)); ?>

</div><!-- jumbotron -->