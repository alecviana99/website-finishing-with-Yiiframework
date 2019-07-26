<div class="jumbotron">

<?php
$this->pageTitle=Yii::app()->name . ' - '.UserModule::t("Login");
$this->breadcrumbs=array(
	UserModule::t("Login"),
);
?>

<h1><?php echo UserModule::t("Connexion"); ?></h1>

<?php if(Yii::app()->user->hasFlash('loginMessage')): ?>

<div class="success">
	<?php echo Yii::app()->user->getFlash('loginMessage'); ?>
</div>

<?php endif; ?>


<div class="form">
<?php echo CHtml::beginForm(); ?>

	<p class="note"><?php echo UserModule::t('<i>Les champs munis d\'une <span class="required">*</span> sont obligatoires.</i>'); ?></p>
	
	<?php echo CHtml::errorSummary($model); ?>
<table class="table-condensed table table-striped table-responsive">

	<tr><div class="row">
		<td><?php echo CHtml::activeLabelEx($model,'username'); ?>
		</td><td><?php echo CHtml::activeTextField($model,'username') ?>
	</td></div></tr>
	
	<tr><div class="row">
		<td><?php echo CHtml::activeLabelEx($model,'password'); ?>
		</td><td><?php echo CHtml::activePasswordField($model,'password') ?>
	</td></div></tr>
</table>



<center>

<table style="width:50%"><tr>
	<td><div class="row submit">
		<?php echo CHtml::submitButton(UserModule::t("Connexion")); ?>
	</div></td>
	<td><table style="width:100%">
		<div class="row rememberMe">
			<td><?php echo CHtml::activeCheckBox($model,'rememberMe'); ?>
			<td><?php echo CHtml::activeLabelEx($model,'rememberMe'); ?>
		</div>
	</table></td>
</tr></table>

<br/><br/>
	<div class="row">
		<p class="hint">
		<?php echo CHtml::link(UserModule::t("S'inscrire"),Yii::app()->getModule('user')->registrationUrl); ?> | <?php echo CHtml::link(UserModule::t("Mot de passe oublié ?"),Yii::app()->getModule('user')->recoveryUrl); ?>
		</p>
	</div>

</center>
	
<?php echo CHtml::endForm(); ?>
</div><!-- form -->


<?php
$form = new CForm(array(
    'elements'=>array(
        'username'=>array(
            'type'=>'text',
            'maxlength'=>32,
        ),
        'password'=>array(
            'type'=>'password',
            'maxlength'=>32,
        ),
        'rememberMe'=>array(
            'type'=>'checkbox',
        )
    ),

    'buttons'=>array(
        'login'=>array(
            'type'=>'submit',
            'label'=>'Login',
        ),
    ),
), $model);
?>

</div>