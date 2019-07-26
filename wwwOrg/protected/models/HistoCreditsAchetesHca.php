<?php

/**
 * This is the model class for table "histoCreditsAchetes_hca".
 *
 * The followings are the available columns in table 'histoCreditsAchetes_hca':
 * @property integer $uti_id
 * @property integer $credits_hca
 * @property string $date_hca
 */
class HistoCreditsAchetesHca extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'histoCreditsAchetes_hca';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uti_id, credits_hca, date_hca', 'required'),
			array('uti_id, credits_hca', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('uti_id, credits_hca, date_hca', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'uti_id' => 'Uti',
			'credits_hca' => 'Credits Hca',
			'date_hca' => 'Date Hca',
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
		$criteria->compare('credits_hca',$this->credits_hca);
		$criteria->compare('date_hca',$this->date_hca,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return HistoCreditsAchetesHca the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
