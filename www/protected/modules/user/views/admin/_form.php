<div class="form">

<?php echo CHtml::beginForm('','post',array('enctype'=>'multipart/form-data')); ?>

	<p class="note"><i><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></i></p>

	<?php echo CHtml::errorSummary(array($model,$profile)); ?>
<table class="table-condensed table table-striped table-responsive">

	<tr><div class="row">
		<td><?php echo CHtml::activeLabelEx($model,'username'); ?>
		</td><td><?php echo CHtml::activeTextField($model,'username',array('size'=>20,'maxlength'=>20)); ?>
		</td><?php echo CHtml::error($model,'username'); ?>
	</div></tr>

	<tr><div class="row">
		<td><?php echo CHtml::activeLabelEx($model,'password'); ?>
		</td><td><?php echo CHtml::activePasswordField($model,'password',array('size'=>60,'maxlength'=>128)); ?>
		</td><?php echo CHtml::error($model,'password'); ?>
	</div></tr>

	<tr><div class="row">
		<td><?php echo CHtml::activeLabelEx($model,'email'); ?>
		</td><td><?php echo CHtml::activeTextField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		</td><?php echo CHtml::error($model,'email'); ?>
	</div></tr>

<?php
	if($model->employe <> 1)
	{
?>
	<tr><div class="row">
		<td><?php echo CHtml::activeLabelEx($model,'manager'); ?>
		</td><td><?php echo CHtml::activeDropDownList($model,'manager',User::itemAlias('ManagerStatus')); ?>
		</td><?php echo CHtml::error($model,'manager'); ?>
	</div></tr>
<?php
	}
?>
	<tr><div class="row">
		<td><?php echo CHtml::activeLabelEx($model,'status'); ?>
		</td><td><?php echo CHtml::activeDropDownList($model,'status',User::itemAlias('UserStatus')); ?>
		</td><?php echo CHtml::error($model,'status'); ?>
	</div></tr>
<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
	<tr><div class="row">
		<td><?php echo CHtml::activeLabelEx($profile,$field->varname); ?>
		</td><td><?php 
		if ($field->widgetEdit($profile)) {
			echo $field->widgetEdit($profile);
		} elseif ($field->range) {
			echo CHtml::activeDropDownList($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {
			echo CHtml::activeTextArea($profile,$field->varname,array('rows'=>6, 'cols'=>50));
		} else {
			echo CHtml::activeTextField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
		}
		 ?>
		</td><?php echo CHtml::error($profile,$field->varname); ?>
	</div></tr>
			<?php
			}
		}
?>
</table>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Enregistrer'); ?>
	</div>

<?php echo CHtml::endForm(); ?>

</div><!-- form -->

