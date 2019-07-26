<div class="jumbotron">
<?php
/* @var $this CoursCouController */
/* @var $model CoursCou */

/* $this->breadcrumbs=array(
	'Cours Cous'=>array('index'),
	$model->cou_id,
);

$this->menu=array(
	array('label'=>'List CoursCou', 'url'=>array('index')),
	array('label'=>'Create CoursCou', 'url'=>array('create')),
	array('label'=>'Update CoursCou', 'url'=>array('update', 'id'=>$model->cou_id)),
	array('label'=>'Delete CoursCou', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cou_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CoursCou', 'url'=>array('admin')),
); */
?>

<h1>Cours <?php echo $model->cou_id; ?> du thème <?php echo $model->thm_id; ?> </h1>

<?php 

echo '<ul>';
	echo '<li><a href="../../../user/profile">Panneau d\'administration</a></li>';
	echo '<li><a href="../../../coursCou/admin">Gestion des cours</a></li>';
	echo '<li><a href="../coursCou/update/id='.$model->cou_id.'">Modifier le cours</a></li>';
echo '</ul>';

$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cou_id',
		'thm_id',
		'cou_nom',
	),
));

?>
</div> <!-- jumborton --!>