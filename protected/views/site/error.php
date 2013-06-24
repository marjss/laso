
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<link rel="stylesheet" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" type="text/css" media="screen">
</head>
<body>
    <div class="errorpage">
            <br />
            <div>
                <h1><?php echo $code; ?> Error - <?php if($code == '404') { echo "The page you are looking for was not found here."; } else { echo CHtml::encode($message); }?></h1>
            </div>
            
              <!--<div class="errorpagelinks">Try one of the following:</div>-->
                
                    <div class="errorpagelink">
                            <ul>
                                   
                            </ul>
                    </div>
    </div>

 <div class="clear"></div>
</body>
</html>

