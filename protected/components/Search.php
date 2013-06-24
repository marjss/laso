<?php 
Yii::import('zii.widgets.CPortlet');
 /**
  * Renders the Search main content
  */
class Search extends CPortlet
{
    protected function renderContent()
	{
        $criteria = new CDbCriteria;
        $criteria->order = 'menu_order';
            $model = Pages::model()->findAll($criteria);
            $this->render('Search',array('pages'=>$model));
	}
	
}
