<?php 
Yii::import('zii.widgets.CPortlet');
 /**
  * Renders the Search Panel content
  */
class SearchPanel extends CPortlet
{
    protected function renderContent()
	{   
            $criteria = new CDbCriteria;
            $criteria->limit =  4;
            $criteria->order = 'sortOrder';
            $model = Categories::model()->findAll($criteria);
            $this->render('SearchPanel',array('models'=>$model));
	}
	
}