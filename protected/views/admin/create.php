<?php
/* @var $this HotelsController */
/* @var $model Hotels */

$this->breadcrumbs=array(
	'Hotels'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Hotels', 'url'=>array('index')),
	array('label'=>'Manage Hotels', 'url'=>array('admin')),
);
?>



<?php 
$avatari = 'create';
echo $this->renderPartial('_form', array('model'=>$model,'filter'=>$filter,'avatari'=>$avatari)); ?>