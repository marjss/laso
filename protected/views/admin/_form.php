<?php
/* @var $this HotelsController */
/* @var $model Hotels */
/* @var $form CActiveForm */
?><style>
input[type="radio"], input[type="checkbox"]{margin-left: 21px;margin-right: -11px;}
</style>
<div class="content-box">
    <div class="content-box-header">
<h3 style="cursor: s-resize; ">Create Hotels</h3>
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
	'id'=>'hotels-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data','class'=>'datagrid_form'),
'clientOptions'=>array('validateOnSubmit'=>true)));?>

	<!--<p class="note">Fields with <span class="required">*</span> are required.</p>-->

	<?php echo $form->errorSummary($model); ?>
        <table class="formbox">
            <tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'name'); ?></td>
		<td><?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?></td>
		<td><?php echo $form->error($model,'name'); ?></td>
	</div>
            </tr>
            <tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'description'); ?></td>
		<td><?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>5000)); ?></td>
		<td><?php echo $form->error($model,'description'); ?></td>
	</div>
        </tr>
        <tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'avatar'); ?></td>
		<td><?php echo $form->fileField($model,'avatar',array('size'=>60,'maxlength'=>255)); ?></td>
		<td><?php echo $form->error($model,'avatar'); ?></td>
	</div>
        </tr>
        <tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'street'); ?></td>
		<td><?php echo $form->textField($model,'street',array('size'=>60,'maxlength'=>255)); ?></td>
		<td><?php echo $form->error($model,'street'); ?></td>
	</div>
        </tr>
        <tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'city'); ?></td>
		<td><?php echo $form->textField($model,'city',array('size'=>60,'maxlength'=>255)); ?></td>
		<td><?php echo $form->error($model,'city'); ?></td>
	</div>
        </tr>
        <tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'address'); ?></td>
		<td><?php echo $form->textArea($model,'address',array('size'=>60,'maxlength'=>1024)); ?></td>
		<td><?php echo $form->error($model,'address'); ?></td>
	</div>
        </tr>
        <tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'state'); ?></td>
		<td><?php echo $form->textField($model,'state',array('size'=>60,'maxlength'=>255)); ?></td>
		<td><?php echo $form->error($model,'state'); ?></td>
	</div>
        </tr>
        <tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'country'); ?></td> 
                <td><?php echo $form->dropDownList($model,'country',Webnut::getListCountries(),array('empty'=>'Select Country'),array('class'=>'selectInput')); ?></td>
		<td><?php echo $form->error($model,'country'); ?></td>
	</div>
        </tr>
        <tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'album_id'); ?></td>
		<td><?php echo $form->textField($model,'album_id'); ?></td>
		<td><?php echo $form->error($model,'album_id'); ?></td>
	</div>
        </tr>
        <tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'other'); ?></td>
		<td><?php echo $form->textField($model,'other',array('size'=>60,'maxlength'=>1024)); ?></td>
		<td><?php echo $form->error($model,'other'); ?></td>
	</div>
        </tr>
<!--        <tr>
	<div class="row">
		<td><?php // echo $form->labelEx($model,'status'); ?></td>
		<td><?php // echo $form->textField($model,'status',array('size'=>11,'maxlength'=>11)); ?></td>
		<td><?php // echo $form->error($model,'status'); ?></td>
	</div>
        </tr>-->
        <tr class="filter">
	
		<td><?php echo $form->labelEx($filter,'Filter',array('display'=>'inline-block')); ?></td>
		<td><?php echo $form->checkBoxList($filter,'title',Webnut::getFilters(),array('separator'=>'')); ?></div></td>
		<td><?php echo $form->error($filter,'title'); ?></td>
	</div>
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