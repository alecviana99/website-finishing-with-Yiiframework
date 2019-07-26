<?php

/**
 * This is the model class for table "reponse_rep".
 *
 * The followings are the available columns in table 'reponse_rep':
 * @property integer $rep_id
 * @property integer $qst_id
 * @property integer $qst_redirID
 * @property string $rep_texte
 */
class ReponseRep extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reponse_rep';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('qst_id', 'required'),
			//array('qst_id , qst_redirID ', 'required'),
			array('qst_id, qst_redirID', 'numerical', 'integerOnly'=>true),
			array('rep_texte', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('rep_id, qst_id, qst_redirID, rep_texte', 'safe', 'on'=>'search'),
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
			'rep_id' => 'Rep',
			'qst_id' => 'Qst',
			'qst_redirID' => 'Qst Redir',
			'rep_texte' => 'Rep Texte',
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

		$criteria->compare('rep_id',$this->rep_id);
		$criteria->compare('qst_id',$this->qst_id);
		$criteria->compare('qst_redirID',$this->qst_redirID);
		$criteria->compare('rep_texte',$this->rep_texte,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ReponseRep the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
