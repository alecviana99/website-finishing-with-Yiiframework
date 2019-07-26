<div class="jumbotron">

<?php
/* @var $this LivreController */
/* @var $model LIVRE */

/* $this->breadcrumbs=array(
	'Livres'=>array('index'),
	'Gestion',
);

$this->menu=array(
	array('label'=>'List LIVRE', 'url'=>array('index')),
	array('label'=>'Create LIVRE', 'url'=>array('create')),
); 

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#livre-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");*/

?>

<h1>Gestion des livres</h1>


<?php 

echo '<ul>';
	echo '<li><a href="../user/administration">Panneau d\'administration</a></li>';
	echo '<li><a href="../livre/create">Créer un livre</a></li>';
echo '</ul>';

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'livre-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'ID_LIVRE',
		'LIV_TITRE',
		'LIV_AUTEUR',
		'LIV_NBPAGE',
		'LIV_DEMO',

		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div> <!-- jumborton --!>