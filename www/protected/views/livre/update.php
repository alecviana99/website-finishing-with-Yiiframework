<div class="jumbotron">

<?php
/* @var $this LivreController */
/* @var $model LIVRE */

/* $this->breadcrumbs=array(
	'Livres'=>array('index'),
	$model->ID_LIVRE=>array('view','id'=>$model->ID_LIVRE),
	'Update',
);

$this->menu=array(
	array('label'=>'List LIVRE', 'url'=>array('index')),
	array('label'=>'Create LIVRE', 'url'=>array('create')),
	array('label'=>'View LIVRE', 'url'=>array('view', 'id'=>$model->ID_LIVRE)),
	array('label'=>'Manage LIVRE', 'url'=>array('admin')),
); */
?>

<h1>Modifier le tome <?php echo $model->ID_LIVRE; ?></h1>
<?php
echo '<ul>';
	echo '<li><a href="../../../user/administration">Panneau d\'administration</a></li>';
	echo '<li><a href="../../../livre/admin">Gestion des livres</a></li>';
	echo '<li><a href="../../../livre/create">Créer un livre</a></li>';
echo '</ul>';

 $this->renderPartial('_form', array('model'=>$model)); ?>
 
 </div>