<?php
/* @var $this ThemeThmController */
/* @var $model ThemeThm */

$this->breadcrumbs=array(
	'Theme Thms'=>array('index'),
	$model->thm_id,
);

$this->menu=array(
	array('label'=>'List ThemeThm', 'url'=>array('index')),
	array('label'=>'Create ThemeThm', 'url'=>array('create')),
	array('label'=>'Update ThemeThm', 'url'=>array('update', 'id'=>$model->thm_id)),
	array('label'=>'Delete ThemeThm', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->thm_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ThemeThm', 'url'=>array('admin')),
);
?>

<h1>Cours du thème n°<?php echo $model->thm_id; ?></h1>

<?php /* $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'thm_id',
		'thm_nom'
	),
)); */ 
$thms = CoursCou::model()->findAll();
foreach ($thms as $thm){
	if($thm->thm_id==$model->thm_id)
	{
		echo "</br>".$thm->cou_nom;
	}
}

?>