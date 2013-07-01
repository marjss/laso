<?php
/* @var $this PagesController */
/* @var $model Pages */
/* @var $form CActiveForm */
?>
<div class="content-box">
    <div class="content-box-header">
<h3 style="cursor: s-resize; ">Create Pages</h3>
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
	'id'=>'pages-form',
	'enableAjaxValidation'=>false,
)); ?>

	<!--<p class="note">Fields with <span class="required">*</span> are required.</p>-->

	<?php echo $form->errorSummary($model); ?>
        <table class="formbox">
            <tr>
        <div class="row">
		<td><?php echo $form->labelEx($model,'title'); ?></td>
		<td><?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>300)); ?></td>
		<td><?php echo $form->error($model,'title'); ?></td>
	</div>
        </tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
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
        <tr>
	<div class="row">
	<td>	<?php echo $form->labelEx($model,'contents'); ?></td>
		<?php // echo $form->textField($model,'contents'); ?>
             <td><?php 
         $this->widget('ext.redactorjs.Redactor', 
                  array( 
                      'model' => $model, 
                      'attribute' => 'contents',
//                      'toolbar' => 'mini',
                      'editorOptions' => array( 
                     'imageUpload' => false,
                
                          
                        ),
                      
                      )); ?></td>
		</td><?php echo $form->error($model,'contents'); ?></td>
	</div>
        </tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
        <tr>
	<div class="row">
                <td><?php echo $form->labelEx($model,'keyword'); ?></td>
		<td><?php echo $form->textField($model,'keyword',array('size'=>60,'maxlength'=>600)); ?></td>
		<td><?php echo $form->error($model,'keyword'); ?></td>
	</div>
        </tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>

	<tr>

	<div class="row">
		<td><?php echo $form->labelEx($model,'description'); ?></td>
		<td><?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>1500)); ?></td>
		<td><?php echo $form->error($model,'description'); ?></td>
	</div>
        </tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>

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

	<!--<div class="row">-->
		<?php // echo $form->labelEx($model,'footer'); ?>
		<?php // echo $form->textField($model,'footer'); ?>
		<?php // echo $form->error($model,'footer'); ?>
	<!--</div>-->
        <tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'menu_order'); ?></td>
		<td><?php echo $form->textField($model,'menu_order',array('size'=>30,'maxlength'=>30)); ?></td>
		<td><?php echo $form->error($model,'menu_order'); ?></td>
	</div>
        </tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>

	<!--<div class="row">-->
		<?php // echo $form->labelEx($model,'status'); ?>
		<?php // echo $form->textField($model,'status',array('size'=>3,'maxlength'=>3)); ?>
		<?php // echo $form->error($model,'status'); ?>
	<!--</div>-->

	<tr>
	<div class="row buttons">
            <td></td>
            	<td><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'button')); ?></td>
	</div>
        </tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<?php $this->endWidget(); ?>
</table>
</div>
    </div>