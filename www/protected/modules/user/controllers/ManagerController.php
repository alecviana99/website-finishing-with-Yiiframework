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
		$dataProvider=new CActiveDataProvider('User', array(
			'criteria'=>array(
		        'condition'=>'superuser = 0 and idcreateur='.Yii::app()->user->id,
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
		$model=new User;
		$profile=new Profile;
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			//var_dump($_POST['Profile']);exit;
			$model->activkey=Yii::app()->controller->module->encrypting(microtime().$model->password);
			$model->createtime=time();
			$model->lastvisit=time();
			$model->employe=1;
			$model->idcreateur=Yii::app()->user->id;
			$profile->attributes=$_POST['Profile'];
			$profile->user_id=0;
			// echo "<pre>";
			// var_dump($profile->attributes);exit;
			// echo "</pre>";
			if($model->validate()&&$profile->validate()) {
				$model->password=Yii::app()->controller->module->encrypting($model->password);
				if($model->save()) {
					$profile->user_id=$model->id;
					$profile->save();
					
					$creditEmp = new CreditCre;			
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
					
				}
				$this->redirect(array('view','id'=>$model->id));
			} else $profile->validate();
		}

		$this->render('create',array(
			'model'=>$model,
			'profile'=>$profile,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();
		$profile=$model->profile;
		if(isset($_POST['User']))
		{
			
			
			$model->attributes=$_POST['User'];
			$profile->attributes=$_POST['Profile'];
			
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
			
			if($model->validate()&&$profile->validate()) {
				$old_password = User::model()->notsafe()->findByPk($model->id);
				if ($old_password->password!=$model->password) {
					$model->password=Yii::app()->controller->module->encrypting($model->password);
					$model->activkey=Yii::app()->controller->module->encrypting(microtime().$model->password);
				}
				$model->save();
				$profile->save();
				if($boolCredit)
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
			} else $profile->validate();
		}
		
		
		$this->render('update',array(
			'model'=>$model,
			'profile'=>$profile,
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
			
			CreditCre::model()->deleteAll(
			'cre_iduser=:cre_iduser',
			array(':cre_iduser' =>$model->id,
			));
			
			$profile->delete();
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
				$this->_model=User::model()->notsafe()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
	
}