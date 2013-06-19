<?php 
Yii::import('zii.widgets.CPortlet');
 /**
  * Renders the Search Panel content
  */
class SearchPanel extends CPortlet
{
    protected function renderContent()
	{
            $this->render('SearchPanel');
	}
	
}