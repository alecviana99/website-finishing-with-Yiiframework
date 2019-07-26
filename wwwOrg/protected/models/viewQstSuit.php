<?php
	if(!empty($_SESSION["debug"])){
		echo '<p>$_SESSION["debug"] not empty : '.$_SESSION["debug"].'</p>';
		unset($_SESSION["debug"]);
	}else{
		echo '<p>$_SESSION["debug"] is empty</p>';
	}

	$creditEmp = CreditCre::model()->find('cre_iduser=:cre_iduser',
	array(
		':cre_iduser'=>Yii::app()->user->id,
	));
	
	if ($creditEmp->cre_credit>0)
	{
		/* @var $this QuestionQstController */
		/* @var $model QuestionQst */		
		$cours = CoursCou::model()->find('cou_id=:cou_id',
			array(
				':cou_id'=>$model->cou_id,
			));
		$themes = ThemeThm::model()->find('thm_id=:thm_id',
			array(
				':thm_id'=>$cours->thm_id,
			));
		$this->breadcrumbs=array(
			'Thèmes'=>array('themeThm/index'),
			$themes->thm_nom.''=>array('CoursCou/viewCours?id='.$cours->thm_id),
			$cours->cou_nom.''=>array('QuestionQst/view?id='.$cours->thm_id)
		);
		/*$this->menu=array(
			array('label'=>'List QuestionQst', 'url'=>array('index')),
			array('label'=>'Create QuestionQst', 'url'=>array('create')),
			array('label'=>'Update QuestionQst', 'url'=>array('update', 'id'=>$model->qst_id)),
			array('label'=>'Delete QuestionQst', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->qst_id),'confirm'=>'Are you sure you want to delete this item?')),
			array('label'=>'Manage QuestionQst', 'url'=>array('admin')),
		); */
		$theme = CoursCou::model()->find('cou_id='.$model->cou_id);
		$thm_id=$theme->thm_id;
		$couleur = $thm_id-1;
		echo "<div class='couleur".$couleur."'>"
?>

		<h1>Question <?php echo $model->qst_id; ?></h1>
		<div id="minutes" style="font-size: 14px;"></div> 
		
<?php
		Yii::app()->session['qst'] = $model->qst_id;
		echo "<a class='enext' href='../pausePau/view'>";
		echo "Pause";
		echo "</a>";
		echo "<a class='enext' href='../livre/viewLivres'>";		
		echo "Livres";		
		echo "</a>";
		//var_dump(Yii::app()->session['time']);
		if(!isset(Yii::app()->session['time']))
		{
			//echo "session";
			Yii::app()->session['time'] = time();
		}
		$qsts = QuestionQst::model()->findAll();
		$reps = ReponseRep::model()->findAll();
		$creditEmp = CreditCre::model()->find('cre_iduser=:cre_iduser',
			array(
				':cre_iduser'=>Yii::app()->user->id,
		));
		//var_dump($creditEmp->cre_credit);
		//var_dump($creditEmp->cre_credit);
		//var_dump(Yii::app()->session['time']);
		//die();
		$newCredit = $creditEmp->cre_credit - (time() - Yii::app()->session['time']);
		if($newCredit<0){
			$newCredit = 0;
			 
		}
		$creditEmp->setAttribute("cre_credit", $newCredit);
		$creditEmp->save();
		Yii::app()->session['time'] = time();
		$DebugcreditEmp = CreditCre::model()->find('cre_iduser=:cre_iduser',
			array(
				':cre_iduser'=>Yii::app()->user->id,
		));
		//var_dump($DebugcreditEmp->cre_credit); 
		//A faire le unset session["time"]

		/*$creditEmp = CreditCre::model()->find('cre_iduser=:cre_iduser',
			array(
				':cre_iduser'=>Yii::app()->user->id,
		));
		var_dump($creditEmp->cre_credit);*/


		$histoQ = HistoQuestionHqs::model()->find('uti_id=:uti_id AND cou_id=:cou_id',
			array(
				':uti_id'=>Yii::app()->user->id,
				':cou_id'=>$model->cou_id,
		));

		if($histoQ->cou_id != $model->cou_id)
		{
			$histoNewQ = new HistoQuestionHqs;
			
			$histoNewQ->uti_id=Yii::app()->user->id;
			$histoNewQ->cou_id=$model->cou_id;
			$histoNewQ->qst_id=$model->qst_id;
			//var_dump($histoNewQ);
			
			$histoNewQ->save();
			//echo "test";
			//die();
		}
		else if($model->qst_id != $histoQ->qst_id)
		{
			$histoQ->setAttribute("qst_id", $model->qst_id);
			$histoQ->save();
			//var_dump($histoQ);
		}

		//var_dump($model->cou_id);
		//var_dump($histoQ->uti_id);

				
		echo "<table >";
		$found = false;
		foreach ($qsts as $qst){
			if (!$found){
				if($qst->qst_id!=-1&&$qst->qst_id==$model->qst_id){
					echo "<tr >";
					echo "<td >";
					echo "<div >";
					echo $qst->qst_question;
					echo "</div>";
					echo "</td>";
					echo "</tr>";
					echo "<tr>";
					foreach ($reps as $rep){
						if($rep->qst_id==$qst->qst_id){
							echo "<td>";
							if($rep->qst_redirID==-1)
							{
								echo "<a class='enext' href='../ThemeThm/index'>";
							}
							
							else
							{
								echo "<a class='enext' href='../QuestionQst/viewQstSuit?id=".$rep->qst_redirID."'>";
							}
							if($rep->rep_texte == null || $rep->rep_texte == "")
							{
								if($rep->qst_redirID==-1)
								{
									echo "Terminer";
								}
								else
								{
									echo "Suivante";
								}
							}
							else
							{
								echo $rep->rep_texte;
							}
							echo "</a>";
							echo "</td>";
						}
					}
					echo "</tr>";
					$found = true;
				}
			}
		}
		echo "</table>";
		
		//----------------------------Compte à rebours-----------------------
		
		$total = $DebugcreditEmp->cre_credit; //ton nombre de secondes 
		/*$heure = intval(abs($total / 3600)); 
		$total = $total - ($heure * 3600); 
		$minute = intval(abs($total / 60)); 
		$total = $total - ($minute * 60); 
		$seconde = $total;

		$heures   = $heure;  // les heures < 24
		$minutes  = $minute;   // les minutes  < 60
		$secondes = $seconde;  // les secondes  < 60

		$annee = date("Y");  // par defaut cette année
		$mois  = date("m");  // par defaut ce mois
		$jour  = date("d");  // par defaut aujourd'hui

		//$redirection = 'http://taibi.cvlla.fr/ciid/index.php/themeThm/index'; // quand le compteur arrive à 0
													// j'ai mis une redirection

		$secondes = time() - mktime(date("H") + $heures,
									date("i") + $minutes,
									date("s") + $secondes,
									$mois,
									$jour,
									$annee
									);
		*/
		$total = str_replace("-","",$total);
?>

<script type="text/javascript">
		var temps = <?php echo $total;?>;
		var timer =setInterval('CompteaRebour()',1000);
		function CompteaRebour(){
			if(temps > 0)
			{
				temps-- ;
			}
				h = parseInt(temps/3600) ;
				m = parseInt((temps%3600)/60) ;
				s = parseInt((temps%3600)%60) ;
				document.getElementById('minutes').innerHTML= "Il vous reste " + (h<10 ? "0"+h : h) + '  h :  ' +
																(m<10 ? "0"+m : m) + ' min : ' +
																(s<10 ? "0"+s : s) + ' s ';
				if ((s == 0 && m ==0 && h ==0)) {
				   clearInterval(timer);
				   // url = "<?php echo $redirection;?>"
				   // Redirection(url)
				}
		}
		/*function Redirection(url) {
		setTimeout("window.location=url", 500)
		}*/
</script>

<?php
		$note = NotePersoNot::model()->find('uti_id=:uti_id AND qst_id=:qst_id',array(':uti_id'=>Yii::app()->user->id,':qst_id'=>Yii::app()->session['qst'],));
		if($note == NULL)				
			$notePerso = "";			
		else 				
			$notePerso = $note->not_value;		
?>		<!-- notes personnelles -->		
		<!--<form onsubmit='return sendNote()'>-->		
		<form id='form_note_perso' method='post' action='viewRedirect'>			
			<label for="note">Ajoutez un commentaire personnel à cette question: </label>			
			<div id="postit">
			<textarea id="postit" name="note" maxlength="500"><?php echo $notePerso; ?></textarea><br/>			
			</div>
			<input type='submit' value='Enregistrer le commentaire' name='btn_note'>
		</form>
		<!-- suggestions -->
		<!-- css à faire : afficher sur le côté droit et form de note personnelle à gauche ? -->
		<form id='form_sugg' method='post' action='viewRedirect'>
			<label for='sugg'>Envoyer une suggestion concernant la question à l'administrateur :</label>
			<textarea name='sugg_txt' maxlength='1000'></textarea><br/>
			<input type='hidden' value="$model->qst_id" name='id_qst' id='id_qst'>
			<input type='submit' value='Envoyer la suggestion' name='btn_sugg'>
		</form>
	</div>
<?php
	}else{
		$this->redirect(array('themeThm/viewBuyCredit'));
	}
?>