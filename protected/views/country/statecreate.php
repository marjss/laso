<?php
$this->breadcrumbs=array(
	'State'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List State', 'url'=>array('index')),
	array('label'=>'Manage Country', 'url'=>array('stateadmin')),
);
?>

<!--<h1>Create Country</h1>-->

<?php echo $this->renderPartial('_formstate', array('model'=>$model)); ?>