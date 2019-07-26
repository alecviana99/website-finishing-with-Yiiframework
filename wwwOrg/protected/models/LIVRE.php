<?php

/**
 * This is the model class for table "LIVRE".
 *
 * The followings are the available columns in table 'LIVRE':
 * @property integer $ID_LIVRE
 * @property integer $ADM_ID
 * @property string $LIV_TITRE
 * @property string $LIV_AUTEUR
 * @property integer $LIV_NBPAGE
 * @property string $LIV_DEMO
 * @property string $LIV_SERVEUR
 */
class LIVRE extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'LIVRE';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('LIV_TITRE, LIV_AUTEUR, LIV_NBPAGE, LIV_DEMO, LIV_SERVEUR', 'required'),
			array('ADM_ID, LIV_NBPAGE, id_categorie', 'numerical', 'integerOnly'=>true),
			array('LIV_TITRE, LIV_AUTEUR', 'length', 'max'=>100),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_LIVRE, ADM_ID, id_categorie, LIV_TITRE, LIV_AUTEUR, LIV_NBPAGE, LIV_COUV, LIV_DEMO, LIV_SERVEUR', 'safe', 'on'=>'search'),
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
			'ID_LIVRE' => 'ID',
			'ADM_ID' => 'Adm',
			'id_categorie' => 'Categorie',
			'LIV_TITRE' => 'Titre',
			'LIV_AUTEUR' => 'Auteur',
			'LIV_NBPAGE' => 'Nb pages',
			'LIV_COUV' => 'Couverture',
			'LIV_DEMO' => 'Adresse demo',
			'LIV_SERVEUR' => 'Adresse livre',
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
		
		$criteria->compare('ID_LIVRE',$this->ID_LIVRE);
		$criteria->compare('ADM_ID',$this->ADM_ID);
		$criteria->compare('id_categorie',$this->id_categorie,true);
		$criteria->compare('LIV_TITRE',$this->LIV_TITRE,true);
		$criteria->compare('LIV_AUTEUR',$this->LIV_AUTEUR,true);
		$criteria->compare('LIV_NBPAGE',$this->LIV_NBPAGE);
		$criteria->compare('LIV_COUV',$this->LIV_COUV);
		$criteria->compare('LIV_DEMO',$this->LIV_DEMO,true);
		$criteria->compare('LIV_SERVEUR',$this->LIV_SERVEUR,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return LIVRE the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
