<?php

class LivreController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'viewLivres'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','viewLivre'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionViewLivre($id)
	{
		$this->render('viewLivre',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	public function actionViewLivres()
	{
		$this->render('viewLivres',array(
		));
	}
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new LIVRE;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		// $livre_achete =  Yii::app()->db->createCommand()
						// ->select('Max(ID_LIVRE)')
						// ->from('Livre')
						// ->queryRow();

		if(isset($_POST['LIVRE']))
		{
			$model->attributes=$_POST['LIVRE'];
			$uploadedFile_demo=CUploadedFile::getInstance($model,'LIV_DEMO');
			$uploadedFile_serveur=CUploadedFile::getInstance($model,'LIV_SERVEUR');
			$uploadedFile_couv=CUploadedFile::getInstance($model,'LIV_COUV');
			$model->setAttribute('LIV_DEMO', 'Tome DEMO.pdf');
			$model->setAttribute('LIV_SERVEUR', 'Tome.pdf');
			$model->setAttribute('LIV_COUV', 'C.jpg');
			//var_dump($model->primaryKey());exit;
			if($model->save()){
				$uploadedFile_demo->saveAs('DL/Tome '.$model->ID_LIVRE.' DEMO.pdf');
				$uploadedFile_serveur->saveAs('DL/Tome '.$model->ID_LIVRE.'.pdf');
				$uploadedFile_couv->saveAs('DL/C'.$model->ID_LIVRE.'.jpg');
				
				$model->setAttribute('LIV_DEMO', 'Tome '.$model->ID_LIVRE.' DEMO.pdf');
				$model->setAttribute('LIV_SERVEUR', 'Tome '.$model->ID_LIVRE.'.pdf');
				$model->setAttribute('LIV_COUV', 'C'.$model->ID_LIVRE.'.jpg');
				
				if($model->save()){
					$this->redirect(array('view','id'=>$model->ID_LIVRE));
				}
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['LIVRE']))
		{
			$model->attributes=$_POST['LIVRE'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID_LIVRE));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('LIVRE');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new LIVRE('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['LIVRE']))
			$model->attributes=$_GET['LIVRE'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return LIVRE the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=LIVRE::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param LIVRE $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='livre-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
