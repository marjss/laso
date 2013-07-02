<?php

class SiteController extends Controller
{
    public $defaultAction = 'hotfilter';
    public $layout='//layouts/home';
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
            $this->layout = 'blank';
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$this->redirect(array('admin/login'));
	}
        /**
         * Search by wild card
         */
        public function actionSearch()
        {
            echo 'search by wildcard';
//            die;
//            $this->render('search',array());
        }
        /**
         * Public default action to show all the lists of hotels before the filter applied
         */
         public function actionhotels()
        {
            // $this->layout = 'admin_layout';
             $model=Hotels::model()->hotelsearch();
             $this->render('hotels',array('model'=>$model));
//            $this->render('hotels',array());
        }
        /**
         * Public hotel filter action which perform filteration of the hotels according to choosed user options
         */
        public function actionHotfilter()
        {
            if($_POST){
            $filters = $_POST;
            $model= Hotels::model()->hotsearch($filters);
            } else{
           $model= Hotels::model()->hotelsearch();}
           $this->render('hotels',array('model'=>$model));
            
        }
        /**
         * Action to load the subsite
         */
        public function actionSubsite($id){
            $this->layout = 'site';
            $model = Hotels::model()->findByPk($id);
            $filters = Filters::model()->findAllByAttributes(array('hotel_id'=>$id));
            $gallery = Gallery::model()->findAllByAttributes(array('product_id'=>$id));
            $this->render('subsite',array('model'=>$model,'gallery'=>$gallery,'filters'=>$filters));
        }
}