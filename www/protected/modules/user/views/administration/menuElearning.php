<?php if(UserModule::isAdmin()) {
?>

<h2 style="text-align:left; margin-left:20px">Modification du E-Learning </h2>
<div   >
	<table style="margin:auto; padding:1px">
		<tr><td style="padding:1px"><?php echo CHtml::link(UserModule::t('Créer un thème'),array('/themeThm/create'),array('class' => 'btn enext paneauadmin')); ?></td>
		<td style="padding:1px"><?php echo CHtml::link(UserModule::t('Modifier/Supprimer thème(s)'),array('/themeThm/admin'),array('class' => 'btn enext paneauadmin')); ?></td></tr>
		<tr><td style="padding:1px"><?php echo CHtml::link(UserModule::t('Créer un cours'),array('/coursCou/create'),array('class' => 'btn enext paneauadmin')); ?></td>
		<td style="padding:1px"><?php echo CHtml::link(UserModule::t('Modifier/Supprimer cours'),array('/coursCou/admin'),array('class' => 'btn enext paneauadmin')); ?></td></tr>
		<tr><td style="padding:1px"><?php echo CHtml::link(UserModule::t('Créer une question'),array('/questionQst/create'),array('class' => 'btn enext paneauadmin')); ?></td>		
		<td style="padding:1px"><?php echo CHtml::link(UserModule::t('Modifier/Supprimer question(s)'),array('/questionQst/admin'),array('class' => 'btn enext paneauadmin')); ?></td></tr>
		<!--<li><?php /* echo CHtml::link(UserModule::t('Créer une réponse'),array('/reponseRep/create')); */ ?></li>-->
		<tr><td style="padding:1px"></td>
		<td style="padding:1px"><?php echo CHtml::link(UserModule::t('Modifier/Supprimer réponse(s)'),array('/reponseRep/admin'),array('class' => 'btn enext paneauadmin')); ?></td></tr>
		<tr><td style="padding:1px"><?php echo CHtml::link(UserModule::t('Créer une pause'),array('/pausePau/create'),array('class' => 'btn enext paneauadmin')); ?></td>		
		<td style="padding:1px"><?php echo CHtml::link(UserModule::t('Modifier/Supprimer pause(s)'),array('/pausePau/admin'),array('class' => 'btn enext paneauadmin')); ?></td></tr>
		<tr style="text-align:center;"><td colspan="2"  style="padding:1px"><?php echo CHtml::link(UserModule::t('Voir les suggestions reçues'),array('/SuggestionSug/admin'),array('class' => 'btn enext paneauadmin'));?></td></tr>
		<tr><td style="padding:1px"><?php echo CHtml::link(UserModule::t('Ajouter une catégorie'),array('/categorieCat/create'),array('class' => 'btn enext paneauadmin')); ?></td>
		<td style="padding:1px"><?php echo CHtml::link(UserModule::t('Modifier/Supprimer categorie(s)'),array('/categorieCat/admin'),array('class' => 'btn enext paneauadmin')); ?></td></tr>
	</table>
</div>
<?php 
}
?>