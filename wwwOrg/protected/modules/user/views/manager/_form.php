<div class="form">

<?php echo CHtml::beginForm('','post',array('enctype'=>'multipart/form-data')); ?>

	<p class="note"><i><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></i></p>
	
	<?php echo CHtml::errorSummary(array($model)); ?>
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
		</td><?php echo CHtml::error($model,'email');?>
	</div></tr>
	
	<tr><div class="row">
		<td><?php echo CHtml::activeLabelEx($model,'name'); ?>
		</td><td><?php echo CHtml::activeTextField($model,'name',array('size'=>60,'maxlength'=>128)); ?>
		</td><?php echo CHtml::error($model,'name');?>
	</div></tr>
	
	<tr><div class="row">
		<td><?php echo CHtml::activeLabelEx($model,'first_name'); ?>
		</td><td><?php echo CHtml::activeTextField($model,'first_name',array('size'=>60,'maxlength'=>128)); ?>
		</td><?php echo CHtml::error($model,'first_name');?>
	</div></tr>
	
	<tr><div class="row">
		<td><?php echo CHtml::activeLabelEx($model,'lacategorie'); ?>
		</td><td><?php $list = CHtml::listData(categorieBis($model->id), 'cat_id', 'cat_libelle');?>
		<?php echo CHtml::dropDownList('CategorieCat',categorieEmp($model->id), $list); ?>
		</td><?php echo CHtml::error($model,'lacategorie'); ?>
	</div></tr>
	
	<tr><div class="row">
		<td><?php echo CHtml::activeLabelEx($model,'heures_formation'); ?>
		</td><td><?php echo CHtml::activeTextField($model,'heures_formation',array('size'=>60,'maxlength'=>128)); ?>
		</td><?php echo CHtml::error($model,'heures_formation');?>
	</div></tr>
	
	<tr><div class="row">
		<td><?php echo CHtml::activeLabelEx($model,'minutes_formation'); ?>
		</td><td><?php echo CHtml::activeTextField($model,'minutes_formation',array('size'=>60,'maxlength'=>128)); ?>
		</td><?php echo CHtml::error($model,'minutes_formation');?>
	</div></tr>
	
	<tr><div class="row">
		<td><?php echo CHtml::activeLabelEx($model,'secondes_formation'); ?>
		</td><td><?php echo CHtml::activeTextField($model,'secondes_formation',array('size'=>60,'maxlength'=>128)); ?>
		</td><?php echo CHtml::error($model,'secondes_formation');?>
	</div></tr>

	<tr><div class="row">
		<td><?php echo CHtml::activeLabelEx($model,'status'); ?>
		</td><td><?php echo CHtml::activeDropDownList($model,'status',User::itemAlias('UserStatus')); ?>
		</td><?php echo CHtml::error($model,'status'); ?>
	</div></tr>

	
	
</table>	
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Créer' : 'Modifier');
			//echo CHtml::submitButton(creditTemps($model->id)->isNewRecord ? 'Create' : 'Save');
		/*$creditMan->setAttribute("cre_credit", $newCredit);
		$creditMan->save();*/
			?>
	</div>

	<?php 
		//var_dump($model->id);
		
		function creditTemps($id)
		{
			$creditEmp = CreditCre::model()->find('cre_iduser=:cre_iduser',
				array(
					':cre_iduser'=>$id,
			));
			return $creditEmp;
		}		
		function categorie()
		{
			$categorie = CategorieCat::model()->findAll();			
			return $categorie;
		}
		function categorieEmp($id)
		{
			$categorieEmp = EmployeCatEmpCat::model()->find('uti_id=:uti_id',
				array(
					':uti_id'=>$id,
			));
			if($categorieEmp == null)
				return "Table introuvable";
			else
			{
				$categorie = CategorieCat::model()->find('cat_id=:cat_id',
				array(
					':cat_id'=>$categorieEmp->cat_id,
				));
				return $categorie->cat_libelle;
			}
			
		}
		
		function categorieBis($id)
		{
			
			$catEmp = categorieEmp($id);
			$categorie = CategorieCat::model()->findAll(array(
				
				'order' => "CASE WHEN cat_libelle = '".$catEmp."' THEN cat_libelle END DESC ",
				
				
			));
			//$categorie->params = array(':catEmp'=>$catEmp);
			//SELECT * FROM `categorie_cat` order by CASE WHEN cat_libelle = 'Designer' THEN cat_libelle END DESC 
			//var_dump($catEmp);
			return $categorie;
		}
		//var_dump(categorieEmp($model->id));
		//var_dump(categorie());
	?>
	

<?php echo CHtml::endForm(); ?>

</div><!-- form -->

