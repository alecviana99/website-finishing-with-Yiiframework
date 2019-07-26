<?php

/**
 * This is the model class for table "question_qst".
 *
 * The followings are the available columns in table 'question_qst':
 * @property integer $qst_id
 * @property integer $cou_id
 * @property string $qst_question
 *
 * The followings are the available model relations:
 * @property UtilisateurUti[] $utilisateurUtis
 * @property CoursCou $cou
 * @property SuggestionSug[] $suggestionSugs
 */
class QuestionQst extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'question_qst';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cou_id', 'required'),
			array('cou_id, qst_first', 'numerical', 'integerOnly'=>true),
			array('qst_question', 'length', 'max'=>1500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('qst_id, cou_id, qst_question', 'safe', 'on'=>'search'),
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
			'utilisateurUtis' => array(self::MANY_MANY, 'UtilisateurUti', 'histoQuestion_hqs(qst_id, uti_id)'),
			'cou' => array(self::BELONGS_TO, 'CoursCou', 'cou_id'),
			'suggestionSugs' => array(self::HAS_MANY, 'SuggestionSug', 'qst_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'qst_id' => 'Qst',
			'cou_id' => 'Cou',
			'qst_question' => 'Qst Question',
			'qst_first' => 'Qst First',
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

		$criteria->compare('qst_id',$this->qst_id);
		$criteria->compare('cou_id',$this->cou_id);
		$criteria->compare('qst_question',$this->qst_question,true);
		$criteria->compare('qst_first',$this->qst_first);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return QuestionQst the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
