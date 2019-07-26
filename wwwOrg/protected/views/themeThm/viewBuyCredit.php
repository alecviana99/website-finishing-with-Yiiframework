<?php
/* @var $this ThemeThmController */
/* @var $dataProvider CActiveDataProvider */

/*  $this->breadcrumbs=array(
	'Theme Thms',
); 

$this->menu=array(
	array('label'=>'Create ThemeThm', 'url'=>array('create')),
	array('label'=>'Manage ThemeThm', 'url'=>array('admin')),
); 
 */
	function displayOffresELearning(){
?>
		<div id="divPresentationEL">
			<p>Notre e-learning est un moyen privilégié afin d'apprendre la GRH à vos employés. L'apprentissage avance au rythme de chacun, puisque nous ne vous proposons que la réflexion. C'est vous qui faîtes la démarche d'apprendre. Vous pouvez par conséquent revenir aux questions précédentes comme vous le souhaiter, sauter des sections, vous arrêter au milieu d'une session pour reprendre plus tard là où vous en étiez. De plus, vous disposez d'un accès libre aux livres que nous proposons également.</p>
			<h2>Découvrez nos tarifs : </h2>
			<div class="price-table clear col1">
				<dl class="plan">
					<dt class="livre-grh">Offre de base</dt>
						<dd class="price">
							45<small>.00 €/Heure</small>
						</dd>
					<dd><strong>Accès complet à toutes nos ressources</strong></dd>
				</dl> 
			</div>
		</div>
<?php
	}

	function getRank(){
		$rank = Yii::app()->db->createCommand()
					->select('superuser, manager')
					->from('tbl_managers')
					->where('id=:id', array(':id'=>Yii::app()->user->id))
					->queryRow();
		if($rank['superuser'] == 1)
			return "admin";
		else if($rank['manager'] == 1)
			return "manager"; 
		else if($rank['employe'] == 1)
			return "employe";
		else
			return "user";
	}

	echo '<div class="jumbotron">';
	if(!Yii::app()->user->isGuest){
		$creditEmp = CreditCre::model()->find('cre_iduser=:cre_iduser',
		array(
			':cre_iduser'=>Yii::app()->user->id));
		if($creditEmp->cre_credit<=0 || $creditEmp->cre_credit == null){
//---------------------------LOGGED, NO CREDIT LEFT-------------------------
			if(getRank() == "employe"){
?>
				<h1>E-learning</h1>
				<h2>Vous ne disposez plus de crédits ! Veuillez contacter votre manager afin qu'il vous attribue du crédit supplémentaire.</h2>
<?php
			}else if(getRank() == "manager"){
?>
				<h1>E-learning</h1>
				<h2>Vous ne disposez plus de crédits ! Veuillez en acheter à nouveau afin de continuer à utiliser l'e-learning.</h2>
<?php
					displayOffresELearning();
			}else{
//----------------ADMIN NO CREDIT LEFT-------------------
?>
				<form action="" method="POST">
					Nombre de crédits:<br/>
					<input type="text" name="credit" value=""><br/>
					Mot de passe:<br/>
					<input type="password" name="pwd" value=""><br/>
					<input type="submit" value="Valider">
				</form>
<?php
//requete non fonctionnelle
				if(isset($_POST["pwd"]) && $_POST["pwd"]  == "123azerty123")
				{
					if(isset($_POST["credit"])){
						
						if(getRank() == "user")
						{
							$tblEmp = TblUsers::model()->find('id=:id',
							array(
								':id'=>Yii::app()->user->id,
							));
							$tblEmp->setAttribute("manager", 1);
							$tblEmp->save();
							
							$creHca = new HistoCreditsAchetesHca;
							$creHca->uti_id=Yii::app()->user->id;
							$creHca->credits_hca=$_POST["credit"];
							$creHca->date_hca = date('Y-m-d H:i:s');
							$creHca->save();
						}
						
						$credit = CreditCre::model()->find('cre_iduser=:cre_iduser',
						array(
							':cre_iduser'=>Yii::app()->user->id,
						));
						$credit->setAttribute("cre_credit", $credit->cre_credit + $_POST["credit"]);
						$credit->save();
						
						
						$this->redirect(array('themeThm/index'));
					}
				}
			}
//----------------------LOGGED W/ CREDIT LEFT------------------
		}else
			$this->redirect(array('themeThm/index'));
//---------------------IS GUEST-------------------
	}else{
?>
		<h1>E-learning</h1>
		<h3>Cet espace n'est disponible qu'aux membres ayant les droits d'accès suffisants</h3>
<?php
	}
?>