<?php

/**
 * This is the model class for table "pause_pau".
 *
 * The followings are the available columns in table 'pause_pau':
 * @property integer $pau_id
 * @property string $pau_phrase
 *
 * The followings are the available model relations:
 * @property UtilisateurUti[] $utilisateurUtis
 */
class PausePau extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pause_pau';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pau_phrase', 'length', 'max'=>1500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('pau_id, pau_phrase', 'safe', 'on'=>'search'),
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
			'utilisateurUtis' => array(self::MANY_MANY, 'UtilisateurUti', 'histoPause_hpa(pau_id, uti_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'pau_id' => 'ID',
			'pau_phrase' => 'Contenu de la pause',
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

		$criteria->compare('pau_id',$this->pau_id);
		$criteria->compare('pau_phrase',$this->pau_phrase,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PausePau the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
