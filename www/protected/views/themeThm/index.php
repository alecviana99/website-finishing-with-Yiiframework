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
if(!Yii::app()->user->isGuest) {

	/* $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_view',
	)); */
	
	
	
	$creditEmp = CreditCre::model()->find('cre_iduser=:cre_iduser',
	array(
		':cre_iduser'=>Yii::app()->user->id));
	if ($creditEmp->cre_credit>0)
	{
	
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
	
		echo "<h1>Thèmes</h1>";
		$thms = ThemeThm::model()->findAll();
		echo "<table style='width:100%'>";
		$couleur =0;
		foreach ($thms as $thm){
			if($thm->thm_id!=-1){
				
					echo "<tr >";
						echo "<td >";
							echo "<a  class=' couleurtheme".$couleur." elearning' href='../CoursCou/viewCours?id=".$thm->thm_id."'>";
							echo $thm->thm_nom;
							echo "</a>";
						echo "</td>";
					echo "</tr>";
				
				$couleur++;
			}
		}
		echo "</table>";
	}
	else 
	{
		$this->redirect(array('viewBuyCredit'));
	}
	
	


}
else {
	
	?>
	<div class="jumbotron">
		<h1>E-learning</h1>
		<h2>Ce module n'est accessible qu'aux titulaires de compte s'étant préalablement authentifiés via l'onglet <a href='../user/login'>Connexion</a>.</h2>
		<p>Le travail est une nécessité économique pour notre bien-être personnel mais aussi collectif. <br/>
			Il n'est pas utile de démotiver. <br/>
			Mieux vivre le travail – alors qu'il est souvent supporté ou subi - devient un impératif. <br/>
			Tout l'e-learning s'attelle à cette tâche. La démo devrait vous en convaincre.</p>
		<p>
			Cet e learning est un outil d'analyse des situations de travail vécues. Il interroge, il soumet pour faire émerger des solutions. Sa maîtrise par l'apprenant est totale. Son rythme est libre. Sa facilité d'utilisation et de navigation ont été testées.
			<br/><br/>Tous les aspects de la GRH sont évoqués et reliés ensemble. Les aspects les plus démotivants pourront alors être perçues et au delà négociés et traités.
			<br/>Des publications offrent d'aller plus loin dans l'analyse.
			<br/>Un forum et une messagerie permettent de rendre l'apprentissage encore plus convivial.
		</p>
	</div>
	
	
<?php
}

function getRank(){
		$rank = Yii::app()->db->createCommand()
					->select('superuser, manager, employe')
					->from('tbl_users')
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
?>
