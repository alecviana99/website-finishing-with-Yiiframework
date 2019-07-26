<?php
/* @var $this PausePauController */
/* @var $model PausePau */

/*$this->breadcrumbs=array(
	'Pause Paus'=>array('index'),
	$model->pau_id,
);*/

/*$this->menu=array(
	array('label'=>'List PausePau', 'url'=>array('index')),
	array('label'=>'Create PausePau', 'url'=>array('create')),
	array('label'=>'Update PausePau', 'url'=>array('update', 'id'=>$model->pau_id)),
	array('label'=>'Delete PausePau', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pau_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PausePau', 'url'=>array('admin')),
);*/
?>
<div class="jumbotron">
<h1>Pause !</h1>
<br/>

<?php 
	
	
	if(isset(Yii::app()->session['time']))
	{
		$creditEmp = CreditCre::model()->find('cre_iduser=:cre_iduser',
		array(
			':cre_iduser'=>Yii::app()->user->id,
		));
		
		//var_dump($creditEmp->cre_credit);
		
		$newCredit = $creditEmp->cre_credit - (time() - Yii::app()->session['time']);
		
		if($newCredit<0){
			$newCredit = 0;		 
		}
		
		$creditEmp->setAttribute("cre_credit", $newCredit);
		$creditEmp->save();
		unset(Yii::app()->session['time']);
	}
	
	
	
	$pauses = PausePau::model()->findAll();
	$count = count ( $pauses );

	echo "<a class='enext' href='../pausePau/view'>";
	echo "Changer de citation";
	echo "</a>";	

if(!isset(Yii::app()->session['qst'])){
	echo "<a class='enext' href='../../../themeThm/'>";
	echo "Liste des thèmes";
	echo "</a><div style='text-align:justify; font-variant: small-caps; font-family:verdana; font-size:20px;'> ";
}else{
	echo "<a class='enext' href='../QuestionQst/viewQstSuit?id=".Yii::app()->session['qst']."'>";
	echo "Retouner à la dernière question";
	echo "</a><div style='text-align:justify; font-variant: small-caps; font-family:verdana; font-size:20px;'> ";
}
	
	$rand = rand ( 1 , $count );
	foreach($pauses as $pause)
	{
		if($rand == $pause->pau_id)
			echo $pause->pau_phrase;
	}
	echo "</div>";
 ?>
</div>