<?php
/* @var $this HotelsController */
/* @var $model Hotels */
/* @var $form CActiveForm */
?>
<style>
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
        'clientOptions'=>array('validateOnSubmit'=>true)));
?>

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
		<td><?php echo $form->textArea($model,'description',array('size'=>60,'maxlength'=>5000)); ?></td>
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
		<td><?php echo $form->labelEx($model,'capacity'); ?></td>
		<td><?php echo $form->textField($model,'capacity',array('size'=>60,'maxlength'=>255)); ?></td>
		<td><?php echo $form->error($model,'capacity'); ?></td>
	</div>
            </tr>
        <tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'phone'); ?></td>
		<td><?php echo $form->textField($model,'phone',array('size'=>60,'maxlength'=>255)); ?></td>
		<td><?php echo $form->error($model,'phone'); ?></td>
	</div>
            </tr>
            <tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'website'); ?></td>
		<td><?php echo $form->textField($model,'website',array('size'=>60,'maxlength'=>255)); ?></td>
		<td><?php echo $form->error($model,'website'); ?></td>
	</div>
            </tr>
            <tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'email'); ?></td>
		<td><?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?></td>
		<td><?php echo $form->error($model,'email'); ?></td>
	</div>
            </tr>
            <tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'summary'); ?></td>
		<td><?php echo $form->textArea($model,'summary',array('size'=>60,'maxlength'=>5000)); ?></td>
		<td><?php echo $form->error($model,'summary'); ?></td>
	</div>
        </tr>
        <?php if(($model->avatar != '') && ($avatari != 'create')){ ?>
        <div id="hotelimage" style="float:right; margin-top: 200px;"><?php echo CHtml::image(Yii::app()->baseUrl.'/'.$model->avatar, 'DORE',array('style'=>'width:250px;')); ?>
  <div style="clear:both; margin: 15px 0 0 0px;"><?php echo CHtml::button('Remove Image',array('class'=>'button','id'=>'remove_img','rel'=>$model->id)) ?></div></div>
  <?php } ?>
  <input type="hidden" name="imageview" id="imageview" value="<?php if($model->avatar != ''){ echo 1; }else{ echo 0; } ?>" />
        <tr>
	<div class="row">
		<td><?php echo $form->labelEx($model,'area'); ?></td>
		<td><?php echo $form->dropDownList($model,'area',$model->getAreas(),array('empty'=>'Select Area'),array('class'=>'selectInput')); ?></td>
		<td><?php echo $form->error($model,'area'); ?></td>
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
                
		<td><?php echo $form->labelEx($model,'Filter',array('display'=>'inline-block')); ?></td>
                <td><?php 
                
                echo $form->CheckBoxList($model,'categoryIds',Chtml::listData(Filters::model()->findAll(),'id','title'),array('separator'=>'&nbsp;','multiple'=>'multiple','size'=>5)
                        ); ?></div></td>
		<td><?php echo $form->error($model,'categoryIds'); ?></td>
	
        </tr>
        <tr>
        <!--<div id="duplicate"></div>-->
	<!--<div class="row buttons">-->
            <td><?php //echo CHtml::link('Add New Filter',array('filters/ajaxfilter'),array('class'=>'button')); ?>
            <?php
    Yii::app()->clientScript->registerScript('uploadDialog', "
$(function(){
    $('#upload-filter').click(function(){
        $('#filter-form').load('".Yii::app()->createUrl('filters/ajaxfilter')."', function(){
            $('#filter-form').dialog('open');
        });
        return false;
    });
});");

//echo CHtml::link('Add New Filter', '#', array('id' => 'upload-filter','class'=>'button'));
    
    $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
                'id'=>'filter-form',
                'options'=>array(
                    'title'=>Yii::t('Add','Filter'),
                    'autoOpen'=>false,
                    'model'=>'true',
                    'width'=>'340px',
                    'height'=>'auto'
                ),
        
           
                ));
    
    $this->endWidget('zii.widgets.jui.CJuiDialog');  ?>
            
            <!--</td>-->
            	<td><?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Update',array('class'=>'button')); ?></td>
	</div>
        </tr>
<?php $this->endWidget(); ?>
</table>
</div>
    </div>
    <script>
       $(document).on('click','#remove_img',(function(){
          var cid = $(this).attr('rel');
          $.ajax({
              type:'POST',
              data:{cid:cid},
              url: '<?php echo Yii::app()->baseUrl;?>/admin/Removeimage',
              success:function(res){
                    if(res == 1){
                        $('#hotelimage').css('display','none');
                       $('#imageview').attr('value',0);
                    }
                    else{
                            
                    }    
                    return false;
                 }
          })
       })); 
    
    </script>
    <!-- form -->
