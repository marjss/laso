<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Admin Panel</title>
<!--<script type="text/javascript" src="js/jquery.js"></script>-->
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/treeMenu.js"></script>
<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table style="height:100%;" width="100%" cellpadding="1" cellspacing="0">
<tr bgcolor="#006699" height="100">
	<td class="admin_text">
    	<h1>Admin Panel</h1>
    </td>
    <td class="right_header" valign="top">
        <a href="#">Home</a> | <a href="<?php echo Yii::app()->createUrl('admin/logout'); ?>">Logout</a>
    </td>
</tr>
<tr>
	<td colspan="2" valign="top">
    <table width="100%" style="height:100%;" cellpadding="0" cellspacing="0" background="<?php echo Yii::app()->request->baseUrl; ?>/images/bg_body.jpg">
    	<tr>
        	<td class="left" width="20%" valign="top">
            <div class="admin-header">
               Welcome <?php echo  ucfirst(Yii::app()->user->name);?>
			</div>
                 <div id="treeMenu">
                     <?php $this->widget('AdminMenu'); ?>
                 </div>
            </td>
            <td width="82%" bgcolor="#FFFFFF" valign="top">
            <div class="right_content">
            <?php echo $content;?>
         </div>
                
            </div>
            </td>
        </tr>
    </table>
    </td>
</tr>
</table>
</body>
</html>