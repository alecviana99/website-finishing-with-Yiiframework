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
class EmployeEmp extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'employe_emp';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uti_id, emp_manID', 'required'),
			array('uti_id, emp_credit, emp_manID, ent_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('uti_id, emp_credit, emp_manID, ent_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'ent' => array(self::BELONGS_TO, 'EntrepriseEnt', 'ent_id'),
			'empMan' => array(self::BELONGS_TO, 'ManageurMan', 'emp_manID'),
			'uti' => array(self::BELONGS_TO, 'UtilisateurUti', 'uti_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'uti_id' => 'Uti',
			'emp_credit' => 'Emp Credit',
			'emp_manID' => 'Emp Man',
			'ent_id' => 'Ent',
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
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('uti_id',$this->uti_id);
		$criteria->compare('emp_credit',$this->emp_credit);
		$criteria->compare('emp_manID',$this->emp_manID);
		$criteria->compare('ent_id',$this->ent_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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
