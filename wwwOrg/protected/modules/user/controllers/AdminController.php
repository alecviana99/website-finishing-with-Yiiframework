<?php

class AdminController extends Controller
{
	public $defaultAction = 'admin';
	
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
				'actions'=>array('admin','delete','create','update','view'),
				'users'=>UserModule::getAdmins(),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$dataProvider=new CActiveDataProvider('User', array(
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
	public function actionView()
	{
		$model = $this->loadModel();
		$this->render('view',array(
			'model'=>$model,
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
			$model->activkey=Yii::app()->controller->module->encrypting(microtime().$model->password);
			$model->createtime=date("Y-m-d H:i:s");
			$model->lastvisit=date("Y-m-d H:i:s");
			//$model->createtime=time();
			//$model->lastvisit=time();
			$max = Yii::app()->db->createCommand()->select('max(id) as max')->from('tbl_managers')->queryScalar(); 
			$model->id = $max+1;
			$model->manager=1;
			$model->superuser=0;
			//$profile->attributes=$_POST['Profile'];
			//$profile->user_id=0;
			// echo "<pre>";
			// var_dump($profile->attributes);exit;
			// echo "</pre>"; 
			//if($model->validate()&&$profile->validate()) {
			if($model->validate()) {	
				$model->password=Yii::app()->controller->module->encrypting($model->password);
				
				$model->tempsInitial_formation = $model->heures_formation*3600 + $model->minutes_formation*60 + $model->secondes_formation;
				$model->tempsActuel_formation = $model->tempsInitial_formation;
				
				$model->save();
				
				/*if($model->save()) {
					//$profile->user_id=$model->id;
					//$profile->save();
					
					$creditUser = new CreditCre;			
					$creditUser->cre_iduser=$model->id;
					$heurescredit = $model->tempsInitial_formation;
					$creditUser->cre_credit=$heurescredit;				
					$creditUser->save();
					
					$creditUserDis = new HistoCreditsHcr;			
					$creditUserDis->uti_id=$model->id;
					$creditUserDis->hcr_creditTotal=0;				
					$creditUserDis->save();
				}
			*/	
				$this->redirect(array('view','id'=>$model->id));
			} 
		}

		$this->render('create',array(
			'model'=>$model,
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
			//$profile->attributes=$_POST['Profile'];
			
			if($model->validate()) {
				$old_password = User::model()->notsafe()->findByPk($model->id);
				if ($old_password->password!=$model->password) {
					$model->password=Yii::app()->controller->module->encrypting($model->password);
					$model->activkey=Yii::app()->controller->module->encrypting(microtime().$model->password);
				}
							
				$temps_formation = $model->heures_formation*3600 + $model->minutes_formation*60 + $model->secondes_formation;
				
				$model->tempsInitial_formation = $temps_formation;
				
				$model->heures_formation = intval($model->tempsInitial_formation / 3600);
				$model->minutes_formation = intval(($model->tempsInitial_formation % 3600) / 60);
				$model->secondes_formation = intval(($model->tempsInitial_formation % 3600) % 60);	
				
				//if ($model->tempsActuel_formation > $temps_formation)
				//{
					/*$model->tempsActuel_formation = $model->tempsActuel_formation - $temps_formation;
					$model->heures_formation = intval($model->tempsActuel_formation / 3600);
					$model->minutes_formation = intval(($model->tempsActuel_formation % 3600) / 60);
					$model->secondes_formation = intval(($model->tempsActuel_formation % 3600) % 60);	
                   */					
				//}
				//else {throw new CHttpException(400,'Vous ne disposez pas de crédit suffisant pour cette modification');}
				$model->save();
				//$profile->save();
				$this->redirect(array('view','id'=>$model->id));
				
				
			}
			
		}

		$this->render('update',array(
			'model'=>$model,
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
			//$profile = Profile::model()->findByPk($model->id);
			
			if( $model->superuser == 1){
					throw new CHttpException(400,'Vous ne pouvez pas vous supprimer !!');
			}
			
			if( $model->manager == 1 )
			{
				/*
					HistoQuestionHqs::model()->deleteAll(
						'uti_id=:uti_id',
						array(':uti_id' => $model->id)
					);
					
					HistoCreditsHcr::model()->deleteAll(
						'uti_id=:uti_id',
						array(':uti_id' => $model->id)
					);
					
					EmployeCatEmpCat::model()->deleteAll(
						'uti_id=:uti_id',
						array(':uti_id' => $model->id)
					);
					
					NotePersoNot::model()->deleteAll(
						'uti_id=:uti_id',
						array(':uti_id' => $model->id)
					);
					
					$creditEmp = CreditCre::model()->find('cre_iduser=:cre_iduser',
						array(':cre_iduser'=>$model->id)
					);
			
					$creditMan = CreditCre::model()->find('cre_iduser=:cre_iduser',
						array(':cre_iduser' => $model()->idcreateur)
					);
					
					$newCredit = $creditMan->cre_credit + $creditEmp->cre_credit;
					
					$creditMan->setAttribute("cre_credit", $newCredit);
					$creditMan->save();
					
					
					CreditCre::model()->deleteAll(
						'cre_iduser=:cre_iduser',
						array(':cre_iduser' => $model->id)
					);
					
				*/	
					
				//	$profile->delete();
					$model->delete();
					
					// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
					//if(!isset($_POST['ajax']))
						$this->redirect(array('/user/admin'));
				
			}
			//else{
				//throw new CHttpException(400,'Il est interdit de supprimer un manager car il possède du crédit !');
			//}
		}
		//else{
		//	throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	//}
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