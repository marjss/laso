<?php

class FiltersController extends Controller
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
				'actions'=>array('index','view','activeinactive'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','create','update'),
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
            $this->layout = 'control_panel';
		$model=new Filters;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $hotel = new Hotels;
                $category = new Categories;
		if(isset($_POST['Filters']))
		{       
                        $date = date('Y-m-d h:i:s');
			$model->attributes=$_POST['Filters'];
                        $model->setAttribute('added_date', $date);
                        $model->setAttribute('status',1);
                            $model->setAttribute('hotel_id',$_POST['Hotels']['name']);
                            $model->setAttribute('cat_id',$_POST['Categories']['title']);
			if($model->save())
				$this->redirect(array('admin','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
                        'hotel'=>$hotel,
                        'category'=>$category
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
            $this->layout = 'control_panel';
		$model=$this->loadModel($id);
                 $hotel = new Hotels;
                 $category = new Categories;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Filters']))
		{
			$model->attributes=$_POST['Filters'];
			if($model->save())
				$this->redirect(array('admin','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
                        'hotel'=>$hotel,
                        'category'=>$category
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
		$dataProvider=new CActiveDataProvider('Filters');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
            $this->layout = 'control_panel';
                   // $category = new Categories('search');
                 
		$model=new Filters('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Filters']))
			$model->attributes=$_GET['Filters'];

		$this->render('admin',array(
			'model'=>$model
                       // 'category'=>$category
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Filters the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Filters::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Filters $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='filters-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        /**
	 * Get Categrories Name
	 * @param Filters $model the model to be validated
	 */
        
        protected function get_categoryname($data,$row){
                     $model = Categories::model()->findByPk($data->cat_id);
                     return $model->title;
        }
        
        /**
	 * Get Hotels Name
	 * @param Filters $model the model to be validated
	 */
        
        protected function get_hotelsname($data,$row){
                             $model = Hotels::model()->findByPk($data->hotel_id);
                     return $model->name;
        }
        
        /**
         * Public function to update the flag status
         */
         public function gridStatusColumn($data,$row){ 
             if ($data->status == 1) {
                 $image = '/images/active.png';}
             else{ 
                 $image = '/images/inactive.png';}
        $imghtml = CHtml::image(Yii::app()->baseUrl . $image, 'Status', array('rel' => $data->status, 'class' => 'status-' . $data->id));
        echo CHtml::link($imghtml, '', array('class' => 'imgactive', 'rel' => $data->id, 'style' => 'cursor:pointer;',));
    }
    
    /**
         * Public action to active inactive the flag status
         */
    
     public function actionActiveinactive(){
            if((isset($_POST['fid']) && !empty($_POST['fid'])) && (isset($_POST['status']))){
                $fid = $_POST['fid'];
                $status = $_POST['status'];
                                         $model = Filters::model()->findByPk($fid);
                        if(Webnut::updateStatus($status,$model) == 1){
                                    echo Yii::app()->baseUrl.'/images/active.png';
                                    Filters::model()->updateByPk($fid,array('status'=>1));
                        }else if(Webnut::updateStatus($status,$model) == 0){
                            echo Yii::app()->baseUrl.'/images/inactive.png';
                            Filters::model()->updateByPk($fid,array('status'=>0));
                        }
                
            }
        }
}
