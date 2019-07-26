<?php

/**
 * This is the model class for table "manageur_man".
 *
 * The followings are the available columns in table 'manageur_man':
 * @property integer $uti_id
 * @property integer $man_credit
 * @property integer $ent_id
 *
 * The followings are the available model relations:
 * @property EmployeEmp[] $employeEmps
 * @property EntrepriseEnt $ent
 * @property UtilisateurUti $uti
 */
class ManageurMan extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'manageur_man';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uti_id, ent_id', 'required'),
			array('uti_id, man_credit, ent_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('uti_id, man_credit, ent_id', 'safe', 'on'=>'search'),
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
			'employeEmps' => array(self::HAS_MANY, 'EmployeEmp', 'emp_manID'),
			'ent' => array(self::BELONGS_TO, 'EntrepriseEnt', 'ent_id'),
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
			'man_credit' => 'Man Credit',
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
		$criteria->compare('man_credit',$this->man_credit);
		$criteria->compare('ent_id',$this->ent_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ManageurMan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
