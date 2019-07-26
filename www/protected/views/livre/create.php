<div class="jumbotron">

<?php
/* @var $this LivreController */
/* @var $model LIVRE */

/* $this->breadcrumbs=array(
	'Livres'=>array('index'),
	'Créer',
); */


/* echo $this->renderPartial('_menu', array(

		'list'=> array(
			
			CHtml::link(UserModule::t('Panneau d\'administration'),array('/user/profile')),
			

		),

	)); */


$this->menu=array(
	array('label'=>'Liste Livre', 'url'=>array('index')),
	array('label'=>'Gérer Livre', 'url'=>array('admin')),
);
?>

<h1>Créer un livre</h1>

<?php 
echo '<ul>';
	echo '<li><a href="../user/administration">Panneau d\'administration</a></li>';
	echo '<li><a href="../livre/admin">Gestion des livres</a></li>';
echo '</ul>';

$this->renderPartial('_form', array('model'=>$model)); ?>

</div> <!-- class jumbotron --!>