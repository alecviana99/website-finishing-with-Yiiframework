<?php

/* @var $this LivreController */
/* @var $data LIVRE */

//requete qui récupère les infos du client connecté
$name = Yii::app()->db->createCommand()
					->select('lastname, firstname')
					->from('tbl_profiles')
					->where('user_id=:id', array(':id'=>Yii::app()->user->id))
					->queryRow();

				
// permet de voir si l'achat de livre a deja été effectuer					
$livre_achete =  Yii::app()->db->createCommand()
					->select('*')
					->from('Livre_achete')
					->where('id_user=:id && id_livre=:livre', array(':id'=>Yii::app()->user->id,':livre'=>$data->ID_LIVRE))
					->queryRow();
?>

<div class="view">
	<!--  gestion de l'affichge des livres -->
	<?php if($data->id_categorie==2) {?>
	<dl class="plan">
		<dt class="livre-grh"><?php echo CHtml::encode($data->LIV_TITRE)?></dt>
		<dd class="price">
			<a class="zoombox zgallery1" href="http://rhid.fr/DL/<?php echo CHtml::encode($data->LIV_COUV)?>" title="Couverture Tome<?php echo CHtml::encode($data->ID_LIVRE) ?>">
				<img class="couv" src="http://rhid.fr/DL/<?php echo CHtml::encode($data->LIV_COUV)?>"/>
			</a>
		</dd>
		<dd><strong><?php echo CHtml::encode($data->LIV_TITRE); ?></strong></dd>
		<dd>Auteur : <strong><?php echo CHtml::encode($data->LIV_AUTEUR); ?></strong></dd>
		<dd><strong><?php echo CHtml::encode($data->LIV_NBPAGE); ?></strong> pages</dd>
		<dd><a class="btn btn-success" href="<?php echo "http://".$_SERVER['HTTP_HOST']."/DL/".$data->LIV_DEMO; ?>" target="_blank"><i class="icon-download icon-white"></i>Télécharger la démo</a></dd>
		<?php
			if(!Yii::app()->user->isGuest){
			//si aucun n'achat a été effectué
				if($livre_achete== null){
		?>
		<!-- Bouton acheter livre qui renvoie vers le module tcpdf pour génerer le pdf -->
		<form id="achatLivre" action="../../../../../protected/modules/tcpdf/examples/main.php" method="post">
			<input type="hidden" name="name" id="name_user" value="<?php echo $name['firstname']." ".$name['lastname'];?>"/>
			<input type="hidden" name="id" id="id_user" value="<?php echo Yii::app()->user->id;?>"/>
			<input type="hidden" name="tome" value="<?php echo $data->ID_LIVRE;?>"/>
			<input type="hidden" name="name_tome" value="<?php echo $data->LIV_TITRE;?>"/>
			<dd><button type="submit" name="achat" class="btn btn-info"><i class="icon-download icon-white"></i>Acheter le livre</button></dd>
		</form>
		<?php
				// si le livre a déja été acheté
				}else{
					echo '<dd>Vous avez déjà acheté ce livre.</dd>';
				}
			}else{
				echo '<dd><a href="../user/login">Connectez-vous pour acheter ce livre</a></dd>';
			}
		?>
	</dl> 
	<?php }; ?>
</div>