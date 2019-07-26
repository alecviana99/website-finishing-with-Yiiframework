<div class="jumbotron">

<?php
/* @var $this ThemeThmController */
/* @var $model ThemeThm */

/* $this->breadcrumbs=array(
	'Theme Thms'=>array('index'),
	$model->thm_id,
);

$this->menu=array(
	array('label'=>'List ThemeThm', 'url'=>array('index')),
	array('label'=>'Create ThemeThm', 'url'=>array('create')),
	array('label'=>'Update ThemeThm', 'url'=>array('update', 'id'=>$model->thm_id)),
	array('label'=>'Delete ThemeThm', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->thm_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ThemeThm', 'url'=>array('admin')),
); */

?>

<h1>Visualiser le thème <?php echo $model->thm_id; ?></h1>

<?php 

echo '<ul>';
	echo '<li><a href="../../../user/profile">Panneau d\'administration</a></li>';
	echo '<li><a href="../../../themeThm/admin">Gestion des thèmes</a></li>';
	echo '<li><a href="../../../themeThm/update">Modifier le thème</a></li>';
echo '</ul>';


$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'thm_nom'
	),
)); ?>
</div> <!-- jumborton --!>