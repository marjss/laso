<?php
/* @var $this FiltersController */
/* @var $model Filters */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'filters-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cat_id'); ?>
		<?php echo $form->textField($model,'cat_id'); ?>
		<?php echo $form->error($model,'cat_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hotel_id'); ?>
		<?php echo $form->textField($model,'hotel_id'); ?>
		<?php echo $form->error($model,'hotel_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'added_date'); ?>
		<?php echo $form->textField($model,'added_date'); ?>
		<?php echo $form->error($model,'added_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textField($model,'note',array('size'=>60,'maxlength'=>1024)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->