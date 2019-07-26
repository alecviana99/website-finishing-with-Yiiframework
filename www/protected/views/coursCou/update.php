<div class="jumbotron">

<?php
/* @var $this CoursCouController */
/* @var $model CoursCou */



$this->menu=array(
	array('label'=>'List CoursCou', 'url'=>array('index')),
	array('label'=>'Create CoursCou', 'url'=>array('create')),
	array('label'=>'View CoursCou', 'url'=>array('view', 'id'=>$model->cou_id)),
	array('label'=>'Manage CoursCou', 'url'=>array('admin')),
);
?>

<h1>Modifier le cours <?php echo $model->cou_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

</div> <!-- jumborton --!>