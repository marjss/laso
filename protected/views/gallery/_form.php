<br>
<div class="content-box">
<div class="content-box-header">
<h3 style="cursor: s-resize; ">Create Gallery</h3>
</div>
<div class="form">
<?php if(Yii::app()->user->hasFlash('success')){ ?>
        
<h4 class="alert success">
   	<?php echo Yii::app()->user->getFlash('success'); ?>
</h4>
<?php }elseif(Yii::app()->user->hasFlash('error')){ ?>
        
<h4 class="alert error">
   	<?php echo Yii::app()->user->getFlash('error'); ?>
</h4>
<?php } ?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'gallery-form',
	'enableAjaxValidation'=>false,
    'htmlOptions' => array('enctype' => 'multipart/form-data')
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
        <br>
	<?php echo $form->errorSummary($model); ?>
<table class="formbox">
    <tr>
	<div class="row">
            <td><?php echo $form->labelEx($model,'Hotel *'); ?></td>
            <td><?php echo $form->dropDownList($hotel,'name',Webnut::getHotels(),array('empty'=>'Select Hotel'),array('class'=>'selectInput','style'=>'width:20%')); ?></td>
            <td><?php echo $form->error($model,'product_id'); ?></td>
	</div>
</tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<!--	<div class="row">
		<?php // echo $form->labelEx($model,'thumb_image'); ?>
		<?php // echo $form->textField($model,'thumb_image',array('size'=>60,'maxlength'=>255)); ?>
		<?php // echo $form->error($model,'thumb_image'); ?>
	</div>-->
<tr>
<div class="row">
            <td><?php echo $form->labelEx($model,'full_image'); ?></td>
		 <td><?php
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
		?></td>
                    <td><?php //echo $form->textField($model,'image',array('size'=>60,'maxlength'=>255)); ?></td>
		<td><?php echo $form->error($model,'full_image'); ?></td>
	</div>
</tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
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

	<tr>
	<div class="row buttons">
            <td></td>
		<td><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'button')); ?></td>
	</div>
</tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
</table>

<?php $this->endWidget(); ?>
</div>
</div><!-- form -->