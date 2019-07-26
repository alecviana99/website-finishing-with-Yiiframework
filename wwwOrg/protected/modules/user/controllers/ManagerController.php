<?php

class ManagerController extends Controller
{
	public $defaultAction = 'manager';
	
	private $_model;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return CMap::mergeArray(parent::filters(),array(
			'accessControl', // perform access control for CRUD operations
		));
	}
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('manager','delete','create','update','view','gererCredits','redistribuerCredits', 'traitementDistributionCredits', 'histoCreAchetes', 'testAcheterCre','redistribuerCreditsCat', 'redistribuerCreditsCat2'),
				'users'=>UserModule::getManagers(),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	/**
	 * Manages all models.
	 */
	public function actionManager()
	{
		$dataProvider=new CActiveDataProvider('Employees', array(
			'criteria'=>array(
		        'condition'=>'id_manager='.Yii::app()->user->id,
		    ),
			
			'pagination'=>array(
				'pageSize'=>Yii::app()->controller->module->user_page_size,
			),
		));

		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}


	/**
	 * Displays a particular model.
	 */
	 public function actionTestAcheterCre()
	{
		/*$model = $this->loadModel();*/
		$this->render('testAcheterCre',array(
			/*'model'=>$model,*/
		));
	}
	
	public function actionRedistribuerCreditsCat()
	{
		/*$model = $this->loadModel();*/
		$this->render('redistribuerCreditsCat',array(
			/*'model'=>$model,*/
		));
	}
	
	public function actionRedistribuerCreditsCat2()
	{
		/*$model = $this->loadModel();*/
		$this->render('redistribuerCreditsCat2',array(
			/*'model'=>$model,*/
		));
	}
	 
	  public function actionTraitementDistributionCredits()
	{
		/*$model = $this->loadModel();*/
		$this->render('traitementDistributionCredits',array(
			/*'model'=>$model,*/
		));
	}
	
	public function actionHistoCreAchetes()
	{
		/*$model = $this->loadModel();*/
		$this->render('histoCreAchetes',array(
			/*'model'=>$model,*/
		));
	}
	 
	 public function actionGererCredits()
	{
		/*$model = $this->loadModel();*/
		$this->render('gererCredits',array(
			/*'model'=>$model,*/
		));
	}
	

	
	public function actionView()
	{
		$model = $this->loadModel();
		$this->render('view',array(
			'model'=>$model,
		));
		
		
	}
	
	public function actionRedistribuerCredits()
	{
		/*$model = $this->loadModel();*/
		$this->render('redistribuerCredits',array(
			/*'model'=>$model,*/
		));	
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	*/
	public function actionCreate()
	{
		$model=new Employees;
		if(isset($_POST['Employees']))
		{
			$model->attributes=$_POST['Employees'];
			//var_dump($_POST['Profile']);exit;
			//$model->activkey=Yii::app()->controller->module->encrypting(microtime().$model->password);
			$model->createtime=date("Y-m-d H:i:s");
			$model->lastvisit=date("Y-m-d H:i:s");
			if($_POST['lacategorie'] == '1') $model->lacategorie="Aucune catégorie";
			if($_POST['lacategorie'] == '2') $model->lacategorie="Autres personnels";
			if($_POST['lacategorie'] == '3') $model->lacategorie="Cadres";
			if($_POST['lacategorie'] == '4') $model->lacategorie="DRH";
			if($_POST['lacategorie'] == '5') $model->lacategorie="Employés";
			
			$model->id_manager=Yii::app()->user->id;
			
			if($model->validate()) {
				$model->password=Yii::app()->controller->module->encrypting($model->password);
								
				$temps_formation = $model->heures_formation*3600 + $model->minutes_formation*60 + $model->secondes_formation;
				
				$model->tempsInitialformation = $temps_formation;
				$model->tempsActuelformation = $temps_formation;
				
				$modelManager = User::model()->notsafe()->findByPk($model->id_manager);
				
				if ($modelManager->tempsActuel_formation > $temps_formation) 
				$modelManager->tempsActuel_formation = $modelManager->tempsActuel_formation - $temps_formation;
				else {throw new CHttpException(400,'Vous ne disposez pas de crédit suffisant pour cet ajout');}
				
				$modelManager->heures_formation = intval($modelManager->tempsActuel_formation / 3600);
				$modelManager->minutes_formation = intval(($modelManager->tempsActuel_formation % 3600) / 60);
				$modelManager->secondes_formation = intval(($modelManager->tempsActuel_formation % 3600) % 60);	
				
				$modelManager->save();
				
				if($model->save()) {
					
				/*	$creditEmp = new CreditCre;			
					$creditEmp->cre_iduser=$model->id;
					$creditEmp->cre_credit=0;				
					$creditEmp->save();
					
					$creditEmpDis = new HistoCreditsHcr;			
					$creditEmpDis->uti_id=$model->id;
					$creditEmpDis->hcr_creditTotal=0;				
					$creditEmpDis->save();
					
					$categorieEmp = $_POST["CategorieCat"];
					$empCatNew = new EmployeCatEmpCat;			
					$empCatNew->uti_id=$model->id;
					$empCatNew->cat_id=$categorieEmp;				
					$empCatNew->save();
				*/				
					
				}
				$this->redirect(array('view','id'=>$model->id));
			} 
		}

		$this->render('create',array(
			'model'=>$model
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();
		
		//$temps_formation_previous = $model->heures_formation*3600 + $model->minutes_formation*60 + $model->secondes_formation;	
		
		if(isset($_POST['Employees']))
		{
			$model->attributes=$_POST['Employees'];
			$model->lacategorie=$_POST['lacategorie'];
			
			/////////////////////////////////////////////////////////DEBUG////////////////////////////////////////////////////////////
			$boolCredit = false;
			
			$creditEmp = CreditCre::model()->find('cre_iduser=:cre_iduser',
			array(
				':cre_iduser'=>$model->id,
			));
			
			$creditMan = CreditCre::model()->find('cre_iduser=:cre_iduser',
			array(
				':cre_iduser'=>Yii::app()->user->id,
			));
			
			$newCreditEmp = ($_POST["CreditCre"]);
			$categorieEmp = $_POST["CategorieCat"];
			
			/*
			$post = $_POST;
			echo "<table>";
			foreach($post as $key => $value)
			{
				echo "<tr><td>";
				var_dump($key);
				echo "</td><td>";
				var_dump($value);
				echo "</td></tr>";
			}
			echo "</table>";
			die();
			*/
			//$_POST["CategorieCat"]
			if(($creditMan->cre_credit - ($newCreditEmp["cre_credit"] - $creditEmp->cre_credit)) >= 0 && $newCreditEmp["cre_credit"]  >= 0)
			{
				$boolCredit = true;
				$newCreditMan = $creditMan->cre_credit - ($newCreditEmp["cre_credit"] - $creditEmp->cre_credit);
				
			}
			if($categorieEmp != "")
			{
				$empCat = EmployeCatEmpCat::model()->find('uti_id=:uti_id',
							array(
							':uti_id'=>$model->id,
							));
				if($empCat == null)
				{
					$empCatNew = new EmployeCatEmpCat;			
					$empCatNew->uti_id=$model->id;
					$empCatNew->cat_id=$categorieEmp;				
					$empCatNew->save();
				}
				else
				{
					$empCat->setAttribute("cat_id", $categorieEmp);
					$empCat->save();
				}
			}
				
			//var_dump($categorieEmp);
			//die();
				
			/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
			
			if($model->validate()) {
				$old_password = User::model()->notsafe()->findByPk($model->id);
				if ($old_password->password!=$model->password) {
					$model->password=Yii::app()->controller->module->encrypting($model->password);
					// Commented By Touili on 11/10/17 $model->activkey=Yii::app()->controller->module->encrypting(microtime().$model->password);
				}
				
				$temps_formation = $model->heures_formation*3600 + $model->minutes_formation*60 + $model->secondes_formation;	
				$modelManager=User::model()->notsafe()->findbyPk($model->id_manager);
				
				//if ($temps_formation < $model->tempsInitialformation) $model->tempsActuelformation = $model->tempsInitialformation - $temps_formation;
				//if ($temps_formation >= $model->tempsInitialformation) $model->tempsActuelformation = $temps_formation - $model->tempsInitialformation;
				
				$model->tempsActuelformation = $temps_formation;
				
				if ($temps_formation >= $model->tempsInitialformation) $modelManager->tempsActuel_formation = $modelManager->tempsActuel_formation - ($temps_formation - $model->tempsInitialformation);
				if ($temps_formation < $model->tempsInitialformation) $modelManager->tempsActuel_formation = $modelManager->tempsActuel_formation + ($model->tempsInitialformation - $temps_formation);
				
				$modelManager->heures_formation = intval($modelManager->tempsActuel_formation / 3600);
				$modelManager->minutes_formation = intval(($modelManager->tempsActuel_formation % 3600) / 60);
				$modelManager->secondes_formation = intval(($modelManager->tempsActuel_formation % 3600) % 60);	
				
				$modelManager->save();
				
				/*if ($modelManager->tempsActuel_formation > $temps_formation) 
				$modelManager->tempsActuel_formation = $modelManager->tempsActuel_formation - $temps_formation;
				else {throw new CHttpException(400,'Vous ne disposez pas de crédit suffisant pour cette modification');}
				
				if ($modelManager->heures_formation >= $model->heures_formation) $modelManager->heures_formation = $modelManager->heures_formation - $model->heures_formation;
				if ($modelManager->minutes_formation >= $model->minutes_formation) $modelManager->minutes_formation = $modelManager->minutes_formation - $model->minutes_formation;
				if ($modelManager->secondes_formation >= $model->secondes_formation) $modelManager->secondes_formation = $modelManager->secondes_formation - $model->secondes_formation;
					
				$modelManager->save();
				*/
				
				$model->save();
				
				/*if($boolCredit)
				{
					$creditEmpDis = HistoCreditsHcr::model()->find('uti_id=:uti_id',
					array(
						':uti_id'=>$model->id,
					));
					$creditEmpDis->setAttribute("hcr_creditTotal", $creditEmpDis->hcr_creditTotal + ($newCreditEmp["cre_credit"] - $creditEmp->cre_credit));
					$creditEmpDis->save();
					$creditMan->setAttribute("cre_credit", $newCreditMan);
					$creditMan->save();
					$creditEmp->setAttribute("cre_credit", $newCreditEmp["cre_credit"]);
					$creditEmp->save();
					$this->redirect(array('view','id'=>$model->id));
				}
				else
				{
					Yii::app()->session['CreditImpossible'] = "Impossible de donner les crédits de temps";
				}
				
			   */
			   
			 $this->redirect(array('view','id'=>$model->id));
			   
			} 
		}
		
		
		$this->render('update',array(
			'model'=>$model
		));
		
	}


	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			
			
			$model = $this->loadModel();
			
			/*
			$profile = Profile::model()->findByPk($model->id);
			
			HistoQuestionHqs::model()->deleteAll(
			'uti_id=:uti_id',
			array(':uti_id' =>$model->id,
			));
			
			HistoCreditsHcr::model()->deleteAll(
			'uti_id=:uti_id',
			array(':uti_id' =>$model->id,
			));
			
			EmployeCatEmpCat::model()->deleteAll(
			'uti_id=:uti_id',
			array(':uti_id' =>$model->id,
			));
			
			NotePersoNot::model()->deleteAll(
			'uti_id=:uti_id',
			array(':uti_id' =>$model->id,
			));
			
			$creditEmp = CreditCre::model()->find('cre_iduser=:cre_iduser',
			array(
			':cre_iduser'=>$model->id,
			));
			
			$creditMan = CreditCre::model()->find('cre_iduser=:cre_iduser',
				array(
				':cre_iduser'=>Yii::app()->user->id,
			));
			
			$newCredit = $creditMan->cre_credit + $creditEmp->cre_credit;
			
			$creditMan->setAttribute("cre_credit", $newCredit);
			$creditMan->save();
			*/
			CreditCre::model()->deleteAll(
			'cre_iduser=:cre_iduser',
			array(':cre_iduser' =>$model->id,
			));
			
			//$profile->delete();
			$model->delete();
			
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_POST['ajax']))
				$this->redirect(array('/user/manager'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}
	
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=Employees::model()->notsafe()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
	
}