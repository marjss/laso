<div class="container">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'hoteldrop-form',
	'enableAjaxValidation'=>false,
)); 
?>
    <fieldset class="inlineLabels">

	<div class="ctrlHolder">
		<?php echo $form->label($hotel,'name'); ?>
		<?php echo $form->dropDownList($hotel,'name',Webnut::getHotels(),array('class'=>'selectInput','style'=>'width:20%','onchange'=>'js:tester();')); ?>
		<?php echo $form->error($hotel,'name'); ?>
	</div>

<!--	<div class="buttonHolder">
		<?php // echo CHtml::submitButton('Hotel',array('gallery/admin'),array('complete' => 'function(){$.fn.yiiGridView.update("gallery-grid");}',),array('id'=>'genreport','class'=>'primaryAction', 'style'=>'width:20%')); ?>
	</div>-->
    </fieldset>
<?php $this->endWidget(); ?>

</div><!-- form -->
<script>
function tester(){
    var hid = $('#Hotels_name').val();
    $.ajax({
                                url: '<?php echo Yii::app()->request->baseUrl; ?>/gallery/gethotels',     //controller action url
                                type: "POST",
                                data: {hid : hid},  
                                success:function(resp){
                                    $.fn.yiiGridView.update("gallery-grid");
                                }    
                            });
}
</script>