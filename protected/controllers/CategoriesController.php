<?php

class CategoriesController extends Controller
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
				'actions'=>array('admin','delete','Updateorder','Activeinactive'),
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
            $this->layout = 'control_panel';
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
		$model=new Categories;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Categories']))
		{
			$model->attributes=$_POST['Categories'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
                $this->layout='control_panel';
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Categories']))
		{
			$model->attributes=$_POST['Categories'];
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
            $this->layout='control_panel';
		$dataProvider=new CActiveDataProvider('Categories');
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
		$model=new Categories('search');
                $model->unsetAttributes();  // clear any default values
		if(isset($_GET['Categories']))
			$model->attributes=$_GET['Categories'];

		$this->render('admin',array(
			'model'=>$model,'list'=>$list
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Categories the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Categories::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Categories $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='categories-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        /**
         * Update the Category filter position via drag-drop functionality
         */
        public function actionUpdateorder(){
             if (isset($_POST['Order']))
        {
        // Since we converted the Javascript array to a string,
        // convert the string back to a PHP array
                 
        $models = explode(',', $_POST['Order']);
         for ($i = 0; $i < sizeof($models); $i++)
            {
                if ($model = Categories::model()->findbyPk($models[$i]))
                {
                    // Use updateByPK to avoid running model validate
                   $model->updateByPk( $models[$i],array("pos"=>$i));
                   
                }
            }
        }
            // Handle the regular model order view
            else
            {
                $dataProvider = new CActiveDataProvider('Categories', array(
                    'pagination' => false,
                    'criteria' => array(
                        'order' => 'pos ASC, id DESC',
                    ),
                ));

                $this->render('admin',array(
                    'dataProvider' => $dataProvider,
                ));
            }
        }
        /**
         * Change the Status via Ajax
         */
        public function actionActiveinactive(){
            if((isset($_POST['cid']) && !empty($_POST['cid'])) && (isset($_POST['status']))){
                $gid = $_POST['cid'];
                $status = $_POST['status'];
                                 $model = Categories::model()->findByPk($gid);
                        if(Webnut::updateStatus($status,$model) == 1){
                                    echo Yii::app()->baseUrl.'/images/active.png';
                                    Categories::model()->updateByPk($gid,array('status'=>1));
                        }else if(Webnut::updateStatus($status,$model) == 0){
                            echo Yii::app()->baseUrl.'/images/inactive.png';
                            Categories::model()->updateByPk($gid,array('status'=>0));
                        }
                
            }
            
        }
        /**
         * protected function to change the dynamic images of status
         */
        protected function gridStatusColumn($data,$row){ 
             if ($data->status == 1) {
                 $image = '/images/active.png';}
             else{ 
                 $image = '/images/inactive.png';}
        $imghtml = CHtml::image(Yii::app()->baseUrl . $image, 'Status', array('rel' => $data->status, 'class' => 'status-' . $data->id));
        echo CHtml::link($imghtml, '', array('class' => 'imgactive', 'rel' => $data->id, 'style' => 'cursor:pointer;',));
    }
}
