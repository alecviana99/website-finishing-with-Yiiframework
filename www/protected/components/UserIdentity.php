<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user = Yii::app()->db->createCommand()
		->select('id, username ,password')
		->from('tbl_user')
		->queryAll();
		
		$users=array(
		
		);
		
		foreach($user as $newuser)
		{
			$users[$newuser['username']] = $newuser['password'];
		}
		
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
			$this->setState('isAdmin', ($this->name == 'admin'));
		return !$this->errorCode;
	}
}