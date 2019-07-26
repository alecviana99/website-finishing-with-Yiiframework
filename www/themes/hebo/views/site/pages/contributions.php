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

	$livres = Yii::app()->db->createCommand()
					->select('*')
					->from('LIVRE')
					->queryAll();
?>
<div class="jumbotron">
 
      <h1>Contribuez à l'enrichir</h1>
      <p class="txtViolet">Nos publications sont forcément incomplètes. Les contenus doivent être revus et enrichis, votre aide nous est précieuse. Faites nous part de vos remarques, de vos ajouts souhaités.</p>
 
<?php
if(Yii::app()->user->isGuest) {
 ?> 
	<h2>Ouvert aux titulaires de compte via l'onglet <a href='../user/login'>Connexion</a></h2>

 
 <?php 
 } else {
 
 ?>
 

	<form id="form_con" name="envoiMail" method="POST" action="contributions">
	
                <br />
				<table class="table-condensed table table-striped table-responsive">
			
				<tr><td><label>Votre nom :</label></td>
                <td><input id="nomExp" name="nomExp" class="row" type="text" ></td></tr>
                
				<tr><td><label>Votre adresse mail :</label></td>
                <td><input type="email" id ="mailExp" name="mailExp" class="row" /></td></tr>
				
				<tr><td><label>Livre sur lequel vous souhaitez apporter une modification :</label></td>
                <td><select id="livre" name="livreExp">
					<?php foreach($livres as $t): ?>
						<option value="<?php echo $t["LIV_TITRE"]; ?>"><?php echo $t['LIV_TITRE']; ?></option>-->
					<?php endforeach; ?>
				</select></td></tr>
				
				<tr><td><label>Precisez le chapitre du livre : (Optionnel)</label></td>
                <td><input type="text" id ="chapExp" name="chapExp" class="row" /></td></tr>
                
				</table><table class="table-condensed table table-striped table-responsive">
				<td><label>Message : </label>
                <center><textarea id="messageExp" name="messageExp" rows="10" style="width:70%"  ></textarea></center></td>
                </table>
				<p>
                  <button class="btn" type="submit">Envoyer</button>
                </p>


    </form>

<?php

}
	if(!empty($_POST["nomExp"]) && !empty($_POST["mailExp"]) && !empty($_POST["livreExp"]) && !empty($_POST["messageExp"])) {
		
		
		$messageAEnvoyer = "Nom de l'expediteur et adresse mail: ".$_POST['nomExp'].", ".$_POST['mailExp']."
Livre sur lequel porte la suggestion : ".$_POST['livreExp'].", chapitre ".$_POST['chapExp']."
Message de l'utilisateur :
".$_POST['messageExp'];

		$messageAEnvoyer = str_replace("\\", "", $messageAEnvoyer);
		
		mail('','Nouvelle contribution', stripslashes(strip_tags($messageAEnvoyer)));
		echo '<script type="text/javascript">alert("Votre contribution a été envoyée !"); </script>';
	
		
	}	
?>

</div>