<br>
<div class="content-box">
<div class="content-box-header">
<h3 style="cursor: s-resize; ">Add State</h3>
</div>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'state-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('class'=>'datagrid_form'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
<table class="formbox">
<!--    <tr>
	<div class="row">
		<td><?php // echo $form->labelEx($model,'id'); ?></td>
		<td><?php // echo $form->textField($model,'id',array('size'=>2,'maxlength'=>2)); ?></td>
		<td><?php // echo $form->error($model,'id'); ?></td>
	</div>
    </tr>-->
<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'country_id'); ?></td>
		<td><?php echo $form->dropDownList($model,'country_id',Webnut::getListCountries(),array('empty'=>'Select Country','class'=>'selectInput','style'=>'width:200px;')); ?></td>
		<td><?php echo $form->error($model,'country_id'); ?></td>
	</div>
    </tr>
<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'state_name'); ?></td>
		<td><?php echo $form->textField($model,'state_name',array('size'=>60,'maxlength'=>80)); ?></td>
		<td><?php echo $form->error($model,'state_name'); ?></td>
	</div>
</tr>
	
<tr>
	<div class="row buttons">
            <td></td>
		<td><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'button')); ?></td>
	</div></tr>
</table>
<?php $this->endWidget(); ?>

</div>
</div>
    <!-- form -->