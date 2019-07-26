<?php
/* @var $this PausePauController */
/* @var $model PausePau */

$this->breadcrumbs=array(
	'Pause Paus'=>array('view'),
	$model->pau_id,
);

$this->menu=array(
	array('label'=>'List PausePau', 'url'=>array('index')),
	array('label'=>'Create PausePau', 'url'=>array('create')),
	array('label'=>'Update PausePau', 'url'=>array('update', 'id'=>$model->pau_id)),
	array('label'=>'Delete PausePau', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pau_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PausePau', 'url'=>array('admin')),
);
?>

<h1>Pause n°<?php echo $model->pau_id; ?></h1>
<p><?php echo '<a class="btn enext" href="../../../user/administration">Panneau d\'administration</a>';?></p>
</br>
<div style='text-align:justify; font-variant: small-caps; font-family:verdana; font-size:20px;'>
<?php echo $model->pau_phrase; ?>
</div>

<?php /* $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pau_id',
		'pau_phrase',
	),
));  */?>