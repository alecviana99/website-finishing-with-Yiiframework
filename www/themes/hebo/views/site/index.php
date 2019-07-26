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
?>   

   <div class="slider-bootstrap"><!-- start slider -->
    	<div class="slider-wrapper theme-default">
            <div id="slider-nivo" class="nivoSlider">
                <img src="<?php echo Yii::app()->theme->baseUrl;?>/img/slider/image1.jpg" data-thumb="<?php echo Yii::app()->theme->baseUrl;?>/img/slider/image1.jpg" alt="" title="" />
                <img src="<?php echo Yii::app()->theme->baseUrl;?>/img/slider/image2.jpg" data-thumb="<?php echo Yii::app()->theme->baseUrl;?>/img/slider/image2.jpg" alt="" title="" />
            </div>
        </div>

    </div> <!-- /slider -->
		
		<div class="jumbotron">

       <h2> Manager autrement pour s'adapter et entrevoir le futur</h2>
			<blockquote>
				<p>	Gagner de la <b>compétitivité</b> est possible. <br/>
					Remédier à quelques travers, corriger quelques incohérences, éliminer quelques imperfections  <b>optimiseront votre GRH</b>. <br/>
					Un support vous est proposé. <br/>
					Les initiatives vous reviennent.
				</p>
			</blockquote>


		<h2>Vos Atouts</h2>
		  <div class="square-background square-colored clearfix">
				<p>	<b>Les salariés sont souvent prêts à</b> participer au développement de leur entreprise pour sauvegarder leur emploi, pour <b>améliorer leur productivité</b> pour autant qu'ils soient sollicités, qu'ils soient écoutés.<br/> 
					<b>Il leur est sollicité d'être motivés, mais l'entreprise ne les démotiverait-elle pas ?</b><br/>
					Accabler est inutile, réfléchir est préférable. <br/>
					Nous vous proposons des outils, les choix vous reviennent.</p>
			</div>
		
		
		<h2>Nos outils pour vos solutions</h2>
			<blockquote>
				<p> Des publications brossant <b>tous les aspects de la GRH</b> vous sont proposées. Elles seront actualisées par les contributions des lecteurs. Tous les contenus seront ouverts donc ainsi enrichis.<br/>
					Un <b>e-learning</b> sollicitant activement l'apprenant sera un outil de formation pour une gestion dynamique des hommes. Des changements perceptibles devraient apparaître si vous les incitez.<br/>
					Pour découvrir son contenu et sa forme, consultez la démo pour en percevoir l'utilité.</p>
			</blockquote>


		<h2>Faites votre propre audit</h2>
		 <div class="square-background square-colored clearfix">
			<p>	Posez un regard de consultant sur votre entreprise.<br/>
				<b>Faites de la lucidité un moyen.</b><br/>
				Vous êtes le meilleur connaisseur de votre entreprise, vous l'ignorez, vous le découvrirez.<br/>
				Nous apportons les moyens, à vous les décisions pour entrevoir un avenir plus conforme aux attentes des salariés et à vos impératifs. <br/>
				<b>Transformer les conflits, les oppositions en alliance conflictuelle</b> qui n'efface pas les oppositions mais leur assigne l'intelligence des situations bien comprises <b>pour de nouvelles possibilités.</b><br/> 
				Les divergences sont reconnues mais constructives.</p>
		</div>
	  
	  
      
     
		</div><!--/row-fluid-->
        
    <script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl;?>/js/nivo-slider/jquery.nivo.slider.pack.js"></script>
    
     <script type="text/javascript">
    $(function() {
        $('#slider-nivo').nivoSlider({
			effect: 'boxRandom',
			manualAdvance:false,
			controlNav: false
			});
    });
    </script> <!--<script type="text/javascript">
    $(document).ready(function() {
        $('#slider-nivo2').nivoSlider();
    });
    </script>-->