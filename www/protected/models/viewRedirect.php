<?php
	if(!empty($_POST["btn_note"])){
		$_SESSION["debug"] = "note";
		$note = NotePersoNot::model()->find('uti_id=:uti_id AND qst_id=:qst_id',
			array(
				':uti_id'=>Yii::app()->user->id,
				':qst_id'=>Yii::app()->session['qst'],
			));
		if ($note == NULL)
		{
			$newNote = new NotePersoNot;
			$newNote->uti_id=Yii::app()->user->id;
			$newNote->not_value=$_POST["note"];
			$newNote->qst_id=Yii::app()->session['qst'];
			// var_dump($newNote);
			$newNote->save();
		}
		else
		{
			$note->setAttribute("not_value", $_POST['note']);
			$note->save();
		}
		var_dump($_POST["note"]);
		$this->redirect(array('viewQstSuit?id='.Yii::app()->session['qst']));
	}
	if(!empty($_POST["btn_sugg"])){
		$_SESSION["debug"] = "sug";
		$sugg = new SuggestionSug;
		$sugg->qst_id = $_POST["id_qst"];
		$sugg->sug_texte = $_POST["sugg_txt"];
		$sugg->sug_date = date("Y-m-d H:i:s");
	}
?>