<?php

class LoginController extends Controller
{
	public $defaultAction = 'login';
	public $lastVisit = array();
	//public $lastVisit->lastvisit = "";

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
	
		if (Yii::app()->user->isGuest) {	
		
		
		//$username = self::user()->username;
		//$email = self::user()->email;
			
		//echo $username;
		
		
		
		$model=new UserLogin;
			
			
			// collect user input data
			if(isset($_POST['UserLogin']))
			{
				
				
				
				$model->attributes=$_POST['UserLogin'];
				
				// validate user input and redirect to previous page if valid
				if($model->validate()) {
					
					//print_r($model);
					
					$this->thelastVisit();					
					
					if (strpos(Yii::app()->user->returnUrl,'/index.php')!==false)
					{	
					 $this->redirect(Yii::app()->controller->module->returnUrl);
					//UserModule::isAdmin() = 0; 	
				//echo "Test:". UserModule::isAdmin();
				//print_r($model);
						
						//echo "ID: ". Yii::app()->user->id;
						
						
										//print_r(Yii::app()->user);
		//echo Yii::app()->user->id."<br>";
		//echo Yii::app()->user->name;
		
		
						
					}
					else
						
						$this->redirect(Yii::app()->user->returnUrl);
						
				}
			}
			// display the login form
				$this->render('/user/login',array('model'=>$model));
		} else
			
		$this->redirect(Yii::app()->user->returnUrl);
		//if(!Yii::app()->user->isGuest) echo "employee";
		//print_r(Yii::app()->user);
		//$this->redirect(Yii::app()->controller->module->returnUrl);
		//$this->redirect(Yii::app()->controller->module->profileUrl);
		//echo "pas guest";
	}
	
	private function thelastVisit() {
		
		$users = Yii::app()->db->createCommand()
		->select('id, username ,password')
		->from('tbl_employees')
		->where("(username = '$model->username') and (password = '$model->password')")
		->queryAll();
		
		$visiteurs = Yii::app()->db->createCommand()
		->select('id, username ,password')
		->from('tbl_visiteurs')
		->where("(username = '$model->username') and (password = '$model->password')")
		->queryAll();
		
		
		if($users)	
		{
			$lastVisit = Employees::model()->notsafe()->findByPk(Yii::app()->user->id);
			$lastVisit->lastvisit = date("Y-m-d H:i:s");			
			$lastVisit->save();
			
		}	
		else if($visiteurs)	
		{
			$lastVisit = Visiteurs::model()->notsafe()->findByPk(Yii::app()->user->id);
			$lastVisit->lastvisit = date("Y-m-d H:i:s");			
			$lastVisit->save();		
		}
		
		else
		{
			$lastVisit = User::model()->notsafe()->findByPk(Yii::app()->user->id);
			$lastVisit->lastvisit = date("Y-m-d H:i:s");			
			$lastVisit->save();			
		}	
	}

}