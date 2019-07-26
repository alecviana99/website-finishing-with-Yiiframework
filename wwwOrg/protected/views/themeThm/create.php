<div class="jumbotron">
<?php
/* @var $this ThemeThmController */
/* @var $model ThemeThm */
/* 
$this->breadcrumbs=array(
	'Theme Thms'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ThemeThm', 'url'=>array('index')),
	array('label'=>'Manage ThemeThm', 'url'=>array('admin')),
); */
?>

<h1>Créer un thème</h1>

<?php 
//echo '<ul>';
	echo '<a class="btn enext" href="../user/administration">Panneau d\'administration</a>';
	//echo '<li><a href="../themeThm/admin">Gestion des thèmes</a></li>';
//echo '</ul>';

$this->renderPartial('_form', array('model'=>$model)); ?>

</div> <!-- jumborton --!>