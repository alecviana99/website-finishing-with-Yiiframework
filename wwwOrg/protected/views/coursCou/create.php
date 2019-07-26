<div class="jumbotron">

<?php
/* @var $this CoursCouController */
/* @var $model CoursCou */

/* $this->breadcrumbs=array(
	'Cours Cous'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CoursCou', 'url'=>array('index')),
	array('label'=>'Manage CoursCou', 'url'=>array('admin')),
); */
?>

<h1>Créer un cours</h1>

<p><?php echo '<a class="btn enext" href="../user/administration">Panneau d\'administration</a>';?></p>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

</div> <!-- jumborton --!>