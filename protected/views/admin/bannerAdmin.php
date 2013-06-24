<?php
/* @var $this HotelsController */
/* @var $model Hotels */
/* @var $form CActiveForm */
?>
<div class="content-box">
    <div class="content-box-header">
<h3 style="cursor: s-resize; ">Create Banners</h3>
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
	'id'=>'banner-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data','class'=>'datagrid_form'),
)); ?>

	<!--<p class="note">Fields with <span class="required">*</span> are required.</p>-->

	<?php echo $form->errorSummary($model); ?>
        <table class="formbox">
            <tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'banner_name'); ?></td>
		<td><?php echo $form->textField($model,'banner_name',array('size'=>60,'maxlength'=>255)); ?></td>
		<td><?php echo $form->error($model,'banner_name'); ?></td>
	</div>
            </tr>
            
        <tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'banner_image'); ?></td>
		<td><?php echo $form->fileField($model,'banner_image',array('size'=>60,'maxlength'=>255)); ?></td>
		<td><?php echo $form->error($model,'banner_image'); ?></td>
	</div>
        </tr>
        <tr>
<!--	<div class="row">
		<td><?php // echo $form->labelEx($model,'status'); ?></td>
		<td><?php // echo $form->textField($model,'status',array('size'=>60,'maxlength'=>255)); ?></td>
		<td><?php // echo $form->error($model,'status'); ?></td>
	</div>-->
        </tr>
        <tr>
<!--	<div class="row">
		<td><?php // echo $form->labelEx($model,'adddate'); ?></td>
		<td><?php // echo $form->textField($model,'adddate',array('size'=>60,'maxlength'=>255)); ?></td>
		<td><?php // echo $form->error($model,'adddate'); ?></td>
	</div>-->
        </tr>
        
      
        <tr>
	<div class="row buttons">
            <td></td>
            	<td><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'button')); ?></td>
	</div>
        </tr>
<?php $this->endWidget(); ?>
</table>
</div>
    </div>
    <!-- form -->