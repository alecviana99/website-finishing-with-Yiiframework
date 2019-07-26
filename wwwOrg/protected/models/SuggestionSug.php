<?php

/**
 * This is the model class for table "suggestion_sug".
 *
 * The followings are the available columns in table 'suggestion_sug':
 * @property integer $sug_id
 * @property integer $qst_id
 * @property integer $uti_id
 * @property integer $liv_id
 * @property string $sug_texte
 * @property string $sug_date
 */
class SuggestionSug extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'suggestion_sug';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('uti_id', 'required'),
			array('qst_id, uti_id, liv_id', 'numerical', 'integerOnly'=>true),
			array('sug_texte', 'length', 'max'=>1000),
			array('sug_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('sug_id, qst_id, uti_id, liv_id, sug_texte, sug_date', 'safe', 'on'=>'search'),
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
			'sug_id' => 'Sug',
			'qst_id' => 'Qst',
			'uti_id' => 'Uti',
			'liv_id' => 'Liv',
			'sug_texte' => 'Sug Texte',
			'sug_date' => 'Sug Date',
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

		$criteria->compare('sug_id',$this->sug_id);
		$criteria->compare('qst_id',$this->qst_id);
		$criteria->compare('uti_id',$this->uti_id);
		$criteria->compare('liv_id',$this->liv_id);
		$criteria->compare('sug_texte',$this->sug_texte,true);
		$criteria->compare('sug_date',$this->sug_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SuggestionSug the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
