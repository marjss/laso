<?php
/* @var $this FiltersController */
/* @var $model Filters */
/* @var $form CActiveForm */
?>
<div class="content-box">
<div class="content-box-header">
<h3 style="cursor: s-resize; ">Update Filters</h3>
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
	'id'=>'filters-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
        
	<?php echo $form->errorSummary($model); ?>
<table class="formbox">
    <tr>
	<div class="row">
            <td><?php echo $form->labelEx($model,'cat_id'); ?></td>
		<td><?php echo $form->dropDownList($category,'title',Webnut::getCategories(),array('empty'=>'Select Category'),array('class'=>'selectInput','style'=>'width:20%')); ?></td>
		<td><?php echo $form->error($model,'cat_id'); ?></td>
	</div>
</tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'hotel_id'); ?></td>
		<td><?php echo $form->dropDownList($hotel,'name',Webnut::getHotels(),array('empty'=>'Select Hotel'),array('class'=>'selectInput','style'=>'width:20%','options'=>array($model->hotel_id=>array('selected'=>'selected')))); ?></td>
		<td><?php echo $form->error($model,'hotel_id'); ?></td>
	</div>
</tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'title'); ?></td>
		<td><?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?></td>
		<td><?php echo $form->error($model,'title'); ?></td>
	</div>
</tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'description'); ?></td>
		<td><?php echo $form->textArea($model,'description',array('size'=>60,'maxlength'=>500)); ?></td>
		<td><?php echo $form->error($model,'description'); ?></td>
	</div>
</tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<!--<tr>
	<div class="row">
		<td><?php // echo $form->labelEx($model,'added_date'); ?></td>
		<td><?php // echo $form->textField($model,'added_date'); ?></td>
		<td><?php // echo $form->error($model,'added_date'); ?></td>
	</div>
</tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>-->
<!--<tr>-->
	<!--<div class="row">-->
		<!--<td><?php echo $form->labelEx($model,'status'); ?></td>-->
		<!--<td><?php echo $form->textField($model,'status'); ?></td>-->
		<!--<td><?php echo $form->error($model,'status'); ?></td>-->
	<!--</div>-->
<!--</tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>-->
<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'note'); ?></td>
		<td><?php echo $form->textField($model,'note',array('size'=>60,'maxlength'=>1024)); ?></td>
		<td><?php echo $form->error($model,'note'); ?></td>
	</div>
</tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<tr>
	<div class="row buttons">
            <td></td>
		<td><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'button')); ?></td>
	</div>
</tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
</table>
<?php $this->endWidget(); ?>

</div>
</div>
    <!-- form -->