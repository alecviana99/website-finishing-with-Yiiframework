<?php
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
				':cou_id'=>$model->qst_id,
			));
		$themes = ThemeThm::model()->find('thm_id=:thm_id',
			array(
				':thm_id'=>$cours->thm_id,
			));
		$this->breadcrumbs=array(
			'Thèmes'=>array('themeThm/index'),
			$themes->thm_nom.''=>array('CoursCou/viewCours?id='.$cours->thm_id),
			$cours->cou_nom.''=>array('QuestionQst/view?id='.$cours->cou_id)
		);
		/*$this->menu=array(	
		array('label'=>'List QuestionQst','url'=>array('index')),	
		array('label'=>'Create QuestionQst', 'url'=>array('create')),	
		array('label'=>'Update QuestionQst', 'url'=>array('update', 'id'=>$model->qst_id)),	
		array('label'=>'Delete QuestionQst', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->qst_id),
		'confirm'=>'Are you sure you want to delete this item?')),	array('label'=>'Manage QuestionQst', 'url'=>array('admin')),); 
		*/
		$theme = CoursCou::model()->find('cou_id='.$model->qst_id);
		$thm_id=$theme->thm_id;
		$couleur = $thm_id-1;
		echo "<div class='couleur".$couleur." eqst'>";
		
		//-------------------------------BARRE DE PROGRESSION-----------------------------------
		$qstDuCours = QuestionQst::model()->findAll('cou_id=:cou_id',
			array(
				':cou_id' => $cours->cou_id,
			));
		$nbQstCours = count($qstDuCours);
		//-----------------------------FIN BARRE DE PROGRESSION---------------------------------
?>

<h1>Cours n°<?php echo Yii::app()->session['noCours']; ?> de <?php echo $themes->thm_nom;?></h1>

<!--<progress value="40" max="<?php //echo $nbQstCours;?>"></progress>-->

<?php 	
//----------------------------Compte à rebours-----------------------						
		$secondes = $creditEmp->cre_credit; 		
		$total = $creditEmp->cre_credit;
		//ton nombre de secondes 		
		$heure = intval(abs($total / 3600)); 		
		$total = $total - ($heure * 3600); 		
		$minute = intval(abs($total / 60)); 		
		$total = $total - ($minute * 60); 		
		$seconde = $total;		
		$heures   = $heure;  
		// les heures < 24		
		$minutes  = $minute;   
		// les minutes  < 60		
		$secondes = $seconde;  
		// les secondes  < 60		
		$annee = date("Y");  
		// par defaut cette année		
		$mois  = date("m");  
		// par defaut ce mois		
		$jour  = date("d");  
		// par defaut aujourd'hui		
		//$redirection = 'http://taibi.cvlla.fr/ciid/index.php/themeThm/index';
		// quand le compteur arrive à 0													
		// j'ai mis une redirection		
		$secondes = time() - mktime(date("H") + $heures,date("i") + $minutes,date("s") + $secondes,	$mois,$jour,$annee);		
		$secondes = str_replace("-","",$secondes);		
?>		

