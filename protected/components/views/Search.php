<div class="nav_outer">
    	<div class="inside clearfix">
        	
 <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'search-form',
        'action' => array('site/search'),
        'enableAjaxValidation' => true,
        'htmlOptions'=>array('class'=>'search-site no-margin')
            )
    );
    ?>   
        <div class="clearfix">
                <?php echo CHtml::submitButton('',array('class'=>'submit_btn')); ?>
                <?php echo CHtml::textField('', '', array('class'=>'keywords')) ?>
        </div>
 <?php $this->endWidget(); ?>
        	<ul class="main_nav">
            	<li><a href="#">אודות</a></li>
                <li><a href="#">אודות</a></li>
                <li><a href="#">אודות</a></li>
                <li class="logo"><a href="#">&nbsp;</a></li>
            </ul>
        </div>
    </div>