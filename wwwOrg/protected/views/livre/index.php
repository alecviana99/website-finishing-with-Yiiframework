<?php

	//------------------------MISE A JOUR DU CREDIT DE TEMPS----------------------------------------
	
		if(isset(Yii::app()->session['time']))
		{
			$creditEmp = CreditCre::model()->find('cre_iduser=:cre_iduser',
			array(
				':cre_iduser'=>Yii::app()->user->id,
			));
			
			$newCredit = $creditEmp->cre_credit - (time() - Yii::app()->session['time']);
			if($newCredit<0){
				$newCredit = 0;	 
			}
			
			$creditEmp->setAttribute("cre_credit", $newCredit);
			$creditEmp->save();
			unset(Yii::app()->session['time']);
		}
	
	//-----------------------FIN MISE A JOUR DU CREDIT DE TEMPS-------------------------------------

/* @var $this LivreController */
/* @var $dataProvider CActiveDataProvider */



$this->menu=array(
	array('label'=>'Créer Livre', 'url'=>array('create')),
	array('label'=>'Gérer Livre', 'url'=>array('admin')),
);

/*Bout de code html empêchant la sélection.
﻿<style>::selection{background-color: transparent;}</style>
<script>
        document.onselectstart = new Function("return false");
</script>*/
?>

<?php 
if($_GET["view"]=="grh"){
	echo '<h1>Livres GRH:</h1>
<h2>Prix unique: 25.00€</h2>
    <div class="price-table clear col3">';
	$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view'
));

} else if($_GET["view"]=="autres"){
	echo '<h1>Nos autres livres:</h1>
	<h2>Prix unique: 15.00€</h2>
    <div class="price-table clear col3">';
	$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_viewAutres'));
} else {
	echo "Merci de choisir une catégorie de livres";
}
?>


	</div>
