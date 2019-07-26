<?php
/**
 * RegistrationForm class.
 * RegistrationForm is the data structure for keeping
 * user registration form data. It is used by the 'registration' action of 'UserController'.
 */
class RegistrationForm extends User {
	public $verifyPassword;
	public $verifyCode;
	
	public function rules() {
		$rules = array(
			array('username, password, verifyPassword, email', 'required'),
			array('username', 'length', 'max'=>20, 'min' => 3,'message' => UserModule::t("Identifiant incorrect (Doit contenir entre 3 et 20 caractères).")),
			array('password', 'length', 'max'=>128, 'min' => 4,'message' => UserModule::t("Mot de passe incorrect (Au moins 4 caractères).")),
			array('email', 'email'),
			array('username', 'unique', 'message' => UserModule::t("Cet identifiant existe déjà.")),
			array('email', 'unique', 'message' => UserModule::t("Cette adresse mail existe déjà")),
			array('verifyPassword', 'compare', 'compareAttribute'=>'password', 'message' => UserModule::t("Les mots de passe ne correspondent pas")),
			array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u','message' => UserModule::t("Caractères incorrects (A-z0-9).")),
		);
		if (isset($_POST['ajax']) && $_POST['ajax']==='registration-form') 
			return $rules;
		else 
			array_push($rules,array('verifyCode', 'captcha', 'allowEmpty'=>!UserModule::doCaptcha('registration')));
		return $rules;
	}
	
}