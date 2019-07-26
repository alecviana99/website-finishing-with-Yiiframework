<?php

class ManagementController extends Controller
{
	public $defaultAction = 'management';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;
	/**
	 * Shows a particular model.
	 */
	public function actionManagement()
	{
	    $this->render('index');
	}
}
