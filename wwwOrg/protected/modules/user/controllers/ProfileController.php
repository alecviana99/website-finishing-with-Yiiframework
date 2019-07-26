<?php

class ProfileController extends Controller
{
	public $defaultAction = 'profile';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;
	/**
	 * Shows a particular model.
	 */
	public function actionProfile()
	{
		$model = $this->loadUser();
		//$model = $this->loadModel();
		
		//print_r($model);
		
		//$modelEmployees = Employees::model()->find('username=:username', array(':username'=>Yii::app()->user->name), 'id=:id', array(':id'=>Yii::app()->user->id));
		//$modelEmployees = new Employees;
		
		$modelEmployees = Employees::model()->find('username=:username', array(':username'=>Yii::app()->user->name));
		$modelVisiteurs = Visiteurs::model()->find('username=:username', array(':username'=>Yii::app()->user->name));
		
		if ($modelEmployees) 
		{ 
	
		    $modelEmployees->lastvisit = date("Y-m-d H:i:s");			
			$modelEmployees->save();
			$model = $modelEmployees;	
		}	
		if ($modelVisiteurs) 
		{ 
			$modelVisiteurs->lastvisit = date("Y-m-d H:i:s");			
			$modelVisiteurs->save();
			$model = $modelVisiteurs;	
		}
		
	  $this->render('profile',array(
	    	'model'=>$model
	    ));
	
	
	}


	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionEdit()
	{
		$model = $this->loadUser();
		
		$modelEmployees = Employees::model()->find('username=:username', array(':username'=>Yii::app()->user->name));
		if ($modelEmployees) 
		{ 
			$model = $modelEmployees;	
		}	
		
		$modelVisiteurs = Visiteurs::model()->find('username=:username', array(':username'=>Yii::app()->user->name));
		if ($modelVisiteurs) 
		{ 
			$model = $modelVisiteurs;	
		}	
		
		// ajax validator
		if(isset($_POST['ajax']) && $_POST['ajax']==='profile-form')
		{
			echo UActiveForm::validate(array($model));
			Yii::app()->end();
		}
		
		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			
			//if($model->validate()&&$profile->validate()) {
			 if($model->validate()) {	
				$model->save();
				//$profile->save();
				Yii::app()->user->setFlash('profileMessage',UserModule::t("Changes is saved."));
				$this->redirect(array('/user/profile'));
			} 
		}
		
		if(isset($_POST['Employees']))
		{
			$model->attributes=$_POST['Employees'];
			
			//if($model->validate()&&$profile->validate()) {
			 if($model->validate()) {	
				$model->save();
				//$profile->save();
				Yii::app()->user->setFlash('profileMessage',UserModule::t("Changes is saved."));
				$this->redirect(array('/user/profile'));
			} 
		}
		$this->render('edit',array(
			'model'=>$model
		));
		
	}
	
	/**
	 * Change password
	 */
	public function actionChangepassword() {
		$model = new UserChangePassword;
		if (Yii::app()->user->id) {
			
			// ajax validator
			if(isset($_POST['ajax']) && $_POST['ajax']==='changepassword-form')
			{
				echo UActiveForm::validate($model);
				Yii::app()->end();
			}
			
			if(isset($_POST['UserChangePassword'])) {
					$model->attributes=$_POST['UserChangePassword'];
					if($model->validate()) {
						$new_password = User::model()->notsafe()->findbyPk(Yii::app()->user->id);
						$new_password->password = UserModule::encrypting($model->password);
						$new_password->activkey=UserModule::encrypting(microtime().$model->password);
						$new_password->save();
						Yii::app()->user->setFlash('profileMessage',UserModule::t("New password is saved."));
						$this->redirect(array("profile"));
					}
			}
			$this->render('changepassword',array('model'=>$model));
	    }
	}

	
	public function actionListmanagers()
	{
		
		$listmanagers = User::model()->findAll(array("condition"=>"manager = '1' && superuser != '1'"));
	}
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
	 */
	public function loadUser()
	{
		if($this->_model===null)
		{
			if(Yii::app()->user->id)
				$this->_model=Yii::app()->controller->module->user();
			if($this->_model===null)
				$this->redirect(Yii::app()->controller->module->loginUrl);
		}
		return $this->_model;
	}
}