<div class="jumbotron">

<?php
	/* $CoursQst = QuestionQst::model()->findAll('qst_id='.model->qst_id);
	echo CHtml::listData(QuestionQst::model()->findAll('cou_id='.$CoursQst->cou_id), 'cou_id', 'cou_nom'); */
?>

<h1>Positionner la question créée :</h1>

<h2>Quelle est la question précédente ?</h2>

<p><?php echo '<a class="btn enext" href="../user/profile">Panneau d\'administration</a>';?></p>

<?php $this->renderPartial('_formQstCou', array('model'=>$model)); ?>

</div> <!-- jumborton --!>