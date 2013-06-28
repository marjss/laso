<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="not-ie" lang="en">
<!--<![endif]-->
<head>
<!-- Basic meta tags -->
<meta charset="utf-8">
<title>Laso: Data Table</title>
<meta name="description" content="...">
<meta name="keywords" content="...">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--[if (gte IE 9)|!(IE)]>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<![endif]-->

<!-- CSS
================================================== -->

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/jNice.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/template.css" media="screen, projection" />

<!--[if lt IE 9]>
	<script src="js/shiv.js"></script>
<![endif]-->

</head>
<body> 

<header class="no-slide">
<?php $this->widget('Search'); ?>
</header>

<section class="content">

	<?php echo $content; ?>
    <br />
    <a href="#"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/fb-btn.gif" alt="facebook" /></a>
    
</section>

<footer>
	<?php $this->widget('Footer'); ?>
</footer>
</body>
</html>