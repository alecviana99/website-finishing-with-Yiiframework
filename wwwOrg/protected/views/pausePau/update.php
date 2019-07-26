<?php
/* @var $this PausePauController */
/* @var $model PausePau */

$this->menu=array(
	array('label'=>'List PausePau', 'url'=>array('index')),
	array('label'=>'Create PausePau', 'url'=>array('create')),
	array('label'=>'View PausePau', 'url'=>array('view', 'id'=>$model->pau_id)),
	array('label'=>'Manage PausePau', 'url'=>array('admin')),
);
?>

<h1>Modifier la pause <?php echo $model->pau_id; ?></h1>

<?php 
echo '<ul>';
	echo '<li><a href="../../../user/administration">Panneau d\'administration</a></li>';
echo '</ul><br/>';
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>