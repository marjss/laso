<?php 
Yii::import('zii.widgets.CPortlet');
 /**
  * Renders the Search main content
  */
class Search extends CPortlet
{
    protected function renderContent()
	{
            $this->render('Search');
	}
	
}
