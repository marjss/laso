<?php 
Yii::import('zii.widgets.CPortlet');
 /**
  * Renders the header content
  */
class Header extends CPortlet
{
    protected function renderContent()
	{
            $this->render('Header');
	}
	
}
