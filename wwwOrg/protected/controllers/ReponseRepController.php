<?php

class ReponseRepController extends Controller
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
				'actions'=>array('index','view','nbRep'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','updateMove'),
				'users'=>array('admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','ListeRepQst'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	 
	 public function actionListeRepQst($id)
	{
		$repsQst = ReponseRep::model()->findAll('qst_id=:qst_id',
			array(
				':qst_id'=>$id,
			));
		//var_dump($repsQst);
		$this->render("listeRepQst", array(
			'repsQst'=>$repsQst,
		));
	}
	 
	 public function actionNbRep($id)
	{
		$this->render('nbRep',array(
			'model'=>$this->loadModel($id),
		));
	}
	 
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
	public function actionCreate($id)
	{
		$model=new ReponseRep;
		
		$model->qst_id=$id;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ReponseRep']))
		{
			$model->attributes=$_POST['ReponseRep'];
			if($model->qst_redirID=="")
				$model->qst_redirID=-1;
			/* var_dump($_POST['ReponseRep']["qst_redirID"]);
			die(); */
			if($model->save()){
				//if($_POST['ReponseRep']["qst_redirID"]!="")
				Yii::app()->session['noRep']=Yii::app()->session['noRep']+1;
				if(Yii::app()->session['nbRep']>=Yii::app()->session['noRep'])
					$this->redirect(array('create','id'=>$model->qst_id));
				else {
					unset(Yii::app()->session['nbRep']);
					$this->redirect(array('../index.php/questionQst/viewQstCou','id'=>$model->qst_id));
					// $this->redirect(array('view','id'=>$model->rep_id));
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

		if(isset($_POST['ReponseRep']))
		{
			$model->attributes=$_POST['ReponseRep'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->rep_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
	
	public function actionUpdateMove($id)
	{
		// $post = $_POST;
			// echo "<table>";
			// foreach($post as $key => $value)
			// {
				// echo "<tr><td>";
				// var_dump($key);
				// echo "</td><td>";
				// var_dump($value);
				// echo "</td></tr>";
			// }
			// echo "</table>";
			
			// die();
		
		$model=$this->loadModel($id);
		$models=ReponseRep::model()->findAll('qst_id='.$model->rep_id);
		$list=CHtml::listData($models, 'rep_id', 'rep_texte');
		//var_dump(count($list));
		if(count($list)==1)
		{
			foreach($list as $key => $value)
			{
				$rep=ReponseRep::model()->find('rep_id='.$key);
				$rep->setAttribute('qst_redirID',Yii::app()->session['qst_idCree']);
				$rep->save();
			}
			$this->redirect(array('../index.php/questionQst/viewQstSuit','id'=>Yii::app()->session['qst_idCree']));
		}
		else
		{
			// $post = $_POST;
			// echo "<table>";
			// foreach($post as $key => $value)
			// {
				// echo "<tr><td>";
				// var_dump($key);
				// echo "</td><td>";
				// var_dump($value);
				// echo "</td></tr>";
			// }
			// echo "</table>";
			
			// die();
			if(isset($_POST['ReponseRep']))
			{
				$rep=ReponseRep::model()->find('rep_id='.$_POST['ReponseRep']);
				$rep->setAttribute('qst_redirID',Yii::app()->session['qst_idCree']);
				$rep->save();
				$this->redirect(array('../index.php/questionQst/viewQstSuit','id'=>Yii::app()->session['qst_idCree']));
			}
			// $this->render('updateMove',array(
			// 'model'=>$model,
			// ));
		}
		

		$this->render('updateMove',array(
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
		$dataProvider=new CActiveDataProvider('ReponseRep');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ReponseRep('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ReponseRep']))
			$model->attributes=$_GET['ReponseRep'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ReponseRep the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ReponseRep::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ReponseRep $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='reponse-rep-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
