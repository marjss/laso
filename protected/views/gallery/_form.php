<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gallery-form',
	'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data')
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Hotel *'); ?>
            <?php echo $form->dropDownList($hotel,'name',Webnut::getHotels(),array('empty'=>'Select Hotel'),array('class'=>'selectInput','style'=>'width:20%')); ?>
		<?php echo $form->error($model,'product_id'); ?>
	</div>

<!--	<div class="row">
		<?php // echo $form->labelEx($model,'thumb_image'); ?>
		<?php // echo $form->textField($model,'thumb_image',array('size'=>60,'maxlength'=>255)); ?>
		<?php // echo $form->error($model,'thumb_image'); ?>
	</div>-->
<div class="row">
            <?php echo $form->labelEx($model,'full_image'); ?>
		 <?php
		  $this->widget('CMultiFileUpload', array(
		     'model'=>$model,
		     'name'=>'full_image',
//		     'attribute'=>'image',
		     'accept'=>'jpg|gif|png',
		     /*'options'=>array(
			'onFileSelect'=>'function(e, v, m){ alert("onFileSelect - "+v) }',
			'afterFileSelect'=>'function(e, v, m){ alert("afterFileSelect - "+v) }',
			'onFileAppend'=>'function(e, v, m){ alert("onFileAppend - "+v) }',
			'afterFileAppend'=>'function(e, v, m){ alert("afterFileAppend - "+v) }',
			'onFileRemove'=>'function(e, v, m){ alert("onFileRemove - "+v) }',
			'afterFileRemove'=>'function(e, v, m){ alert("afterFileRemove - "+v) }',
		     ),*/
		  ));
		?>
                    <?php //echo $form->textField($model,'image',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'full_image'); ?>
	</div>

<!--	<div class="row">
		<?php // echo $form->labelEx($model,'add_date'); ?>
		<?php // echo $form->textField($model,'add_date'); ?>
		<?php // echo $form->error($model,'add_date'); ?>
	</div>-->

<!--	<div class="row">
		<?php // echo $form->labelEx($model,'status'); ?>
		<?php // echo $form->textField($model,'status',array('size'=>1,'maxlength'=>1)); ?>
		<?php // echo $form->error($model,'status'); ?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->