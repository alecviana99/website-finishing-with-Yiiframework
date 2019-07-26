<?php

class LogoutController extends Controller
{
	public $defaultAction = 'logout';
	
	/**
	 * Logout the current user and redirect to returnLogoutUrl.
	 */
	public function actionLogout()
	{
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
		
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->controller->module->returnLogoutUrl);
	}

}