<div class="jumbotron">
<?php
$this->breadcrumbs=array(
	UserModule::t('Users')=>array('manager'),
	UserModule::t('Manage'),
);

$creditMan = CreditCre::model()->find('cre_iduser=:cre_iduser',
						array(
							':cre_iduser'=>Yii::app()->user->id,
						));
	
$temps_formation = User::model()->find('id=:id',
						array(
							':id'=>Yii::app()->user->id,
						));	
/*$heures=intval($creditMan->cre_credit / 3600);
$minutes=intval(($creditMan->cre_credit % 3600) / 60);
$secondes=intval((($creditMan->cre_credit % 3600) % 60));
*/

$heures = $temps_formation->heures_formation;
$minutes = $temps_formation->minutes_formation;
$secondes = $temps_formation->secondes_formation;
$credit_secondes = $temps_formation->tempsActuel_formation;

?>
<h1><?php echo UserModule::t("Gérer ses employés"); ?></h1>
<p><?php //echo "Vous disposez de : ".$creditMan->cre_credit." crédits de temps"; ?></p>

<p><?php echo "Vous disposez de : ".$credit_secondes." crédits de temps"; ?></p>
<p><?php echo "Soit ". $heures." heures : ". $minutes ." minutes : ". $secondes. " secondes"; ?></p>

<?php echo $this->renderPartial('_menu', array(
		'list'=> array(
			CHtml::link(UserModule::t('Créer un employé'),array('create')),
			CHtml::link(UserModule::t('Distribuer les crédits de temps équitablement aux employés'),array('redistribuerCredits')),
			CHtml::link(UserModule::t('Distribuer les crédits de temps par catégorie'),array('redistribuerCreditsCat')),
		),
	));
?>

<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'dataProvider'=>$dataProvider, 
		'columns'=>array(
			array(
				'name' => 'id',
				'type'=>'raw',
				'value' => 'CHtml::link(CHtml::encode($data->id),array("manager/view","id"=>$data->id))',
			),
			array(
				'name' => 'username',
				'type'=>'raw',
				'value' => 'CHtml::link(CHtml::encode($data->username),array("manager/view","id"=>$data->id))',
			),
			array(
				'name'=>'email',
				'type'=>'raw',
				'value'=>'CHtml::link(CHtml::encode($data->email), "mailto:".$data->email)',
			),
			array(
				'name' => 'createtime',
				'value' => '$data->createtime',
			),
			array(
				'name' => 'lastvisit',
				'value' => '(($data->lastvisit)?$data->lastvisit:UserModule::t("Not visited"))',
			),
			array(
				'name'=>'status',
				'value'=>'User::itemAlias("UserStatus",$data->status)',
			),
			// array(
				// 'name'=>'manager',
				// 'value'=>'User::itemAlias("ManagerStatus",$data->manager)',
			// ),
			//array(
			//	'name'=>'Crédit de temps',
			//	'value'=>'creditTemps(CHtml::encode($data->id))',
			//	'htmlOptions'=>array('width'=>'42px'),
			//	'headerHtmlOptions' => array('style' => 'width: 75px;'),
			//),
			
			array(
			'name'=>'Crédit de temps',
			'value'=>'CHtml::encode($data->heures_formation."h:".$data->minutes_formation."min:".$data->secondes_formation."s")',
			'htmlOptions'=>array('width'=>'42px'),
			'headerHtmlOptions' => array('style' => 'width: 75px;'),
			),
			
			array(
				'name'=>'Crédits distribués',
				'value'=>'creditTempsDis(CHtml::encode($data->id))',
			),
			
			array(
				 'name'=>'Catégorie',
				 'value'=>'CHtml::encode($data->lacategorie)', 
			 ),
/* 			array(
				'name'=>'manager',
				'value'=>'User::itemAlias("ManagerStatus",$data->manager)',
			),
			array(
				'name'=>'employe',
				'value'=>'User::itemAlias("EmployeStatus",$data->employe)',
			), */
			array(
				'class'=>'CButtonColumn',
			),
			
		),
));

function creditTemps($id)
{
	$creditEmp = CreditCre::model()->find('cre_iduser=:cre_iduser',
		array(
			':cre_iduser'=>$id,
	));
	$creEmp = $creditEmp->cre_credit;
	if($creEmp == null)
		$creEmp = "Table introuvable";
	
	$heures=intval($creEmp / 3600);
	$minutes=intval(($creEmp % 3600) / 60);
	$secondes=intval((($creEmp % 3600) % 60));
	return $heures."h:". $minutes ."min:". $secondes. "s";
	
	//return $creEmp; //Retourne le crédit en secondes
}

function creditTempsDis($id)
{
	$creditEmpDis = HistoCreditsHcr::model()->find('uti_id=:uti_id',
		array(
			':uti_id'=>$id,
	));
	$creDis = $creditEmpDis->hcr_creditTotal;
	if($creDis == null)
		$creDis = "Table introuvable";
	
	$heuresDis=intval($creDis / 3600);
	$minutesDis=intval(($creDis % 3600) / 60);
	$secondesDis=intval((($creDis % 3600) % 60));
	return $heuresDis."h:". $minutesDis ."min:". $secondesDis. "s";
	
	//return $creDis;
}

function creditTempsReste($id)
{
	$creditEmp = CreditCre::model()->find('cre_iduser=:cre_iduser',
		array(
			':cre_iduser'=>$id,
	));
	$creEmp = $creditEmp->cre_credit;
	if($creEmp == null)
		$creEmp = "Table introuvable";
	
	$creditEmpDis = HistoCreditsHcr::model()->find('uti_id=:uti_id',
		array(
			':uti_id'=>$id,
	));
	$creDis = $creditEmpDis->hcr_creditTotal;
	if($creDis == null)
		$creDis = "Table introuvable";
	
	$creReste = $creDis - $creEmp;
	
	$heuresReste=intval($creReste / 3600);
	$minutesReste=intval(($creReste % 3600) / 60);
	$secondesReste=intval((($creReste % 3600) % 60));
	return $heuresReste."h:". $minutesReste ."min:". $secondesReste. "s";
	
	//return $creEmp; //Retourne le crédit en secondes
}

function catEmploye($id)
{
	$empCat = EmployeCatEmpCat::model()->find('uti_id=:uti_id',
		array(
			':uti_id'=>$id,
	));	
	if($empCat == null)
		return "Table introuvable";
	else
	{
		$categorie = CategorieCat::model()->find('cat_id=:cat_id',
			array(
				':cat_id'=>$empCat->cat_id,
		));
		if($categorie == null)
			return "La catégorie n'existe plus";
		else
			return $categorie->cat_libelle;
	}
}
?>
</div>