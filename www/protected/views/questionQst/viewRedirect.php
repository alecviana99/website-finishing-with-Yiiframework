<?php
	if(!empty($_POST["btn_note"])){
		// Yii::app()->session["debug"] = "note";
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
			// var_dump(Yii::app()->user->id);
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
		$sugg = new SuggestionSug;
		$sugg->qst_id = Yii::app()->session['qst'];
		$sugg->sug_texte = $_POST["sugg_txt"];
		$sugg->sug_date = date("Y-m-d H:i:s");
		$sugg->uti_id = Yii::app()->user->id;
		$sugg->save();
		$this->redirect(array('viewQstSuit?id='.Yii::app()->session['qst']));
	}
?>