<?php

class SparePartsController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'activate'),
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
		$model=new SpareParts;
		$model->active = true;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SpareParts']))
		{
			$model->attributes=$_POST['SpareParts'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		if(Brand::model()->count('active = 1') == 0){
			throw new CHttpException('','Primero debe '. CHtml::link('Crear una Marca', array('brand/create')). '.');
		}
		else{
		if(SparePartsStatus::model()->count('active = 1') == 0){
			throw new CHttpException('','Primero debe '. CHtml::link('Crear un Estado de refacción', array('sparePartsStatus/create')). '.');
		}
		else{
			if(Provider::model()->count('active = 1') == 0){
				throw new CHttpException('','Primero debe '. CHtml::link('Crear un Proveedor', array('provider/create')). '.');
			}
		

		else{
		
			$this->render('create',array(
					'model'=>$model,
		));
		}
		}	
		}
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

		if(isset($_POST['SpareParts']))
		{
			$model->attributes=$_POST['SpareParts'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		//$this->loadModel($id)->delete();
		$model = $this -> loadModel($id);
		$model -> active = 0;
		$model -> save();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	public function actionActivate($id)
	{
		 	$model = $this->loadModel($id);
			$model->active = 1;
			$model->save();

			// if AJAX request (triggered by activation via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
	
	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('SpareParts',
		array(
			'criteria' => array ('condition' => 'active = 1',),
			'pagination' => array('pageSize' => 20, ),
		));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SpareParts('search');
		$model->unsetAttributes();  // clear any default values
		
		$model->brand= new Brand('search');
		$model->brand->unsetAttributes();
		
		$model->sparePartsStatus = new SparePartsStatus('search');
		$model->sparePartsStatus->unsetAttributes();
		
		$model->provider = new Provider('search');
		$model->provider->unsetAttributes();
		
		if(isset($_GET['Brand']))
			$model->brand->attributes=$_GET['Brand'];
		
		if(isset($_GET['SparePartsStatus']))
			$model->sparePartsStatus->attributes=$_GET['SparePartsStatus'];
			
		if(isset($_GET['Provider']))
			$model->provider->attributes=$_GET['Provider'];
		
		if(isset($_GET['SpareParts'])){
			$model->attributes=$_GET['SpareParts'];
		}
		
		if (isset($_GET['pageSize'])) {
			Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
			unset($_GET['pageSize']);  // would interfere with pager and repetitive page size change
		}
		
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Spare the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=SpareParts::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Spare $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='spare-parts-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
?>
