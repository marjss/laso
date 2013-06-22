<?php 
Yii::import('zii.widgets.CPortlet');
 /**
  * Renders the header content
  */
class AdminMenu extends CPortlet
{
    protected function renderContent()
	{
            $this->render('AdminMenu');
	}
	
}
