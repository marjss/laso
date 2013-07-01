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
<table>
<tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'title',array('size'=>60,'maxlength'=>255)); ?></td><br>
		<td><?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255,'class'=>'filtera')); ?></td>
		<td><?php echo $form->error($model,'title'); ?></td>
	</div>
</tr><tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
<div class="titles"></div>
<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
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
<p><span><a id="plus5" href="#">[+]</a></span></p>
<script>
 var i= 0;
$(document).on('click','#plus5',function(){

$('div.titles').append("<tr><td><label for='Filters_title' class='error required' maxlength='255' size='60'>Title <span class='required'>*</span></label></td><td><input type='text' id='Filters_title' name='Filters[title]["+i+"]' class='filtera error' style='margin:10px 10px' maxlength='255' size='60'></td><td><p><span><a id='minus5' href='#'>[-]</a></span></p></td></tr>");
  i++;
 return false;
  
 });
 $(document).on('click','#minus5',function(){
 $(this).parent().parent().parent().parent().remove();
  return false;
                });
</script>
    <!-- form -->