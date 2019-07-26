<?php

class AdministrationController extends Controller
{
	public $defaultAction = 'administration';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;
	/**
	 * Shows a particular model.
	 */
	public function actionAdministration()
	{
	    $this->render('index');
	}
}
