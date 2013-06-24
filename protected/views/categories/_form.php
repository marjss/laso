<?php
/* @var $this CategoriesController */
/* @var $model Categories */
/* @var $form CActiveForm */
?>

<div class="content-box">
    <div class="content-box-header">
<h3 style="cursor: s-resize; ">Create Categories</h3>
</div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'categories-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
<table class="formbox">
            <tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'title'); ?></td>
		<td><?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?></td>
		<td><?php echo $form->error($model,'title'); ?></td>
	</div>
        </tr>
        <tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'description'); ?></td>
		<td><?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>500)); ?></td>
		<td><?php echo $form->error($model,'description'); ?></td>
	</div>
        </tr>

<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'added_date'); ?></td>
		<td><?php echo $form->textField($model,'added_date'); ?></td>
		<td><?php echo $form->error($model,'added_date'); ?></td>
	</div>
</tr>
<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'modified_date'); ?></td>
		<td><?php echo $form->textField($model,'modified_date'); ?></td>
		<td><?php echo $form->error($model,'modified_date'); ?></td>
	</div>
</tr>
<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'status'); ?></td>
		<td><?php echo $form->textField($model,'status'); ?></td>
		<td><?php echo $form->error($model,'status'); ?></td>
	</div>
</tr>
<tr>
	<div class="row buttons">
            <td></td>
<td>		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'button')); ?></td>
	</div>
</tr>
<?php $this->endWidget(); ?>

</div><!-- form -->

</div>