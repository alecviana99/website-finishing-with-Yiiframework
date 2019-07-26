<?php
/* /* @var $this CoursCouController */
/* @var $model CoursCou */

/* $this->breadcrumbs=array(
	'Thèmes'=>array('themeThm/index'),
	$model->thm_id,
	); */ 
/*
$this->menu=array(
	array('label'=>'List CoursCou', 'url'=>array('index')),
	array('label'=>'Create CoursCou', 'url'=>array('create')),
	array('label'=>'Update CoursCou', 'url'=>array('update', 'id'=>$model->cou_id)),
	array('label'=>'Delete CoursCou', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->cou_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CoursCou', 'url'=>array('admin')),
); */
?>

<h1>Cours du thème <?php echo $model->thm_id; ?></h1>

<?php 

/* $cous = CoursCou::model()->findAll();

echo "<table>";
foreach ($cous as $cou){
	if($cou->cou_id!=-1&&$cou->thm_id==$model->thm_id){
		echo "<tr>";
		echo "<td>";
		echo "<a class='elearning btn-success' href='../CoursCou/viewFirstQDC?id=".$cou->cou_id."'>";
		echo $cou->cou_nom;
		echo "</a>";
		echo "</td>";
		echo "</tr>";
	}
}
echo "</table>"; */

?>