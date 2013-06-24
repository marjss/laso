<?php

class GalleryController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
//	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
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
				'actions'=>array('index','view','gethotels','activeinactive'),
				'users'=>array('*'),
			),
//			array('allow', // allow authenticated user to perform 'create' and 'update' actions
//				'actions'=>array('create','update'),
//				'users'=>array('@'),
//			),
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
           $hotel = new Hotels;
                $model=new Gallery;
//                $id= Yii::app()->user->id;
//                $user= Users::model()->findByPk($id);
                // Uncomment the following line if AJAX validation is needed
		$this->performAjaxValidation($model);
               if(isset($_POST['Hotels']))
		{ 
                        $hid = $_POST['Hotels']['name'];
                        
                        $date = date('Y-m-d h:i:s');
                        
			$model->attributes=$_POST['Hotels'];
                        $rand= rand(1,505050);
			$images = CUploadedFile::getInstancesByName('full_image');
                       
			if(isset($images) && count($images)> 0) 
			{  
                           
				foreach ($images as $image=>$pic) 
				{
                                    $path = Yii::getPathOfAlias('webroot').'/gallery/'.$hid;
                                    $pathrel = Yii::getPathOfAlias('webroot').'/gallery/';
                                    $tpath =Yii::getPathOfAlias('webroot').'/gallery/'.$hid.'/thumbs';
                                    $tpathrel = Yii::getPathOfAlias('webroot').'/gallery/'.$hid.'/thumbs/';
                                    if (!file_exists($path) && is_writeable($pathrel)) {
                                       mkdir(Yii::getPathOfAlias('webroot').'/gallery/'.$hid, 0777);
                                       mkdir(Yii::getPathOfAlias('webroot').'/gallery/'.$hid.'/thumbs/', 0777);
                                  
                                    }
                    			if ($pic->saveAs(Yii::getPathOfAlias('webroot').'/gallery/'.$hid.'/'.$rand.'_'.$pic->name)) 	
					{	$filename = Yii::getPathOfAlias('webroot').'/gallery/'.$hid.'/'.$rand.'_'.$pic->name;
                                                $thumbimagename = $tpath.'/'.$rand.'_'.$pic->name;
                                               
                                                copy($filename,$thumbimagename);
                                                $image = Yii::app()->image->load($thumbimagename);
                                                
                                                $image->resize(150, 150);
						$image->save();
                                                $model->setIsNewRecord(true);
						$model->id = null;
                                                $model->thumb_image = $rand.'_'.$pic->name;
                        			$model->full_image = $rand.'_'.$pic->name;
                                                $model->setAttribute('product_id',$hid);
                                                $model->setAttribute('add_date',$date);
                                                $model->setAttribute('status',1);
                                                $model->save();
					}				
				}
        				$this->redirect(array('admin','id'=>$model->id));
			}
		}
		/*if(isset($_POST['Gallery']))
		{
			$model->attributes=$_POST['Gallery'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
                  */
                 /* Ajax Popup Request */
                    if( Yii::app()->request->isAjaxRequest )
                        {

                        $this->renderPartial('_form',array('model'=>$model,'hotel'=>$hotel),false,true);
                        //Yii::app()->end();

                        }else{
               
		$this->render('create',array(
			'model'=>$model,
                        'hotel'=>$hotel
		));
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

		if(isset($_POST['Gallery']))
		{
			$model->attributes=$_POST['Gallery'];
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
            $model=$this->loadModel($id);
           
            $hid = $model->product_id;
                
                $image = Yii::app()->request->baseUrl."/gallery/".$hid."/".$model->full_image;
                $exploded    = explode("/",$image);
                $relpath= $exploded[2]."/".$exploded[3];
//               echo $relpath; die;
                if(unlink(getcwd().'/'.$relpath.'/'.$model->full_image)){
                    if(unlink(getcwd().'/'.$relpath.'/thumbs/'.$model->full_image)){
                    $model->delete();
                
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
                   
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
                }
                }
//		if(Yii::app()->request->isPostRequest)
//		{
//			// we only allow deletion via POST request
//			$this->loadModel($id)->delete();
//
//			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//			if(!isset($_GET['ajax']))
//				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
//		}
//		else
//			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Gallery');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
                    $criteria = new CDbCriteria;
                    
                    
             $hotel = new Hotels('search');
            $this->layout='control_panel';
		$model=new Gallery('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Gallery']))
			$model->attributes=$_GET['Gallery'];

		$this->render('admin',array(
			'model'=>$model,
                        'hotel'=>$hotel
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Gallery::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='gallery-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionGethotels(){
                    if(isset($_POST['hid']) && !empty($_POST['hid'])){
                        $id = $_POST['hid'];
                        $model=Gallery::model()->findAllByAttributes(array('product_id'=>$id)); 
                             
                    }
        }
        
        public function actionActiveinactive(){
            if((isset($_POST['gid']) && !empty($_POST['gid'])) && (isset($_POST['status']) && !empty($_POST['status']))){
                $gid = $_POST['gid'];
                $status = $_POST['status'];
                                                        $model = Gallery::model()->findByPk($gid);
                        if(Webnut::updateStatus($status,$model) == 1){
                                    echo Yii::app()->baseUrl.'/images/active.png';
                        }else{
                            echo Yii::app()->baseUrl.'/images/inactive.png';
                        }
                
            }
        }
        
         protected function gridStatusColumn($data,$row)
        {
          $image = $data->status == 1 ? '/images/active.png' : '/images/inactive.png';   

          $imghtml = CHtml::image(Yii::app()->baseUrl . $image,'Status',array('rel'=>$data->status,'class'=>'status'));  
          echo CHtml::link($imghtml, '', array('class'=>'imgactive','rel'=>$data->id,'style'=>'cursor:pointer;',));
        } 
}
