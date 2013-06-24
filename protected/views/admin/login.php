<!--<p>Please fill out the following form with your login credentials:</p>

<div class="form">


	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php // echo $form->labelEx($model,'username'); ?>
		<?php // echo $form->textField($model,'username'); ?>
		<?php // echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php // echo $form->labelEx($model,'password'); ?>
		<?php // echo $form->passwordField($model,'password'); ?>
		<?php // echo $form->error($model,'password'); ?>
		<p class="hint">
			Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>.
		</p>
	</div>

	<div class="row rememberMe">
		
		
		
	</div>

	<div class="row buttons">
		<?php // echo CHtml::submitButton('Login'); ?>
	</div>


</div> form -->


<table style="height:100%;" width="100%" cellpadding="1" cellspacing="0">
    <tr bgcolor="#006699" height="100" style="background:url(<?php echo Yii::app()->request->baseUrl;?>/images/bg_body.jpg) 0 0 repeat">
	<td valign="middle" align="center">
    	<table width="500" height="200px">
        	<tr>
            	<td>



<div id="login-box">

<H2>Login</H2>

<br />
<br />
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<div id="login-box-name"><?php echo $form->labelEx($model,'username'); ?></div><div id="login-box-field"><?php echo $form->textField($model,'username',array('class'=>'form-login')); ?></div>
<?php echo $form->error($model,'username',array('class'=>'login_error')); ?>
<div id="login-box-name"><?php echo $form->labelEx($model,'password'); ?></div><div id="login-box-field"><?php echo $form->passwordField($model,'password',array('class'=>'form-login')); ?></div>
<?php echo $form->error($model,'password',array('class'=>'login_error')); ?>
<br />
<span class="login-box-options"><?php echo $form->checkBox($model,'rememberMe'); ?><?php echo $form->label($model,'rememberMe'); ?> </span>
<?php echo $form->error($model,'rememberMe',array('class'=>'login_error')); ?>
<br />
<br />
<?php // echo CHtml::submitButton('Login'); 
 echo CHtml::imageButton(Yii::app()->request->baseUrl.'/images/login-btn.png',array('width'=>'103','height'=>'42','style'=>'margin-left:90px;'));
?>
<!--<img src="images/login-btn.png" width="103" height="42" style="margin-left:90px;" />-->
</div>
<?php $this->endWidget(); ?>

                </td>
            </tr>
        </table>
    </td>
</tr>
</table>