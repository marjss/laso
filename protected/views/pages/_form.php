<?php
/* @var $this PagesController */
/* @var $model Pages */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pages-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        <div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>
<!--	<div class="row">
		<?php // echo $form->labelEx($model,'section_id'); ?>
		<?php // echo $form->textField($model,'section_id'); ?>
		<?php // echo $form->error($model,'section_id'); ?>
	</div>-->

	<!--<div class="row">-->
		<?php // echo $form->labelEx($model,'pagename'); ?>
		<?php // echo $form->textField($model,'pagename',array('size'=>60,'maxlength'=>300)); ?>
		<?php // echo $form->error($model,'pagename'); ?>
	<!--</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'contents'); ?>
		<?php // echo $form->textField($model,'contents'); ?>
             <?php 
         $this->widget('ext.redactorjs.Redactor', 
                  array( 
                      'model' => $model, 
                      'attribute' => 'contents',
//                      'toolbar' => 'mini',
                      'editorOptions' => array( 
                     'imageUpload' => false,
                
                          
                        ),
                      
                      )); ?>
		<?php echo $form->error($model,'contents'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'keyword'); ?>
		<?php echo $form->textField($model,'keyword',array('size'=>60,'maxlength'=>600)); ?>
		<?php echo $form->error($model,'keyword'); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>1500)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<!--<div class="row">-->
		<?php // echo $form->labelEx($model,'extpage_link'); ?>
		<?php // echo $form->textField($model,'extpage_link',array('size'=>60,'maxlength'=>300)); ?>
		<?php // echo $form->error($model,'extpage_link'); ?>
	<!--</div>-->

	<!--<div class="row">-->
		<?php // echo $form->labelEx($model,'published'); ?>
		<?php // echo $form->textField($model,'published'); ?>
		<?php // echo $form->error($model,'published'); ?>
	<!--</div>-->

	<!--<div class="row">-->
		<?php // echo $form->labelEx($model,'parent_id'); ?>
		<?php // echo $form->textField($model,'parent_id'); ?>
		<?php // echo $form->error($model,'parent_id'); ?>
	<!--</div>-->

	<!--<div class="row">-->
		<?php // echo $form->labelEx($model,'secure_access'); ?>
		<?php // echo $form->textField($model,'secure_access'); ?>
		<?php // echo $form->error($model,'secure_access'); ?>
	<!--</div>-->

	<div class="row">
		<?php // echo $form->labelEx($model,'footer'); ?>
		<?php // echo $form->textField($model,'footer'); ?>
		<?php // echo $form->error($model,'footer'); ?>
	<!--</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'menu_order'); ?>
		<?php echo $form->textField($model,'menu_order',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'menu_order'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->