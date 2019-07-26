<?php if(UserModule::isAdmin()) {
?>
<div class="span4">
<h2>Modification du E-Learning </h2>
		<li><?php echo CHtml::link(UserModule::t('Créer un thème'),array('/themeThm/create')); ?></li>
		<li><?php echo CHtml::link(UserModule::t('Créer un cours'),array('/coursCou/create')); ?></li>
		<li><?php echo CHtml::link(UserModule::t('Créer une question'),array('/questionQst/create')); ?></li>
		<li><?php echo CHtml::link(UserModule::t('Modifier/Supprimer thème(s)'),array('/themeThm/admin')); ?></li>
		<li><?php echo CHtml::link(UserModule::t('Modifier/Supprimer cours'),array('/coursCou/admin')); ?></li>
		<li><?php echo CHtml::link(UserModule::t('Modifier/Supprimer question(s)'),array('/questionQst/admin')); ?></li>
		<!--<li><?php /* echo CHtml::link(UserModule::t('Créer une réponse'),array('/reponseRep/create')); */ ?></li>-->
		<li><?php echo CHtml::link(UserModule::t('Modifier/Supprimer réponse(s)'),array('/reponseRep/admin')); ?></li>
		<li><?php echo CHtml::link(UserModule::t('Voir les suggestions reçues'),array('/SuggestionSug/admin'));?></li>
</div>
<?php 
}
?>