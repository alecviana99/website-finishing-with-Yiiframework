<?php

if(!empty($_POST["btn_suppr"]))
{
	$suggestion = $_GET['suggestion'];
	SuggestionSug::model()->deleteAll(
			'sug_id=:sug_id',
			array(':sug_id' =>$suggestion,
			));
}


$this->redirect(array("viewSugQst?question=".Yii::app()->session['qstSugId']));


?>