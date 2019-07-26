<div class="form">

<?php echo CHtml::beginForm('','post',array('enctype'=>'multipart/form-data')); ?>

	<p class="note"><i><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></i></p>

	
<table class="table-condensed table table-striped table-responsive">

	<tr><div class="row">
		<td><?php echo CHtml::activeLabelEx($model,'username'); ?>
		</td><td><?php echo CHtml::activeTextField($model,'username',array('size'=>20,'maxlength'=>20)); ?>
		</td><?php echo CHtml::error($model,'username'); ?>
	</div></tr>

	<tr><div class="row">
		<td><?php echo CHtml::activeLabelEx($model,'password'); ?>
		</td><td><?php echo CHtml::activePasswordField($model,'password',array('size'=>20,'maxlength'=>20)); ?>
		</td><?php echo CHtml::error($model,'password'); ?>
	</div></tr>

	<tr><div class="row">
		<td><?php echo CHtml::activeLabelEx($model,'email'); ?>
		</td><td><?php echo CHtml::activeTextField($model,'email',array('size'=>20,'maxlength'=>128)); ?>
		</td><?php echo CHtml::error($model,'email'); ?>
	</div></tr>


	<tr><div class="row">
		<td><?php echo CHtml::activeLabelEx($model,'status'); ?>
		</td><td><?php echo CHtml::activeDropDownList($model,'status',User::itemAlias('UserStatus')); ?>
		</td><?php echo CHtml::error($model,'status'); ?>
	</div></tr>
	
	<tr><div class="row">
		<td><?php echo CHtml::activeLabelEx($model,'name'); ?>
		</td><td><?php echo CHtml::activeTextField($model,'name',array('size'=>20,'maxlength'=>80)); ?>
		</td><?php echo CHtml::error($model,'name'); ?>
	</div></tr>
	
	<tr><div class="row">
		<td><?php echo CHtml::activeLabelEx($model,'first_name'); ?>
		</td><td><?php echo CHtml::activeTextField($model,'first_name',array('size'=>20,'maxlength'=>80)); ?>
		</td><?php echo CHtml::error($model,'first_name'); ?>
	</div></tr>
	
	
	<tr><div class="row">
	<td><?php echo CHtml::activeLabelEx($model,'entreprise',array('size'=>20,'maxlength'=>80)); ?>
	</td><td><?php echo CHtml::activeTextField($model,'entreprise'); ?>
	</td><?php echo CHtml::error($model,'entreprise'); ?>
	</div></tr>
	
	<tr><div class="row">
	<td><?php echo CHtml::activeLabelEx($model,'phone'); ?>
	</td><td><?php echo CHtml::activeTextField($model,'phone'); ?>
	</td><?php echo CHtml::error($model,'phone'); ?>
	</div></tr>
	
	<tr><div class="row">
	<td><?php echo CHtml::activeLabelEx($model,'address'); ?>
	</td><td><?php echo CHtml::activeTextArea($model,'address'); ?>
	</td><?php echo CHtml::error($model,'address'); ?>
	</div></tr>
	
	<?php if($model->superuser != 1) {?>
	
	<tr><div class="row">
	<td><?php echo CHtml::activeLabelEx($model,'Heures de formation (H,M,S)'); ?>
	</td><td><?php echo CHtml::activeTextField($model,'heures_formation'); ?>
	</td><?php echo CHtml::error($model,'heures_formation'); ?>
	</td><td><?php echo CHtml::activeTextField($model,'minutes_formation'); ?>
	</td><?php echo CHtml::error($model,'minutes_formation'); ?>
	</td><td><?php echo CHtml::activeTextField($model,'secondes_formation'); ?>
	</td><?php echo CHtml::error($model,'secondes_formation'); ?>
	</div></tr>
	
	<?php } ?>
	
</table>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Enregistrer'); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->

