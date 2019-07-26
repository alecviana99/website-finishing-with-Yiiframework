<section id="navigation-main">  
<div class="navbar">
	<div class="navbar-inner">
    <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
  
          <div class="nav-collapse">
			<?php $this->widget('zii.widgets.CMenu',array(
                    'htmlOptions'=>array('class'=>'nav'),
                    'submenuHtmlOptions'=>array('class'=>'dropdown-menu'),
					'itemCssClass'=>'item-test',
                    'encodeLabel'=>false,
                    'items'=>array(
						array('label'=>'Accueil', 'url'=>array('/site/index')),
						array('label'=>'Livres <span class="caret"></span>','url'=>array('/livre/index'),'itemOptions'=>array('class'=>'dropdown','tabindex'=>"-1"),'linkOptions'=>array('class'=>'dropdown-toggle','data-toggle'=>"dropdown"), 
                        'items'=>array(
							array('label'=>'Livres GRH', 'url'=>array('/livre/index', 'view'=>'grh')),
							array('label'=>'Autres livres', 'url'=>array('/livre/index', 'view'=>'autres')),
                        )),
						array('label'=>'E-learning', 'url'=>array('/themeThm/index')),
						array('label'=>'Forum', 'url'=>array('/forum')),
						array('label'=>'Contributions', 'url'=>array('/site/page', 'view'=>'contributions')),				
						array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>Yii::app()->getModule('user')->t("Login"), 'visible'=>Yii::app()->user->isGuest),
						array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("Inscription"), 'visible'=>Yii::app()->user->isGuest),
						array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Profil"), 'visible'=>!Yii::app()->user->isGuest),
						array('url'=>Yii::app()->getModule('user')->administrationUrl, 'label'=>Yii::app()->getModule('user')->t("Administration"), 'visible'=>UserModule::isAdmin()),
						array('url'=>Yii::app()->getModule('user')->managementUrl, 'label'=>Yii::app()->getModule('user')->t("Management"), 'visible'=>UserModule::isManager() && !UserModule::isAdmin()),
						array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest),
                    ),
                )); ?>
    	</div>
    </div>
	</div>
	<!--<ol class="breadcrumb">
		  <li><a href="#"><?php //echo $page; ?></a></li>
		  <li><a href="#">Library</a></li>
		  <li class="active">Data</li>
		</ol> -->
</div>
</section><!-- /#navigation-main -->