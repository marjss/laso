<?php 
Yii::import('zii.widgets.CPortlet');
 /**
  * Renders the Slider main content
  */
class Slider extends CPortlet
{
    protected function renderContent()
	{
        $criteria = new CDbCriteria;
        $criteria->condition = 'status = 1';
            $model = Banner::model()->findAll($criteria);
            $this->render('Slider',array('banner'=>$model));
	}
	
}
