
<?php


			// récupérer id des livres achetés
	$achat = Yii::app()->db->createCommand()
		->select('*')
		->from('Livre_achete la')
		->join ('LIVRE li', 'li.ID_LIVRE = la.id_livre')
		->where('id_user=:id', array(':id'=>Yii::app()->user->id))
		->queryAll();
		
		 //récupère le nom et prenom du client connecté pour lui permetre de regénérer le pdf
		$name = Yii::app()->db->createCommand()
					->select('*')
					->from('tbl_profiles')
					->where('user_id=:id', array(':id'=>Yii::app()->user->id))
					->queryRow();
			
			foreach($achat as $num_livre => $element)
			{
				
			?>
			<div style="margin-left:20%; margin-right:20%">
				<table style="text-align:center">
					<form id="achatLivre" action="../../protected/modules/tcpdf/examples/main.php" method="post">
						<input type="hidden" name="name" id="name_user" value="<?php echo $name['firstname']." ".$name['lastname'];?>"/>
						<input type="hidden" name="id" id="id_user" value="<?php echo Yii::app()->user->id;?>"/> <!--  récupère l'id de la personne connecté!-->
						<input type="hidden" name="tome" value="<?php echo $achat[$num_livre]["id_livre"];?>"/> <!-- récupère l'id du livre sélectionner !-->
						<input type="hidden" name="name_tome" value="<?php echo $achat[$num_livre]["LIV_TITRE"];?>"/> <!-- récupère l'id du livre sélectionner !-->
						<button type="submit" class="btn enext paneauadmin" > <div><?php echo  $achat[$num_livre]["LIV_TITRE"].'';?></button>
					</form>
				</table>
			</div>
			<?php
			}
			// si aucun livre n'a été acheté
			if($achat ==null){
				echo ("<div style='margin-left:20%; margin-right:20%'><br/><br/><h3>Aucun achat réalisé.</h3></div>");
			}

?>