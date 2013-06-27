<?php

class AdminController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/control_panel';
        public $avatarPath = 'avatar';
        public $bannerPath = 'banner';
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
				'actions'=>array('index','view','create','update','admin','delete','Administrator','login','logout','banner','banneradmin','Activeinactive','hotelActiveinactive'),
				'users'=>array('admin'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
                    array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('login'),
				'users'=>array('*'),
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
		$model=new Hotels;
                $filter = new Filters;
                $hotelfilter = new HotelFilters;
		// Uncomment the following line if AJAX validation is needed
//		 $this->performAjaxValidation($model);
               
                        
		if(isset($_POST['Hotels']))
		{   
                    
                   $model->attributes=$_POST['Hotels'];
                   if($model->validate()) {
                    $model->setAttribute('status', 1);
                    if($_FILES['Hotels']['name']['avatar'] != '')
			{ 
                        
				$model->avatar = CUploadedFile::getInstanceByName('Hotels[avatar]');
				
                                    
					if ($model->avatar instanceof CUploadedFile) {
                                                $rand = rand(1,99999999);
						$filename = $this->avatarPath .'/'.  $rand . '_' . $_FILES['Hotels']['name']['avatar'];
						$thumbfilename = $this->avatarPath .'/thumb/'.  $rand . '_' . $_FILES['Hotels']['name']['avatar'];
//						echo $filename;die;
						$model->avatar->saveAs($filename);
						copy($filename,$thumbfilename);
						list($width, $height, $type, $attr) = getimagesize($filename);
						$image = Yii::app()->image->load($filename);
						$image->resize(250, 290,Image::HEIGHT);
						$image->save();
						$image = Yii::app()->image->load($thumbfilename);
						$image->resize(150, 150);
						$image->save();
						
						$model->avatar = $filename;
					}
				}
                                 if($model->save(false)){
                                     
                                     $hotel_id = $model->id;
                                     if(isset($_POST['HotelFilters']['filter_id'])){
                                          
                                            $hotelfilter->hotel_id = $model->id;
                                            $hotelfilter->filter_id=implode(',',$_POST['HotelFilters']['filter_id']);
//                                                $hotelfilter->filter_id = serialize($_POST['HotelFilters']['filter_id']);
                                                        $hotelfilter->save(false);

                                     }
                                     
                                 Yii::app()->user->setFlash('success', "Success!.");
				$this->redirect(array('admin','id'=>$model->id));
                            } else {Yii::app()->user->setFlash('error', "Oh! Please try again."); }
			}
			
                       
		}
                
		$this->render('create',array(
			'model'=>$model,'filter'=>$hotelfilter
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
                $data = explode(',',HotelFilters::model()->findByAttributes(array('hotel_id'=>$id))->filter_id);
                $filter=  HotelFilters::model()->findByAttributes(array('hotel_id'=>$id));
                $filter->filter_id=explode(',',$filter->filter_id);
                // Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
               if(isset($_POST['Hotels']))
		{
                         $avtarimage = $model->avatar;
			$model->attributes=$_POST['Hotels'];
                        if($_FILES['Hotels']['name']['avatar'] != '')
			{ 
                            $model->avatar = CUploadedFile::getInstanceByName('Hotels[avatar]');
                                    if ($model->avatar instanceof CUploadedFile) {
                                                $rand = rand(1,99999999);
						$filename = $this->avatarPath .'/'.  $rand . '_' . $_FILES['Hotels']['name']['avatar'];
						$thumbfilename = $this->avatarPath .'/thumb/'.  $rand . '_' . $_FILES['Hotels']['name']['avatar'];
//						echo $filename;die;
						$model->avatar->saveAs($filename);
						copy($filename,$thumbfilename);
						list($width, $height, $type, $attr) = getimagesize($filename);
						$image = Yii::app()->image->load($filename);
						$image->resize(250, 290,Image::HEIGHT);
						$image->save();
						$image = Yii::app()->image->load($thumbfilename);
						$image->resize(150, 150);
						$image->save();
						
						$model->avatar = $filename;
					}
				}else{ $model->avatar = $avtarimage;	}
                                 if($model->save(false)){
                                     $hotel_id = $model->id;
                                     if(isset($_POST['HotelFilters']['filter_id'])){
                                          
                                            $filter->hotel_id = $model->id;
                                            $filter->filter_id=implode(',',$_POST['HotelFilters']['filter_id']);
//                                                $hotelfilter->filter_id = serialize($_POST['HotelFilters']['filter_id']);
                                                        $filter->save(false);

                                     }
                                     
                                 Yii::app()->user->setFlash('success', "Success!.");
				$this->redirect(array('admin','id'=>$model->id));
                            } else {Yii::app()->user->setFlash('error', "Oh! Please try again."); }
				$this->redirect(array('admin','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,'filter'=>$filter,'data'=>$data
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
            if(Yii::app()->user->id){$this->redirect(array('admin/admin')); }
            else { $this->redirect(array('admin/login'));}
		/*$dataProvider=new CActiveDataProvider('Hotels');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));*/
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
                    
                 
		$model=new Hotels('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Hotels']))
			$model->attributes=$_GET['Hotels'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Hotels the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Hotels::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Hotels $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='hotels-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        public function actionAdministrator(){
            $model=new Hotels('search');
           
            $model->unsetAttributes();  // clear any default values
		if(isset($_GET['Hotels']))
			$model->attributes=$_GET['Hotels'];

		$this->render('admin',array(
			'model'=>$model,
		));
        }
        
        	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
            $this->layout = 'login';
		$model=new LoginForm;
               
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
//				$this->redirect(Yii::app()->user->returnUrl);
                        $this->redirect(array('admin/admin'));
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
        
        /**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(array('admin/login'));
	}
        public function imagePath($data,$row)
        {
            $no= "No Image";
            if($data->avatar){
            $path = Yii::app()->request->baseUrl."/".$data->avatar;
            return $path;}
            else{ echo $no; }
        }
        
         public function bannerPath($data,$row)
        {
            $no= "No Image";
            if($data->banner_image){
            $path = Yii::app()->request->baseUrl."/".$data->banner_image;
            return $path;}
            else{ echo $no; }
        }
        
        public function actionBanner(){
            
            $model = new Banner;
            if(isset($_POST['Banner']))
		{
               
                    $model->attributes=$_POST['Banner'];
                    $date = date('Y-m-d h:i:s');
                    if($_FILES['Banner']['name']['banner_image'] != '')
			{ 
                        
                                
				$model->banner_image = CUploadedFile::getInstanceByName('Banner[banner_image]');
				 
                                    
					if ($model->banner_image instanceof CUploadedFile) {
                                                $rand = rand(1,99999999);
						$filename = $this->bannerPath .'/'.  $rand . '_' . $_FILES['Banner']['name']['banner_image'];
						$model->banner_image->saveAs($filename);
						$image = Yii::app()->image->load($filename);
						$image->save();
                                                $model->setAttribute('banner_image',$filename);
					}
				
                                $model->setAttribute('adddate',$date);
                                $model->setAttribute('status',1);
                                if($model->save(false)){
                                 Yii::app()->user->setFlash('success', "Success!.");
				$this->redirect(array('banneradmin','id'=>$model->id));
                        } else {Yii::app()->user->setFlash('error', "Oh! Please try again."); }
			}
			
                        
		}
               $this->render('bannerAdmin',array('model'=>$model));
        }
        public function actionBanneradmin(){
            $model=new Banner('search');
           
            $model->unsetAttributes();  // clear any default values
		if(isset($_GET['Banner']))
			$model->attributes=$_GET['Banner'];

		$this->render('bannergrid',array(
			'model'=>$model,
		));
        }
        
        public function actionActiveinactive(){
            if((isset($_POST['bid']) && !empty($_POST['bid'])) && (isset($_POST['status']))){
                $gid = $_POST['bid'];
                $status = $_POST['status'];
                                 $model = Banner::model()->findByPk($gid);
                        if(Webnut::updateStatus($status,$model) == 1){
                                    echo Yii::app()->baseUrl.'/images/active.png';
                                    Banner::model()->updateByPk($gid,array('status'=>1));
                        }else if(Webnut::updateStatus($status,$model) == 0){
                            echo Yii::app()->baseUrl.'/images/inactive.png';
                            Banner::model()->updateByPk($gid,array('status'=>0));
                        }
                
            }
        }
         /**
         * Protected function to update the flag status
         */
         protected function gridStatusColumn($data,$row){ 
             if ($data->status == 1) {
                 $image = '/images/active.png';}
             else{ 
                 $image = '/images/inactive.png';}
        $imghtml = CHtml::image(Yii::app()->baseUrl . $image, 'Status', array('rel' => $data->status, 'class' => 'status-' . $data->id));
        echo CHtml::link($imghtml, '', array('class' => 'imgactive', 'rel' => $data->id, 'style' => 'cursor:pointer;',));
    }
        /*protected function beforeAction() {
            if(Yii::app()->user->id){
                return true;
            }
          
        }*/
    
     public function actionhotelActiveinactive(){
            if((isset($_POST['cid']) && !empty($_POST['cid'])) && (isset($_POST['status']))){
                $cid = $_POST['cid'];
                $status = $_POST['status'];
                                 $model = Gallery::model()->findByPk($cid);
                        if(Webnut::updateStatus($status,$model) == 1){
                                    echo Yii::app()->baseUrl.'/images/active.png';
                                    Hotels::model()->updateByPk($cid,array('status'=>1));
                        }else if(Webnut::updateStatus($status,$model) == 0){
                            echo Yii::app()->baseUrl.'/images/inactive.png';
                            Hotels::model()->updateByPk($cid,array('status'=>0));
                        }
                
            }
        }
       
    
        
}
