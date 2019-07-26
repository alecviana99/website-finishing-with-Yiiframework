<div class="jumbotron">

<?php
/* @var $this ThemeThmController */
/* @var $model ThemeThm */

/* $this->breadcrumbs=array(
	'Theme Thms'=>array('index'),
	$model->thm_id=>array('view','id'=>$model->thm_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ThemeThm', 'url'=>array('index')),
	array('label'=>'Create ThemeThm', 'url'=>array('create')),
	array('label'=>'View ThemeThm', 'url'=>array('view', 'id'=>$model->thm_id)),
	array('label'=>'Manage ThemeThm', 'url'=>array('admin')),
); */
?>

<h1>Modifier le thème <?php echo $model->thm_id; ?></h1>

<?php 
echo '<ul>';
	echo '<li><a href="../../../user/administration">Panneau d\'administration</a></li>';
	echo '<li><a href="../../../themeThm/admin">Gestion des thèmes</a></li>';
	echo '<li><a href="../../../themeThm/create">Créer un thème</a></li>';
echo '</ul>';

$this->renderPartial('_form', array('model'=>$model)); ?>

</div> <!-- jumborton --!>