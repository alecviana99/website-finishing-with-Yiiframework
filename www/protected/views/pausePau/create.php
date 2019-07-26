<div class="jumbotron">

<?php
/* @var $this PausePauController */
/* @var $model PausePau */


$this->menu=array(
	array('label'=>'List PausePau', 'url'=>array('index')),
	array('label'=>'Manage PausePau', 'url'=>array('admin')),
);
?>

<h1>Créer une pause</h1>

<?php 
echo '<ul>';
	echo '<li><a href="../user/administration">Panneau d\'administration</a></li>';
echo '</ul><br/>';
?>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

</div>