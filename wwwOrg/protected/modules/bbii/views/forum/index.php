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

/* @var $this ForumController */
/* @var $dataProvider CArrayDataProvider */

$this->bbii_breadcrumbs=array(
	Yii::t('BbiiModule.bbii', 'Forum'),
);

$approvals = BbiiPost::model()->unapproved()->count();
$reports = BbiiMessage::model()->report()->count();

$item = array(
	array('label'=>Yii::t('BbiiModule.bbii', 'Forum'), 'url'=>array('forum/index')),
	array('label'=>Yii::t('BbiiModule.bbii', 'Members'), 'url'=>array('member/index')),
	array('label'=>Yii::t('BbiiModule.bbii', 'Approval'). ' (' . $approvals . ')', 'url'=>array('moderator/approval'), 'visible'=>$this->isModerator()),
	array('label'=>Yii::t('BbiiModule.bbii', 'Reports'). ' (' . $reports . ')', 'url'=>array('moderator/report'), 'visible'=>$this->isModerator()),
);
?>
<div id="bbii-wrapper">
	<?php echo $this->renderPartial('_header', array('item'=>$item)); ?>

	<?php $this->widget('zii.widgets.CListView', array(
		'id'=>'bbiiForum',
		'dataProvider'=>$dataProvider,
		'itemView'=>'_forum',
		'viewData'=>array('lastIndex'=>($dataProvider->totalItemCount - 1)),
		'summaryText'=>false,
	)); ?>
	
	<?php echo $this->renderPartial('_footer'); ?>
	<?php if(!Yii::app()->user->isGuest) echo CHtml::link(Yii::t('BbiiModule.bbii','Mark all read'), array('forum/markAllRead')); ?>
	
</div>