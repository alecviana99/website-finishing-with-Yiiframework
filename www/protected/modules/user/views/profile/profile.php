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
							<?php echo date("d/m/Y H:i:s",$model->createtime); ?>
						</td>
					</tr>

					<tr>
						<th class="label">
							<?php echo CHtml::encode($model->getAttributeLabel('lastvisit')); ?>
						</th>
						<td>
							<?php echo date("d/m/Y H:i:s",$model->lastvisit); ?>
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
						
						if ($creditEmp->cre_credit>0 && !UserModule::isManager() && !UserModule::isAdmin())
						{
					?>
					
					<tr>
						<th class="label">
							Temps initial
						</th>
						<td>
							<?php
								$heuresInit=intval($creDis / 3600);
								$minutesInit=intval(($creDis % 3600) / 60);
								$secondesInit=intval((($creDis % 3600) % 60));
								echo $heuresInit." heures : ". $minutesInit ." minutes : ". $secondesInit. " secondes";
						
							?>
						</td>
					</tr>
					
					<tr>
						<th class="label">
							Temps restant
						</th>
						<td>
							<?php
								$heures=intval($creditEmp->cre_credit / 3600);
								$minutes=intval(($creditEmp->cre_credit % 3600) / 60);
								$secondes=intval((($creditEmp->cre_credit % 3600) % 60));
								echo $heures." heures : ". $minutes ." minutes : ". $secondes. " secondes";
						
							?>
						</td>
					</tr>
					
					<tr>
						<th class="label">
							Temps consommé 
						</th>
						<td>
							<?php
									$tempsConso = $creDis - $creditEmp->cre_credit;
									$heuresConso=intval($tempsConso / 3600);
									$minutesConso=intval(($tempsConso % 3600) / 60);
									$secondesConso=intval((($tempsConso % 3600) % 60));
									echo $heuresConso." heures : ". $minutesConso ." minutes : ". $secondesConso. " secondes";
						}	
						if ($creditEmp->cre_credit>0 && UserModule::isManager() && !UserModule::isAdmin())
						{
							?>
						</td>
					</tr>
					
					<tr>
						<th class="label">
							Temps restant
						</th>
						<td>
							<?php
								$heuresRest=intval($creditEmp->cre_credit / 3600);
								$minutesRest=intval(($creditEmp->cre_credit % 3600) / 60);
								$secondesRest=intval((($creditEmp->cre_credit % 3600) % 60));
								echo $heuresRest." heures : ". $minutesRest ." minutes : ". $secondesRest. " secondes";
						}
							?>
						</td>
					</tr>
					
					
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