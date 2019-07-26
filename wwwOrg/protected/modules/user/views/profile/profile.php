<div class="jumbotron" style=" margin:auto">


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

$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Profile");
	$this->breadcrumbs=array(
		UserModule::t("Profile"),
	);
?>

<div class="row">
	<table style="margin:auto;padding:10%">
		
		
		
		<h2 class="span4">Votre profil</h2>
		<tr >
			<td style="padding:20px">
				<div class="span4">
					
						<?php echo $this->renderPartial('menu'); ?>
				</div>
			</td>
										<?php if(Yii::app()->user->hasFlash('profileMessage')){ ?>
										<div class="success">
											<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
										</div>
										<?php } ?>
	

	
			<!--  tableau affichant les information de la personne connecté !-->
			<td style="padding:20px">
				<table class="span4">
					<tr>
						<th class="label">
							<?php echo CHtml::encode($model->getAttributeLabel('username')); ?>
						</th>
						<td>
							<?php echo CHtml::encode($model->username); ?>
						</td>
					</tr>
					<tr>
						<th class="label">
							<?php echo CHtml::encode($model->getAttributeLabel('email')); ?>
						</th>
						
						<td>
							<?php echo CHtml::encode($model->email); ?>
						</td>
					</tr>
					
					<tr>
						<th class="label">
							<?php echo CHtml::encode($model->getAttributeLabel('createtime')); ?>
						</th>
						
						<td>
							<?php echo $model->createtime; ?>
						</td>
					</tr>

					<tr>
						<th class="label">
							<?php echo CHtml::encode($model->getAttributeLabel('lastvisit')); ?>
						</th>
						<td>
							<?php echo $model->lastvisit; ?>
						</td>
					</tr>
					
					<?php
						$creditEmp = CreditCre::model()->find('cre_iduser=:cre_iduser',
								array(':cre_iduser'=>Yii::app()->user->id,));
								
						$creditEmpDis = HistoCreditsHcr::model()->find('uti_id=:uti_id',
							array(':uti_id'=>Yii::app()->user->id,));
							
						
						
						$creDis = $creditEmpDis->hcr_creditTotal;
						
						
						
						if($creDis == null)
							$creDis = "Nope";
		
					if (isset($model->tempsInitial_formation)) $tempsInitial = $model->tempsInitial_formation; 
					else if (isset($model->tempsInitialformation)) $tempsInitial = $model->tempsInitialformation;
					
					if (isset($model->tempsActuel_formation)) $tempsRestant = $model->tempsActuel_formation;
					else if (isset($model->tempsActuelformation)) $tempsRestant = $model->tempsActuelformation;
					
					if (isset($tempsInitial) && isset($tempsRestant)) $tempsconsomme = $tempsInitial - $tempsRestant;
					
					//$tempsRestant = $model->tempsActuel_formation;
					?>
					
					<?php if(!UserModule::isAdmin()){ ?>
					
					
					<?php if (isset($tempsInitial)) { ?>
					<tr>
						<th class="label">
							Temps initial
						</th>
						<td>
							<?php
								$heuresInit=intval($tempsInitial / 3600);
								$minutesInit=intval(($tempsInitial % 3600) / 60);
								$secondesInit=intval((($tempsInitial % 3600) % 60));
								echo $heuresInit." heures : ". $minutesInit ." minutes : ". $secondesInit. " secondes";
							?>
						</td>
					</tr>
					<?php } ?> 
					
					<?php if (isset($tempsRestant)) { ?>
					<tr>
						<th class="label">
							Temps restant
						</th>
						<td>
							<?php
								$heures=intval($tempsRestant / 3600);
								$minutes=intval(($tempsRestant % 3600) / 60);
								$secondes=intval((($tempsRestant % 3600) % 60));
								echo $heures." heures : ". $minutes ." minutes : ". $secondes. " secondes";
						
							?>
						</td>
					</tr>
				   <?php } ?> 
				   <?php if (isset($tempsconsomme)) { ?>
					<tr>
						<th class="label">
							Temps consommé 
						</th>
						<td>
							<?php
									//$tempsConso = $creDis - $creditEmp->cre_credit;
									$heuresConso=intval($tempsconsomme / 3600);
									$minutesConso=intval(($tempsconsomme % 3600) / 60);
									$secondesConso=intval((($tempsconsomme % 3600) % 60));
									echo $heuresConso." heures : ". $minutesConso ." minutes : ". $secondesConso. " secondes";
							
						 } ?> 
							
						</td>
					</tr>	
				<?php } ?> 	
				</table>
			</td>
		</tr>
	</table>
		
		
		

			
			<?php if(!UserModule::isAdmin()){ ?><!-- affichage pour les personnes n'étant pas admin !-->
			

				<h2 class="span4">Livres achetés</h2>
				
				<?php echo $this->renderPartial('menuAchatLivre'); ?> <!--  fait appel a la page menuAchatLivre affichant les livres achetés du client !-->
				
			

	
	
	<?php } ?>
	
</div>
</div>