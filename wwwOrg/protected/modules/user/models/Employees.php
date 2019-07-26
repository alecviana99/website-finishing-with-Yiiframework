<?php

class Employees extends CActiveRecord
{
	const STATUS_NOACTIVE=0;
	const STATUS_ACTIVE=1;
	const STATUS_BANED=-1;
	
	/**
	 * The followings are the available columns in table 'users':
	 * @var integer $id
	 * @var string $username
	 * @var string $password
	 * @var string $email
	 * @var string $activkey
	 * @var integer $createtime
	 * @var integer $lastvisit
	 * @var integer $superuser
	 * @var integer $status
	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return CActiveRecord the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return Yii::app()->getModule('user')->tableEmployees;
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		//Admin
	/*	if(UserModule::isAdmin()){
			return ((Yii::app()->getModule('user')->isAdmin())?array(
				#array('username, password, email', 'required'),
				array('username', 'length', 'max'=>20, 'min' => 3,'message' => UserModule::t("Identifiant incorrect (Doit contenir entre 3 et 20 caractères).")),
				array('password', 'length', 'max'=>128, 'min' => 4,'message' => UserModule::t("Mot de passe incorrect (Au moins 4 caractères).")),
				array('email', 'email'),
				array('username', 'unique', 'message' => UserModule::t("Cet identifiant existe déjà.")),
				array('email', 'unique', 'message' => UserModule::t("Cette adresse mail existe déjà")),
				array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u','message' => UserModule::t("Caractères incorrects (A-z0-9).")),
				array('status', 'in', 'range'=>array(self::STATUS_NOACTIVE,self::STATUS_ACTIVE,self::STATUS_BANED)),
				array('username, email, password, createtime, lastvisit, status, name, first_name', 'required'),
				array('status, heures_formation, minutes_formation, secondes_formation', 'numerical', 'integerOnly'=>true),
			):((Yii::app()->user->id==$this->id)?array(
				array('username, email', 'required'),
				array('username', 'length', 'max'=>20, 'min' => 3,'message' => UserModule::t("Identifiant incorrect (Doit contenir entre 3 et 20 caractères).")),
				array('email', 'email'),
				array('username', 'unique', 'message' => UserModule::t("Cet identifiant existe déjà.")),
				array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u','message' => UserModule::t("Caractères incorrects (A-z0-9).")),
				array('email', 'unique', 'message' => UserModule::t("Cette adresse mail existe déjà")),
			):array()));
		}
	*/	
		//Manager
		if(UserModule::isManager()){
			return ((Yii::app()->getModule('user')->isManager())?array(
				#array('username, password, email', 'required'),
				array('username', 'length', 'max'=>20, 'min' => 3,'message' => UserModule::t("Identifiant incorrect (Doit contenir entre 3 et 20 caractères).")),
				
				array('password', 'length', 'max'=>128, 'min' => 4,'message' => UserModule::t("Mot de passe incorrect (Au moins 4 caractères).")),
				array('username', 'unique', 'message' => UserModule::t("Cet identifiant existe déjà.")),
				array('email', 'unique', 'message' => UserModule::t("Cette adresse mail existe déjà")),
				array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u','message' => UserModule::t("Caractères incorrects (A-z0-9).")),
				array('status', 'in', 'range'=>array(self::STATUS_NOACTIVE,self::STATUS_ACTIVE,self::STATUS_BANED)),
				array('username, password, email, createtime, lastvisit, status, name, first_name', 'required'),
				array('status, heures_formation, minutes_formation, secondes_formation', 'numerical', 'integerOnly'=>true),
			):((Yii::app()->user->id==$this->id)?array(
				array('username, email', 'required'),
				array('username', 'length', 'max'=>20, 'min' => 3,'message' => UserModule::t("Identifiant incorrect (Doit contenir entre 3 et 20 caractères).")),
				array('username', 'unique', 'message' => UserModule::t("Cet identifiant existe déjà.")),
				array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u','message' => UserModule::t("Caractères incorrects (A-z0-9).")),
				array('email', 'unique', 'message' => UserModule::t("Cette adresse mail existe déjà")),
				
			):array()));
		}
		//Abdallah Touii    Test Employe
		/*else if(UserModule::isEmploye()){
			return ((Yii::app()->getModule('user')->isEmploye())?array(
				#array('username, password, email', 'required'),
				array('username', 'length', 'max'=>20, 'min' => 3,'message' => UserModule::t("Identifiant incorrect (Doit contenir entre 3 et 20 caractères).")),
				array('password', 'length', 'max'=>128, 'min' => 4,'message' => UserModule::t("Mot de passe incorrect (Au moins 4 caractères).")),
				array('email', 'email'),
				array('username', 'unique', 'message' => UserModule::t("Cet identifiant existe déjà.")),
				array('email', 'unique', 'message' => UserModule::t("Cette adresse mail existe déjà")),
				array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u','message' => UserModule::t("Caractères incorrects (A-z0-9).")),
				array('status', 'in', 'range'=>array(self::STATUS_NOACTIVE,self::STATUS_ACTIVE,self::STATUS_BANED)),
				array('superuser', 'in', 'range'=>array(0,1)),
				array('username, email, createtime, lastvisit, superuser, status, idcreateur', 'required'),
				array('createtime, lastvisit, superuser, status', 'numerical', 'integerOnly'=>true),
			):((Yii::app()->user->id==$this->id)?array(
				array('username, email', 'required'),
				array('username', 'length', 'max'=>20, 'min' => 3,'message' => UserModule::t("Identifiant incorrect (Doit contenir entre 3 et 20 caractères).")),
				array('email', 'email'),
				array('username', 'unique', 'message' => UserModule::t("Cet identifiant existe déjà.")),
				array('username', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u','message' => UserModule::t("Caractères incorrects (A-z0-9).")),
				array('email', 'unique', 'message' => UserModule::t("Cette adresse mail existe déjà")),
			):array()));
		}
		*/
		//User
		//else {
			return ((Yii::app()->user->id==$this->id)?array(
				array('username, email, name, first_name', 'required'),
				array('username', 'length', 'max'=>20, 'min' => 3,'message' => UserModule::t("Identifiant incorrect (Doit contenir entre 3 et 20 caractères).")),
					
				array('username', 'unique', 'message' => UserModule::t("Cet identifiant existe déjà.")),
				array('username, name, first_name', 'match', 'pattern' => '/^[A-Za-z0-9_]+$/u','message' => UserModule::t("Caractères incorrects (A-z0-9).")),
				array('email', 'unique', 'message' => UserModule::t("Cette adresse mail existe déjà")),	
			):array());
		//}
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		$relations = array(
			'profile'=>array(self::HAS_ONE, 'Profile', 'user_id'),
		);
		if (isset(Yii::app()->getModule('user')->relations)) $relations = array_merge($relations,Yii::app()->getModule('user')->relations);
		return $relations;
		
		
		/*$relations = array(
			'user'=>array(self::HAS_ONE, 'User', 'id'),
		);
		if (isset(Yii::app()->getModule('user')->relations)) $relations = array_merge($relations,Yii::app()->getModule('user')->relations);
		return $relations;
		*/
	
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'username'=>UserModule::t("Identifiant"),
			'password'=>UserModule::t("Mot de passe"),
			'verifyPassword'=>UserModule::t("Recopier le mot de passe"),
			'email'=>UserModule::t("E-mail"),
			'id' => UserModule::t("Id"),
			'id_manager' => UserModule::t("Id manager"),
			'createtime' => UserModule::t("Date d'inscription"),
			'lastvisit' => UserModule::t("Derniere visite"),
			'status' => UserModule::t("Etat"),
			'name' => UserModule::t("Nom"),
			'first_name' => UserModule::t("Prénom"),
			'lacategorie' => UserModule::t("Catégorie"),
			'heures_formation' => UserModule::t("Heures de formation"),
			'minutes_formation' => UserModule::t("Minutes de formation"),
			'secondes_formation' => UserModule::t("Secondes de formation"),
			'tempsInitialformation' => UserModule::t("Temps initial de la formation"),
			'tempsActuelformation' => UserModule::t("Temps actuel de la formation"),
		);
	}
	
	public function scopes()
    {
        return array(
            'active'=>array(
                'condition'=>'status='.self::STATUS_ACTIVE,
            ),
            'notactvie'=>array(
                'condition'=>'status='.self::STATUS_NOACTIVE,
            ),
            'banned'=>array(
                'condition'=>'status='.self::STATUS_BANED,
            ),
            'superuser'=>array(
                'condition'=>'superuser=1',
            ),
			'manager'=>array(
                'condition'=>'manager=1',
            ),
			//'employe'=>array(
              //  'condition'=>'employe=1',
            //),
            'notsafe'=>array(
            	'select' => 'id, id_manager, username, password, email, name, first_name, lacategorie, createtime, lastvisit, status, heures_formation, minutes_formation, secondes_formation,tempsInitialformation,tempsActuelformation'
            ),
        );
    }
	
	public function defaultScope()
    {
        return array(
            'select' => 'id, id_manager, username, password, email, name, first_name, lacategorie, createtime, lastvisit, status, heures_formation, minutes_formation, secondes_formation,tempsInitialformation,tempsActuelformation' 
        );
    }
	
	public static function itemAlias($type,$code=NULL) {
		$_items = array(
			'UserStatus' => array(
				self::STATUS_NOACTIVE => UserModule::t('Non activé'),
				self::STATUS_ACTIVE => UserModule::t('Activé'),
				self::STATUS_BANED => UserModule::t('Banni'),
			),
			'AdminStatus' => array(
				'0' => UserModule::t('Non'),
				'1' => UserModule::t('Oui'),
			),
			'ManagerStatus' => array(
				'0' => UserModule::t('Non'),
				'1' => UserModule::t('Oui'),
			),
			'EmployeStatus' => array(
				'0' => UserModule::t('Non'),
				'1' => UserModule::t('Oui'),
			),
		);
		if (isset($code))
			return isset($_items[$type][$code]) ? $_items[$type][$code] : false;
		else
			return isset($_items[$type]) ? $_items[$type] : false;
	}
}