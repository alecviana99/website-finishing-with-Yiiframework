<?php
/* @var $this LivreController */
/* @var $model LIVRE */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'livre-form',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note"><i>Les champs munis d'une <span class="required">*</span> sont requis.</i></p>

	<?php echo $form->errorSummary($model); ?>
<table class="table-condensed table table-striped table-responsive">

	<tr><div class="row">
		<td><?php echo $form->labelEx($model,'Titre du livre'); ?>
		</td><td><?php echo $form->textField($model,'LIV_TITRE',array('size'=>60,'maxlength'=>100)); ?>
		</td><?php echo $form->error($model,'LIV_TITRE'); ?>
	</div></tr>

	<tr><div class="row">
		<td><?php echo $form->labelEx($model,'Auteur du livre'); ?>
		</td><td><?php echo $form->textField($model,'LIV_AUTEUR',array('size'=>60,'maxlength'=>100)); ?>
		</td><?php echo $form->error($model,'LIV_AUTEUR'); ?>
	</div></tr>
	
	<tr><div class="row">
		<td><?php echo $form->labelEx($model,'Categorie du livre'); ?>
		</td><td><?php echo $form->dropDownList($model, 'id_categorie', CHtml::listData(CategorieLivre::model()->findAll(), 'id_categorie', 'nom_categorie')); ?>
		</td><?php echo $form->error($model,'id_categorie'); ?>
	</div></tr>

	<tr><div class="row">
		<td><?php echo $form->labelEx($model,'Nombre de pages du livre'); ?>
		</td><td><?php echo $form->textField($model,'LIV_NBPAGE'); ?>
		</td><?php echo $form->error($model,'LIV_NBPAGE'); ?>
	</div></tr>

	<tr><div class="row">
		<td><?php echo $form->labelEx($model,'Couverture du livre :'); ?>
		</td><td><?php echo $form->fileField($model,'LIV_COUV'); ?>
		</td><?php echo $form->error($model, 'LIV_COUV'); ?>
	</div></tr>
	
	<tr><div class="row">
		<td><?php echo $form->labelEx($model,'Fichier de demo :'); ?>
		</td><td><?php echo $form->fileField($model,'LIV_DEMO'); ?>
		</td><?php echo $form->error($model, 'LIV_DEMO'); ?>
	</div></tr>
	
	<tr><div class="row">
		<td><?php echo $form->labelEx($model,'Fichier du livre entier :'); ?>
		</td><td><?php echo $form->fileField($model,'LIV_SERVEUR'); ?>
		</td><?php echo $form->error($model,'LIV_SERVEUR'); ?>
	</div></tr>
</table>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Enregistrer'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->