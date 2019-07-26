<?php

class QuestionQstController extends Controller
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
				'actions'=>array('index','view','viewQstSuit','viewFirstQDC','viewRedirect','viewQstCou'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','premiereQst'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionPremiereQst($id)
	{
		$model=$this->loadModel($id);
		$model->setAttribute('qst_first','1');
		$exFirstQst=QuestionQst::model()->findAll('cou_id='.$model->cou_id.' AND (qst_first=1 OR ISNULL(qst_first))');
		
		if($model->save())
		{
			foreach ($exFirstQst as $fq)
			{
				$fq->setAttribute('qst_first','0');
				$fq->save();
			}
			$model->save();
			$this->redirect(array('viewQstSuit','id'=>$model->qst_id));
		}
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
	public function actionViewQstCou($id)
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
		// if(isset($_POST['QuestionQst']))
			// echo $_POST['QuestionQst'];
		//die();
		
		if(isset($_POST['QuestionQst'])){
			$id=$_POST['QuestionQst'];
			$this->redirect(array('../index.php/reponseRep/updateMove','id'=>$id));
			// $this->render('../index.php/reponseRep/updateMove',array(
				// 'model'=>$this->loadModel($id),
			// ));
		}
		$this->render('viewQstCou',array(
			'model'=>$this->loadModel($id),
		));
		
	}
	
	public function actionViewQstSuit($id)
	{
		$this->render('viewQstSuit',array(
			'model'=>$this->loadModel($id),
		));
	}
	public function actionViewFirstQDC($id)
	{
		$this->render('viewFirstQDC',array(
			'model'=>$this->loadModel($id),
		));
	}
	public function actionViewRedirect()
	{
		$this->render('viewRedirect',array(
		));
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new QuestionQst;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['QuestionQst']))
		{
		/* var_dump($_POST);
		die(); */
			$model->attributes=$_POST['QuestionQst'];
			if($model->save())
				$this->redirect(array('../index.php/reponseRep/nbRep','id'=>$model->qst_id));
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

		if(isset($_POST['QuestionQst']))
		{
			$model->attributes=$_POST['QuestionQst'];
			if($model->save())
		$this->redirect(array('../index.php/reponseRep/listeRepQst','id'=>$id/*'admin'*/));
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
		$dataProvider=new CActiveDataProvider('QuestionQst');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new QuestionQst('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['QuestionQst']))
			$model->attributes=$_GET['QuestionQst'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return QuestionQst the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=QuestionQst::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param QuestionQst $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='question-qst-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
