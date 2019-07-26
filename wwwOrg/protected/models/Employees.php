<?php

/**
 * This is the model class for table "employe_emp".
 *
 * The followings are the available columns in table 'employe_emp':
 * @property integer $uti_id
 * @property integer $emp_credit
 * @property integer $emp_manID
 * @property integer $ent_id
 *
 * The followings are the available model relations:
 * @property EntrepriseEnt $ent
 * @property ManageurMan $empMan
 * @property UtilisateurUti $uti
 */
class Employees extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'employees';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
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

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EmployeEmp the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