<script type="text/javascript">		
	var temps = <?php echo $secondes;?>;
	var timer =setInterval('CompteaRebour()',1000);		
	function CompteaRebour(){
		temps-- ;
		j = parseInt(temps) ;	
		h = parseInt(temps/3600) ;
		m = parseInt((temps%3600)/60) ;
		s = parseInt((temps%3600)%60) ;			
		document.getElementById('minutes').innerHTML= "Temps restant <br/>" + (h<10 ? "0"+h : h) + ' : ' +
																(m<10 ? "0"+m : m) + ' : ' +
																(s<10 ? "0"+s : s) + '  ';		
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
		//if ($secondes <= 3600*24) {
?>
		<table align="right">
			<tr>
				<td><div class="etemps">
					<a href='../pausePau/view'><img src="../../DL/pause-303651_640.png" style="width:50px; height:50px;"/></a>
				</div></td>
			
				<td><div id="minutes" class="etemps enext"></div></td>
			</tr>
		</table>			

<?php		 
		//}
		//----------------------------Fin compte à rebours-----------------------
		
		if(getRank() == "admin")
		{
			echo "<h3>Question n°: " . $model->qst_id . " <a href='http://rhid.fr/index.php/questionQst/update/id/$model->qst_id'>Modifier la question</a><br/></h3>";
		}
		echo "<a class='enext' href='../livre/viewLivres'>";		
		echo "Livres";		
		echo "</a>";;
		$qstForPause = QuestionQst::model()->find('cou_id=:cou_id',	array(':cou_id'=>$model->qst_id,));		
		Yii::app()->session['qst'] = $qstForPause->qst_id;		
		//var_dump($qstForPause->qst_id);				
		$qsts = QuestionQst::model()->findAll();		
		$reps = ReponseRep::model()->findAll();		
		//var_dump(Yii::app()->user->id);		
		//var_dump(time());		$time = time();		
		/*var_dump($time);		
		$creditEmp = CreditCre::model()->find('cre_iduser=:cre_iduser',	array(':cre_iduser'=>Yii::app()->user->id,));		
		var_dump($creditEmp->cre_credit);		
		$test = 40;		
		$creditEmp->setAttribute("cre_credit", $test);		
		$creditEmp->save();*/		
		Yii::app()->session['time'] = time();		
		//echo Yii::app()->session['time'];		
		//var_dump($creditEmp->emp_credit-(time()-$time));		
		/*$creditNew = $creditEmp - (time() - $time);		
		var_dump($creditNew);*/		
		//http://www.yiiframework.com/doc/api/1.1/CActiveRecord#find-detail		
		//http://developwithguru.com/yii-find-examples-a-basic-guide/		
		//http://www.yiiframework.com/doc/api/1.1/CActiveRecord		
		//var_dump($creditEmp);		
		/*foreach ($creditEmp as $key)		
		{			
			echo $key->emp_credit;		
		}*/		
		echo "<table>";		
		$found = false;		
		foreach ($qsts as $qst){			
			if (!$found){
				if($qst->qst_id!=-1&&$qst->cou_id==$model->qst_id&&$qst->qst_first==1){	
					echo "<tr>";					
					echo "<td >";	
					echo "<div class='equestion'>";
					echo $qst->qst_question;	
					echo "</div>";
					echo "</td>";			
					echo "</tr>";					
					$creditEmp = CreditCre::model()->find('cre_iduser=:cre_iduser',array(':cre_iduser'=>Yii::app()->user->id,));
					echo "<tr>";					
					foreach ($reps as $rep){						
						if($rep->qst_id==$qst->qst_id){							
							$newCredit = $creditEmp->cre_credit - (time() - Yii::app()->session['time']);							
							echo "<td>";							
							echo "<a class='enext' href=";					
							if($newCredit > 0)							
							{
								if($rep->qst_redirID==-1||$rep->qst_redirID==null)
								{
									echo "'../ThemeThm/index'";
								}
								
								else
								{
									echo "'../QuestionQst/viewQstSuit?id=".$rep->qst_redirID."'";
								}												
							}							
							else							
							{								
								echo "'../ThemeThm/index'"; 		
							}						
							echo ">";			
							if($rep->rep_texte == null || $rep->rep_texte == "")	
							{						
								echo "Suivante";			
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
		$currentUrl = Yii::app()->createAbsoluteUrl(Yii::app()->request->url);		
		echo "</table>";
		$note = NotePersoNot::model()->find('uti_id=:uti_id AND qst_id=:qst_id',array(':uti_id'=>Yii::app()->user->id,':qst_id'=>Yii::app()->session['qst'],));	
		if($note == NULL)			
			$notePerso = "";			
		else 			
			$notePerso = $note->not_value;		
	echo "<br/>";
	echo "<br/>";
	echo "<br/>";
?>	
<table class="enotesugg" >
	<td class="enotesugg2">
		<!-- notes personnelles -->		
		<!--<form onsubmit='return sendNote()'>-->	
		<form id='form_note_perso' method='post' action='viewRedirect'>		
			<label for="note">Ajoutez un commentaire personnel à cette question :</label>
			<textarea name="note" maxlength="500"><?php echo $notePerso; ?></textarea><br/>
			<input type='submit' value='Enregistrer le commentaire'>
		</form>
	</td >
	<td class="enotesugg2">
		<!-- suggestions -->
		<form id='form_sugg' method='post' action='viewRedirect'>
				<label for='sugg'>Envoyer une suggestion concernant la question à l'administrateur :</label>
				<textarea name='sugg_txt' maxlength='1000' id='sugg_txt'></textarea><br/>
				<input type='hidden' value="$model->qst_id" name='id_qst' id='id_qst'>
				<input type='submit' value='Envoyer la suggestion' name='btn_sugg'>
		</form>
	</td>
</table>
<?php
	}else{
		$this->redirect(array('themeThm/viewBuyCredit'));
	}
	function getRank(){
		$rank = Yii::app()->db->createCommand()
					->select('superuser, manager, employe')
					->from('tbl_users')
					->where('id=:id', array(':id'=>Yii::app()->user->id))
					->queryRow();
		if($rank['superuser'] == 1)
			return "admin";
		else if($rank['manager'] == 1)
			return "manager"; 
		else if($rank['employe'] == 1)
			return "employe";
		else
			return "user";
	}
?>