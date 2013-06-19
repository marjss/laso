<?php 
Yii::import('zii.widgets.CPortlet');
 /**
  * Renders the footer content
  */
class Footer extends CPortlet
{
    protected function renderContent()
	{
            $this->render('Footer');
	}
	
}
