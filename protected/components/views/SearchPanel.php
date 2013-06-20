<div class="search-inside">
   <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'hotels-filter-form',
       'action' => array('site/search'),
	'enableAjaxValidation'=>true,
        'htmlOptions' => array('class'=>'jNice no-margin clearfix'),
)); ?>
            <ul class="search-options-col clearfix">
                    <?php foreach($models as $model){  
                        $criteria2= new CDbCriteria;
                        $criteria2->limit = 5;
                        $criteria2->condition = 'cat_id = '.$model->id;
                        $filters = Filters::model()->findAll($criteria2);
                        ?>
                    <li class="options-col">
                        <h3><?php echo CHtml::encode($model->title);?>  </h3>
                        <ul class="options-list">
                            <?php foreach ($filters as $filter){?>
                            <li class="dark-gray"><?php echo CHtml::encode($filter->title);?> <?php echo CHtml::CheckBox($filter->title,false, array ('value'=>'',)); ?>
<!--                                <input type="checkbox" value="" />-->
                            </li>
                            <?php }?>
                        </ul>
                    </li>
                    <?php }?>
                  </ul>
                <div class="search-submitter">
                        <?php echo CHtml::submitButton('',array('class'=>'submit-options')); ?>
                	<!--<input type="text" value="" class="submit-options" />-->
                    <a href="#"><strong>לאבק בזכות</strong></a>
                </div>
        <?php $this->endWidget(); ?>
    </div>